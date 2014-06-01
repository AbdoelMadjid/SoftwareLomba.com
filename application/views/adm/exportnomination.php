<?php
// We change the headers of the page so that the browser will know what sort of file is dealing with. Also, we will tell the browser it has to treat the file as an attachment which cannot be cached.

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=n-$urlhelper->nama_kelas - $urlhelper->jenis.xls");
header("Pragma: no-cache");
header("Expires: 0");

?>
<table border='1'>
<?php for($i = 0; $i < 3; $i++){?>
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
	<tr>
		<td colspan="2">Nama Juri: </td>
		<td>_________________</td>
		<td border=0></td>
	</tr>
	<tr></tr>
  <tr>
	<th style="text-align:center;">No Urut</th>
	<th style="text-align:center;">Nomor Gantangan</th>
	<th style="text-align:center;">Jumlah Pengajuan</th>
	<th style="text-align:center;">Ranking</th>
	<th style="text-align:center;">Bendera Koncer</th>
  </tr>

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
	<td style="text-align:center;"><?php echo $no;?></th>
	<td style="text-align:center;"><?php echo $n->gantangan;?></th>
	<td style="text-align:center;"><?php echo $n->jumlah_gantangan;?></th>
	<td style="text-align:center;"><?php echo $ranking;?></th>
	<td style="text-align:center;">__________</th>
  </tr>
  <?php 
  $no+=1;
  }?>
  <tr></tr><tr></tr><tr></tr>
  <?php }?>

</table>