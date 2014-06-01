<?php
// We change the headers of the page so that the browser will know what sort of file is dealing with. Also, we will tell the browser it has to treat the file as an attachment which cannot be cached.
/**
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=h-$urlhelper->nama_kelas - $urlhelper->jenis.xls");
header("Pragma: no-cache");
header("Expires: 0");
*/
?>

<table border='1'>
<tr>
		<td colspan="2">Kelas</td>
		<td><?php echo $urlhelper->nama_kelas;?></td>
		<td border=0></td>
	</tr>
	<tr>
		<td colspan="2">Jenis Burung</td>
		<td><?php echo $urlhelper->jenis;?></td>
		<td border=0></td>
	</tr>
	<tr></tr>
	<tr></tr>
					<thead>
					  <tr class="success">
						<th style="text-align:center;">Ranking</th>
						<th style="text-align:center;">Nomor Gantangan</th>
						<th style="text-align:center;">Jumlah Pengajuan</th>
						<th style="text-align:center;">Koncer A</th>
						<th style="text-align:center;">Koncer B</th>
						<th style="text-align:center;">Koncer C</th>
						<th style="text-align:center;">Total Nilai</th>
					  </tr>
					</thead>
					<tbody>
					<?php 
					$ranking = 0;
					$jml = 100;
					$no = 1;
					foreach($koncer as $n){ 
						if($n->jumlah_gantangan < $jml) {
							$ranking++;$jml = $n->jumlah_gantangan;
						}
					?>	
						<tr>
					
						<td style="text-align:center;"><?php echo $no;?></td>
						<td style="text-align:center;"><?php echo $n->gantangan;?></td>
						<td style="text-align:center;"><?php echo $n->jumlah_gantangan;?></td>
						<td style="text-align:center;"><?php echo $n->koncer->jumlah_koncera;?></td>
						<td style="text-align:center;"><?php echo $n->koncer->jumlah_koncerb;?></td>
						<td style="text-align:center;"><?php echo $n->koncer->jumlah_koncerc;?></td>
						<td style="text-align:center;"><?php echo $n->total_nilai;?></td>
					  </tr>
					  <?php 
					  $no+=1;
					  }?>
					</tbody>
				   </table>