<?php
//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_f01_db28;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('dbError:'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("sqlError:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= "<tr class='bg-danger'><td>タイトル：</td><td>".$result["title"]."　　　　"."<a href='detail.php?id=".$result['id']."'>編集</a></td></tr>
            <tr><td>URL：</td><td><a href=".$result["url"].">".$result["url"]."</a></td></tr>
            <tr><td class='col-xs-3'>登録日時：</td><td class='col-xs-9'>".$result["indate"]."</td></tr>
            <tr><td>コメント：</td><td>".$result["comment"]."</td></tr>
            <tr><td><a href='delete.php?url=".$result["url"]."'>削除</a><td></tr>";
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">ブックマーク登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <p>ブックマーク一覧</p>
    <table class="table">
        <?=$view?>
    </table>
</div>
<!-- Main[End] -->

</body>
</html>
