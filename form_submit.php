
<?php
if (isset($_POST["day"]) && isset($_POST["content"]) && $_POST["content"] != "") {
    $day = $_POST["day"];
    $content = $_POST["content"];   
    $pdo = new PDO("sqlite:ToDoList.sqlite");

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
    $st = $pdo->query('DELETE FROM scadule WHERE hiduke ="' . $day . '";');
    $st2 = $pdo->query('INSERT INTO scadule(hiduke, content) VALUES("' . $day . '", "' . $content . '")');
    $result = "登録しました";
}
else {
    $result = "内容がありません";
}
?>

<!DOCTYPE html>
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