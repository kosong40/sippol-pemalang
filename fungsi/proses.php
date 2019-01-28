<?php 
include('koneksi.php');
include('model.php');
$sesi_id = sesi_id(32);

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
    $query_keluar = "UPDATE admin SET status = 0, ses_id = null WHERE username = '$username'";
    $query_keluar_go = mysqli_query($koneksi,$query_keluar);
    session_destroy();
    header("location:../view/index.php");
}

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

?>