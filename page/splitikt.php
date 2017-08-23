<?php
include "../core.php";
?>
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Data Splitter Indosat Kuta
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nama Splitter</th>
                                        <th>In Splitter</th>
                                        <th>Lokasi</th>
                                        <th>Lat/Long</th>
                                        <th>Gambar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                      <?php
                                        $i = 1;
                                        $sql = mysqli_query($connect,"SELECT * FROM splitter ORDER BY id ASC");
                                        $cek = mysqli_num_rows($sql);
                                        if ($cek == 0) { ?>
                                          <tr class="gradeA">
                                            <td colspan="9" style="text-align:center;">Tidak Ditemukan Data Splitter</td>
                                          </tr>
                                        <?php } else {
                                        while($hasil = mysqli_fetch_assoc($sql)) {
                                      ?>
                                    <tr>
                                        <td><?php echo $hasil['splitter']; ?></td>
                                        <td><?php echo $hasil['insplitter']; ?></td>
                                        <td class="center"><?php echo $hasil['lokasi']; ?></td>
                                        <td class="center"><?php echo $hasil['latitude']; ?>,<?php echo $hasil['longitude']; ?></td>
                                        <td><button onclick="lihatGambar(<?php echo $hasil['id']; ?>);" class="btn btn-success">Lihat</button> <button onclick="ubahGambar(<?php echo $hasil['id']; ?>);" class="btn btn-warning">Ubah</button></td>
                                    </tr>
                                    <?php $i++;
                                    }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>