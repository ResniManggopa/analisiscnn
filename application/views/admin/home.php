<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="header">
        <h1 class="h3 mb-4 text-gray-800">Penelitian</h1>
    </div>
    <div class="body">
        <?php echo $this->session->flashdata('status')?>
        <?php if($this->session->level == 'admin'){?>
            <a href="#" class="btn btn-md btn-danger" data-toggle="modal" data-target="#resetModal">
                <i class="fa fa-refresh"></i> Reset Data
            </a>
            <hr>
        <?php  } ?>

        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Grafik Jumlah Evaluasi</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <canvas id="chart" style="height: 300px;"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Jumlah Evaluasi</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">

                        <div class="row">

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-12 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Tweet Positif</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$jumlah_evaluasi['Positif']?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-12 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Tweet Netral</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$jumlah_evaluasi['Netral']?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-12 col-md-6 mb-4">
                                <div class="card border-left-danger shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Tweet Negatif</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$jumlah_evaluasi['Negatif']?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="card shadow mb-4">
            <a href="#tujuanCollapse" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="tujuanCollapse">
                <h6 class="m-0 font-weight-bold text-primary">Tujuan Penelitian</h6>
            </a>
            <div class="collapse show" id="tujuanCollapse">
                <div class="card-body">
                    Penelitian ini bertujuan untuk melakukan analisis sentimen terhadap tweet di Twitter dengan topik "Merdeka Belajar Kampus Merdeka".
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <a href="#metodeCollapse" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="metodeCollapse">
                <h6 class="m-0 font-weight-bold text-primary">Metode Penelitian</h6>
            </a>
            <div class="collapse" id="metodeCollapse">
                <div class="card-body">
                    Metode yang digunakan dalam penelitian ini adalah Convolutional Neural Network (CNN).
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <a href="#respondenCollapse" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="respondenCollapse">
                <h6 class="m-0 font-weight-bold text-primary">Responden</h6>
            </a>
            <div class="collapse" id="respondenCollapse">
                <div class="card-body">
                    Responden dalam penelitian ini adalah pengguna Twitter yang mengirimkan tweet yang berkaitan dengan topik "Merdeka Belajar Kampus Merdeka".
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <a href="#sumberDataCollapse" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sumberDataCollapse">
                <h6 class="m-0 font-weight-bold text-primary">Sumber Data</h6>
            </a>
            <div class="collapse" id="sumberDataCollapse">
                <div class="card-body">
                    Sumber data untuk penelitian ini adalah tweet yang diposting oleh pengguna Twitter yang terkait dengan topik "Merdeka Belajar Kampus Merdeka".
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabell">Reset Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin mereset data?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="<?= site_url('admin/reset')?>" class="btn btn-danger">Reset</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data untuk grafik
    var data = {
        labels: ['Negatif', 'Netral', 'Positif'],
        datasets: [{
            label: 'Jumlah Evaluasi',
            data: [
                <?= $jumlah_evaluasi['Negatif'] ?>,
                <?= $jumlah_evaluasi['Netral'] ?>,
                <?= $jumlah_evaluasi['Positif'] ?>
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    };

    // Opsi untuk grafik
    var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    };

    // Membuat grafik
    var ctx = document.getElementById('chart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
</script>
