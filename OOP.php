<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display: grid;
            justify-content: center;
        }
    </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container-center position-absolute top-50 start-50 translate-middle">
    <div class="container child-center rounded shadow p-5">
        <h1 class="text-center mb-2">Bahan Bakar</h1>
            <form method="post" action="">
                <div class="input-group mb-2">
                    <label class="input-group-text" for="jumlah">Masukkan Jumlah Liter </label>
                    <input class="form-control" type="number" name="jumlah" id="jumlah" required> 
                </div>
                <div class="input-group mb-2">
                    <label class="input-group-text" for="jenis">Pilih Tipe Bahan Bakar </label>
                    <select class="form-select" name="jenis" id="jenis">
                        <option value="0" hidden selected>Pilih Bahan Bakar</option>
                        <option value="S Super">Shell Super</option>
                        <option value="S V-Power">Shell V-Power</option>
                        <option value="S V-Power Diesel">Shell V-Power Diesel</option>
                        <option value="S V-Power Nitro">Shell V-Power Nitro</option>
                    </select>
                </div>
                <input type="submit" name="submit" value="Beli" class="btn btn-primary">
            </form>
            <?php
            session_start();
            if (isset($_POST['submit'])){
                $_SESSION['jumlah'] = $_POST['jumlah'];
                $_SESSION['jenis'] = $_POST['jenis'];
                if ($_SESSION['jenis'] == 0){
                    echo '<div class="alert alert-danger mt-3" role="alert">PILIH BAHAN BAKAR!</div>';
                } else {
                    header("location:Result.php");
                }
            }
            ?>
        </div>
        </div>
</body>
</html>