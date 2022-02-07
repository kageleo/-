<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
        <title>掲示板</title>
    </head>
    <body>
        <h1>掲示板<br></h1>
        <form method="post" action="page02.php">
            名前：<input type="text" name="name" size="20"><br><br>
            <textarea type="text" name="message" cols="60" rows="3"></textarea><br>
            <input type="submit" value="投稿">
            <input type="reset" value="リセット">
        </form>


        <?php
            $datalist = file('data02.txt');
            foreach($datalist as $value) {
                echo '<hr>'.$value;
            }
            
        ?>
    </body>
</html>