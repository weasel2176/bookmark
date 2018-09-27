<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ブックマーク登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">ブックマーク一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron text-center">
   <fieldset>
    <legend>書籍の情報を入力</legend>
     <label>タイトル：<input type="text" name="title"></label><br>
     <label>書籍url：<input type="text" name="url"></label><br>
     <label><textArea name="comment" rows="4" cols="40"></textArea></label><br>
     <input class="btn btn-warning" type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
