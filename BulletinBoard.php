<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
        <title>掲示板</title>
    </head>
    <body>
        <h1>掲示板<br></h1>
        <form method="post" action="BulletinBoard.php">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token, ENT_QUOTES, 'UTF-8');?>">
            名前：<input type="text" name="name" size="20"><br><br>
            <textarea type="text" name="message" cols="60" rows="3"></textarea><br>
            <input type="submit" name="add" value="投稿">
            <input type="reset" value="リセット">
        </form>


        <?php

            // session_start();
            // $token = uniqid('', true);
            // echo 'セッションID：'.$token.'<br>';
            // $_SESSION['token'] = $token;

            

            // $token = isset($_POST['token']) ? $_POST['token'] : '';
            // $session_token = isset($_SESSION['token']) ? $_SESSION['token'] : '';

            

            // if($_POST['token'] == $_SESSION['token']) {
            //     echo '成功<br>';
            //     echo 'POST：'.$token.'<br>';
            //     echo 'token :'.$_POST['token'].'<br>';
            //     echo 'session :'.$_SESSION['token'];
            // } else {
            //     echo '失敗<br>';
            //     echo 'POST：'.$token.'<br>';
            //     echo 'token :'.$_POST['token'].'<br>';
            //     echo 'session :'.$_SESSION['token'];
            // }
            
            // unset($_SESSION['token']);


            // POSTデータの受け取り無害化
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
            $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');


            

            
            // 未入力チェック
            if($name=='' or $message==''){
                echo '<span style="color: red;">※ 入力されていない項目があります。<br></span>';
            } else {
                $kaigyo = array("\r\n", "\r", "\n");
                $message = str_replace($kaigyo, '<br>', $message);
                date_default_timezone_set('Asia/Tokyo');
                $time = date('Y/m/d H:i:s');

                $fp = fopen('data01.txt', 'a');
                fwrite($fp, '<span style="font-weight: bold;">'.$name.'&emsp;</span>'.$time.'<br>'.$message."\n");
                fclose($fp);

            }


            $datalist = file('data01.txt');
            foreach($datalist as $value) {
                echo '<hr>'.$value;
            }


            
        ?>
    </body>
</html>
