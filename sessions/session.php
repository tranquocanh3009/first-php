<?php
    session_start();
    if (!isset($_SESSION['sessionCount'])) {
        echo "<p>Session is empty</p>";
        $_SESSION['sessionCount'] = 0;
    }
    else if ($_SESSION['sessionCount'] < 3) {
        $_SESSION['sessionCount'] += 1;
        echo "<p>Add one...</p>";
    }
    else {
        session_destroy();
        session_start();
        echo "<p>Session Restarted</p>";
    }
?>
<p><a href="session">Click Me!</a></p>
<p>Our Session ID is: <?php echo(session_id()); ?></p>
<pre><?php print_r($_SESSION); ?></pre>