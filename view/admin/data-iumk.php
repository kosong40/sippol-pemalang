<div class="container-fluid">
    <h1 align="center">Halaman Izin Usaha Mirko dan Kecil</h1>
    <br>
    <div style="padding-bottom:10px">
            <a href="?t=<?php echo $_SESSION["sesi_id"] ?>&p=data-iumk&n=2"" class="btn btn-primary">Data Iumk</a>
            <a href="?t=<?php echo $_SESSION["sesi_id"] ?>&p=iumk&n=2" class="btn btn-primary">Formulir Iumk</a>
    </div>
    <div class="table-responsive">
        <table class="table" id="iumk">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Pengaju</th>
                    <th>Nama Usaha</th>
                    <th>Status</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $username = $_SESSION['username'];
                    $data = query(select("iumk WHERE username = '$username'"));
                    $no = 1;
                    while($row = fetch($data)){
                ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['nama'] ?></td>
                        <td><?php echo $row['nama_usaha'] ?></td>
                        <td><?php echo $row['status'] ?></td>
                        <td></td>
                    </tr>
                    <?php } ?>
            </tbody>
        </table>
    </div>
</div>