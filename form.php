<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Belanja</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Form Belanja</h2>
        <form action="" method="POST" id="belanjaForm">
            <label for="nama">Nama Pelanggan:</label>
            <input type="text" name="nama" id="nama" placeholder="Nama Pelanggan"><br>

            <label for="produk">Produk:</label>
            <select name="produk" id="produk" onchange="setHarga()">
                <option value="TV">TV</option>
                <option value="KULKAS">KULKAS</option>
                <option value="MESIN CUCI">MESIN CUCI</option>
                <option value="AC">AC</option>
            </select><br>

            <label for="jumlah_beli">Jumlah Beli:</label>
            <input type="number" name="jumlah_beli" id="jumlah_beli" min="1"><br>

            <input type="submit" name="submit" value="Hitung Total">
            <?php
                if (isset($_POST['submit'])) {
                    $nama = $_POST['nama'];
                    $produk = $_POST['produk'];
                    $jumlah_beli = $_POST['jumlah_beli'];

                    $harga_satuan = 0;
                    switch($produk) {
                        case "TV":
                            $harga_satuan = 1250000;
                            break;
                        case "KULKAS":
                            $harga_satuan = 2000000;
                            break;
                        case "MESIN CUCI":
                            $harga_satuan = 3000000;
                            break;
                        case "AC":
                            $harga_satuan = 4000000;
                            break;
                    }

                    $total_belanja = $jumlah_beli * $harga_satuan;
                    $diskon = 0.2 * $total_belanja;
                    $ppn = 0.1 * ($total_belanja - $diskon);
                    $harga_bersih = ($total_belanja - $diskon) + $ppn;

                    echo "<h3>Detail Pembelian:</h3>";
                    echo "Nama Pelanggan: " . $nama . "<br>";
                    echo "Produk: " . $produk . "<br>";
                    echo "Jumlah Beli: " . $jumlah_beli . "<br>";
                    echo "Harga Satuan: " . $harga_satuan . "<br>";
                    echo "Total Belanja: " . $total_belanja . "<br>";
                    echo "Diskon (10%): " . $diskon . "<br>";
                    echo "PPN (10%): " . $ppn . "<br>";
                    echo "Harga Bersih: " . $harga_bersih . "<br>";
                }
            ?>
        </form>
    </div>
    <script>
    function setHarga() {
        var select = document.getElementById("produk");
        var hargaSatuanInput = document.getElementById("harga_satuan");

        switch (select.value) {
            case "TV":
                hargaSatuanInput.value = 1250000;
                break;
            case "KULKAS":
                hargaSatuanInput.value = 2000000;
                break;
            case "MESIN CUCI":
                hargaSatuanInput.value = 3000000;
                break;
            case "AC":
                hargaSatuanInput.value = 4000000;
                break;
            default:
                hargaSatuanInput.value = 0;
        }
    }
    </script>
</body>

</html>