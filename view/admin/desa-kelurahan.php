<?php if($_SESSION['level'] == 1){ ?>
<div class="container fluid">
    <h1 align="center">Halaman Pengaturan</h1>
    <div class="row">
        <div class="col-sm-6">
            <h3>Daftar Desa atau Kelurahan</h3>
            <p>Tambah Desa Kelurahan <a href="#addDesa" data-toggle="modal" class="btn btn-primary btn-sm"><span class="fa fa-plus"></span></a></p>
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="data">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Daerah</th>
                            <th>Jenis Daerah</th>
                            <th>Kepala Daerah</th>
                            <th>Atur</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php 
                    $no_daerah = 1;
                    $jenis = null;
                    while($row = fetch($data['daerah']) ){
                        if($row['jenis_daerah'] == 1){
                            $jenis = "Kelurahan";
                        }else{
                            $jenis  =   "Desa";
                        }
                ?>
                        <tr>
                            <td><?php echo $no_daerah++; ?></td>
                            <td><?php echo $row['nama_daerah'] ?></td>
                            <td><?php echo $jenis?></td>
                            <td><?php echo $row['kepala_daerah']?></td>
                            <td>
                            <a class="btn btn-warning btn-sm" data-toggle="modal" href="#editDesa<?php echo $row['id_daerah']?>"><span class="fa fa-pencil"></span></a>
                            <div class="modal fade" id="editDesa<?php echo $row['id_daerah']?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Edit Daerah <?php echo $row['nama_daerah'] ?></h4>
                                            </div>
                                            <div class="modal-body">
                                            <form action="../fungsi/proses.php?editDesa=<?php echo $row['id_daerah']?>" method="post">
                                                <div class="form-group">
                                                    <label for="">Nama Daerah</label>
                                                    <input required type="text" readonly name="nama_daerah" placeholder="Nama Daerah" id="" class="form-control" value="<?php echo $row['nama_daerah'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Nama Kepala Daerah</label>
                                                    <input required type="text" name="kepala_daerah" placeholder="Nama Daerah" id="" class="form-control" value="<?php echo $row['kepala_daerah'] ?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-6">
            <h3>Daftar Admin</h3>
            <p>Tambah Admin <a href="#addAdmin" data-toggle="modal" class="btn btn-primary btn-sm"><span class="fa fa-plus"></span></a></p>
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="admin">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Daerah</th>
                            <th>Nama Admin</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Atur</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php $no_admin =1;
                    while($row = fetch($data['admin'])){ ?>
                        <tr>
                            <td><?php echo $no_admin++ ?></td>
                            <td><?php echo $row['daerah']?></td>
                            <td><?php echo $row['nama'] ?></td>
                            <td><?php echo $row['username']?></td>
                            
                            <td>
                                <?php if(password_verify($row['username'],$row['password'])){
                                    echo "Sama";
                                }else{
                                    echo "Berbeda";
                                } ?>
                            </td>
                            <td>
                                <?php if(password_verify($row['username'],$row['password'])){
                                    echo "";
                                }else{?>
                                     <a class="btn btn-warning btn-sm" data-toggle="modal" href="#editAdmin<?php echo $row['id']?>"><span class="fa fa-pencil"></span></a>
                                <div class="modal fade" id="editAdmin<?php echo $row['id']?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Reset Password</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-warning" href="../fungsi/proses.php?resetPass=<?php echo $row['username'] ?>">Reset Password</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                
                            </td>
                        </tr>
                    <?php  }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addAdmin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Form Tambah Admin</h4>
            </div>
            <div class="modal-body">
                <form action="../fungsi/proses.php?addAdmin" method="post">
                    <div class="form-group">
                        <label for="">Nama Admin</label>
                        <input required type="text" name="nama_admin" placeholder="Nama Admin" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Daerah</label>
                        <select class="form-control" name="daerah" id="" required>
                            <option value="">Pilih Daerah</option>
                        <?php
                        $daerah = query(daerah());
                        while($row = mysqli_fetch_array($daerah)){ ?>
                            <option value="<?php echo $row['nama_daerah'] ?>"><?php echo $row['nama_daerah'] ?></option>
                        <?php } ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addDesa">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Form Tambah Admin</h4>
            </div>
            <div class="modal-body">
                <form action="../fungsi/proses.php?addDesa" method="post">
                    <div class="form-group">
                        <label for="">Nama Daerah</label>
                        <input required type="text" name="nama_desa" placeholder="Nama Daerah" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Daerah</label>
                        <select class="form-control" name="daerah" id="" required>
                            <option value="">Pilih Daerah</option>
                            <option value="Kelurahan">Kelurahan</option>
                            <option value="Desa">Desa</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Kepala Daerah</label>
                        <input required type="text" name="kades" placeholder="Nama Kepala Daerah" id="" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } else{
    include('404.php');
}?>