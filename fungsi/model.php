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
    function daerah()
    {
        $kueri = "SELECT*FROM daerah";
        return $kueri;
    }
    function adminDesa()
    {
        $kueri = "SELECT*FROM admin where level = 1";
        return $kueri;
    }
    
    $data = [
        'admin'     => query(adminDesa()),
        'daerah'    => query(daerah())
    ]
?>