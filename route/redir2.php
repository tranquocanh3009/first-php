<?php
    session_start();
    if (isset($_POST['where'])) {
        if ($_POST['where'] === '1') {
            header('Location: redir1.php');
            return;
        } else if ($_POST['where'] === '2') {
            header('Location: redir2.php?parm=123');
            return;
        } else {
            header('Location: http://www.dr-chuck.com');
            return;
        }
    }
?>
<html>
<body>
    <p>I am Router Two...</p>
    <form method="post">
        <div>
            <label><input name="where"></label>
        <div>
        <input type="submit">
    </form>
</body>
</html>