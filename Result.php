<?php
require 'function.php';
//membuat objek dari kelas sheell dengan mengirimkan data yang diinput oleh user
$Beli = new Beli($_SESSION['jumlah'], $_SESSION['jenis']);
$total = $Beli->getTotal();
if (isset($_POST["kembali"])) {
    session_destroy();
    header('Location:OOP.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container-center position-absolute top-50 start-50 translate-middle">
        <div class="container child-center rounded shadow p-5">
            <h1 class="text-center mb-2">Rincian Belanjaan</h1>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex mb-1">
                        <div class="p-2">Tipe Bahan Bakar</div>
                        <div class="p-2">:</div>
                        <div class="ms-auto p-2"><?php echo $Beli->getJenis() ?></div>
                    </div>
                    <div class="d-flex mb-1">
                        <div class="p-2">Harga Bahan Bakar</div>
                        <div class="p-2">:</div>
                        <div class="ms-auto p-2">Rp <?php echo number_format($Beli->getHargaJenis(), 0, ',', '.') ?></div>
                    </div>
                    <div class="d-flex mb-1">
                        <div class="p-2">Jumlah Bahan Bakar</div>
                        <div class="p-2">:</div>
                        <div class="ms-auto p-2"><?php echo $Beli->getJumlah() ?> L</div>
                    </div>
                    <div class="d-flex mb-1">
                        <div class="p-2">Harga Dasar</div>
                        <div class="p-2">:</div>
                        <div class="ms-auto p-2">Rp <?php echo number_format($Beli->getHargaDasar(), 0, ',', '.') ?></div>
                    </div>
                    <div class="d-flex mb-1">
                        <div class="p-2">PPN (10%)</div>
                        <div class="p-2">:</div>
                        <div class="ms-auto p-2">Rp <?php echo number_format($Beli->getPPN(), 0, ',', '.') ?></div>
                    </div>
                    <div class="d-flex mb-1">
                        <div class="p-2">Harga Dasar</div>
                        <div class="p-2">:</div>
                        <div class="ms-auto p-2">Rp <?php echo number_format($total, 0, ',', '.') ?></div>
                    </div>
                </div>
            </div>
            <form class="mt-2" action="" method="post">
                <div class="input-group mb-2">
                    <label class="input-group-text" for="nominal">Nominal Uang Pembayaran </label>
                    <input class="form-control" type="number" name="nominal" id="nominal" placeholder="Masukkan" required> 
                </div>
                <?php 
                    if (isset($_POST["bayar"])) {
                        if ($_POST["nominal"] >= $total){
                            $_SESSION['nominal'] = $_POST["nominal"];
                            $_SESSION['Kembalian'] = $_POST["nominal"] - $total;
                            header('Location:hasil.php');
                        } else {
                            echo '<div class="alert alert-danger mt-3" role="alert">Uang Kamu Kurang!</div>';
                        }
                        
                    }
                ?>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-danger" name="kembali">Kembali</button>
                    <button type="submit" class="btn btn-primary" name="bayar">Bayar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>