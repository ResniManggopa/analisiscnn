<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Stemming</h6>
    </div>
    <div class="card-body">
    <?php echo $this->session->flashdata('suces')?>
        <br>

        <a href="<?= site_url('user/download_stemming')?>" class="btn btn-light btn-icon-split">
<span class="icon text-gray-600">
    <i class="fas fa-download"></i>
</span>
<span class="text">Download</span>
</a> 
<br><br>

<?php if ($stemming->num_rows() > 0): ?>

<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
        <th>No</th>
        <th>Stopwords</th>
        <th>Stemming</th>
        </tr>
    </thead>
    
    <tbody>
    <?php $no=1; foreach ($stemming->result() as $key) {
        ?>
    <tr>
    <th><?php echo $no++;?></th>
    <td><?php echo $key->text_stopwords;?></td>
    <td><?php echo $key->text_stemming;?></td>
    </tr>
    <?php } ?>
        
    </tbody>
</table>
</div>

<?php endif ?>
</div>
</div>
</div>



