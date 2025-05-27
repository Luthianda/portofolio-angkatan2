<?php
include "config/koneksi.php";

if(isset($_POST['simpan'])){
    $skill = $_POST['skill'];
    $description = $_POST['description'];
    //proses simpan foto
    $photo = $_FILES['photo']['name'];
    $status = $_POST['status'];
    $tmp_name = $_FILES['photo']['tmp_name'];

    $fileName = uniqid() . "_" . basename($photo);
    $filePath = "uploads/" . $fileName;
    
    //mencari apakah didalam tabel profiles ada datanya, jika ada maka update, jika tidak maka insert
    //pakai mysqli_num_rows
    $queryService = mysqli_query($config, "SELECT * FROM services ORDER BY id DESC");
    if(mysqli_num_rows($queryService) > 0){
        $rowService = mysqli_fetch_assoc($queryService);
        $id = $rowService['id'];
    }

    //     // jika user upload gambar
    //     if(!empty($photo)){

    //         unlink("admin/uploads/" . $rowService['photo']);
    //         move_uploaded_file($tmp_name, $filePath); 

    //         $update = mysqli_query($config, "UPDATE services SET skill='$skill', description='$description', photo='$fileName', status='$status'");
    //         header("location:?page=tambah-service&ubah=berhasil");
    //     }else{
    //         //perintah update
    //         $update = mysqli_query($config, "UPDATE services SET skill='$skill', description='$description', photo='$fileName', status='$status'");
    //         header("location:?page=tambah-service&ubah=berhasil");
    //     }
    // }else{
        //perintah insert
        if(!empty($photo)){
            move_uploaded_file($tmp_name, $filePath);
            //jika user upload gambar
            $insertQ =  mysqli_query($config, "INSERT INTO services (skill, description, photo, status) VALUES ('$skill', '$description', '$fileName', '$status')");
            header("location:?page=service&tambah=berhasil");

        }else{
            //jika user tidak upload gambar
            $insertQ =  mysqli_query($config, "INSERT INTO services (skill, description, photo, status) VALUES  ('$skill', '$description', '$fileName', '$status')");
            header("location:?page=tambah-service&tambah=berhasil");
        }
    }

$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($config, "SELECT * FROM services WHERE id='$id_user'");
$rowEdit  = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
        $skill = $_POST['skill'];
        $description = $_POST['description'];
        $photo = $_FILES['photo']['name'];
        $status = $_POST['status'];

    if(!empty($skill)){
        $queryUpdate = mysqli_query($config, "UPDATE services SET skill='$skill', description='$description', photo='$fileName', status='$status'");
        header("location:?page=service&ubah=berhasil");
    }else{
        $queryUpdate = mysqli_query($config, "UPDATE services SET skill='$skill', description='$description', photo='$fileName', status='$status'");
        header("location:?page=tambah-service&ubah=failed");
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

    $selectPhoto = mysqli_query($config, "SELECT photo FROM services WHERE id=$id");
    $rowphoto = mysqli_fetch_assoc($selectPhoto);
    if (isset($rowphoto['photo'])){
        unlink("uploads/".$row['photo']);
    }
    $delete = mysqli_query($config, "DELETE FROM services WHERE id=$id");
    if ($delete){
    }
}

$selectService = mysqli_query($config, "SELECT * FROM services");
$row = mysqli_fetch_assoc($selectService);
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Skill</label>
        </div>
        <div class="col-sm-10">
            <input required name="skill" type="text" class="form-control" placeholder="Masukkan skill Anda"  
            value="<?= isset($_GET['edit'])? $rowEdit['skill'] : '' ?>">
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