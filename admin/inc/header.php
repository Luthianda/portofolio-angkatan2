<header class="shadow">
            <nav class="navbar navbar-expand-lg bg-body-white">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">CMS Ananda</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Page
                                    </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="?page=about">About Me</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <!-- <?php 
                            $decrypt = base64_decode($_GET['level']);
                            if(isset($_GET['level']) &&
                            $decrypt == 1)
                            ?> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="?page=user">User
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="?page=manage-profile">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="?page=manage-skill">Skills</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="?page=manage-experience">Experience</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="?page=manage-contact">Contact</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="?page=manage-gallery">Galleries</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="?page=manage-about">About Us</a>
                                </li>
                        </ul>
                        <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php echo $_name ?>
                                        <!-- <?= $_name ?> (bisa juga pakai ini)-->
                                    </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>