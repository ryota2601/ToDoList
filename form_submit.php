<!DOCTYPE html>
<?php
if (isset($_GET["day"]) && isset($_GET["content"])) {
    $day = $_GET["day"];
    $content = $_GET["content"];

    $pdo = new PDO("sqlite:myblog.sqlite");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $st = $pdo->prepare('DELETE FROM scadule WHERE hiduke ="' . $day . '";');
    $st = $pdo->prepare('INSERT INTO scdule(hiduke, content) VALUES(?, ?)');
    $st->execute(array($day, $content));

    $result = "登録しました";
}
else {
    $result = "内容がありません";
}
?>

<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <p class="text-center"><?php echo $result;?></p>
        <div class="text-center"><a href="toppage.php">トップに戻る</a></div>
    </div>
</body>
</html>