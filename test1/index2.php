<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "chuyenbay";
    $conn = mysqli_connect($hostname, $username, $password, $database);

    if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}
mysqli_set_charset($conn, 'utf8'); 

    if(isset($_POST['submit'])) {
        $tentp = $_POST['tentp'];
        $tentinh = $_POST['tentinh'];
        $quocgia = $_POST['quocgia'];
        if($tentp == "" || $tentinh == "" || $quocgia == "") {
            echo "vui lòng nhập đầy đủ thông tin";
        } else {
            $sql = "INSERT INTO `thanhpho`(`Tenthanhpho`, `Tentinh`, `Quocgia`) VALUES ('$tentp','$tentinh','$quocgia')";
            $result =  mysqli_query($conn,$sql);
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <table>
        <tr>
            <td>Tên thành phố</td>
            <td>
                <input type="text" name="tentp"  value="<?php if(isset($tentp)) echo $tentp; else echo ""; ?>" size="25">
            </td>
        </tr>

        <tr>
            <td>Tên tỉnh</td>
            <td>
                <input type="text" name="tentinh"  value="<?php if(isset($tentinh)) echo $tentinh; else echo ""; ?>" size="25">
            </td>
        </tr>

        <tr>
            <td>Quốc gia</td>
            <td>
            <select name="quocgia" style="width: 200px;">
                        <?php
                        $sql2 = "SELECT * FROM `quocgia`";
                        $res = mysqli_query($conn, $sql2);
                        if ($res == true) {
                            $count = mysqli_num_rows($res);
                            if ($count >= 1) {
                                while ($row = mysqli_fetch_array($res)) {
                                    $id = $row['Maquocgia'];
                                    $ten = $row['Tenquocgia'];
                                    echo "<option value='$id'>";
                                    echo $ten;
                                    echo "</option>";
                                }
                            }
                        }
                        ?>
                    </select>
            </td>
        </tr>

        <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Thêm" id="" size="25">
                    <button type="button" onclick="window.location.href='testthi2.php'">Sửa</button>
                    <input type="submit" name="submit" value="Xóa" id="" size="25">
                    <input type="submit" name="clear" value="Reset">

                    <button type="button" onclick="window.location.href='kqtest.php'">Xem Kết Quả</button>

                </td>
            </tr>
        </table>
        
    </form>
</body>
</html>