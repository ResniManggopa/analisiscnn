<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url("assets/admin/vendor/fontawesome-free/css/all.min.css"); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url("assets/admin/css/sb-admin-2.min.css"); ?>" rel="stylesheet">

    <link href="<?php echo base_url("assets/admin/vendor/datatables/dataTables.bootstrap4.min.css"); ?>" rel="stylesheet">
    <script src="<?php echo base_url("assets/admin/vendor/jquery/jquery.min.js"); ?>"></script>

    <script type="text/javascript">
        function check() {
            var x = document.getElementById("pwd");
            var x1 = document.getElementById("pwd1");


            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            if (x1.type === "password") {
                x1.type = "text";
            } else {
                x1.type = "password";
            }
        }
    </script>
    <!-- Load Chart.js -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@~4.3.0"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wordcloud2.js/1.0.0/wordcloud2.min.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('user') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <!-- <i class="fas fa-list"></i> -->
                    <!-- <img width="80%" src="<?= base_url() ?>assets/image/icon.png"> -->
                </div>
                <div class="sidebar-brand-text mx-3"> Analisis CNN </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            
                        <!-- Nav Item - Dashboard -->
            <!--<li class="nav-item">-->
            <!--    <a class="nav-link" href="<?= site_url('admin') ?>">-->
            <!--        <i class="fas fa-fw fa-home"></i>-->
            <!--        <span>Dashboard</span></a>-->
            <!--</li>-->


            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('admin/upload') ?>">
                    <i class="fas fa-fw fa-file-upload"></i>
                    <span>Upload Data</span></a>
            </li>

            <?php if (empty($total->result())) { ?>
            <?php } else { ?>

                <!-- Heading -->
                <div class="sidebar-heading">
                    Preprocesing
                </div>

                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url("admin/data_cleaning"); ?>">
                        <i class="fas fa-fw fa-edit"></i>
                        <span>Cleaning dan Casefolding</span></a>
                </li>

            <?php } ?>

            <?php if (empty($cleaning->result())) { ?>
            <?php } else { ?>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url("admin/data_stopwords"); ?>">
                        <i class="fas fa-fw fa-list"></i>
                        <span>Stopwords</span></a>
                </li>

            <?php } ?>

            <?php if (empty($stopwords->result())) { ?>
            <?php } else { ?>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url("admin/data_stemming"); ?>">
                        <i class="fas fa-fw fa-list"></i>
                        <span>Stemming</span></a>
                </li>

            <?php } ?>

            <?php if (empty($stemming->result())) { ?>
            <?php } else { ?>

                <!-- Heading -->
                <div class="sidebar-heading">
                    Pelabelan
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url("admin/data_label"); ?>">
                        <i class="fas fa-fw fa-list"></i>
                        <span>Pelabelan Data</span></a>
                </li>

            <?php } ?>
            <?php if (empty($hasildata->result())) { ?>
            <?php } else { ?>

                <!-- Heading -->
                <div class="sidebar-heading">
                    TF-IDF
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url("admin/data_tfidf"); ?>">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>IDF Tiap Data</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url("admin/vocab"); ?>">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Word Vocab TF-IDF</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url("admin/wordcloud"); ?>">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>WordCloud</span></a>
                </li>

            <?php } ?>
            <?php if (empty($tfidf->result())) { ?>
            <?php } else { ?>

                <!-- Heading -->
                <div class="sidebar-heading">
                    Spliting Data (80:20)
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url("admin/data_split"); ?>">
                        <i class="fas fa-fw fa-list"></i>
                        <span>Split Data</span></a>
                </li>

                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url("admin/data_training"); ?>">
                        <i class="fas fa-fw fa-edit"></i>
                        <span>Data Training</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url("admin/data_testing"); ?>">
                        <i class="fas fa-fw fa-edit"></i>
                        <span>Data Testing</span></a>
                </li>
            <?php } ?>
            <?php if (empty($training->result())) { ?>
            <?php } else { ?>

                <!-- Heading -->
                <div class="sidebar-heading">
                    Pengujian
                </div>

                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url("modeling/klasifikasi"); ?>">
                        <i class="fas fa-fw fa-edit"></i>
                        <span>Hasil Pengujian CNN</span></a>
                </li>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('admin') ?>">
                        <i class="fas fa-fw fa-edit"></i>
                        <span>Hasil Analisis Sentimen</span></a>
                </li>

            <?php } ?>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('username'); ?></span>
                                <img class="img-profile rounded-circle" src="<?php echo base_url("assets/admin/img/undraw_profile.svg"); ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= site_url('admin/gantipassword') ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Update Password
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>