<?php 
    function koneksi(){
        return  $koneksi    =   mysqli_connect('localhost','root','','paten_pemalang');;
    }
    function query($kueri){
        return mysqli_query(koneksi(),$kueri);
    }
    function fetch($kueri){
        return mysqli_fetch_array($kueri);
    }

    function logout($username){
        $kueri = "UPDATE admin SET status = 0, ses_id = null WHERE username = '$username'";
        return $kueri;
    }
    function admin($username){
        $kueri = "SELECT*FROM admin WHERE username='$username'";
        return $kueri;
    }
    function daerah()
    {
        $kueri = "SELECT*FROM daerah";
        return $kueri;
    }
    function adminDesa()
    {
        $kueri = "SELECT*FROM admin where level = 2";
        return $kueri;
    }
    function addAdminDesa($username,$password,$nama,$daerah){
        $kueri = "INSERT INTO admin VALUES(null,'$username','$password','$nama',2,'$daerah',0,null)";
        return $kueri;
    }
    function gantiPass($username,$password){
        $kueri = "UPDATE admin SET password='$password' WHERE username ='$username'";
        return $kueri;
    }
    function gantiProfil($user,$nama,$id){
        $kueri = "UPDATE admin SET username='$user',nama='$nama' WHERE id = $id";
        return $kueri;
    }
    
    $data = [
        'admin'     => query(adminDesa()),
        'daerah'    => query(daerah())
    ]
?>