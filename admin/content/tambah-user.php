<?php
include 'config/koneksi.php';

// jika user/pengguna mencet tombol simpan
// ambil data dari inputan, email, nama dan password
// masukkan ke dalam table user (name, email, password) nilainya dari masing-masing inputan 


if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    $query = mysqli_query($config, "INSERT INTO users (name, email, password)
     VALUES ('$name','$email','$password')");
    if ($query) {
        header("location:user.php?tambah=berhasil");
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

<form action="" method="post">
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Nama * </label>
        </div>
        <div class="col-sm-10">
            <input required name="name" type="text" class="form-control" placeholder="Masukkan Nama Anda"  
            value="<?= isset($rowEdit['name'])? $rowEdit['name'] : '' ?>">
        </div>
    </div>
        <div class="mb-3 row">
            <div class="col-sm-2">
                <label for="">Email * </label>
            </div>
            <div class="col-sm-10">
                <input required name="email" type="email" class="form-control" placeholder="Masukkan Email Anda" 
                value="<?= isset($rowEdit['email'])? $rowEdit['email'] : ''  ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-2">
                <label for="">Password * </label>
            </div>
        <div class="col-sm-10">
            <input type="password" class="form-control" placeholder="Masukkan Password Anda">
                <div class="mb-3 row">
                    <div class="col-sm-12 mt-3">
                        <button name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>" type="submit" 
                                            class="btn btn-primary">Simpan</button>
                    </div>
                </div>
        </div>
    </div>
</form>