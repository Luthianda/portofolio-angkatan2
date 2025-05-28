<?php
include "config/koneksi.php";

if(isset($_POST['simpan'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    //proses simpan foto
    $photo = $_FILES['photo']['name'];
    $status = $_POST['status'];
    $tmp_name = $_FILES['photo']['tmp_name'];

    $fileName = uniqid() . "_" . basename($photo);
    $filePath = "uploads/" . $fileName;
    
    //mencari apakah didalam tabel profiles ada datanya, jika ada maka update, jika tidak maka insert
    //pakai mysqli_num_rows
    $queryProfile = mysqli_query($config, "SELECT * FROM blogs ORDER BY id DESC");
    if(mysqli_num_rows($queryProfile) > 0){
        $rowProfile = mysqli_fetch_assoc($queryProfile);
        $id = $rowProfile['id'];

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
            $insertQ =  mysqli_query($config, "INSERT INTO blogs (title, description, photo, status) VALUES ('$title', '$description', '$fileName', '$status')");
            header("location:?page=blog&tambah=berhasil");

        }else{
            //jika user tidak upload gambar
            $insertQ =  mysqli_query($config, "INSERT INTO blogs (title, description, photo, status) VALUES  ('$title', '$description', '$fileName', '$status')");
            header("location:?page=tambah-blog&tambah=failed");
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
$queryEdit = mysqli_query($config, "SELECT * FROM blogs WHERE id='$id_user'");
$rowEdit  = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $photo = $_FILES['photo']['name'];
        $status = $_POST['status'];

    if(!empty($skill)){
        $queryUpdate = mysqli_query($config, "UPDATE services SET title='$title', description='$description', photo='$fileName', status='$status'");
        header("location:?page=blog&ubah=berhasil");
    }else{
        $queryUpdate = mysqli_query($config, "UPDATE services SET title='$title', description='$description', photo='$fileName', status='$status'");
        header("location:?page=tambah-blog&ubah=failed");
    }
}

if (isset($_GET['del'])){
    $idDel = $_GET['del'];

    $selectPhoto = mysqli_query($config, "SELECT photo FROM blogs WHERE id=$id");
    $rowphoto = mysqli_fetch_assoc($selectPhoto);
    if (isset($rowphoto['photo'])){
        unlink("uploads/".$row['photo']);
    }
    $delete = mysqli_query($config, "DELETE FROM blogs WHERE id=$id");
    if ($delete){
    }
}

$selectBlog = mysqli_query($config, "SELECT * FROM blogs");
$row = mysqli_fetch_assoc($selectBlog);
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Judul</label>
        </div>
        <div class="col-sm-10">
            <input required name="title" type="text" class="form-control" placeholder="Masukkan Judul Blog"  
            value="<?= isset($_GET['edit'])? $rowEdit['title'] : '' ?>">
        </div>
    </div>
        <div class="mb-3 row">
            <!-- <div class="col-sm-2">  
                <label for="">Deskripsi</label>
            </div> -->
            <!-- <div class="col-sm-10">
                <input required name="description" type="text" class="form-control" placeholder="Masukkan Deskripsi skill" 
                value="<?= isset($_GET['edit'])? $rowEdit['description'] : '' ?>">
            </div> -->
            <div>
             <label class="form-label mt-2">Deskripsi</label>
            <textarea id="summernote" value=""
            class="form-control" required name="description" cols="100" rows="5"><?php echo !isset($row['description']) ? '' : $row['description'] ?></textarea>
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