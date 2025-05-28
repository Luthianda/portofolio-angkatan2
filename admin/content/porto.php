<?php
include 'config/koneksi.php';

$queryPorto = mysqli_query($config, "SELECT * FROM portos ORDER BY id DESC");
$row = mysqli_fetch_all($queryPorto, MYSQLI_ASSOC);
if (isset($_POST['simpan'])) {
    $title = $_POST['title'];
    $photo = $_FILES['photo']['name'];

    // ekstensi yang boleh diupload hanya .png, jpg, jpeg
    $ekstensi = ['png','jpg','jpeg'];

    if (mysqli_num_rows($queryPorto) > 0){
        $rowPorto = mysqli_fetch_assoc($queryPorto);
        $id = $rowPorto['id'];    
        $updateQ = mysqli_query($config, "UPDATE portos SET title='$title', photo='$fileName'");
        header("location:?page=porto&edit=berhasil");
    }else{
        if(!empty($photo)){
            $fileName = uniqid() . "_" . basename($photo);
        }else{
            $insertQ = mysqli_query($config, "INSERT INTO portos (title, photo) VALUES ('$title','$fileName'");
            header("location:?page=porto&tambah=berhasil");
        }
    }   

}

if (isset($_GET['delete'])) {
    $row = mysqli_fetch_all($queryPorto, MYSQLI_ASSOC);
    $id = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM portos WHERE id='$id'");
    header("location:?page=porto&hapus=berhasil");
}
?>
<div class="table-responsive">
    <div align="right" class="mb-3">
        <a href="?page=tambah-porto" class="btn btn-primary">Tambah</a>
    </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Foto</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

            <?php $i = 1;
                foreach ($row as $key => $data): ?>
                <tr>
                <!-- <td><?= $i++ ?></td> -->
                    <td><?= $key + 1 ?></td>
                    <td><?= $data['title'] ?></td>
                    <td><?= $data['photo'] ?></td>
                    <td>
                        <a href="?page=tambah-porto&edit=<?php echo $data['id']?>" class="btn btn-success btn-sm">Edit</a>
                        <a onclick="return confirm('Are you sure??')"
                            href="?page=porto&delete=<?php echo $data['id'] ?>" class="btn btn-warning btn-sm">Delete</a>
                    </td>
                </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    </div>