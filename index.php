<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Bootstrap Admin</title>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="assets/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Sidebar -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>ADMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link active">
                        <i class="fa fa-tachometer-alt me-2"></i>Dashboard
                    </a>
                    <a href="./pages/siswa/datasiswa.php" class="nav-item nav-link">
                        <i class="fa fa-user me-2"></i>Data Siswa
                    </a>
                    <a href="./pages/data guru/data guru.php" class="nav-item nav-link">
                        <i class="fa fa-chalkboard-teacher me-2"></i>Data Guru
                    </a>
                </div>
            </nav>
        </div>

        <!-- Main content -->
        <?php
        include("db.php");

        $database = new db();
        $Siswa = $database->getSiswa();
        ?>

        <div class="container-fluid">
            <?php
            // Menampilkan pesan sukses jika ada
            if (isset($_SESSION['message'])) {
                echo "<div class='alert alert-success' role='alert'>" . $_SESSION['message'] . "</div>";
                unset($_SESSION['message']);
            }
            ?>

            <div class="card shadow mb-4 content">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa</h6>
                </div>
                <div class="card-body">
                    <a href="tambah.php" class="btn btn-primary mb-3">Tambah Siswa</a>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">No.</th>
                                    <th scope="col">NIS</th>
                                    <th scope="col">Nama Siswa</th>
                                    <th scope="col">Tempat Lahir</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Telepon</th>
                                    <th scope="col">Nama Wali</th>
                                    <th scope="col">Kode Kelas</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                while ($data = $Siswa->fetch_assoc()) {
                                    echo "<tr class='text-center'>";
                                    echo "<th scope='row'>" . $count . ".</th>";
                                    echo "<td>" . $data['nis'] . "</td>";
                                    echo "<td>" . $data['nm_siswa'] . "</td>";
                                    echo "<td>" . $data['tmp_lahir'] . "</td>";
                                    echo "<td>" . $data['tgl_lahir'] . "</td>";
                                    echo "<td>" . $data['jkel'] . "</td>";
                                    echo "<td>" . $data['alamat'] . "</td>";
                                    echo "<td>" . $data['telp'] . "</td>";
                                    echo "<td>" . $data['nm_wali'] . "</td>";
                                    echo "<td>" . $data['kd_kelas'] . "</td>";
                                    echo "<td>" . $data['username'] . "</td>";
                                    echo "<td>
                                        <a href='edit.php?nis=" . $data['nis'] . "' class='btn btn-warning'>Edit</a>
                                        <a href='hapus.php?nis=" . $data['nis'] . "' class='btn btn-danger' onclick='return confirm(\"Hapus data?\")'>Hapus</a>
                                    </td>";
                                    echo "</tr>";
                                    $count++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Dashboard Admin</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            Designed By <a href="https://htmlcodex.com">Arda Fauzan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
