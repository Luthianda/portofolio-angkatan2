<?php
session_start();
include 'config/koneksi.php';

if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    // select/tampilkan semua data dari table user dimana email di ambil dari orang 
    // input di inputan email
    $query = mysqli_query($config, "SELECT * FROM users WHERE email='$email' AND password = '$password'");
    // apakah/jika betul email yang diinput user adalah email yg ada di table user
    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $_SESSION['NAME'] = $row['name'];
        $_SESSION['ID_USER'] = $row['id'];
        header("location:dashboard.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form | Portofolio Ananda </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </head>
</head>

<body>
    <div class="wrapper">
        <div class="login-form mt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                Login Form
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="example@gmail.com">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>
    
</body>
</html>