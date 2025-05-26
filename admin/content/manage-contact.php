<?php
include "config/koneksi.php";

if(isset($_POST['simpan'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $fileName = uniqid() . "_" . basename($photo);
    $filePath = "uploads/" . $fileName;
    
    //mencari apakah didalam tabel profiles ada datanya, jika ada maka update, jika tidak maka insert
    //pakai mysqli_num_rows
    $queryProfile = mysqli_query($config, "SELECT * FROM contacts ORDER BY id DESC");
    if(mysqli_num_rows($queryProfile) > 0){
        $rowProfile = mysqli_fetch_assoc($queryProfile);
        $id = $rowProfile['id'];
    }
}

        // jika user upload gambar
        if(!empty($photo)){

            $update = mysqli_query($config, "UPDATE contacts SET name='$name', email='$email', message='$message' WHERE id = '$id'");
            header("location:?page=tambah-about&ubah=berhasil");
        }else{
            //perintah update
            $update = mysqli_query($config, "UPDATE contacts SET name='$name', email='$email', message='$message' WHERE id = '$id'");
            header("location:?page=tambah-about&ubah=berhasil");
        }

        
    }else{
        //perintah insert
        if(!empty($photo)){
            move_uploaded_file($tmp_name, $filePath);
            //jika user upload gambar
            $insertQ =  mysqli_query($config, "INSERT INTO abouts (name, email, message) VALUES ('$name', '$email', '$message'')");
            header("location:?page=tambah-about&tambah=berhasil");

    // if ($photo['error'] == 0){
    //     $fileName = uniqid() . "_" . basename($photo['name']);
    //     $filePath = "uploads/" . $fileName;
    //     move_uploaded_file($photo['tmp_name'], $filePath);
    //     $insertQ =  mysqli_query($config, "INSERT INTO `profiles`(`profile_name`, `profession`, `description`, `photo`) VALUES ('$profile_name','$profession',  '$description','$fileName')");
    // }
    
    // if($insertQ){
    //     header("location:dashboard.php?level=" . base64_encode($_SESSION['LEVEL']) . "&page=manage-profile");
    // }
// }

// if (isset($_GET['del'])){
//     $idDel = $_GET['del'];

//     $selectPhoto = mysqli_query($config, "SELECT photo FROM abouts WHERE id=$id");
//     $rowphoto = mysqli_fetch_assoc($selectPhoto);
//     if (isset($rowphoto['photo'])){
//         unlink("uploads/".$row['photo']);
//     }
//     $delete = mysqli_query($config, "DELETE FROM abouts WHERE id=$id");
//     if ($delete){
//     }
// }

$selectContact = mysqli_query($config, "SELECT * FROM contacts");
$row = mysqli_fetch_assoc($selectContact);
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
                <label for="">Email</label>
            </div>
            <div class="col-sm-10">
                <input required name="position" type="text" class="form-control" placeholder="Masukkan email Anda" 
                value="<?= isset($_GET['edit'])? $rowEdit['email'] : '' ?>">
            </div>
            <div>
             <label class="form-label mt-2">Message</label>
            <textarea id="summernote" value=""
            class="form-control" required name="content" cols="100" rows="5"><?php echo !isset($row['message']) ? '' : $row['message'] ?></textarea>
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