<?php
$query = mysqli_query($config, "SELECT * FROM contacts ORDER BY id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM contacts WHERE id='$id'");
    header("location:user.php?hapus=berhasil");
}
?>
<div class="table-responsive">
        <table id="table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Pesan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1;
                foreach ($row as $key => $data): ?>
                <tr>
                <!-- <td><?= $i++ ?></td> -->
                    <td><?= $key + 1 ?></td>

                    <!-- jika data ada 2, cara menggabungkannya seperti ini -->
                    <!-- <td><?= $data['first_name'] . " " . $data['first_name'] ?></td> -->

                    <td><?= $data['name'] ?></td>
                    <td><?= $data['email'] ?></td>
                    <td><?= $data['message'] ?></td>
                    <td><a href="?page=balas-pesan&idPesan=<?php echo $data['id'] ?>" class="btn btn-warning btn-sm">Balas Pesan</a></td>
                </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    </div>