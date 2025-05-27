<?php
include 'config/koneksi.php';

$queryBlog = mysqli_query($config, "SELECT * FROM blogs ORDER BY id DESC");
$row = mysqli_fetch_all($queryBlog, MYSQLI_ASSOC);
if (isset($_POST['simpan'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // ekstensi yang boleh diupload hanya .png, jpg, jpeg
    $ekstensi = ['png','jpg','jpeg'];

    if (mysqli_num_rows($queryBlog) > 0){
        $rowBlog = mysqli_fetch_assoc($queryBlog);
        $id = $rowBlog['id'];    
        $updateQ = mysqli_query($config, "UPDATE blogs SET title='$title', description='$description'");
        header("location:?page=blog&edit=berhasil");
    }else{
        if(!empty($photo)){
            $fileName = uniqid() . "_" . basename($photo);
        }else{
        $insertQ = mysqli_query($config, "INSERT INTO blogs (title, description) VALUES ('$title','$description'");
        header("location:?page=blog&tambah=berhasil");
        }
    }   

}

if (isset($_GET['delete'])) {
    $row = mysqli_fetch_all($queryBlog, MYSQLI_ASSOC);
    $id = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM blogs WHERE id='$id'");
    header("location:?page=blog&hapus=berhasil");
}
?>
<div class="table-responsive">
    <div align="right" class="mb-3">
        <a href="?page=tambah-blog" class="btn btn-primary">Tambah</a>
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
                    <td><?= $data['title'] ?></td>
                    <td><?= $data['description'] ?></td>
                    <td>
                        <a href="?page=tambah-blog&edit=<?php echo $data['id']?>" class="btn btn-success btn-sm">Edit</a>
                        <a onclick="return confirm('Are you sure??')"
                            href="?page=blog&delete=<?php echo $data['id'] ?>" class="btn btn-warning btn-sm">Delete</a>
                    </td>
                </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    </div>