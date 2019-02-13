<div class="container-fluid">
    <h1 align="center">Halaman Izin Usaha Mikro dan Kecil</h1>
    <br>
    <div style="padding-bottom:10px">
            <a href="?t=<?php echo $_SESSION["sesi_id"] ?>&p=data-iumk&n=2"" class="btn btn-primary">Data Iumk</a>
            <a href="?t=<?php echo $_SESSION["sesi_id"] ?>&p=iumk&n=2" class="btn btn-primary">Formulir Iumk</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover" id="iumk">
            <thead>
                <tr>
                    <th>No.</th>
                    <?php
                        if($_SESSION['level'] == 1){
                            echo '<th>Desa</th>';
                        }else{
                        }
                    ?>
                    <th>Nama Pengaju</th>
                    <th>Nama Usaha</th>
                    <th>Status</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $username = $_SESSION['username'];
                    $data;
                    if($_SESSION['level'] == 1){
                        $data = query(select("iumk"));
                    }else{
                        $data = query(select("iumk WHERE username = '$username'"));
                    }
                    $no = 1;
                    while($row = fetch($data)){
                ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <?php
                        if($_SESSION['level'] == 1){
                            $admin = $row['desa_usaha'];
                            echo "<td>$admin</td>";
                        }else{
                        }
                    ?>
                        <td><?php echo $row['nama'] ?></td>
                        <td><?php echo $row['nama_usaha'] ?></td>
                        <td><?php 
                            $status= $row['status'];
                            if($_SESSION['level'] == 1){
                                echo "$status";
                            }elseif($_SESSION['level'] ==2){
                                if($status == "Sudah Disetujui"){
                                    echo "<label class='label label-success'>Surat bisa dicetak</label>";
                                }else{
                                    echo "<label class='label label-danger'>$status</label>";
                                }
                            }
                        
                        ?></td>
                        <td><?php echo $row['tanggal'] ?></td>
                        <td><a href="?t=<?php echo $_SESSION["sesi_id"] ?>&p=detail-iumk&i=<?php echo $row['id_iumk'] ?>" class="btn btn-success">Detail</a></td>
                    </tr>
                    <?php } ?>
            </tbody>
        </table>
    </div>
</div>