<?php 
session_start();
include('koneksi.php');
include('model.php');
$sesi_id = sesi_id(32);
$token = $_SESSION['sesi_id'];
function no_sql($data){
    include('koneksi.php');
    $data   =   trim($data);
    $data   =   mysqli_real_escape_string($koneksi,$data);
    return $data;
}
function sesi_id($id){
    $karakter = "1234567890QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm";
    $random = null;
    for($i=0;$i<$id;$i++){
        $string = rand(0,strlen($karakter)-1);
        $random .= $karakter[$string];
    }    
    return $random;
}

if(isset($_GET['login']) == "true"){
    // echo "HALLO";
    // die();
    $sesi = null;
    $username = no_sql($_POST['username']);
    $password = no_sql($_POST['password']);
    $login_query    = "SELECT*FROM admin WHERE username = '$username'";
    $login_go       = mysqli_query($koneksi,$login_query);
    if(mysqli_num_rows($login_go) > 0 ){
        while($get_admin = mysqli_fetch_array($login_go)){
            $pass_db = $get_admin['password'];
            if(password_verify($password,$pass_db)){
                $login_user   =   "UPDATE admin SET status = 1,ses_id='$sesi_id' WHERE username = '$username'";
                $login_user_go = mysqli_query($koneksi,$login_user);
                
                session_start();
                $_SESSION['sesi_id'] = $sesi_id;
                $_SESSION['username'] = $username;
                $_SESSION['nama']   =  $get_admin['nama'];
                $_SESSION['level'] = $get_admin['level'];
                $_SESSION['daerah'] = $get_admin['daerah'];
                header("location:../view/index2.php?t=$sesi_id&p=beranda");
            }else{
                echo "<script>alert('Username atau Password Salah')</script>";
                header("location:../view/index.php");
            }
        }
    }else{
        echo "<script>alert('Username atau Password Salah')</script>";   
        header("location:../view/index.php");
    }
}
if(isset($_GET['logout'])){
    session_start();
    $sesi = $_SESSION['sesi_id'];
    $username = $_SESSION['username'];
    query(logout($username));
    session_destroy();
    header("location:../view/index.php");
}

if(isset($_GET['addAdmin'])){
    $nama = no_sql($_POST['nama_admin']);
    $daerah = no_sql($_POST['daerah']);
    $password = password_hash("Admin".$daerah,PASSWORD_BCRYPT);
    $username = "Admin".$daerah;
    $token = $_SESSION['sesi_id'];
    query(addAdminDesa($username,$password,$nama,$daerah));
    header("location:../view/index2.php?t=$token&p=desa-kelurahan");
}
if(isset($_GET['gantiPass'])){
    $password   = password_hash(no_sql($_POST['password']),PASSWORD_BCRYPT);
    $token = $_SESSION['sesi_id'];
    $username = $_GET['gantiPass'];
    query(gantiPass($username,$password));
    header("location:../view/index2.php?t=$token&p=akun");
}
if(isset($_GET['gantiProfil'])){
    $token = $_SESSION['sesi_id'];
    $username = $_GET['gantiProfil'];
    $user = $_POST['username'];
    $nama = $_POST['nama'];
    query(gantiProfil($user,$nama,$username));
    header("location:../view/index2.php?t=$token&p=akun");
}
if(isset($_GET['resetPass'])){
    $username = $_GET['resetPass'];
    query(resetPass($username));
    header("location:../view/index2.php?t=$token&p=desa-kelurahan");
}
if(isset($_GET['addDesa'])){
    // var_dump($_POST);
    // die();
    $nama_desa = $_POST['nama_desa'];
    $jenis = null;
    if($_POST['daerah'] == "Desa"){
        $jenis = 2;
    }else{
        $jenis = 1;
    }
    $kades = no_sql($_POST['kades']);
    query(addDesa($nama_desa,$jenis,$kades));
    header("location:../view/index2.php?t=$token&p=desa-kelurahan");
}
if (isset($_GET['editDesa'])) {
    $kades = no_sql($_POST['kepala_daerah']);
    $id = $_GET['editDesa'];
    query(editDesa($kades,$id));
    header("location:../view/index2.php?t=$token&p=desa-kelurahan");
}
if(isset($_GET['addIumk'])){
    // header("location:location:../view/index2.php?t=$token&p=iumk&n=1");
    // echo "Kok Gini";
    // die();

    $ktp        = "../berkas/ktp/".basename($_FILES["scan_ktp"]["name"]);
    $kk         = "../berkas/kk/".basename($_FILES["scan_kk"]["name"]);
    $pengantar  = "../berkas/pengantar/".basename($_FILES["scan_rtrw"]["name"]);
    $formulir   = "../berkas/formulir/".basename($_FILES["scan_formulir"]["name"]);
    $foto       = "../berkas/foto/".basename($_FILES["foto"]["name"]);
    $username   =   $_SESSION['username'];
    $nama       =   no_sql($_POST['nama']);
    $noktp      =   no_sql($_POST['noktp']);
    $telepon    =   no_sql($_POST['telepon']);
    $rt         =   no_sql($_POST['rt']);
    $rw         =   no_sql($_POST['rw']);
    $desa       =   no_sql($_POST['desa']);
    $kecamatan  =   no_sql($_POST['kecamatan']);
    $nama_usaha =   no_sql($_POST['nama_usaha']);
    $desa_usaha =   no_sql($_POST['desa_usaha']);
    $nama_jalan =   no_sql($_POST['nama_jalan']);
    $kode_pos   =   no_sql($_POST['kode_pos']);
    $sektor_usaha   =   no_sql($_POST['sektor_usaha']);
    $modal      =   no_sql($_POST['modal']);
    $npwp       =   no_sql($_POST['npwp']);
    $tanggal    =   date("Y-m-d");
    $klasifikasi_usaha = no_sql($_POST['klasifikasi_usaha']);
    $Add = "INSERT INTO iumk VALUES(null,null,'$username','$nama','$noktp','$telepon','$rt','$rw','$desa','$kecamatan','$nama_usaha','$desa_usaha','$nama_jalan','$kode_pos','$sektor_usaha','$modal','$npwp','$klasifikasi_usaha','$ktp','$kk','$pengantar','$formulir','$foto','$tanggal','Belum Disetujui')";
    $proses         = mysqli_query($koneksi,$Add);
    if($proses){
        move_uploaded_file($_FILES['scan_ktp']['tmp_name'],$ktp);
        move_uploaded_file($_FILES['scan_kk']['tmp_name'],$kk);
        move_uploaded_file($_FILES['scan_rtrw']['tmp_name'],$pengantar);
        move_uploaded_file($_FILES['scan_formulir']['tmp_name'],$formulir);
        move_uploaded_file($_FILES['foto']['tmp_name'],$foto);
        header("location:../view/index2.php?t=$token&p=iumk&n=1");
    }else{
        header("location:../view/index2.php?t=$token&p=iumk&n=0");
    }
}

?>