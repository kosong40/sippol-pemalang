<?php 
session_start();
include('koneksi.php');
include('model.php');
$sesi_id = sesi_id(32);
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
    // $kueri = "UPDATE admin SET password='$password' WHERE username ='$username'";
    // mysqli_query(koneksi(),$kueri);
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

?>