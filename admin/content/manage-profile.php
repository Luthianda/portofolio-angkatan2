<?php
include "config/koneksi.php";

if(isset($_POST['simpan'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    //proses simpan foto
    $photo = $_FILES['photo']['name'];
    
    //mencari apakah didalam tabel profiles ada datanya, jika ada maka update, jika tidak maka insert
    //pakai mysqli_num_rows
    $queryProfile = mysqli_query($config, "SELECT * FROM profiles ORDER BY id DESC");
    if(mysqli_num_rows($queryProfile) > 0){
        $rowProfile = mysqli_fetch_assoc($queryProfile);
        $id = $rowProfile['id'];
        //perintah update
        $update = mysqli_query($config, "UPDATE profiles SET profile_name='$profile_name', description='$description' WHERE id = '$id'");
        header("location:?page=manage-profile&ubah=berhasil");
    }else{
        //perintah insert
        if(!empty($photo)){
            //jika user upload gambar
        }else{
            //jika user tidak upload gambar
            $insertQ =  mysqli_query($config, "INSERT INTO profiles (profile_name, description) VALUES ('$profile_name', '$description')");
            header("location:?page=manage-profile&tambah=berhasil");
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

    $selectPhoto = mysqli_query($config, "SELECT photo FROM profiles WHERE id=$idDel");
    $rowphoto = mysqli_fetch_assoc($selectPhoto);
    if (isset($rowphoto['photo'])){
        unlink("uploads/".$row['photo']);
    }

    
    $delete = mysqli_query($config, "DELETE FROM profiles WHERE id=$idDel");
    if ($delete){
        
    }
}

$selectProfile = mysqli_query($config, "SELECT * FROM profiles");
$row = mysqli_fetch_assoc($selectProfile);
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="m-2" style="width:55%"> 
            <label class="form-label mt-2">Judul 
            </label>
            <input type="text" value="<?php echo !isset($row['profile_name']) ? '' : $row['profile_name'] ?>"
            class="form-control" name="profile_name">
        
            <label class="form-label mt-2">Description</label>
            <textarea value=""
            class="form-control" name="description" cols="100" rows="5"><?php echo !isset($row['description']) ? '' : $row['description'] ?></textarea>

            <label class="form-label mt-2">Photo</label>
            <input type="file" class="form-control" name="photo">
            <img src="uploads/<?php echo $row['photo'] ?>" width="150" alt="">
            <button type="submit" name="simpan" class="btn btn-primary mt-2">Simpan</button>
    
        <br>
      
    </div>
</form>