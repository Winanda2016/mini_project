<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Mini Project || Contact Person</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <!-- navbar -->
        <?php
        include_once 'koneksi.php';
        // memanggil file model
        include_once 'models/Mentor.php';
        include_once 'models/Mahasiswa.php';
        include_once 'models/Agama.php';
        //----------------------

        // memanggil file controller

        //----------------------

        include_once 'navbar.php';
        ?>
        
        <div id="layoutSidenav">
            <!-- sidebar -->
            <?php
            include_once 'sidebar.php';
            ?>


            <div id="layoutSidenav_content">
                <main>
                    <div div class="container-fluid px-4">
                    <?php
                    //main
                    $hal = $_REQUEST['hal'];
                    if(!empty($hal)){
                        include_once $hal.'.php';
                    }
                    else{
                        include_once 'dashboard.php';
                    }
                    ?>
                    </div>
                </main>
                <?php
                //footer
                include_once 'footer.php';
                ?>

                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
