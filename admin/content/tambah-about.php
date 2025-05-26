<?php
include "config/koneksi.php";

if(isset($_POST['simpan'])){
    $name = $_POST['name'];
    $position = $_POST['position'];
    //proses simpan foto
    $photo = $_FILES['photo']['name'];
    $content = $_POST['content'];
    $status = $_POST['status'];
    $tmp_name = $_FILES['photo']['tmp_name'];

    $fileName = uniqid() . "_" . basename($photo);
    $filePath = "uploads/" . $fileName;
    
    //mencari apakah didalam tabel profiles ada datanya, jika ada maka update, jika tidak maka insert
    //pakai mysqli_num_rows
    $queryProfile = mysqli_query($config, "SELECT * FROM abouts ORDER BY id DESC");
    if(mysqli_num_rows($queryProfile) > 0){
        $rowProfile = mysqli_fetch_assoc($queryProfile);
        $id = $rowProfile['id'];

        // jika user upload gambar
        if(!empty($photo)){

            unlink("admin/uploads/" . $rowProfile['photo']);
            move_uploaded_file($tmp_name, $filePath); 

            $update = mysqli_query($config, "UPDATE abouts SET name='$name', position='$position', photo='$fileName', content='$content', status='$status' WHERE id = '$id'");
            header("location:?page=tambah-about&ubah=berhasil");
        }else{
            //perintah update
            $update = mysqli_query($config, "UPDATE abouts SET name='$name', position='$position', photo='$fileName', content='$content', status='$status' WHERE id = '$id'");
            header("location:?page=tambah-about&ubah=berhasil");
        }

        
    }else{
        //perintah insert
        if(!empty($photo)){
            move_uploaded_file($tmp_name, $filePath);
            //jika user upload gambar
            $insertQ =  mysqli_query($config, "INSERT INTO abouts (name, position, content, status, photo) VALUES ('$name', '$position', '$content', '$status', '$fileName')");
            header("location:?page=tambah-about&tambah=berhasil");

        }else{
            //jika user tidak upload gambar
            $insertQ =  mysqli_query($config, "INSERT INTO abouts (name, position, content, status, photo) VALUES ('$name', '$position', '$content', '$status', '$fileName')");
            header("location:?page=tambah-about&tambah=berhasil");
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

if (isset($_GET['del'])){
    $idDel = $_GET['del'];

    $selectPhoto = mysqli_query($config, "SELECT photo FROM abouts WHERE id=$id");
    $rowphoto = mysqli_fetch_assoc($selectPhoto);
    if (isset($rowphoto['photo'])){
        unlink("uploads/".$row['photo']);
    }
    $delete = mysqli_query($config, "DELETE FROM abouts WHERE id=$id");
    if ($delete){
    }
}

$selectProfile = mysqli_query($config, "SELECT * FROM abouts");
$row = mysqli_fetch_assoc($selectProfile);
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
            <div>
             <label class="form-label mt-2">Description</label>
            <textarea id="summernote" value=""
            class="form-control" required name="content" cols="100" rows="5"><?php echo !isset($row['content']) ? '' : $row['content'] ?></textarea>
            </div>
        <div class="mb-3 row">
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