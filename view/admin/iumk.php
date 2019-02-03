<div class="container-fluid">
    <h1 align="center">Halaman Izin Usaha Mirko dan Kecil</h1>
    <br>
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
            Biaya/Tarif : Tidak dipungut biaya
            </li>
        </ul>
        </div>
        <div class="col-sm-7">
            <?php if($_SESSION['level'] == 1){ ?>

            <?php }else{ ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="" class="label-control">Nama</label>
                        <input type="text" name="" placeholder="Nama " class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="label-control">NIK</label>
                        <input type="text" name="" placeholder="NIK " class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="label-control">No. Telepon</label>
                        <input type="text" name="" placeholder="No. Telepon " class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="label-control">Nama Usaha</label>
                        <input type="text" name="" placeholder="Nama Usaha" class="form-control">
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>