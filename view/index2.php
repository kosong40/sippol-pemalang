<?php session_start();
    include("../fungsi/model.php");
    $role = null;
    if($_SESSION['level'] == 1){
        $role = "ADMIN KECAMATAN";
    }elseif($_SESSION['level'] == 2){
        $role = "ADMIN DESA";
    }
    if($_GET['t'] != $_SESSION['sesi_id']){
        echo "<script>alert('Maaf anda salah masuk')</script>";
        header('location:404.php');
    }else{
        if($_SESSION < 1){
            header('location:index.php');
        }else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../aset/img/logo_pemalang.ico" sizes="32x32">
    <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../aset/komponen/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../aset/komponen/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../aset/komponen/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../aset/komponen/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../aset/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="../aset/dist/css/skins/_all-skins.min.css">
    <title><?php echo strtoupper(str_replace("-"," ",$_GET['p']))." $role" ?></title>
    <style>
        #nav-text{
            font-size:20px;
        }
        #nav-text-small{
            font-size:15px;
        }
        #img-logo-atas{
            /* width:35%; */
            padding:10px 10px 10px 60px;
        }
        #text-sispek{
            font-size:65px;
            color:#ec407a;
        }
    </style>
</head>
<body class="hold-transition skin-red layout-top-nav">
<div class="row">
    <div class="col-sm-2">
        <img src="../aset/img/logo_pemalang_lg.png" id="img-logo-atas" class="img-responsive">
    </div>
    <div class="col-sm-6">
        <br>
        <h1 align="center" id="text-sispek"><b>SIPPOL PEMALANG</b></h1>
        <h3 align="center" style="color:#e64a19"><b>Sistem Informasi Pelayanan Publik Online</b></h3>
        <h5 align="center" style="color:#e64a19">Admin : <?php echo $_SESSION['daerah'] ?></h5>
    </div>
    <div class="col-sm-2">
    <br>
        <table>
            <tr>
                <td>Data masuk hari ini</td>
                <td>&nbsp;:&nbsp;</td>
                <td><?php $tanggal    =   date("Y-m-d");echo mysqli_num_rows(query(select("iumk WHERE tanggal = '$tanggal'"))) ?></td>
            </tr>
            <tr>
                <td>Total data</td>
                <td>&nbsp;:&nbsp;</td>
                <td><?php echo mysqli_num_rows(query(select("iumk"))) ?></td>
            </tr>
        
        <?php if($_SESSION['level'] == 1){ ?>
        <tr>
                <td>Admin Online</td>
                <td>&nbsp;:&nbsp;</td>
                <td><?php echo mysqli_num_rows(query(getOnline())) ?></td>
            </tr>
        <?php }?>
        </table>
    </div>
</div>
<div class="wrapper">
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
            <a href="?t=<?php echo $_SESSION["sesi_id"] ?>&p=beranda" id="nav-text" class="navbar-brand"><span class="fa fa-home"></span>&nbsp;BERANDA</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="nav-text"><span class="fa fa-info"></span>&nbsp;INFORMASI<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                <li><a href="#" id="nav-text-small">Action</a></li>
              </ul>
            </li>
    <?php if($_SESSION['level'] == 1){ ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="nav-text"><span class="fa fa-book"></span>&nbsp;DATA <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="">Data Masuk</a></li>
                    <li><a href="">Data Disetujui</a></li>
                    <li><a href="">Data Tidak Disetujui</a></li>
                    <li><a href="">Data Dibuang</a></li>
                </ul>
            </li>
    <?php }?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="nav-text"><span class="fa fa-wrench"></span>&nbsp;PENGATURAN<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                <?php if($_SESSION['level'] == 1){ ?>
                <li><a href="?t=<?php echo $_SESSION["sesi_id"] ?>&p=desa-kelurahan" id="nav-text-small"><span class="fa fa-cog"></span>&nbsp;Akun Desa / Kelurahan </a></li>
                <?php }?>
                <li><a href="?t=<?php echo $_SESSION["sesi_id"] ?>&p=akun" id="nav-text-small"><span class="fa fa-user"></span>&nbsp;Pengaturan Akun </a></li>
              </ul>
            </li>
            <li><a href="../fungsi/proses.php?logout" id="nav-text"><span class="fa fa-sign-out"></span>&nbsp;KELUAR </a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
        <?php
            $page = $_GET['p'];
            include("admin/$page.php");
        ?>
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../aset/komponen/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../aset/komponen/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../aset/komponen/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../aset/komponen/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../aset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../aset/dist/js/demo.js"></script>
<script src="../aset/komponen/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../aset/komponen/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
    $('#data').DataTable();
    $('#admin').DataTable();
    $('#iumk').DataTable();
    });
</script>
</body>
</html>
    <?php }} ?>