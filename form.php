<?php
$pdo = new PDO("sqlite:ToDoList.sqlite");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$st = $pdo->query('SELECT * FROM scadule;');
$data = $st->fetchAll();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"></link>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>form</title>
</head>
<body>
    <div class="container">
        <form action="form_submit.php" method="post">
            <div class="form-group">
                <?php 
                $day = $_GET["day"];
                $content_st = $pdo->query('SELECT content FROM scadule WHERE hiduke ="' . $day . '";');
                $content_data = $content_st->fetchAll();
                ?>
                <input type="hidden" value="<?php echo $_GET["day"]; ?>" name="day">
                <h1 class="text-center mt-3"><?php echo $_GET["day"];?>の予定</h1>
                <p class="border border-dark text-center"><?php echo $content_data[0]["content"];?></p>
                <h3 class="text-center mt-5">予定を追加する</h3>
                <textarea class="form-control" name="content" rows="1"></textarea>
            </div>
            <div class="text-center"><input type="submit" value="追加" class="btn btn-primary"></div>
        </form>
        <div class="text-center"><a href="toppage.php" class="btn btn-secondary mt-3" role="button">戻る</a></div>
    </div>
</body>
</html>