<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Selamat Datang</title>
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url("assets/admin/vendor/fontawesome-free/css/all.min.css");?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url("assets/admin/css/sb-admin-2.min.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/admin/vendor/datatables/dataTables.bootstrap4.min.css");?>" rel="stylesheet">
    <script src="<?php echo base_url("assets/admin/vendor/jquery/jquery.min.js");?>"></script>
    <!-- Load Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wordcloud2.js/1.0.0/wordcloud2.min.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->

                <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
<!--   <a class="navbar-brand" href="#">Navbar</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

                <!-- <nav class="navbar navbar-expand navbar-dark bg-primary topbar mb-4 static-top shadow"> -->
                    <!-- Sidebar Toggle (Topbar) 
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('user'); ?>">
                                <span>Home</span></a>
                        </li>
                        
                        <!-- Nav Item - Casefolding -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('user/casefolding'); ?>">
                                <span>Data Casefolding</span></a>
                        </li>
                        <!-- Nav Item - Stopwords -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('user/stopword'); ?>">
                                <span>Data Stopwords</span></a>
                        </li>
                        <!-- Nav Item - Stemming -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('user/stemming'); ?>">
                                <span>Data Stemming</span></a>
                        </li>
                        <!-- Nav Item - Stemming -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('user/vocab'); ?>">
                                <span>Data Token Vocabulary</span></a>
                        </li>
                        <!-- Nav Item - Hasil -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('user/hasil'); ?>">
                                <span>Hasil dan Akurasi</span></a>
                        </li>
                        <!-- Nav Item - Hasil -->
                        <li class="nav-item">
                            <a href="<?= site_url('admin')?>" class="nav-link btn-light">
                                <span class="icon text-primary">
                                    <i class="fas fa-user"></i> Login
                                </span>
                            </a> 
                        </li>
                    </ul>
                    </div>
                </nav>

                
                <!-- End of Topbar -->