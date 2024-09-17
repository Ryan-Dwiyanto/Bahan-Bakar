<?php
require 'function.php';
//membuat objek dari kelas sheell dengan mengirimkan data yang diinput oleh user
$Beli = new Beli($_SESSION['jumlah'], $_SESSION['jenis']);
$total = $Beli->getTotal();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @media print {
            form {
                display: none !important;
            }
        }
    </style>
</head>
<script>
</script>
<body>
    <div class="container d-non">
        <h1 class="text-center">Bahan Bakar</h1>
        <h1 class="text-center mb-5">Jaya Abadi</h1>
        <table class="table table-sm">
        <caption>Terimakasih Sudah Membeli</caption>
            <tr>
                <th scope="col">Description</th>
                <th scope="col">Qty</th>
                <th scope="col">Price</th>
                <th scope="col">Subtotal</th>
            </tr>
            <tr>
                <td><?php echo $Beli->getJenis() ?></td>
                <td><?php echo $Beli->getJumlah() ?> L</td>
                <td>Rp <?php echo number_format($Beli->getHargaDasar(), 0, ',', '.') ?></td>
                <td>Rp <?php echo number_format($total, 0, ',', '.') ?></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>Sub Total :</td>
                <td>Rp <?php echo number_format($total, 0, ',', '.') ?></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>Potongan :</td>
                <td>Rp 0</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>Total :</td>
                <td>Rp <?php echo number_format($total, 0, ',', '.') ?></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>Bayar :</td>
                <td>Rp <?php echo number_format($_SESSION['nominal'], 0, ',', '.') ?></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>Kembalian :</td>
                <td>Rp <?php echo number_format($_SESSION['Kembalian'], 0, ',', '.') ?></td>
            </tr>
        </table>
        <form action="" method="post">
        <button type="submit" value="kembali" name="kembali" class="btn btn-danger">Kembali</button>
        <button class="btn btn-primary" onclick="window.print()">Cetak</button>
        </form>
    </div>
    <?php
        if (isset($_POST["kembali"])) {
        session_destroy();
        header("Location: OOP.php");
        }
    ?>
</body>

</html>