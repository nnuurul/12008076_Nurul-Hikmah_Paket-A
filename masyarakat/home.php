<br>
<div class="container">
    <div class="row">
        <div class="col-md-13" mt-3>
            <p>Selamat Datang <?php echo $_SESSION['nama'] ?> </p>
            <div class="card">
                <div class="card-header">
                    FORM PENGADUAN
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Judul Laporan</label>
                        <input type="text" class="form-control" name="judul_laporan" placeholder="Masukan Judul" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Isi Laporan</label>
                        <textarea class="form-control" name="isi_laporan" placeholder="Masukan Isi Laporan" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Laporan</label>
                        <br>
                        <select class="form-control" name="jenis_laporan">
                            <option option="Public">Public</option>
                            <option option="Private">Private</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori Laporan</label>
                        <br>
                        <select class="form-control" name="kategori_laporan">
                            <option option="Lingkungan">Lingkungan</option>
                            <option option="Sosial">Sosial</option>
                        </select>
                    </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" style="float: left;" name="kirim" class="btn btn-sm btn-primary">  <font size="2">KIRIM</font> </button>
                    </div>
                    </div>
                </form>

                <?php
                include "../config/koneksi.php";
                $tanggal = date("y,m,d");
                if (isset($_POST['kirim'])) {
                    $nik = $_SESSION['nik'];
                    $judul_laporan = $_POST['judul_laporan'];
                    $isi_laporan = $_POST['isi_laporan'];
                    $status = 0;
                    $foto = $_FILES['foto']['name'];
                    $tmp = $_FILES['foto']['tmp_name'];
                    $lokasi = '../assets/img/';
                    $nama_foto = rand(0,999).'-'.$foto;
                    $jenis_laporan = $_POST['jenis_laporan'];
                    $kategori_laporan = $_POST['kategori_laporan'];

                    move_uploaded_file($tmp, $lokasi.$nama_foto);
                    $query = mysqli_query($koneksi, "INSERT INTO pengaduan VALUES ('','$tanggal','$nik','$judul_laporan','$isi_laporan','$nama_foto','$status','$jenis_laporan','$kategori_laporan')");

                    echo "<script> 
                    alert('Data Berhasil dikirim');
                    Window.location= 'index.php';
                    </script>";
                }  ?>

            </div>  
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-12-mt-3">
            <div class="card">
                <div class="card-header">
                    RIWAYAT PENGADUAN
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">NO</th>
                                <th class="text-center">JUDUL</th>
                                <th class="text-center">ISI</th>
                                <th class="text-center">FOTO</th>
                                <th class="text-center">STATUS</th>
                                <th class="text-center">JENIS LAPORAN</th>
                                <th class="text-center">KATEGORI LAPORAN</th>
                                <th class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $nik = $_SESSION['nik'];
                            $query = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE $nik=$nik ORDER BY id_pengaduan DESC");
                            while ($data = mysqli_fetch_array($query)) { ?>
                            <tr>
                                <td class="text-center"><?php echo $no++; ?></td>
                                <td class="text-center"><?php echo $data['judul_laporan'] ?></td>
                                <td class="text-center"><?php echo $data['isi_laporan'] ?></td>
                                <td class="text-center"><img src="../assets/img/<?php echo $data['foto'] ?>" width="100"></td>
                                <td class="text-center">
                                    <?php
                                    if ($data['status'] == 'proses') {
                                        echo "<span class='badge bg-warning'>Proses</span>";
                                    } elseif ($data['status'] == 'selesai') {
                                        echo "<span class='badge bg-success'>Selesai</span>";
                                        echo "<br><a href='index.php?page=tanggapan&id_pengaduan=$data[id_pengaduan]'> <font size=2> Lihat Tanggapan </font> </a>";
                                    } else {
                                        echo "<span class='badge bg-danger'>Menunggu</span>";
                                    }  
                                    
                                    ?>
                                </td>
                                <td class="text-center"><?php echo $data['jenis_laporan'] ?></td>
                                <td class="text-center"><?php echo $data['kategori_laporan'] ?></td>
                                <td class="text-center">
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?php echo $data['id_pengaduan'] ?>">
                                    Hapus
                                </button>

                                <!-- Modal Hapus -->
                                <div class="modal fade" id="hapusModal<?php echo $data['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="hapusmodal">Hapus Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="hapus_data.php" method="POST">
                                                <input type="hidden" name="id_pengaduan" value="<?php echo $data['id_pengaduan'] ?>">
                                            <div class="modal-body">
                                                Apakah anda yakin akan menghapus data <br> <?php echo $data['judul_laporan'] ?>
                                            </div>
                                            <div class="modal-footer">
                                               <button type="submit" class="btn btn-sm btn-danger" name="hapus_pengaduan">Hapus</button>
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