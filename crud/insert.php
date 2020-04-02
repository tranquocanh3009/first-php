<!DOCTYPE html>
<html>
<head>
    <style>
        strong {
            color: red;
        }
        strong.success {
            color: green;
        }
        form {
            margin-block-end: 0;
        }
        input.del {
            display: none;
        }
    </style>
</head>
<body>
    <table border="1">
        <tr><th>MSSV</th><th>Họ tên</th></tr>
        <?php
            require_once "handle.php";
            $stmt = $pdo->query("SELECT mssv, hoten FROM firstphp.myteam ORDER BY mssv;");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>" . $row['mssv'] . "</td><td>" . $row['hoten'] . "</td>";
                echo '<td><form method="POST">
                        <input class="del" name="mssv_del" value=' . $row["mssv"] . '>
                        <input class="del" name="hoten_del" value=' . $row["hoten"] . '>
                        <input value="Xoa" type="submit">
                      </form></td></tr>';
            }
        ?>
    </table>

    <form method="POST">
        <label>MSSV: <input name="mssv"></label>
        <label>Họ tên: <input name="hoten"></label>
        <input type="submit">
    </form>
</body>
</html>
