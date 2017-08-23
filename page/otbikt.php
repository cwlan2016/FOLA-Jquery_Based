<?php
include "../core.php";
?>
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Data OTB Indosat Kuta
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Port</th>
                                        <th>Tube</th>
                                        <th>Core</th>
                                        <th>Digunakan</th>
                                        <th>Perangkat</th>
                                        <th>Datek Tujuan</th>
                                        <th>Keterangan</th>
                                        <th>Tambahan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                      <?php
                                        $i = 1;
                                        $sql = mysqli_query($connect,"SELECT * FROM otb ORDER BY id ASC");
                                        $cek = mysqli_num_rows($sql);
                                        if ($cek == 0) { ?>
                                          <tr class="gradeA">
                                            <td colspan="8" style="text-align:center;">Tidak Ditemukan Data OTB</td>
                                          </tr>
                                        <?php } else {
                                        while($hasil = mysqli_fetch_assoc($sql)) {
                                      ?>
                                    <tr>
                                        <td><?php echo $hasil['port']; ?></td>
                                        <td><?php echo $hasil['tube']; ?></td>
                                        <td><?php echo $hasil['core']; ?></td>
                                        <td class="center"><?php echo $hasil['pelanggan']; ?></td>
                                        <td class="center"><?php echo $hasil['perangkat']; ?></td>
                                        <td class="center"><?php echo $hasil['tujuan']; ?></td>
                                        <td class="center"><?php echo $hasil['keterangan']; ?></td>
                                        <td class="center"><?php echo $hasil['kettambahan']; ?></td>
                                    </tr>
                                    <?php $i++;
                                    }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>