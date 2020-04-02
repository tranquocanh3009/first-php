<?php
    session_start();
    if (isset($_POST['guess'])) {
        $guess = $_POST['guess'] + 0;
        if ($guess === 42) {
            $_SESSION['message'] = 'Exactly!';
        } else if ($guess < 42) {
            $_SESSION['message'] = 'Too low';
        } else {
            $_SESSION['message'] = 'Too high';
        }
        header('Location: postget.php');
        return;
    }
?>
<html>
<body>
<p>Guessing game...</p>
<?php
    $guess = isset($_SESSION['guess']) ? $_SESSION['guess'] : '';
    $message = isset($_SESSION['message']) ? $_SESSION['message'] : false;
    if ($message) {
        echo "<p>$message</p>";
    }
?>
<form method="post">
    <div>
        <label><input name="guess"><label>
    </div>
    <input type="submit">
</form>

</body>
</html>
