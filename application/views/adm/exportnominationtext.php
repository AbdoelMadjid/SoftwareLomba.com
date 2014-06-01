
<table border='1'>
<?php for($i = 0; $i < 3; $i++){?>
	<tr>
		<td colspan="2">Kelas</td>
		<td><?php echo $urlhelper->nama_kelas;?></td>
		<td border=0></td>
		<td colspan="2">Kelas</td>
		<td><?php echo $urlhelper->nama_kelas;?></td>
	</tr>
	<tr>
		<td colspan="2">Jenis Burung</td>
		<td><?php echo $urlhelper->jenis;?></td>
		<td border=0></td>
		<td colspan="2">Jenis Burung</td>
		<td><?php echo $urlhelper->jenis;?></td>
	</tr>
	<tr>
	</tr>
	<tr>
		<td colspan="2">Nama Juri: </td>
		<td>_________________</td>
		<td border=0></td>
		<td colspan="2">Nama Juri: </td>
		<td>_________________</td>
	</tr>
	<tr></tr>
  <tr>
	<th style="text-align:center;">No Urut</th>
	<th style="text-align:center;">Nomor Gantangan</th>
	<td></td>
	<td></td>
	<th style="text-align:center;">No Urut</th>
	<th style="text-align:center;">Nomor Gantangan</th>
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
	<td></td>
	<td></td>
	<td style="text-align:center;"><?php echo $no;?></th>
	<td style="text-align:center;"><?php echo $n->gantangan;?></th>
  </tr>
  <?php 
  $no+=1;
  }?>
  <tr></tr><tr></tr><tr></tr>
  <?php }?>

</table>