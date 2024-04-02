<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ganti Password</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('pesan');?>
        <form class="form" action="<?= site_url('admin/gantipassword_act')?>" method="post" enctype="multipart/form-data">
            <label>Username</label>
            <input type="text" class="form-control" placeholder="Username" value="<?php echo $this->session->username;?>" name="username" required><br>
            <label>Masukan Password Baru</label>
            <input id="pwd" type="password" class="form-control" placeholder="Password" value="" name="pass_baru" required>
            <?php echo form_error('pass_baru'); ?><br>
            <label>Masukan Kembali Password Baru</label>
            <input id="pwd1" type="password" class="form-control" placeholder="Password" value="" name="ulang_pass" required>
            <?php echo form_error('ulang_pass'); ?><br>
            <input type="checkbox" onclick="check()"> Lihat Password
            <hr>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?= site_url('admin/upload')?>" class="btn btn-default">Kembali</a> 
        </form>      
            </div>
        </div>
</div>



       