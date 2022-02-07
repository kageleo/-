<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
        <title>完了画面</title>
    </head>
    <body>
        <h1>完了画面<br></h1>


        <?php
            // POSTデータの受け取り無害化
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
            $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

            // 未入力チェック
            if($name=='' or $message==''){
                echo '入力されていない項目があります。<br>';
            } else {
                $kaigyo = array("\r\n", "\r", "\n");
                $message = str_replace($kaigyo, '<br>', $message);

                $fp = fopen('data02.txt', 'a');
                fwrite($fp, $name.'<br>'.$message."\n");
                fclose($fp);

                echo '投稿ありがとうございました。<br>';
                echo '<a href="page01.php">掲示板に戻る</a><br>';
            }
        ?>
    </body>
</html>