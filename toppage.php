<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"></link>
    <title>ToDoList</title>
</head>
<body>
    <h1>2021年</h1>

    <?php
    for($i=1; $i<13; $i++){
        $month = 'month_' . $i;
        $$month = array();
        if($i === 4 || $i === 6 || $i === 9 || $i === 11){
            for($j=0; $j<30; $j++) {
                $timestamp = mktime(0, 0, 0, $i, $j + 1, 2021);
                $date = date('w', $timestamp);
                $$month[$j] = $date;
            }
        }else if($i === 2){
            for($j=0; $j<28; $j++) {
                $timestamp = mktime(0, 0, 0, $i, $j + 1, 2021);
                $date = date('w', $timestamp);
                $$month[$j] = $date;
            }
        }else {
            for($j=0; $j<31; $j++) {
                $timestamp = mktime(0, 0, 0, $i, $j + 1, 2021);
                $date = date('w', $timestamp);
                $$month[$j] = $date;
            }
        }
    }
    ?>

    <?php
    for($t=1; $t<13; $t++){
        echo '<h2 class="text-center">' . $t . '月' . '</h2>';
        echo '
            <div class="container">
            <table class="table table-bordered">
            <thead>
                <tr>
                <th style="width:14%"><span style="font-size:80%">Sunday</span></th>
                <th style="width:14%"><span style="font-size:80%">Monday</span></th>
                <th style="width:14%"><span style="font-size:80%">Tuesday</span></th>
                <th style="width:14%"><span style="font-size:80%">Wednesday</span></th>
                <th style="width:14%"><span style="font-size:80%">Thursday</span></th>
                <th style="width:14%"><span style="font-size:80%">Friday</span></th>
                <th style="width:14%"><span style="font-size:80%">Saturday</span></th>
                </tr>
            </thead>
            <tbody>
            ';
        $month = 'month_' . $t;
        $c_month = $$month;
        $first = $c_month[0];
        $last = 6 - $c_month[count($c_month) - 1];
        echo '<tr>';
        if($first != 0){
            echo '<td colspan="' . $first . '"></td>';
        }
        for($j=0; $j<6; $j++){
            if($j === 0) {
                if($t === 4 || $t === 6 || $t === 9 || $t === 11){
                    for($i=0; $i<30; $i++){
                        if(intdiv($i + $first, 7) === $j){
                            echo '<td>' . ($i + 1) . '</td>';
                        }
                    }
                }else if($t === 2){
                    for($i=0; $i<28; $i++){
                        if(intdiv($i + $first, 7) === $j){
                            echo '<td>' . ($i + 1) . '</td>';
                        }
                    }
                }else {
                    for($i=0; $i<31; $i++){
                        if(intdiv($i + $first, 7) === $j){
                            echo '<td>' . ($i + 1) . '</td>';
                        }
                    }
                }
            }else {
                echo '</tr><tr>';
                if($t === 4 || $t === 6 || $t === 9 || $t === 11){
                    for($i=0; $i<30; $i++){
                        if(intdiv($i + $first, 7) === $j){
                            echo '<td>' . ($i + 1) . '</td>';
                        }
                    }
                }else if($t === 2){
                    for($i=0; $i<28; $i++){
                        if(intdiv($i + $first, 7) === $j){
                            echo '<td>' . ($i + 1) . '</td>';
                        }
                    }
                }else {
                    for($i=0; $i<31; $i++){
                        if(intdiv($i + $first, 7) === $j){
                            echo '<td>' . ($i + 1) . '</td>';
                        }
                    }
                }
            }
            if($first <= 4) {
                if($j === 4){
                    break;
                }
            }
        }
        if($last != 0){
            echo '<td colspan="' . $last . '"></td>';
        }
        echo '</tr></tbody></table></div>';
    }
    ?>
</body>
</html>