<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form <?= $title?></h6>
        </div>
        <div class="card-body">
        <?php echo $this->session->flashdata('suces')?>

        <form class="form" action="<?= $action?>" method="post" enctype="multipart/form-data">
            <label>Upload File Template Excel</label>
            <input type="file" accept=".xlsx, .xls" class="form-control" placeholder="" name="file"><br>
            <input type="hidden" name="old" value="<?= $file?>">
            <?php if($file){?>
                <p>File Sudah Ada</p> <?= $file?>
            <?php }?>
            <hr>
            <input type="hidden" name="id_template" value="<?= $id_template?>">
            <button type="submit" class="btn btn-primary"><?= $button?></button>
        </form>      
            </div>
        </div>
</div>



       