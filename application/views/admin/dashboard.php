        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"></h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Dataset</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total->num_rows() ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <!-- Content Row -->

          <div class="row">
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Dataset</h6>
                        </div>
                        <div class="card-body">
                        <?php echo $this->session->flashdata('suces')?>
                        <?php echo $this->session->flashdata('status')?>
                        <!-- <a href="<?= site_url('admin/form_tambah_chass')?>" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-600">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah</span>
                        </a> -->
												<!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#shortingModal">
													<i class="fas fa-filter"></i> Shorting Data
												</button> -->
												<?php if($this->session->level == 'admin'){?>
                          <a href="#" class="btn btn-md btn-success" data-toggle="modal" data-target="#uploadModal">
                                <i class="fas fa-file-upload"></i> Tambah Data
                          </a>
                          <a href="#" class="btn btn-md btn-primary" data-toggle="modal" data-target="#tambahModal">
                                <i class="fas fa-file-upload"></i> Upload Data Baru
                          </a>
                          <hr>
                        <?php  } ?>
                        <br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                          <th>No</th>
                                          <th>Datetime</th>
                                          <th>Userid</th>
                                          <th>Text</th>
                                          
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php $no=1; foreach ($total->result() as $key) {
                                        ?>
                                    <tr>
                                    <th><?php echo $no++; ?></th>
                                    <th><?php echo $key->datetime;?></th>
                                    <th><?php echo $key->userid;?></th>
                                    <th><?php echo $key->text;?></th>
                                    </tr>
                                    <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            
          </div>

          <!-- Content Row -->
          
      </div>
       
<!-- Modal Upload Data -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('admin/upload_data') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <span class="text">Data sebelumnya akan ditambahkan dengan data baru</span>
                        <label for="file_upload">Pilih file CSV atau Excel</label>
                        <input type="file" class="form-control-file" id="file_upload" name="file_upload">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Upload Data -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('admin/tambah_data') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <span class="text">Data sebelumnya akan terhapus dan diganti dengan data baru</span>
                        <label for="file_upload">Pilih file CSV atau Excel</label>
                        <input type="file" class="form-control-file" id="file_upload" name="file_upload">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
