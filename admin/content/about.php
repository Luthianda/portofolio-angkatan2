<?php
include 'config/koneksi.php';

if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $photo = $_FILES['photo']['name'];
    $content = $_POST['content'];
    $status = $_POST['status'];

    // ekstensi yang boleh diupload hanya .png, jpg, jpeg
    $ekstensi = ['png','jpg','jpeg'];

$queryAbout = mysqli_query($config, "SELECT * FROM abouts ORDER BY id DESC");
    if (mysqli_num_rows($queryAbout) > 0){
        $rowProfile = mysqli_fetch_assoc($queryAbout);
        $id = $rowProfile['id'];    
        $updateQ = mysqli_query($config, "UPDATE abouts SET name='$name', position='$position', content='$content', status='$status'");
        header("location:?page=about&edit=berhasil");
    }else{
        if(!empty($photo)){
            $fileName = uniqid() . "_" . basename($photo);
        }else{
        $insertQ = mysqli_query($config, "INSERT INTO abouts (name, position, content, status) VALUES ('$name','$position','$content','$status'");
        header("location:?page=about&tambah=berhasil");
        }
    }   

}

// $row = mysqli_fetch_all($query, MYSQLI_ASSOC);

// if (isset($_GET['delete'])) {
//     $id = $_GET['delete'];
//     $queryDelete = mysqli_query($config, "DELETE FROM abouts WHERE id='$id'");
//     header("location:?page=about&hapus=berhasil");
// }
?>
<div class="table-responsive">
    <div align="right" class="mb-3">
        <a href="?page=tambah-about" class="btn btn-primary">Tambah</a>
    </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

            <?php $i = 1;
                foreach ($row as $key => $data): ?>
                <tr>
                <!-- <td><?= $i++ ?></td> -->
                    <td><?= $key + 1 ?></td>
                    <td><?= $data['name'] ?></td>
                    <td><?= $data['position'] ?></td>
                    <td><?= $data['status'] ?></td>
                    <td>
                        <a href="tambah-about.php?edit=<?php echo $data['id']?>" class="btn btn-success btn-sm">Edit</a>
                        <a onclick="return confirm('Are you sure??')"
                            href="?delete=<?php echo $data['id'] ?>" class="btn btn-warning btn-sm">Delete</a>
                    </td>
                </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    </div>