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

                    <div class="card-header">
                        <div class="card">
                            <div class="card-body">
                                <button type="button" class="btn btn-success btn-animation waves-effect waves-light" data-text="Add Student" data-bs-toggle="modal" data-bs-target="#myModal"><span>Add Student</span></button>
                                <br>
                                <br>
                                <table class="table table-primary table-striped align-middle table-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Bil</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Class</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">I/C Number</th>
                                            <th scope="col" class="text-center">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include('../dbConnect.php');
                                        $query = "SELECT user.id userId, user.password, user.email, profile.noKp,
                                        profile.nama, profile.noFon,profile.kelas_id, kelas.nama_kelas
                                        FROM user
                                        JOIN profile ON user.id=profile.user_id AND profile.kelas_id=$kelas_id
                                        LEFT JOIN kelas on kelas.id=profile.kelas_id
                                        WHERE user.role='Student'";
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
                                                echo "
                                                    <tr>
                                                    <th scope='row'>$modal</th>
                                                    <td>$email</td>
                                                    <td>$nama</td>
                                                    <td>$namaKelas</td>
                                                    <td>$noFon</td>
                                                    <td>$noKp</td>
                                                    <td >
                                                        <center>
                                                            <button type='button' class='btn btn-primary btn-animation waves-effect waves-light data-text='Update' data-bs-toggle='modal' data-bs-target='#view2$modal'>
                                                                Update
                                                            </button>
                                                            <a href='./Api/removeStudent.php?userId=$userId' class='btn btn-danger btn-animation waves-effect waves-light data-text='Buang'>
                                                                Remove
                                                            </a>
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
                                                                <form method='post' action='Api/updateStudent.php'>
                                                                    <div class='modal-body'>
                                                                            <div class='col-md-12'>
                                                                                <label for='inputEmail4' class='form-label'>Name</label>
                                                                                <input type='text' class='form-control' name='nama' value='$nama' required>
                                                                            </div>
                                                                            <div class='col-md-12'>
                                                                                <label for='inputEmail4' class='form-label'>Email</label>
                                                                                <input type='text' class='form-control' name='email' disabled value='$email' >
                                                                            </div>
                                                                        
                                                                            <div class='col-md-12'>
                                                                                <label for='inputEmail4' class='form-label'>I/C Number</label>
                                                                                <input type='text' class='form-control' name='noKp' value='$noKp'  required>
                                                                            </div>
                                                                            <div class='col-md-12'>
                                                                                <label for='inputEmail4' class='form-label'>Phone Number</label>
                                                                                <input type='text' class='form-control' name='noFon' value='$noFon'  required>
                                                                            </div>
                                                                            <div class='col-md-12'>
                                                                                <label for='inputEmail4' class='form-label'>Class Name</label>
                                                                                <select class='form-select mb-3'  name='class' disabled>
                                                                                <option value='$kelasId' selected>$namaKelas</option>
                                                                                ";
                                                                                $query3 = "SELECT kelas.*, profile.nama 
                                                                                            FROM kelas 
                                                                                            JOIN profile ON profile.user_id=kelas.teacher_id WHERE kelas.id=$kelas_id";
                                                                                $result3 = $conn->query($query3);
                                                                              
                                                                                if ($result3->num_rows > 0) {
                                                                                    while ($row3 = $result3->fetch_assoc()) {
                                                                                        $id3 = $row3['id'];
                                                                                        $nama_kelas3 = $row3['nama_kelas'];
                                                                                        $nama3 = $row3['nama'];
                                                                                        echo "<option value='$id3'>$nama_kelas3 ($nama3)</option>";
                                                                                    }
                                                                                }
                                                                            echo"
                                                                            </select>
                                                                            </div>
                                                                        <div class='col-md-12'>
                                                                            <label for='inputEmail4' class='form-label'>Password</label>
                                                                            <input type='password' class='form-control' name='pass' value='$pass' required>
                                                                        </div>
                                                                        <input type='hidden' value='$userId' name='userId' />
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

    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Add Student</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <form method='post' action='Api/addStudent.php'>
                    <div class='modal-body'>
                        <h5 class='fs-15'>
                            <span style='color:red;'>*</span>Fill All Information<br>
                            <span style='color:red;'>*</span>First Password Same With I/C Number
                        </h5>

                        <div class='col-md-12'>
                            <label for='inputEmail4' class='form-label'>Name</label>
                            <input type='text' class='form-control' name='nama' required>
                        </div>
                        <div class='col-md-12'>
                            <label for='inputEmail4' class='form-label'>Email</label>
                            <input type='text' class='form-control' name='email' required>
                        </div>
                      
                        <div class='col-md-12'>
                            <label for='inputEmail4' class='form-label'>I/C Number</label>
                            <input type='text' class='form-control' name='noKp' required>
                        </div>
                        <div class='col-md-12'>
                            <label for='inputEmail4' class='form-label'>Phone Number</label>
                            <input type='text' class='form-control' name='noFon' required>
                        </div>
                        
                        <div class='col-md-12'>
                            <label for='inputEmail4' class='form-label'>Class Name</label>
                            <select class='form-select mb-3'  name='class' required>
                                <?php 
                                    $query = "SELECT kelas.*, profile.nama 
                                                FROM kelas 
                                                LEFT JOIN profile ON profile.user_id=kelas.teacher_id 
                                                WHERE kelas.id=$kelas_id";
                                    $result = $conn->query($query);
                                    $modal = 1;
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $id = $row['id'];
                                            $nama_kelas = $row['nama_kelas'];
                                            $nama = $row['nama'];
                                            echo "<option value='$id'>$nama_kelas ($nama)</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button class='btn btn-primary ' type='submit'>Submit</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <?php include 'Component/footer.php' ?>
    <?php include 'Component/javascript.php' ?>
</body>

</html>