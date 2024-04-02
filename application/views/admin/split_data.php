<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Spliting Data</h6>
    </div>
    <div class="card-body">
        <?php echo $this->session->flashdata('suces')?>
    <br>

    <a href="<?= site_url('admin/mergeData')?>" class="btn btn-light btn-icon-split">
        <span class="icon text-gray-600">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Ambil Data</span>
    </a> 

    <a href="<?= site_url('admin/split_act')?>" class="btn btn-light btn-icon-split">
        <span class="icon text-gray-600">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Proses</span>
    </a>

    <a href="<?= site_url('modeling/trainModel')?>" class="btn btn-light btn-icon-split">
    <span class="icon text-gray-600">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text">Buat Model</span>
    </a> 
    <br><br>

    <?php if ($split->num_rows() > 0): ?>


<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
        <th>No</th>
        <th>Text</th>
        <th>Sentiment</th>
        <th>TF-IDF</th>
        </tr>
    </thead>
    
    <tbody>
    <?php $no=1; foreach ($split->result() as $key) {
        ?>
    <tr>
    <th><?php echo $no++;?></th>
    <td><?php echo $key->text;?></td>
    <td><?php echo $key->sentimen;?></td>
    <td><?php echo $key->tfidf;?></td>
    </tr>
    <?php } ?>
        
    </tbody>
</table>
</div>

<?php endif ?>
</div>
</div>
</div>



