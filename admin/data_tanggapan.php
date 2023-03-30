<br>
<div class="container">
<div class="row">
    <div class="col-md-12-mt-3">
        <div class="card">
            <div class="card-header">
                DATA TANGGAPAN
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">NO</th>
                            <th class="text-center">TANGGAL</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">JUDUL</th>
                            <th class="text-center">TANGGAPAN</th>
                            <th class="text-center">STATUS</th>
                            <th class="text-center">AKSI</th>
                        </tr> 
                    </thead>
                    <tbody>
                    <?php 
                        include '../config/koneksi.php';
                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT a.*, b.* FROM tanggapan a INNER JOIN pengaduan b ON a.id_pengaduan=b.id_pengaduan");
                        while ($data = mysqli_fetch_array($query)) { ?>

                        <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $data['tgl_pengaduan'] ?></td>
                            <td class="text-center"><?php echo $data['nik'] ?></td>
                            <td class="text-center"><?php echo $data['judul_laporan'] ?></td>
                            <td class="text-center"><?php echo $data['tanggapan'] ?></td>
                            <td class="text-center">
                            <?php 
                                if ($data['status'] == 'proses') {
                                    echo "<span class='badge bg-warning'>Proses</span>";
                                } elseif ($data['status'] == 'selesai') {
                                    echo "<span class='badge bg-success'>Selesai</span>";
                                } else {
                                    echo "<span class='badge bg-danger'>Menunggu</span>";
                                }  
                            ?>  
                            </td>
                            <td class="text-center">
                            <a href="" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['id_tanggapan'] ?>"> <font size="2">HAPUS</font> </a>    
                                <!-- Modal Hapus -->
                                <div class="modal fade" id="hapus<?php echo $data['id_tanggapan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="hapus_data.php" method="POST">
                                                    <input type="hidden" name="id_tanggapan" class="form-control" value="<?php echo $data['id_tanggapan'] ?>">
                                                    <p>Apakah anda yakin akan menghapus tanggapan <br> <?php echo $data['judul_laporan'] ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="hapus_tanggapan" class="btn btn-sm btn-danger">Hapus</button>
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