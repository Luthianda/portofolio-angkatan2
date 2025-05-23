<?php
include "config/koneksi.php";

if(isset($_POST['simpan'])){
    $profile_name = $_POST['profile_name'];
    $profession = $_POST['profession'];
    $description = $_POST['description'];
    $photo = $_FILES['photo'];
    // var_dump();
    if ($photo['error'] == 0){
        $fileName = uniqid() . "_" . basename($photo['name']);
        $filePath = "uploads/" . $fileName;
        move_uploaded_file($photo['tmp_name'], $filePath);
        $insertQ =  mysqli_query($config, "INSERT INTO `profiles`(`profile_name`, `profession`, `description`, `photo`) VALUES ('$profile_name','$profession',  '$description','$fileName')");
    }
    
    if($insertQ){
        header("location:dashboard.php?level=" . base64_encode($_SESSION['LEVEL']) . "&page=manage-profile");
    }
}

$selectProfile = mysqli_query($config, "SELECT * FROM profiles");
$row = mysqli_fetch_assoc($selectProfile);

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
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="m-2" style="width:55%">
        <label class="form-label mt-2">Profile Name</label>
        <br>
        <input type="text" value="<?php echo !isset($row['profile_name']) ? '' : $row['profile_name'] ?>"
        class="form-control" name="profile_name">
        <br>
        <label class="form-label mt2">Profession</label>
        <br>
        <input type="text" value="<?php echo !isset($row['profession']) ? '' : $row['profession'] ?>"
        class="form-control" name="profession">
        <br>
        <label class="form-label mt-2">Description</label>
        <br>
        <textarea value=""
        class="form-control" name="description" cols="100" rows="5"><?php echo !isset($row['description']) ? '' : $row['description'] ?></textarea>
        <br>
        <label class="form-label mt-2">Photo</label>
        <input type="file" class="form-control" name="photo">
        <img src="uploads/<?php echo $row['photo'] ?>" width="150" alt="">
        <?php if(empty($row['profile_name'])){
            ?>
            <button type="submit" name="simpan" class="btn btn-primary mt-2">Simpan</button>
        <?php
        }else{
        ?>
            <a onclick="return confirm('YQin pen apus nich??')" href="?level=<?php echo base64_encode($_SESSION['LEVEL'])?> & page=manage-profile&del=<?php echo $row['id']?>" class="btn btn-danger mt-2">Hapus</a>
        <?php
        }
        ?>
    
        <br>
        
    </div>
</form>