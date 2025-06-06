<?php
include "config/koneksi.php";

if(isset($_POST['simpan'])){
    $title = $_POST['title'];
    //proses simpan foto
    $photo = $_FILES['photo']['name'];
    $status = $_POST['status'];
    $tmp_name = $_FILES['photo']['tmp_name'];

    $fileName = uniqid() . "_" . basename($photo);
    $filePath = "uploads/" . $fileName;
    
    //mencari apakah didalam tabel profiles ada datanya, jika ada maka update, jika tidak maka insert
    //pakai mysqli_num_rows
    $queryPorto = mysqli_query($config, "SELECT * FROM portos ORDER BY id DESC");
    if(mysqli_num_rows($queryPorto) > 0){
        $rowPorto = mysqli_fetch_assoc($queryPorto);
        $id = $rowPorto['id'];

    //     // jika user upload gambar
    //     if(!empty($photo)){

    //         unlink("admin/uploads/" . $rowProfile['photo']);
    //         move_uploaded_file($tmp_name, $filePath); 

    //         $update = mysqli_query($config, "UPDATE blogs SET title='$title', description='$description', photo='$fileName', status='$status'");
    //         header("location:?page=tambah-blog&ubah=berhasil");
    //     }else{
    //         //perintah update
    //         $update = mysqli_query($config, "UPDATE blogs SET title='$title', description='$description', photo='$fileName', status='$status'");
    //         header("location:?page=tambah-blog&ubah=berhasil");
    //     }

        
    // }else{
    //     //perintah insert
        if(!empty($photo)){
            move_uploaded_file($tmp_name, $filePath);
            //jika user upload gambar
            $insertQ =  mysqli_query($config, "INSERT INTO portos (title, photo, status) VALUES ('$title', '$fileName', '$status')");
            header("location:?page=porto&tambah=berhasil");

        }else{
            //jika user tidak upload gambar
            $insertQ =  mysqli_query($config, "INSERT INTO portos (title, photo, status) VALUES  ('$title', '$fileName', '$status')");
            header("location:?page=tambah-porto&tambah=failed");
        }
    }
    // if ($photo['error'] == 0){
    //     $fileName = uniqid() . "_" . basename($photo['name']);
    //     $filePath = "uploads/" . $fileName;
    //     move_uploaded_file($photo['tmp_name'], $filePath);
    //     $insertQ =  mysqli_query($config, "INSERT INTO `profiles`(`profile_name`, `profession`, `description`, `photo`) VALUES ('$profile_name','$profession',  '$description','$fileName')");
    // }
    
    // if($insertQ){
    //     header("location:dashboard.php?level=" . base64_encode($_SESSION['LEVEL']) . "&page=manage-profile");
    // }
}

$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($config, "SELECT * FROM portos WHERE id='$id_user'");
$rowEdit  = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
        $title = $_POST['title'];
        $photo = $_FILES['photo']['name'];
        $status = $_POST['status'];

    if(!empty($title)){
        $queryUpdate = mysqli_query($config, "UPDATE portos SET title='$title', photo='$fileName', status='$status'");
        header("location:?page=porto&ubah=berhasil");
    }else{
        $queryUpdate = mysqli_query($config, "UPDATE portos SET title='$title', photo='$fileName', status='$status'");
        header("location:?page=tambah-porto&ubah=failed");
    }
}

if (isset($_GET['del'])){
    $idDel = $_GET['del'];

    $selectPhoto = mysqli_query($config, "SELECT photo FROM portos WHERE id=$id");
    $rowphoto = mysqli_fetch_assoc($selectPhoto);
    if (isset($rowphoto['photo'])){
        unlink("uploads/".$row['photo']);
    }
    $delete = mysqli_query($config, "DELETE FROM portos WHERE id=$id");
    if ($delete){
    }
}

$selectPorto = mysqli_query($config, "SELECT * FROM portos");
$row = mysqli_fetch_assoc($selectPorto);
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Judul</label>
        </div>
        <div class="col-sm-10">
            <input required name="title" type="text" class="form-control" placeholder="Masukkan Judul Portofolio"  
            value="<?= isset($_GET['edit'])? $rowEdit['title'] : '' ?>">
        </div>
    </div>
        <div class="mb-3 row mt-3">
            <div class="col-sm-2">
                <label for="">Foto</label>
            </div>
        <div class="col-sm-10">
            <input src="admin/uploads/" <?php echo !isset($row['photo']) ? '' : $row['photo'] ?> required name="photo" type="file" class="form-control">
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