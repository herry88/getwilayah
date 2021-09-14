<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isi Form</title>
</head>

<body>
    <form action="kirimpost.php" method="post">
        <table border="1">
            <tr>
                <td>angka 1 </td>
                <td><input type="text" name="angka1"></td>
            </tr>
            <tr>
                <td>angka 2</td>
                <td><input type="text" name="angka2"></td>
            </tr>
            <tr>
                <td>Operator</td>
                <td>

                    <input type="radio" name="operator" value="+">+
                    <input type="radio" name="operator" value="-">-
                    <input type="radio" name="operator" value="/">/
                    <input type="radio" name="operator" value="*">*
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><button type="submit">Kirim Data</button></td>
            </tr>
        </table>
    </form>
</body>

</html>