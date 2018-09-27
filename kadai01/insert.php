<?php

if(
  !isset($_POST["title"]) || $_POST["title"]=="" ||
  !isset($_POST["url"]) || $_POST["url"]==""
){
  exit('ParamError');
}

//1. POSTデータ取得
//$name = filter_input( INPUT_GET, "name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$title = $_POST["title"];
$url = $_POST["url"];
$comment = $_POST["comment"];

//2. DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_f01_db28;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('dbError:'.$e->getMessage());
}

//３．データ登録SQL作成
$sql ="INSERT INTO gs_bm_table(id,title,url,comment,indate)
VALUES(NULL,:a1,:a2,:a3,sysdate())";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $title, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $url, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("sqlError:".$error[2]);
}else{
  //５．select.phpへリダイレクト
  header("location: select.php");

}
?>
