<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"></link>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>ToDoSubmit</title>         
  </head>
  <body>

  <?php
  ini_set('display_errors',"On");
  error_reporting(E_ALL);
  function h($str) { return htmlspecialchars($str, ENT_QUOTES, "UTF-8"); }

  if (isset($_GET["date"]) && isset($_GET["content"]) && ($_GET["date"] != "") && ($_GET["content"] != "")) {
    $date = $_GET["date"];
    $dateArray = explode('-', $date);
    $month = $dateArray[0];
    $day = $dateArray[1];
    $dow = $dateArray[2];
    $content = $_GET["content"];

    $pdo = new PDO("sqlite:ToDoList.sqlite");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $st = $pdo->prepare("INSERT INTO ToDoList(month, day, dow, content) VALUES(?, ?, ?, ?)");
    $st->execute(array($month, $day, $dow, $content));

      $result = "登録しました。";
  }
  else {
    $result = "todoがありません。";
  }
  ?>

  <div class="article">
      <h2><?php print $result; ?></h2>
      <p><a href="toppage.php">ToDoリストに戻る</a></p>
  </div>
    
  </body>
</html>