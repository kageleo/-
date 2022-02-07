<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
        <title>確認画面</title>
    </head>
    <body>
        <h1>確認画面<br></h1>


        <?php
            // POSTデータの受け取り無害化
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
            $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

            // 未入力チェック
            if($name==''or$message=='') {
                echo '入力されていない項目があります。<br>';
            } else {
                echo '<form method="post" action="page03.php">';
                echo '名前：<input name="name" type="text" size="20" value="'.$name.'" readonly><br><br>';
                echo '<textarea name="message" cols="60" rows="3" readonly>'.$message.'</textarea><br>';
                echo '<input type="submit" value="OK">';
                echo '<input type="button" onClick="history.back();" value="戻る">';
                echo '</form>';
            }
        ?>
    </body>
</html>