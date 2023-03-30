<br>
<div class="container">
<div class="row">
    <div class="col-md-12-mt-3">
        <div class="card">
            <div class="card-header">
                DATA PETUGAS
            </div>
            <div class="card-body">
            <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambahData"> <font size="2">Tambah Data</font> </a>
            <!-- Modal Verifikasi -->
            <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Petugas</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                <div class="row mb-3">
                                    <label class="col-md-4">Nama</label>
                                    <div class="col-md-8">
                                        <input type="text" name="nama_petugas" class="form-control" placeholder="Masukan Nama" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-4">Username</label>
                                    <div class="col-md-8">
                                        <input type="text" name="username" class="form-control" placeholder="Masukan Username" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-4">Password</label>
                                    <div class="col-md-8">
                                        <input type="password" name="password" class="form-control" placeholder="Masukan Password" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-4">Telp</label>
                                    <div class="col-md-8">
                                        <input type="number" name="telp" class="form-control" placeholder="Masukan Telp" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="kirim" class="btn btn-sm btn-primary">Tambah Data</button>
                            </div>
                        </form>

                            <?php
                            include '../config/koneksi.php';
                            if (isset($_POST['kirim'])) {
                                $nama = $_POST['nama_petugas'];
                                $username = $_POST['username'];
                                $password = md5($_POST['password']);
                                $telp = $_POST['telp'];
                                $level = 'petugas';
                              
                                $query = mysqli_query($koneksi, "INSERT INTO petugas VALUES ('','$nama','$username','$password','$telp','$level')");
                                echo "<script> 
                                alert('Data Berhasil ditambahkan');
                                document.location.href= 'index.php?page=petugas';
                                </script>";
                            }  ?>
                    </div>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">NO</th>
                        <th class="text-center">NAMA</th>
                        <th class="text-center">USERNAME</th>
                        <th class="text-center">TELP</th>
                        <th class="text-center">LEVEL</th>
                        <th class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        include '../config/koneksi.php';
                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM petugas");
                        while ($data = mysqli_fetch_array($query)) { ?>

                        <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $data['nama_petugas'] ?></td>
                            <td class="text-center"><?php echo $data['username'] ?></td>
                            <td class="text-center"><?php echo $data['telp'] ?></td>
                            <td class="text-center"><?php echo $data['level'] ?></td>
                            <td class="text-center">
                            <a href="" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['id_petugas'] ?>"> <font size="2">HAPUS</font> </a>    
                                <!-- Modal Hapus -->
                                <div class="modal fade" id="hapus<?php echo $data['id_petugas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="hapus_data.php" method="POST">
                                                    <input type="hidden" name="id_petugas" class="form-control" value="<?php echo $data['id_petugas'] ?>">
                                                    <p>Apakah anda yakin akan menghapus data <br> <?php echo $data['nama_petugas'] ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="hapus_petugas" class="btn btn-sm btn-danger">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>  
        </div>  
    </div>
</div>
</div>
<br>