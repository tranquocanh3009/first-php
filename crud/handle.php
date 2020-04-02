<?php
    require_once "pdo.php";
    if (isset($_POST['mssv']) && isset($_POST['hoten'])) {
        if ($_POST['mssv'] === '') {
            echo "<strong>MSSV khong duoc de trong</strong><br>";
        }
        else if ($_POST['hoten'] === '') {
            echo "<strong>Ho ten khong duoc de trong</strong><br>";
        }
        else {
            $stmt = $pdo->query("SELECT mssv FROM firstphp.myteam");
            $pk_unique = true;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($row['mssv'] === $_POST['mssv']) {
                    $pk_unique = false;
                    break;
                }
            }
            if (!$pk_unique) {
                echo "<strong>MSSV khong duoc trung</strong><br>";
            }
            else {
                $sql = "INSERT INTO firstphp.myteam (mssv, hoten) VALUES (:mssv, :hoten)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array(
                    ':mssv' => $_POST['mssv'],
                    ':hoten' => $_POST['hoten']            
                ));
                echo '<strong class="success"> Da them ' . $_POST['mssv'] . ' - ' . $_POST['hoten'] . ' thanh cong!</strong>';
            }
        }
        
    }
    if (isset($_POST['mssv_del']) && isset($_POST['hoten_del'])) {
        $sql = "DELETE FROM firstphp.myteam WHERE mssv=:mssv_del";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':mssv_del' => $_POST['mssv_del']
        ));
        echo '<strong class="success"> Da xoa ' . $_POST['mssv_del'] . ' - ' . $_POST['hoten_del'] . ' thanh cong!</strong>';
    }