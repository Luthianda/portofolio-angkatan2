<?php
include 'config/koneksi.php';

// jika user/pengguna mencet tombol simpan
// ambil data dari inputan, email, nama dan password
// masukkan ke dalam table user (name, email, password) nilainya dari masing-masing inputan 


if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $photo = $_FILES['photo']['name'];
    $status = $_POST['status'];
    $size = $_FILES['photo']['size'];

    // ekstensi yanh boleh diupload hanya .png, jpg, jpeg
    $ekstensi = ['png','jpg','jpeg'];
    // apakah user mengupload gambar dengan ekst tsb, jika iya maukkan gambar ke table dan folder. jika tidak akan error, ekst tidak ditemukan
    $ext = pathinfo('photo', PATHINFO_EXTENSION);
    if(!in_array($ext, $ekstensi)){
        $error = "Maaf bang gak nemu filenya, coba periksa lagi dah";
    }else{
      $query = mysqli_query($config, "INSERT INTO abouts(name, position, photo, status) VALUES ('$name','$position','$photo','$status')");
        if ($query) {
            header("location:user.php?tambah=berhasil");  
        }
    }
}

$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($config, "SELECT * FROM users WHERE id='$id_user'");
$rowEdit  = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    $queryUpdate = mysqli_query($config, "UPDATE users SET name='$name', email='$email', 
    password='$password' WHERE id='$id_user'");
    if ($queryUpdate) {
        header("location:user.php?ubah=berhasil");
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Nama</label>
        </div>
        <div class="col-sm-10">
            <input required name="name" type="name" class="form-control" placeholder="Masukkan Nama Anda"  
            value="<?= isset($_GET['edit'])? $rowEdit['name'] : '' ?>">
        </div>
    </div>
        <div class="mb-3 row">
            <div class="col-sm-2">  
                <label for="">Jabatan</label>
            </div>
            <div class="col-sm-10">
                <input required name="position" type="text" class="form-control" placeholder="Masukkan Jabatan Anda" 
                value="<?= isset($_GET['edit'])? $rowEdit['position'] : '' ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-2">
                <label for="">Foto</label>
            </div>
        <div class="col-sm-10">
            <input required name="photo" type="file" class="form-control">
        </div>
        <div class="mb-3 row mt-3">
            <div class="col-sm-2">
                <label for="">Status</label>
            </div>
        <div class="col-sm-10">
            <input type="radio" name="status" value="1" checked>Publish
            <input type="radio" name="status" value="0" checked>Draft
        </div>
            <div class="mb-3 row">
                <div class="col-sm-12 mt-3">
                    <button name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>" type="submit" 
                            class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>