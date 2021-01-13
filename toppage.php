<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"></link>
    <title>ToDoList</title>
</head>
<body>
    <?php
    $January = array();
    
    for($i=0; $i<31; $i++) {
        $timestamp = mktime(0, 0, 0, 1, $i + 1, 2021);
        $date = date('w', $timestamp);
        $January[$i] = $date;
    }
    ?>

    <div class="container">
    <table class="table table-bordered">
    <thead>
        <tr>
        <th>Sunday</th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thursday</th>
        <th>Friday</th>
        <th>Saturday</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $first = $January[0];
        $last = 6 - $January[31];
        echo '<tr>';
        echo '<td colspan="' . $first . '"></td>';
        for($j=0; $j<6; $j++){
            if($j === 0) {
                for($i=0; $i<31; $i++){
                    if(intdiv($i + $first, 7) === $j){
                        echo '<td>' . ($i + 1) . '</td>';
                    }
                }
            }else {
                echo '</tr><tr>';
                for($i=0; $i<31; $i++){
                    if(intdiv($i + $first, 7) === $j){
                        echo '<td>' . ($i + 1) . '</td>';
                    }
                }

            }
        }
        echo '<td colspan="' . $last . '"></td></tr>';
        ?>
    </tbody>
    </table>
    </div>
</body>
</html>