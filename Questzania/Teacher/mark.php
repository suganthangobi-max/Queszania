<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<?php include 'Component/head.php' ?>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <?php include './Component/header.php' ?>
            </div>
        </header>
        <!-- ========== App Menu ========== -->
        <?php include './Component/asside.php' ?>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Teacher List</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <?php
                    $quizId=$_GET['quiz']; 
                    ?>
                    <div class="card-header">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-primary table-striped align-middle table-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Bil</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Class</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">Mark</th>
                                            <th scope="col" class="text-center">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include('../dbConnect.php');
                                        $query = "SELECT user.id userId, user.password, user.email, profile.noKp,
                                        profile.nama, profile.noFon,profile.kelas_id, kelas.nama_kelas,
                                        CASE 
                                            WHEN markah.markah is not null then markah.markah
                                            ELSE 0
                                        END as markah,
                                        CASE 
                                            WHEN markah.markah is not null then markah.id
                                            ELSE null
                                        END as markahId
                                        FROM user
                                        JOIN profile ON user.id=profile.user_id AND profile.kelas_id=$kelas_id
                                        LEFT JOIN kelas on kelas.id=profile.kelas_id
                                        LEFT JOIN markah on markah.student_id=profile.user_id AND markah.quiz_id=$quizId
                                        WHERE user.role='Student' ";
                                        $result = $conn->query($query);
                                        $modal = 1;
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $nama = $row['nama'];
                                                $noKp = $row['noKp'];
                                                $noFon = $row['noFon'];
                                                $pass = $row['password'];
                                                $email = $row['email'];
                                                $userId = $row['userId'];
                                                $kelasId = $row['kelas_id'];
                                                $namaKelas = $row['nama_kelas'];
                                                $markah = $row['markah'] ?? 'No Mark';
                                                $markahId = $row['markahId'];
                                                echo "
                                                    <tr>
                                                    <th scope='row'>$modal</th>
                                                    <td>$email</td>
                                                    <td>$nama</td>
                                                    <td>$namaKelas</td>
                                                    <td>$noFon</td>
                                                    <td>$markah</td>
                                                    <td >
                                                        <center>
                                                            <button type='button' class='btn btn-primary btn-animation waves-effect waves-light data-text='Update' data-bs-toggle='modal' data-bs-target='#view2$modal'>
                                                                Add/Update Mark
                                                            </button>
                                                        </center>
                                                    </td>
                                                </tr>
                                                    ";

                                                echo "
                                                    <div id='view2$modal' class='modal fade' tabindex='-1' aria-labelledby='myModalLabel' aria-hidden='true' style='display: none;'>
                                                        <div class='modal-dialog'>
                                                            <div class='modal-content'>
                                                                <div class='modal-header'>
                                                                    <h5 class='modal-title' id='myModalLabel'>Update Student</h5>
                                                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'> </button>
                                                                </div>
                                                                <form method='post' action='Api/addMark.php'>
                                                                    <div class='modal-body'>
                                                                            <div class='col-md-12'>
                                                                                <label for='inputEmail4' class='form-label'>Name</label>
                                                                                <input type='text' class='form-control' name='nama' value='$nama' required disabled>
                                                                            </div>
                                                                          
                                                                            
                                                                            <div class='col-md-12'>
                                                                                <label for='inputEmail4' class='form-label'>Mark</label>
                                                                                <input type='number' class='form-control' name='mark' value='$markah' required>
                                                                            </div>
                                                                        <input type='hidden' value='$quizId' name='quizId' />
                                                                        <input type='hidden' value='$userId' name='userId' />
                                                                        <input type='hidden' value='$markahId' name='markahId' />
                                                                    </div>
                                                                    <div class='modal-footer'>
                                                                        <button class='btn btn-primary ' type='submit'>Update</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                ";


                                                $modal++;
                                            }
                                        } else {
                                            echo "
                                                <tr>
                                                <td colspan='9' align='center'>No Student Add</td>
                                                </tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div> <!-- end col -->
                    </div>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    
    <?php include 'Component/footer.php' ?>
    <?php include 'Component/javascript.php' ?>
</body>

</html>