            <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data TF-IDF</h6>
                        </div>
                        <div class="card-body">
                        <?php echo $this->session->flashdata('suces')?>
                            <br>

                <a href="<?= site_url('admin/tfidf_act')?>" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Proses</span>
                </a> 
                <br><br>

                <?php if ($tfidf->num_rows() > 0): ?>
                    
                
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Stemming</th>
                            <th>TF-IDF</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php $no=1; foreach ($tfidf->result() as $key) {
                            ?>
                        <tr>
                        <th><?php echo $no++;?></th>
                        <td><?php echo $key->text_stemming;?></td>
                        <td><?php echo $key->text_tfidf;?></td>
                        </tr>
                        <?php } ?>
                            
                        </tbody>
                    </table>
                </div>

                <?php endif ?>
            </div>
        </div>
    </div>


    
