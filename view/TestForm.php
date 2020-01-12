<?php
require_once '../session/Session.php';
$session = new Session();
$session->deleteFlash();
?>

<html>
    <body>
        <h1>フォームテスト</h1>
        <form method="post" action="../route/index.php">
            <p><input type="text" name="text"></p>
            <?php
                if (! empty($_SESSION['flash']['validate']['text'])) {
                    echo $_SESSION['flash']['validate']['text'];
                }
            ?>
            <p><input type="number" name="number"></p>
            <?php
                if (! empty($_SESSION['flash']['validate']['number'])) {
                    echo $_SESSION['flash']['validate']['number'];
                }
            ?>
            <p><input type="submit" value="送信"></p>
        </form>
    </body>
</html>
