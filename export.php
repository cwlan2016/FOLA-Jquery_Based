<?php
include 'core.php';
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=tutorialweb-export.xls");
?>
<table border="1">
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
                                        <td><?php echo $hasil['alamat']; ?></td>
                                        <td><?php echo $hasil['ontgpon']; ?></td>
                                        <td><?php echo $hasil['jasa']; ?></td>
                                        <td><?php echo $hasil['bandwith']; ?></td>
                                        <td><?php echo $hasil['snmodem']; ?></td>
                                        <td><?php echo $hasil['keterangan']; ?></td>
                                    </tr>
                                    <?php $i++;
                                    }
                                    } ?>   
</table>