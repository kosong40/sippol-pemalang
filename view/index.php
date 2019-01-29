
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
  <link rel="stylesheet" href="../aset/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="../aset/dist/css/skins/_all-skins.min.css">
    <title>SIPPOL PEMALANG</title>
    <style>
        #nav-text{
            font-size:20px;
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
<body class="hold-transition skin-blue layout-top-nav">
<div class="row">
    <div class="col-sm-2">
        <img src="../aset/img/logo_pemalang_lg.png" id="img-logo-atas" class="img-responsive">
    </div>
    <div class="col-sm-6">
        <br>
        <h1 align="center" id="text-sispek"><b>SIPPOL PEMALANG</b></h1>
        <h3 align="center" style="color:#e64a19"><b>Sistem Informasi Pelayanan Publik Online</b></h3>
    </div>
</div>
<div class="wrapper">
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
            <a href="#" id="nav-text" class="navbar-brand"><span class="fa fa-home"></span>&nbsp;BERANDA</a>
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
                <li><a href="#">Action</a></li>
              </ul>
            </li>
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="nav-text"><span class="fa fa-sign-in"></span>&nbsp;LOGIN <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li class="user-body">
                    <form action="../fungsi/proses.php?login=true" method="post">
                        <div class="form-group">
                            <label for="" class="label-control">Username</label>
                            <input type="text" name="username" title="Form untuk username" required id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control">Password</label>
                            <input type="password" name="password" title="Form untuk kata sandi" required id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="" id="" class="btn btn-primary form-control">
                        </div>
                    </form>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container-fluid">
        <br>
            <center><img src="../aset/img/pemalang.jpg" alt=""></center>
        <br>
    </div>
    <div class="conteiner"><h4 align="center"><b>----- Layanan -----</b></h4></div>
    <div class="row">
        <div class="col-sm-2 col-sm-offset-1">
            <img src="../aset/img/no_img.svg" class="img-rounded img-responsive" alt="">
        </div>
        <div class="col-sm-2">
            <img src="../aset/img/no_img.svg" class="img-rounded img-responsive" alt="">    
        </div>
        <div class="col-sm-2">
            <img src="../aset/img/no_img.svg" class="img-rounded img-responsive" alt="">    
        </div>
        <div class="col-sm-2">
            <img src="../aset/img/no_img.svg" class="img-rounded img-responsive" alt="">    
        </div>
        <div class="col-sm-2">
            <img src="../aset/img/no_img.svg" class="img-rounded img-responsive" alt="">    
        </div>
    </div>
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
</body>
</html>