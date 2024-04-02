<div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pengguna</h6>
                        </div>
                        <div class="card-body">
                        <?php echo $this->session->flashdata('suces')?>
                            <br>

                <button type="button"  data-toggle="modal" data-target="#tambah" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah</span>
                </button> 
                <br><br>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Level</th>
                            <th>Status</th>
                            <th>Username</th>
                            <th>Passowrd</th>
                            <th>Opsi</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php $no=1; foreach ($admin->result() as $key) {
                            ?>
                        <tr>
                        <th><?php echo $no++;?></th>
                        <td><?php echo $key->nama;?></td>
                        <td><?php echo $key->level;?></td>
                        <td><?php echo $key->status;?></td>
                        <td><?php echo $key->username;?></td>
                        <td><?php echo $key->password;?></td>
                        <!-- <td>
                        <label class="switch">
<input type="checkbox" <?php if ($key->status_admin=="aktif")echo "checked"?> onclick="if (event.target.checked)return window.location = '<?= base_url('admin/aktifkan/'.$key->id_user)?>';else return window.location = '<?= base_url('admin/block/'.$key->id_user)?>';" >
<span class="slider round"></span>
</label>
                           
                            
                        </td> -->
                        
                        <td>
                        
                            <button type="button" class="btn btn-light btn-sm btn-circle" data-toggle="modal" data-target="#edit<?= $key->id_user?>" title="Edit"><i class="fa fa-pen"></i></button>
                            <div id="edit<?= $key->id_user?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            
                                            <h4 class="modal-title">Edit Data User</h4>
                                            <button type="button" class="close" data-dismiss="modal">x</button>
                                        </div>
                                        <form role="form" method="POST" action="<?php echo site_url('admin/editadmin/'.$key->id_user)?>">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                <span>Nama</span>
                                                <input class="form-control" placeholder="Nama" value="<?= $key->nama?>" name="nama" required><br>
                                                <span>Level</span>
                                                <select class="form-control" name="level" required>
                                                    <?php if($key->level){?>
                                                        <option value="<?= $key->level?>"><?= $key->level?></option>
                                                    <?php }else{?>
                                                        <option value="">pilih</option>
                                                    <?php }?>
                                                    <option value="admin">admin</option>
                                                    <option value="user">user</option>
                                                </select>
                                                <span>Status</span>
                                                <select class="form-control" name="status" required>
                                                    <?php if($key->status){?>
                                                        <option value="<?= $key->status?>"><?= $key->status?></option>
                                                    <?php }else{?>
                                                        <option value="">pilih</option>
                                                    <?php }?>
                                                    <option value="inventori">inventori</option>
                                                    <option value="pr">pr</option>
                                                </select>
                                                <span>Username</span>
                                                <input class="form-control" placeholder="Username" value="<?= $key->username?>" name="username" required><br>
                                                <span>Password</span>
                                                <input class="form-control" type="password" placeholder="Password" name="password" value="<?= $key->password?>" required><br>
                                                <div class="modal-footer">
                                                <button class="btn btn-light" data-dismiss="modal">Batal</button>
                                                <input type="submit" class="btn btn-primary" value="Update">
                                                </div>
                                                </div>
                                            </div>
                                    </form> 
                                    </div>
                                </div>
                            </div>
                            

                            <a href="<?php echo site_url('admin/hapusadmin/'.$key->id_user)?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ?')" class=" btn btn-light btn-circle btn-sm" title="Hapus"><i class="fa fa-trash"></i></a>
                            
                        </td>
                        
                        </tr>
                        <?php } ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
     
    </div>


    <div id="tambah" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 class="modal-title">Tambah Data Admin</h4>
                    <button type="button" class="close" data-dismiss="modal">x</button>
                </div>
                <form role="form" method="POST" action="<?php echo site_url('admin/tambahadmin')?>">
                    <div class="modal-body">
                        <div class="form-group">
                        <span>Nama</span>
                        <input class="form-control" placeholder="Nama" value="" name="nama" required><br>
                        <span>Level</span>
                        <select class="form-control" name="level" required>
                            <option value="">pilih</option>
                            <option value="admin">admin</option>
                            <option value="user">user</option>
                        </select>
                        <span>Status</span>
                        <select class="form-control" name="status" required>
                            <option value="">pilih</option>
                            <option value="inventori">inventori</option>
                            <option value="pr">pr</option>
                        </select>
                        <span>Username</span>
                        <input class="form-control" placeholder="Username" value="" name="username" required><br>
                        <span>Password</span>
                        <input class="form-control" type="password" placeholder="Password" name="password" value="" required><br>
                        <div class="modal-footer">
                        <button class="btn btn-light" data-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-primary" value="Tambah">
                        </div>
                        </div>
                    </div>
               </form> 
            </div>
        </div>
    </div>
