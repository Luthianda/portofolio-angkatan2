<?php
$query = mysqli_query($config, "SELECT levels.name_level, users.* FROM users LEFT JOIN levels ON levels.id = users.id_levels
ORDER BY users.id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if($_SESSION['LEVEL'] != 1){
    // echo "<h1>Siapa kamu main masuk-masuk ajah??!!<h1>";
    // echo "<a href='dashboard.php' class='btn btn-warning'>Balik bang!</a>";
    // die;
    header("location:dashboard.php?failed=access");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM users WHERE id='$id'");
    header("location:?page=user&hapus=berhasil");
}
?>
<div class="table-responsive">
    <div align="right" class="mb-3">
        <a href="?page=tambah-user" class="btn btn-primary">Tambah</a>
    </div>
        <table id="table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama level</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                                            <!-- <tr>
                                                <td>1</td>
                                                <td>Ananda</td>
                                                <td>luthianda17@gmail.com</td>
                                                <td>
                                                    <a href="" class="btn btn-success btn-sm">Edit</a>
                                                    <a onclick="return confirm ('Are you sure?')" 
                                                    href="" class="btn btn-warning btn-sm">Delete</a>
                                                </td>
                                            </tr> -->
            <?php $i = 1;
                foreach ($row as $key => $data): ?>
                <tr>
                <!-- <td><?= $i++ ?></td> -->
                    <td><?= $key + 1 ?></td>
                    <td><?= $data['name_level'] ?></td>
                    <td><?= $data['name'] ?></td>
                    <td><?= $data['email'] ?></td>
                    <td>
                        <a href="?page=tambah-user&edit=<?php echo $data['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                        <a onclick="return confirm('Are you sure??')"
                            href="?page=user&delete=<?php echo $data['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    </div>