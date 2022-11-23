<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "quanly_giangvien";
$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
die("<script>alert('Connection Failed.')</script>");
}
mysqli_set_charset($conn, 'utf8'); 



$sql = "SELECT * FROM `giangvien` INNER JOIN hocvi on giangvien.hocvan = hocvi.mahocvan
WHERE hocvi.mahocvan = 2 and (YEAR(ntns)) > 1990
";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    th {
        color: red;
    }
    </style>
</head>

<body>
    <?php
    ?>
    <h1 align="center">
        Thong tin hoc van
    </h1>
    <table align='center' width='100%' border='1' cellpadding='2' style="border-collapse: null;">
        <tr>

            <th>Ma GV</th>
            <th>ten gv</th>
            <th>ntns</th>
            <th>gioitinh</th>
            <th>sdt</th>
            <th>email</th>
            <th>khoa</th>
            <th>hoc van</th>
        </tr>
        <?php
            while ($rows = mysqli_fetch_array($result)) {
                echo "<tr style='background-color: pink;'>";
                for ($i = 0; $i < mysqli_num_fields($result); $i++) {

                    echo "<td>" . $rows[$i] . "</td>";
                }
                echo "</tr>";
            }
            ?>
    </table>
    <?php
    ?>
</body>

</html>