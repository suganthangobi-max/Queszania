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
                                <h4 class="mb-sm-0">Note List</h4>
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
                                            <th scope="col">Class</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Date</th>
                                            <th scope="col"><center>File</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include('../dbConnect.php');
                                        $query = "SELECT nota.*, kelas.nama_kelas
                                        FROM nota
                                        LEFT JOIN kelas ON kelas.id=nota.kelas_id
                                        WHERE kelas_id='$kelas_id'";
                                        $result = $conn->query($query);
                                        $modal = 1;
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $id = $row['id'];
                                                $title = $row['title'];
                                                $file = $row['file'];
                                                $tarikh = $row['tarikh'];
                                                $namaKelas = $row['nama_kelas'];
                                                $imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
                                                echo "
                                                    <tr>
                                                    <th scope='row'>$modal</th>
                                                    <td>$namaKelas</td>
                                                    <td>$title</td>
                                                    <td>$tarikh</td>
                                                    <td >";
                                                    if($imageFileType=='pdf'){
                                                        echo"
                                                        <center>
                                                            <button type='button' class='btn btn-primary btn-animation waves-effect waves-light data-text='Update' data-bs-toggle='modal' data-bs-target='#view2$modal'>
                                                                View File
                                                            </button>
                                                        </center>";
                                                    }else{
                                                        echo"
                                                        <center>
                                                            <a href='downloadNota.php?file=$file'  class='btn btn-primary btn-animation waves-effect waves-light' id='downloadButton' data-filename='$file'>
                                                                Download File
                                                            </a>
                                                        </center>";
                                                    }
                                                    echo"
                                                    </td>
                                                   
                                                </tr>
                                                    ";
                                                    if($imageFileType=='pdf'){
                                                        echo "
                                                            <div id='view2$modal' class='modal fade' tabindex='-1' aria-labelledby='myModalLabel' aria-hidden='true' style='display: none;'>
                                                                <div class='modal-dialog  modal-xl'>
                                                                <div class='modal-content'>
                                                                    <div class='modal-header'>
                                                                            <h5 class='modal-title' id='myModalLabel'>Nota ($title)</h5>
                                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'> </button>
                                                                        </div>
                                                                        <div class='modal-body'>
                                                                            <iframe src='../nota/$file' width='100%' height='600px;'></iframe>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        ";
                                                    }


                                                $modal++;
                                            }
                                        } else {
                                            echo "
                                                <tr>
                                                <td colspan='9' align='center'>No Note Add</td>
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