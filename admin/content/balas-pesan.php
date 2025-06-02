<?php

if(isset($_GET['idPesan'])){
$getid =$_GET['idPesan'];
$selectPesan = mysqli_query($config, "SELECT * FROM contacts WHERE id = $getid");
$rowPesan = mysqli_fetch_assoc($selectPesan);
}

if (isset($_POST['kirim_pesan'])){
    $message = $_POST['message'];
    $email = $rowPesan['email'];

    $headers = "From: luthianda17@gmail.com\r\n" .
            "Reply-To: luthianda17@gmail.com\r\n" .
            "Content-Type: text/plain; charset=UTF-8\r\n" .
            "MIME-Version: 1.0\r\n";

    if (mail($email, $message, $headers)){
        header("location:?page=balas-pesan");
        exit();
    }
}

?>

    <div class="m-2">
        <ul>
            <li>
                <div class="row">
                    <div class="col-2">Nama</div>
                    <div class="col-7"> : <?php echo $rowPesan['name']?></div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-2">Email</div>
                    <div class="col-7"> : <?php echo $rowPesan['email']?></div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-2">Pesan</div>
                    <div class="col-7"> : <?php echo $rowPesan['message']?></div>
                </div>
            </li>
        </ul>
    </div>
<br>
<form action="" method="post">
    <div class="m-2" style="width: 75%;">
        <!-- <label for="" class="form-control">Subject</label>
        <textarea name="subject" type="text" class="form-control"></textarea> 
        (karena kita tidak ada subject dari awal jadi di hide saja, ini buat catatan aja jikalau kepake nanti-->

        <label for="" class="form-control">Message</label>
        <textarea name="message" id="summernote" class="form-control" cols="30" rows="10"></textarea>

        <button type="submit" class="btn btn-primary mt-2" name="kirim_pesan">Kirim Pesan</button>
    </div>
</form>