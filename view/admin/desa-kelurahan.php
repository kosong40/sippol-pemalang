
<div class="container fluid">
    <h1 align="center">Halaman Pengaturan</h1>
    <div class="row">
        <div class="col-sm-6">
            <h3>Daftar Desa atau Kelurahan</h3>
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
                            <td></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-6">
            <h3>Daftar Admin</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="data">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Daerah</th>
                            <th>Nama Admin</th>
                            <th>Username</th>
                            <th>Atur</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php $no_admin =1;
                    while($row = fetch($data['admin'])){ ?>
                        <tr>
                            <td><?php echo $no_admin++ ?></td>
                            <td></td>
                            <td><?php echo $row['nama'] ?></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php  }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>