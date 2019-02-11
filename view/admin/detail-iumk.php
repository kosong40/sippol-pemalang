<?php 
  $id = $_GET['i'];
  $detail = query(select("iumk where id_iumk=$id"));
  while($row = fetch($detail)){

?>
<div class="container fluid">
   <section class="content">
      <div class="container-fluid">
      <a class="btn btn-primary" href="?t=<?php echo $_SESSION["sesi_id"] ?>&p=data-iumk&n=2"><span class="fa fa-arrow-left"></span></a>
      <br>
        <div class="row">
          <div class="col-md-3">
            <div class="thumbnail card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php echo $row['foto'] ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $row['nama'] ?></h3>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <p><b>Alamat: <br></b>
                      <?php echo $row['desa']." RT: ".$row['rt']." RW: ".$row['rw']." Kecamatan ".$row['kecamatan'] ?>
                    </p>
                  </li>
                  <li class="list-group-item">
                    <p><b>Nomor Telepon: <br></b>
                      <?php echo $row['telepon'] ?>
                    </p>
                  </li>
                  <li class="list-group-item">
                    <p><b>Nomor KTP : </b><br>
                    <?php echo $row['noktp'] ?>
                    </p>
                  </li>
                </ul>
                <?php if($_SESSION['level'] == 1 && $row['no_surat'] != ''){ 
                    if($row['status'] == "Belum Disetujui"){?>
                    <a href="../fungsi/proses.php?accIumk=<?php echo $row['id_iumk'] ?>" class="btn btn-success btn-block"><b><span class="fa fa-check"></span>&nbsp;Setujui</b></a>
                    <?php }elseif($row['status'] == "Sudah Disetujui"){?>
                    <a href="surat/iumk.php?id=<?php echo $row['id_iumk'] ?>" class="btn btn-primary btn-block"><b><span class="fa fa-print"></span>&nbsp;Cetak</b></a>
                  <?php }?>
                
                <?php }?>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="thumbnail">
            <?php if($_SESSION['level'] == 1){
              if($row['no_surat'] == ''){

              
              ?>
              <div style="padding-bottom:20px">
              <center>
                  <h4>Form Menambahkan Nomor Surat</h4>
                  <form action="../fungsi/proses.php?noIumk=<?php echo $row['id_iumk'] ?>" method="post">
                    <div class="row">
                      <div class="col-sm-2">
                      </div>
                      <div class="col-sm-8">
                        <input type="text" name="nomor_surat" required placeholder="Nomor Surat" class="form-control">
                      </div>
                      <div class="col-sm-2">
                        <button type="submit" class="btn btn-info">Tambah</button>
                      </div>
                    </div>
                  </form>
                  </center>
              </div>
            <?php }else{
              $surat = $row['no_surat'];
              echo "<h4 align='center'>Nomor Surat : $surat</h4>";
            }} ?>
                <div class="tab-content">
                  <table class="table">
                    <tr>
                      <th>Nama Usaha</th>
                      <td>: </td>
                      <td><?php echo $row['nama_usaha'] ?></td>
                    </tr>
                    <tr>
                      <th>Desa/ Kelurahan</th>
                      <td>: </td>
                      <td><?php echo $row['desa_usaha'] ?></td>
                    </tr>
                    <tr>
                      <th>Nama Jalan/ Dusun</th>
                      <td>: </td>
                      <td><?php echo $row['nama_jalan'] ?></td>
                    </tr>
                    <tr>
                      <th>Kode Pos</th>
                      <td>: </td>
                      <td><?php echo $row['kode_pos'] ?></td>
                    </tr>
                    <tr>
                      <th>Sektor Usaha</th>
                      <td>: </td>
                      <td><?php echo $row['sektor_utama'] ?></td>
                    </tr>
                    <tr>
                      <th>Sarana yang digunakan</th>
                      <td>: </td>
                      <td><?php echo $row['sarana'] ?></td>
                    </tr>
                    <tr>
                      <th>Jumlah Modal</th>
                      <td>: </td>
                      <td><?php echo "Rp " . number_format($row['modal'],2,',','.');?></td>
                    </tr>
                    <tr>
                      <th>NPWP</th>
                      <td>: </td>
                      <td><?php echo $row['npwp'] ?></td>
                    </tr>
                    <tr>
                      <th>Klasifikasi Usaha</th>
                      <td>: </td>
                      <td><?php echo $row['klasifikasi_usaha'] ?></td>
                    </tr>
                    <tr>
                      <th>Scan KTP</th>
                      <td>: </td>
                      <td><a href="<?php echo $row['ktp'] ?>" target="_blank" class="btn btn-info">lihat</a></td>
                    </tr>
                    <tr>
                      <th>Scan Kartu Keluarga</th>
                      <td>: </td>
                      <td><a href="<?php echo $row['kk'] ?>" target="_blank" class="btn btn-info">lihat</a></td>
                    </tr>
                    <tr>
                      <th>Scan Pengantar dari RT/RW</th>
                      <td>: </td>
                      <td><a href="<?php echo $row['pengantar'] ?>" target="_blank" class="btn btn-info">lihat</a></td>
                    </tr>
                    <tr>
                      <th>Scan Formulis</th>
                      <td>: </td>
                      <td><a href="<?php echo $row['formulir'] ?>" target="_blank" class="btn btn-info">lihat</a></td>
                    </tr>
                  </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
                <?php } ?>
