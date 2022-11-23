<?php
    if(isset($_POST['submit'])) {
        $sum = 0;
        $index = 0;
        $n = $_POST['son'];
        $arr = array();
        $arrcp = array();
        if(is_numeric($n) and ($n % 2 == 1) and ($n >= 1 || $n <= 19)) {
            for($i =  0; $i < $n ; $i++) {
                $arr[$i] = rand(-100, 100);
                }
                for($i = 2 ; $i < ($arr[$i]-1) ; $i++) {
                    if(($arr[$i] % $i == 0)) {
                        echo "";
                    } else if ($arr[$i] > 1 || $arr[$i] < 100) {
                        $sum += $arr[$i];
                        $arrcp[$index] = $arr[$i];
                        $index += 1;
                    }
                        
                }
            $kq = "Mang cac phan tu : ". implode( ' |' , $arr);
            $kq .= (!empty($arrcp)) ? "\nMang cac so nguyen to " . implode('|', $arrcp) . "\nTong so nguyen to $sum" : "\nKhong co so nguyen to";
        } else $kq = "Nhap lai";
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
    <table align="center" style="background-color:pink ;">
            <tr>
                <td colspan="2">
                    <h1 style="color: red;">Phát sinh mảng và tính toán</h1>
                </td>
            </tr>

            <tr>
                <td>
                    Nhập n:
                </td>
                <td>
                    <input type="text" name="son" size="30" value="<?php if(isset($n)) echo $n; else echo "" ?>">
                </td>
            </tr>

            
            <tr>
                <td>
                    Kết quả:
                </td>
                <td>
                    <textarea rows="4" cols="50" readonly name="ketqua"><?php if(isset($kq)) echo $kq; else echo "" ?>
                    </textarea>
                </td>
            </tr>

            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="Phát sinh mảng và tính toán">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>