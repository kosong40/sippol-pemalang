<?php if(isset($_GET['upload'])){
    var_dump($_FILES['gambar']);
} ?>

<form action="?upload" enctype="multipart/form-data" method="post">
    <input type="file" name="gambar" id="">
    <button type="submit">Simpan</button>
</form>