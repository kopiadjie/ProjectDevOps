<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">



<body>
    <div class="container col-md-6 mt-4">
        <h1>Beri Kabar</h1>
        <div class="card">
            <div class="card-header text-white" style="background-color: dimgray;">
            <div class="card-body">
                <table class="table table-bordered">

                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                                Beranda
                            </div>
                            <div class="col">
                                <a style="color: black" href="index.php">Kabar</a>
                            </div>
                            <div class="col">
                                <a style="color: black" href="tambah.php">Berkabar</a>
                            </div>
                            <div class="col">
                                Bantuan
                            </div>
                        </div>
                        <!-- <div class="row">
                                <div class="col">Judul</div>
                                <div class="col-4">Judul 2</div>
                                <div class="col-4">Judul 2</div> -->
                    </div>
                </table>
            </div>
            </div>

            <div class="card-body">
                <form action="" method="post" role="form">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" required="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Kategori Kabar</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Fakta
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori" id="flexRadioDefault2"
                                checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Opini
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Judul Kabar</label>
                        <input type="text" name="judul" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Kabar</label>
                        <textarea class="form-control" name="isi"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>
                </form>

                <?php
                include('koneksi.php');

                //melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
                if (isset($_POST['submit'])) {
                    //menampung data dari inputan
                    // $id = $_POST['id'];
                    $nama = $_POST['nama'];
                    $kategori = $_POST['kategori'];
                    $judul = $_POST['judul'];
                    $isi = $_POST['isi'];

                    //query untuk menambahkan barang ke database, pastikan urutan nya sama dengan di database
                    $datas = mysqli_query($koneksi, "insert into topik (nama,kategori,judul,isi)values('$nama', '$kategori', '$judul', '$isi')") or die(mysqli_error($koneksi));
                    //id barang tidak dimasukkan, karena sudah menggunakan AUTO_INCREMENT, id akan otomatis
                
                    //ini untuk menampilkan alert berhasil dan redirect ke halaman index
                    echo "<script>alert('data berhasil disimpan.');window.location='index.php';</script>";
                }
                ?>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>

</html>