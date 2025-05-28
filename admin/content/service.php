<?php
include 'config/koneksi.php';

$queryService = mysqli_query($config, "SELECT * FROM services ORDER BY id DESC");
$row = mysqli_fetch_all($queryService, MYSQLI_ASSOC);
if (isset($_POST['simpan'])) {
    $skill = $_POST['skill'];
    $description = $_POST['description'];

    // ekstensi yang boleh diupload hanya .png, jpg, jpeg
    $ekstensi = ['png','jpg','jpeg'];

    if (mysqli_num_rows($queryService) > 0){
        $rowService = mysqli_fetch_assoc($queryService);
        $id = $rowService['id'];    
        $updateQ = mysqli_query($config, "UPDATE services SET skill='$skill', description='$description'");
        header("location:?page=service&edit=berhasil");
    }else{
        if(!empty($photo)){
            $fileName = uniqid() . "_" . basename($photo);
        }else{
        $insertQ = mysqli_query($config, "INSERT INTO services (skill, description) VALUES ('$skill','$description'");
        header("location:?page=service&tambah=berhasil");
        }
    }   

}

if (isset($_GET['delete'])) {
    $row = mysqli_fetch_all($queryService, MYSQLI_ASSOC);
    $id = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM services WHERE id='$id'");
    header("location:?page=service&hapus=berhasil");
}
?>
<div class="table-responsive">
    <div align="right" class="mb-3">
        <a href="?page=tambah-service" class="btn btn-primary">Tambah</a>
    </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Skill</th>
                    <th>Deskripsi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

            <?php $i = 1;
                foreach ($row as $key => $data): ?>
                <tr>
                <!-- <td><?= $i++ ?></td> -->
                    <td><?= $key + 1 ?></td>
                    <td><?= $data['skill'] ?></td>
                    <td><?= $data['description'] ?></td>
                    <td>
                        <a href="?page=tambah-service&edit=<?php echo $data['id']?>" class="btn btn-success btn-sm">Edit</a>
                        <a onclick="return confirm('Are you sure??')"
                            href="?page=service&delete=<?php echo $data['id'] ?>" class="btn btn-warning btn-sm">Delete</a>
                    </td>
                </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    </div>