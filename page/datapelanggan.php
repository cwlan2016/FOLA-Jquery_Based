<?php
include "../core.php";
?>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Pelanggan
                        </div>
                            <div class="well">
                                <a class="btn btn-default btn-lg btn-block" target="_blank" href="export.php">Export Data</a>
                            </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nojar</th>
                                            <th>Pelanggan</th>
                                            <th>Alamat</th>
                                            <th>ONT GPON</th>
                                            <th>Jasa</th>
                                            <th>Bandwith</th>
                                            <th>S/N Modem</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                        $i = 1;
                                        $sql = mysqli_query($connect,"SELECT * FROM datapelanggan ORDER BY no ASC");
                                        $cek = mysqli_num_rows($sql);
                                        if ($cek == 0) { ?>
                                          <tr>
                                            <td colspan="8" style="text-align:center;">Tidak Ditemukan Data OTB</td>
                                          </tr>
                                        <?php } else {
                                        while($hasil = mysqli_fetch_assoc($sql)) {
                                      ?>
                                    <tr>
                                        <td><?php echo $hasil['nojar']; ?></td>
                                        <td><?php echo $hasil['namapelanggan']; ?></td>
                                        <td class="center"><?php echo $hasil['alamat']; ?></td>
                                        <td class="center"><?php echo $hasil['ontgpon']; ?></td>
                                        <td class="center"><?php echo $hasil['jasa']; ?></td>
                                        <td class="center"><?php echo $hasil['bandwith']; ?></td>
                                        <td class="center"><?php echo $hasil['snmodem']; ?></td>
                                        <td class="center"><?php echo $hasil['keterangan']; ?></td>
                                    </tr>
                                    <?php $i++;
                                    }
                                    } ?>                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>