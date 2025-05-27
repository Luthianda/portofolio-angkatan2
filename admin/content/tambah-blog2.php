<?php
include 'config/koneksi.php';

if($_SESSION['LEVEL'] != 1){
    // echo "<h1>Dibilang lu gak boleh masuk!!<h1>";
    // echo "<a href='dashboard.php' class='btn btn-warning'>Balik bang!</a>";
    // die;
    header("location:dashboard.php?failed=access");
}

// jika user/pengguna mencet tombol simpan
// ambil data dari inputan, email, nama dan password
// masukkan ke dalam table user (name, email, password) nilainya dari masing-masing inputan 


if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id_level = $_POST['id_levels'];
    $password = sha1($_POST['password']);

    $query = mysqli_query($config, "INSERT INTO users (name, email, password, id_levels)
    VALUES ('$name','$email','$password','$id_level')");
    if ($query) {
        header("location:?page=user&tambah=berhasil");
    }
}

$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($config, "SELECT * FROM users WHERE id='$id_user'");
$rowEdit  = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id_level = $_POST['id_levels'];
    $password = sha1($_POST['password']);

    if($password == ''){
        $queryUpdate = mysqli_query($config, "UPDATE users SET name='$name', email='$email', 
        password='$password', id_levels='$id_level' WHERE id='$id_user'");
    }
    $queryUpdate = mysqli_query($config, "UPDATE users SET name='$name', email='$email', 
    password='$password', id_levels='$id_level' WHERE id='$id_user'");
    if ($queryUpdate) {
        header("location:?page=user&ubah=berhasil");
    }
}

$queryLevels = mysqli_query($config, "SELECT * FROM levels ORDER BY id DESC");
$rowLevels = mysqli_fetch_all($queryLevels, MYSQLI_ASSOC);
?>

<form action="" method="post">
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Nama Level * </label>
        </div>
        <div class="col-sm-10">
            <select name="id_levels" id="" class="form-control">
            <option value="">Pilih Level</option>
            <!-- data option diambil dari table levels -->
             <?php $i = 1;
                foreach ($rowLevels as $level): ?>
                    <option <?php echo isset($_GET['edit']) ? ($level['id'] == $rowEdit['id_levels']) ? 'selected' : '' : '' ?>
                    value="<?php echo $level['id'] ?>"><?php echo $level['name_level'] ?></option>
                <?php endforeach ?>
             <!-- endoption -->

            <!-- radio untuk memilih salah satu saja, checkbox untuk memilih lebih dari satu -->
            <!-- <input type="checkbox"> -->
            </select>
        </div>
    </div>
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