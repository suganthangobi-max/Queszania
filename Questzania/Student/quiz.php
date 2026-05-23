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
                                <h4 class="mb-sm-0">Quiz</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="card-header">
                        <div class="card">
                            <div class="card-body">
                                <br>
                                <table class="table table-primary table-striped align-middle table-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Bil</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Date Expired</th>
                                            <th scope="col">Class</th>
                                            <th scope="col"><center>Quiz</center></th>
                                            <th scope="col" class="text-center">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include('../dbConnect.php');
                                        $query = "SELECT quiz.*, kelas.nama_kelas
                                        FROM quiz
                                        LEFT JOIN kelas on kelas.id=$kelas_id where quiz.kelas_id=$kelas_id";
                                        $result = $conn->query($query);
                                        $modal = 1;
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $id = $row['id'];
                                                $link = $row['link'];
                                                $title = $row['title'];
                                                $tarikhTamat = $row['tarikhTamat'];
                                                $kelasId = $row['kelas_id'];
                                                $namaKelas = $row['nama_kelas'];

                                                $date=date("d/m/Y");
                                                $return = date("d/m/Y",strtotime($tarikhTamat));
                                                $color='';
                                                if ($date>= $return){
                                                    $color="class='table-danger'";
                                                }
                                                else{
                                                    $late='Under Date';
                                                }

                                                echo "
                                                    <tr $color>
                                                    <th scope='row'>$modal</th>
                                                    <td>$title</td>
                                                    <td>$return</td>
                                                    <td>$namaKelas</td>
                                                    <td>
                                                        <center>
                                                            <button type='button' class='btn btn-primary btn-animation waves-effect waves-light data-text='Update' data-bs-toggle='modal' data-bs-target='#view2$modal'>
                                                            <i class='ri-file-line '></i>
                                                            </button>
                                                        </center>
                                                    </td>
                                                    <td >
                                                        <center>
                                                            <a href='./mark.php?quiz=$id' class='btn btn-info btn-animation waves-effect waves-light'>
                                                                Mark
                                                            </a>
                                                        </center>
                                                    </td>
                                                </tr>
                                                    ";

                                                    echo "
                                                    <div id='view2$modal' class='modal fade' tabindex='-1' aria-labelledby='myModalLabel' aria-hidden='true' style='display: none;'>
                                                        <div class='modal-dialog modal-lg  modal-dialog-scrollable'>
                                                            <div class='modal-content'>
                                                                <div class='modal-header'>
                                                                    <h5 class='modal-title' id='myModalLabel'>Quiz ($title)</h5>
                                                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'> </button>
                                                                </div>
                                                                <div class='modal-body'>
                                                                    <center>$link</center>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>";
                                                    echo "
                                                    <div id='view3$modal' class='modal fade' tabindex='-1' aria-labelledby='myModalLabel' aria-hidden='true' style='display: none;'>
                                                        <div class='modal-dialog modal-lg'>
                                                            <div class='modal-content'>
                                                                <div class='modal-header'>
                                                                    <h5 class='modal-title' id='myModalLabel'>Update Quiz ($title)</h5>
                                                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'> </button>
                                                                </div>
                                                                    <form method='post' action='Api/updateQuiz.php'>
                                                                        <div class='modal-body'>
                                                                            <div class='col-md-12'>
                                                                                <label for='inputEmail4' class='form-label'>Title</label>
                                                                                <input type='text' class='form-control' name='title' value='$title'>
                                                                            </div>
                                                                            <div class='col-md-12'>
                                                                                <label for='inputEmail4' class='form-label'>Expired Date</label>
                                                                                <input type='date' class='form-control' name='expiredDate' value='$tarikhTamat' required>
                                                                            </div>
                                                                        
                                                                            <div class='col-md-12'>
                                                                                <label for='inputEmail4' class='form-label'>Link</label>
                                                                                <input type='text' class='form-control' name='link' value='$link' required>
                                                                            </div>
                                                                        </div>
                                                                        <div class='modal-footer'>
                                                                            <input type='hidden' value='$id' name='id' />
                                                                            <button class='btn btn-primary ' type='submit'>Submit</button>
                                                                        </div>
                                                                    </form>
                                                            </div>
                                                        </div>
                                                    </div>";


                                                $modal++;
                                            }
                                        } else {
                                            echo "
                                                <tr>
                                                <td colspan='9' align='center'>No Quiz Add</td>
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