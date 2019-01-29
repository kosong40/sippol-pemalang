<div class="container fluid">
    <h1>Pengaturan Profil</h1>
    <?php 
    $admin = query(admin($_SESSION['username']));
    while($row = fetch($admin)){
    ?>
        <form action="../fungsi/proses.php?gantiProfil=<?php echo $row['id'] ?>" method="post">
            <div class="form-group">
                <label for="" class="label-control">Username</label>
                <input type="text" class="form-control" readonly name="username" id="" value="<?php echo $row['username'] ?>">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Nama</label>
                <input type="text" class="form-control" name="nama" id="" value="<?php echo $row['nama'] ?>">
            </div>
            <button type="submit" class="btn btn-warning">Ganti</button>
        </form>
        <br><br><br>
        <form action="../fungsi/proses.php?gantiPass=<?php echo $row['username'] ?>" method="post">
            <div class="form-group">
                <label for="" class="label-control">Password Baru</label>
                <input type="password" requied name="password" id="" class="form-control">
            </div>
            <button type="submit" class="btn btn-warning">Ganti</button>
        </form>
    <?php } ?>
</div>  