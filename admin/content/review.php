<?php
include 'config/koneksi.php';

$queryReview = mysqli_query($config, "SELECT * FROM reviews ORDER BY id DESC");
$row = mysqli_fetch_all($queryReview, MYSQLI_ASSOC);
if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $profession = $_POST['profession'];
    $comment = $_POST['comment'];

    // ekstensi yang boleh diupload hanya .png, jpg, jpeg
    $ekstensi = ['png','jpg','jpeg'];

    if (mysqli_num_rows($queryReview) > 0){
        $rowReview = mysqli_fetch_assoc($queryReview);
        $id = $rowReview['id'];    
        $updateQ = mysqli_query($config, "UPDATE reviews SET name='$name', profession='$profession', comment='$comment'");
        header("location:?page=review&edit=berhasil");
    }else{
        if(!empty($photo)){
            $fileName = uniqid() . "_" . basename($photo);
        }else{
        $insertQ = mysqli_query($config, "INSERT INTO reviews (name, profession, comment) VALUES ('$name','$profession','$comment'");
        header("location:?page=review&tambah=berhasil");
        }
    }   

}

if (isset($_GET['delete'])) {
    $row = mysqli_fetch_all($queryReview, MYSQLI_ASSOC);
    $id = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM reviews WHERE id='$id'");
    header("location:?page=review&hapus=berhasil");
}
?>
<div class="table-responsive">
    <div align="right" class="mb-3">
        <a href="?page=tambah-review" class="btn btn-primary">Tambah</a>
    </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
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
                    <td><?= $data['name'] ?></td>
                    <td><?= $data['profession'] ?></td>
                    <td><?= $data['comment'] ?></td>
                    <td>
                        <a href="?page=tambah-review&edit=<?php echo $data['id']?>" class="btn btn-success btn-sm">Edit</a>
                        <a onclick="return confirm('Are you sure??')"
                            href="?page=review&delete=<?php echo $data['id'] ?>" class="btn btn-warning btn-sm">Delete</a>
                    </td>
                </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    </div>