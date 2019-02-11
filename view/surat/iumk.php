<!DOCTYPE html>
<html>
<head>
    
</head>
<style>
    @media print{
        visibility:hidden;
        body,page{
            margin:0;
            box-shadow:0;
        }
    }
    page{
        background:white;
        display:block;
        margin: 0 auto;
        margin-bottom: 0.5cm;
        box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
    }
    page[size="F4"]{
        width:21.6cm;
        height:35.56cm;
        padding: 1cm 2cm 2cm 2cml
    }
    #isi{
        padding-left:3.25cm;
        padding-right:3cm;
    }
    #tabel{
        font-size:12pt;
    }
    p{
        margin:0;
    }
</style>
<?php   
   include("../../fungsi/model.php");
  $id = $_GET['id'];
  $bulan=null;
  switch(date("m")){
    case '01':
    $bulan = "Januari";
    break;
    case '02':
    $bulan = "Februari";
    break;
    case '03':
    $bulan = "Maret";
    break;
    case '04':
    $bulan = "April";
    break;
    case '05':
    $bulan = "Mei";
    break;
    case '06':
    $bulan = "Juni";
    break;
    case '07':
    $bulan = "Juli";
    break;
    case '08':
    $bulan = "Agustus";
    break;
    case '09':
    $bulan = "Spetember";
    break;
    case '10':
    $bulan = "Oktober";
    break;
    case '11':
    $bulan = "November";
    break;
    case '12':
    $bulan = "Desember";
    break;

  }
  $detail = query(select("iumk where id_iumk=$id"));
  while($row = fetch($detail)){

?>
<body onload="window.print()">
    <page size="F4">
        <div>
            <div style="padding-top:6cm">
                <p align="center" style="font-size:15pt">
                   <b> PEMERINTAH KABUPATEN PEMALANG <br>KECAMATAN PEMALANG</b>
                </p>
                <p align="center" style="font-size:13pt">
                    <b>SURAT IZIN USAHA MIKRO DAN KECIL <br>
                    <span style="font-size:12pt">Nomor : <?php echo $row['no_surat'] ?></span>
                </b>
                </p>
                <p align="justify" id="isi">
                Berdasarkan Peraturan Presiden Nomor 98 Tahun 2014 tentang Perizinan untuk Usaha Mikro dan Kecil (Lembar Negara Republik Indonesia Tahun 2014 Nomor 222); Peraturan Menteri Dalam Negeri Republik Indonesia Nomor 83 Tahun 2014 tentang Pedoman Pemberian Izin Usaha Mikro dan Kecil;
                </p>
                <span style="padding-top=-1cm" id="isi">Serta:</span>
                <table id="isi">
                    <tr>
                        <td valign="top" style="width:35%">Nomor Perhub Pemalang</td>
                        <td valign="top" style="width:5%">:</td>
                        <td valign="top">33 Tahun 2015</td>
                    </tr>
                    <tr>
                        <td valign="top">Tentang</td>
                        <td valign="top">:</td>
                        <td ><p align="justify" id="tabel">
                        Perubahan Atas Peraturan Bupati Pemalang Nomor 49 Tahun 2012 Tentang Pelimpahan Sebagian Kewenangan Bupati Kepada Camat
                        </p></td>
                    </tr>
                    <tr>
                        <td colspan="3"><span id="tabel">Bersama ini menyatakan dan memberikan izin kepada :</span> </td>
                    </tr>
                    <tr>
                        <td><span id="tabel">Nama</span></td>
                        <td>:</td>
                        <td><?php echo $row['nama'] ?></td>
                    </tr>
                    <tr>
                        <td>Nomor KTP</td>
                        <td>:</td>
                        <td><?php echo $row['noktp'] ?></td>
                    </tr>
                    <tr>
                        <td>Nomor Handphone</td>
                        <td>:</td>
                        <td><?php echo $row['telepon'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="3"><p align="justify">
                        Untuk mendirikan Usaha Mikro dan Kecil yang mencakup perizinan dasar yang berupa : menempati lokasi / domisili, melakukan kegiatan usaha baik produksi maupun penjualan barang dan jasa, dengan identitas : 
                        </p></td>
                    </tr>
                    <tr>
                        <td>Nama Usaha / Nama Toko </td>
                        <td>:</td>
                        <td><?php echo $row['nama_usaha'] ?></td>
                    </tr>
                    <tr><td>Alamat</td></tr>
                    <tr>
                        <td>Provinsi</td>
                        <td>:</td>
                        <td>JAWA TENGAH</td>
                    </tr>
                    <tr>
                        <td>Kabupaten</td>
                        <td>:</td>
                        <td>PEMALANG</td>
                    </tr>
                    <tr>
                        <td>Kecamatan</td>
                        <td>:</td>
                        <td>PEMALANG</td>
                    </tr>
                    <tr>
                        <td>Desa</td>
                        <td>:</td>
                        <td><?php echo strtoupper($row['desa_usaha']) ?></td>
                    </tr>
                    <tr>
                        <td>Nama Jalan / Dusun</td>
                        <td>:</td>
                        <td><?php echo strtoupper($row['nama_jalan']) ?></td>
                    </tr>
                    <tr>
                        <td>Kode Pos</td>
                        <td>:</td>
                        <td><?php echo $row['kode_pos'] ?></td>
                    </tr>
                    <tr>
                        <td>Sektor Usaha</td>
                        <td>:</td>
                        <td><?php echo $row['sektor_utama'] ?></td>
                    </tr>
                    <tr>
                        <td>Sarana yang digunakan</td>
                        <td>:</td>
                        <td><?php echo $row['sarana'] ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Modal Usaha</td>
                        <td>:</td>
                        <td><?php echo "Rp " . number_format($row['modal'],2,',','.');?></td>
                    </tr>
                    <tr>
                        <td>NPWP</td>
                        <td>:</td>
                        <td><?php echo $row['npwp'] ?></td>
                    </tr>
                    <tr>
                        <td>Klasifikasi Usaha</td>
                        <td>:</td>
                        <td><?php echo $row['klasifikasi_usaha'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="height:4cm;">
                           <center> <img src="<?php echo "../".$row['foto'] ?>" style="width=3cm;height:4cm"></center>
                        </td>
                        <td valign="top">
                            <center>
                                <table>
                                    <tr>
                                        <td>Ditetapkan di</td>
                                        <td>:</td>
                                        <td>Pemalang</td>
                                    </tr>
                                    <tr>
                                        <td>Pada Tanggal</td>
                                        <td>:</td>
                                        <td><?php
                                        echo date("d")." ".$bulan." ".date("Y") ?></td>
                                    </tr>
                                </table>
                                <span style="font-size:10pt"><b>CAMAT PEMALANG</b>
                                <br><br><br><br><br>
                                <b>SUHIRMAN, S.Sos. M.Si</b><br>
                                <b>Pembina Tingkat I</b><br>
                                <b>NIP. 19671213 199803 1 005</b></span>
                            </center>
                        </td>
                    </tr>
                </table>
            
            </div>
        </div>
    </page>
</body>
</html>
  <?php } ?>