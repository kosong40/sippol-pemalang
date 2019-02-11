<div class="container-fluid">
    <h1 align="center">Halaman Izin Usaha Mirko dan Kecil</h1>
    <br>

    <?php
        @$notif = $_GET['n'];
        if(@$notif == 1){ ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Sukses</h4>
                Anda berhasil melakukan pengajuan surat Izin Usaha Mikro dan Kecil <br>
                Mohon untuk menunggu konfirmasi dari Kecamatan
            </div>
        <?php }elseif(@$notif == 0){ ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Gagal melakukan proses pengajuan, Mohon untuk mengecek kembali
            </div>
        <?php }elseif(@$notif == 2){ ?>
            
        <?php }?>

        <div style="padding-bottom:10px">
            <a href="?t=<?php echo $_SESSION["sesi_id"] ?>&p=data-iumk&n=2"" class="btn btn-primary">Data Iumk</a>
            <a href="?t=<?php echo $_SESSION["sesi_id"] ?>&p=iumk&n=2" class="btn btn-primary">Formulir Iumk</a>
    </div>
    <div class="row">
        <div class="col-sm-5">
        <ul class="list-group">
            <li class="list-group-item">
            Dasar Hukum : Peraturan Menteri Dalam Negeri RI Nomor 83 Tahun 2014 tentang Pedoman Pemberian Ijin Usaha Mikro Kecil
            </li>
            <li class="list-group-item active">Kriteria</li>
            <li class="list-group-item">
                <ul>
                    <li><b>Usaha Mikro</b> memiliki kekayaan bersih paling banyak Rp. 50.000.000,00 (lima puluh juta rupiah) tidak termasuk tanah dan bangunan tempat usaha, atau memiliki hasil penjualan tahunan paling banyak Rp. 300.000.000,00 (tiga ratus juta rupiah)</li>
                    <li><b>Usaha Kecil</b> memiliki kekayaan bersih lebih dari Rp. 50.000.000,00 (lima puluh juta rupiah) tidak termasuk tanah dan bangunan tempat usaha, atau memiliki hasil penjualan tahunan paling banyak Rp. 2.500.000.000,00 (dua milyar lima ratus juta rupiah)</li>
                </ul>
            </li>
            <li class="list-group-item active">Prosedur</li>
            <li class="list-group-item">
                <ul>
                    <li>
                    Pemohon mengajukan permohonan Ijin Usaha Mikro Kecil kepada Camat dengan membawa lampiran :
                    <ol>
                        <li>Surat Pengantar RT/RW terkait lokasi usaha</li>
                        <li>Fotokopi KTP</li>
                        <li>Fotokopi Kartu Keluarga</li>
                        <li>Pas Foto terbaru ukuran 4 x 6 sebanyak 2 (dua) lembar</li
                    </ol>
                    </li>
                </ul>
                <ul>
                    <li>Pemohon mengisi formulir yang memuat tentang :
                        <ol>
                            <li>Data umum (Identitas pemohon)</li>
                            <li>Data usaha (bentuk, kegitan, sarana, modal, omset usaha)</li>
                        </ol>
                    </li>
                    <li>Camat (PATEN) melakukan pemeriksaan berkas pendaftaran IUMK</li>
                    <li>SK Camat tentang Ijin Usaha Miro Kecil diserahkan kepada pemohon</li>
                </ul>
            </li>
            <li class="list-group-item">
            <i>
            Waktu Penyelesaian : Selambat-lambatnya 2 (dua) hari kerja setelah permohonan diterima lengkap
            </i>
            <br>
            Biaya/Tarif : <b>Tidak dipungut biaya</b>
            </li>
        </ul>
        </div>
        <div class="col-sm-7">
            <?php if($_SESSION['level'] == 1){ ?>
                <h2>Maaf hanya bisa diakses oleh admin desa saja</h2>
            <?php }else{ ?>
                <form action="../fungsi/proses.php?addIumk" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="label-control">Nama</label>
                        <input type="text" required name="nama" placeholder="Nama " class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="label-control">No. KTP</label>
                        <input type="text" required name="noktp" placeholder="No. KTP " class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="label-control">No. Telepon</label>
                        <input type="text" required name="telepon" placeholder="No. Telepon " class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="label-control" for="">Alamat</label>
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-11">
                            <div class="form-group">
                            <label for="" class="label-control">RT / RW</label>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" required name="rt" placeholder="RT" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" required name="rw" placeholder="RW" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control">Desa / Kelurahan</label>
                            <input type="text" required name="desa" placeholder="Desa / Kelurahan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control">Kecamatan</label>
                            <input type="text" required name="kecamatan" placeholder="Kecamatan" class="form-control">
                        </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="label-control">Nama Usaha</label>
                        <input type="text" required name="nama_usaha" placeholder="Nama Usaha" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="label-control" for="alamat_usaha">Alamat Usaha</label>
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-11">
                        <div class="form-group">
                            <label for="" class="label-control">Desa / Kelurahan</label>
                            <select required  name="desa_usaha" id="" class="form-control">
                                <option value="">Pilih Desa / Kelurahan</option>
                                <?php $daerah = query(daerah());while($row = fetch($daerah)){ ?>
                                    <option value="<?php echo $row['nama_daerah'] ?>"><?php echo $row['nama_daerah'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control">Nama Jalan / Dusun</label>
                            <input type="text" required name="nama_jalan" placeholder="Nama Jalan / Dusun" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control">Kode Pos</label>
                            <input type="number" required name="kode_pos" placeholder="Kode Pos" class="form-control">
                        </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                                <label for="" class="label-control">Sektor Usaha</label>
                                <input type="text" required name="sektor_usaha" placeholder="Sektor Usaha" id="" class="form-control">
                            </div>
                        <div class="form-group">
                            <label for="" class="label-control">Sarana yang digunakan</label>
                            <input type="text" required name="sarana" placeholder="Sarana yang digunakan" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control">Jumlah Modal Usaha</label>
                            <input type="number" required name="modal" placeholder="Jumlah Modal Usaha" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control">NPWP</label>
                            <input type="text" required name="npwp" placeholder="NPWP" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control">Klasifikasi Usaha</label>
                            <select required name="klasifikasi_usaha" class="form-control" id="">
                                <option value="">Pilih</option>
                                <option value="Mikro">Mikro</option>
                                <option value="Kecil">Kecil</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control">Scan KTP</label>
                            <input type="file" required name="scan_ktp" placeholder="scanKTP" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control">Scan Kartu Keluarga</label>
                            <input type="file" required name="scan_kk" placeholder="scanKTP" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control">Scan Pengantar dari RT/RW</label>
                            <input type="file" required name="scan_rtrw" placeholder="scanKTP" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control">Scan Formulir</label>
                            <input type="file" required name="scan_formulir" placeholder="formulis" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control">Foto 4x6</label>
                            <input type="file" required name="foto" placeholder="foto" id="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                       <input type="submit" value="Proses" class="btn btn-primary form-control">
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>