            <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Training</h6>
                        </div>
                        <div class="card-body">
                        <?php echo $this->session->flashdata('suces')?>
                            <br>



                <?php if ($label->num_rows() > 0): ?>
                    
                
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Text</th>
                            <th>Sentiment</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php $no=1; foreach ($label->result() as $key) {
                            ?>
                        <tr>
                        <th><?php echo $no++;?></th>
                        <td><?php echo $key->text;?></td>
                        <td><?php echo $key->sentimen;?></td>
                        </tr>
                        <?php } ?>
                            
                        </tbody>
                    </table>
                </div>

                <?php endif ?>
            </div>
        </div>
    </div>


    
