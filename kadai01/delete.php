<?php
if(
  !isset($_GET["url"]) || $_GET["url"]==""
){
  exit('ParamError');
}
$url=$_GET["url"];

try {
  $pdo = new PDO('mysql:dbname=gs_f01_db28;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('dbError:'.$e->getMessage());
}
$sql="DELETE FROM gs_bm_table WHERE url= :url";

$stmt=$pdo->prepare($sql);
$stmt->bindValue(':url',$url,PDO::PARAM_STR);
$status=$stmt->execute();
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("sqlError:".$error[2]);
}else{
  //select.phpへリダイレクト
  header("location: select.php");
    echo "<script>alert('一件ブックマークから削除しました。');</script>";
}

?>