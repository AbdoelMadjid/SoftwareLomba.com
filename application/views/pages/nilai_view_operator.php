
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
	
    <div class="container marketing">
		
      <!-- START THE FEATURETTES -->

      <hr class="custom-divider">

	  <ul class="breadcrumb" style="margin-bottom: 5px;">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li><a href="<?php echo base_url();?>event">Event</a></li>
				<li><a href="<?php echo base_url().'event/detail/'.$urlhelper->id_event.'">'.$urlhelper->event;?></a></li>
				<li class="active"><a href="<?php echo base_url().'event/detail/'.$urlhelper->id_event.'">'.$urlhelper->nama_kelas;?></a></li>
				<li class="active"><a href="<?php echo base_url().'event/detail/'.$urlhelper->id_event.'">'.$urlhelper->jenis;?></a></li>
              </ul>
      <div class="row featurette">
        <div class="col-md-7">
          <h3>Pengajuan Nominasi <?php echo $urlhelper->event;?> <span class="text-muted"></span></h3>
		  <h4>Kelas : <?php echo $urlhelper->nama_kelas;?> | Jenis Burung : <?php echo $urlhelper->jenis;?><span class="text-muted"></span></h3>
        </div>
      </div>

	  <div class="row">
		<ul class="nav nav-tabs" style="margin-bottom: 15px;">
			<li class="active"><a href="#home" data-toggle="tab">Pengajuan Nominasi</a></li>
			<li><a href="#profile" data-toggle="tab">Ranking Nominasi</a></li>
			
			<li <?php 
			if($jenis->koncer_dibuka == 0){
			echo "class='disabled'";
			}
			?>><a href="#koncer" data-toggle="tab">Koncer</a></li>
			<li <?php 
			if($jenis->koncer_dibuka == 0){
			echo "class='disabled'";
			}
			?>><a href="#hasil" data-toggle="tab">Hasil Koncer</a></li>
		</ul>
		<div id="myTabContent" class="tab-content">
			<div class="tab-pane fade active in" id="home">
			
			<!-- TABLE START -->
			  <div class="bs-example table-responsive">
              <table id="editnilai" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr class="success">
                    <th width='70px'>Kode Juri</th>
                    <th width='200px'>Nama</th>
					
					<?php
					for($i = 1; $i <= 15; $i++)
					echo "<th width='38px'>$i</th>";
                    ?>
                  </tr>
                </thead>
                <tbody>
				<!-- NILAI PENGAWAS -->
                  <tr class="warning">
                    <td colspan="17">Pengawas</td>
                  </tr>
				  <?php
				  $count = 1;
				  foreach($pengawas as $p){
				  ?>
                  <tr>
                    <td><?php echo "P$count";?></td>
                    <td><a href="#" id="editnama" data-pk="<?php echo $p->id_juri;?>"><?php echo $p->nama;?></a></td>
					<?php foreach($p->nilai as $n) { ?>
					<td>
						<a href="#" id="edit" data-pk="<?php echo $n->id_nilai;?>"><?php echo $n->gantangan;?></a>
					</td>
                    <?php } ?>
                  </tr>
				  <?php $count+=1;} ?>

				 
				 <!-- Inspektur PELAKSANA -->
                  <tr class="warning">
                    <td colspan="17">Inspektur Pelaksana</td>
                  </tr>
					  <?php
					  $count = 1;
					  foreach($inspektur as $p){
					  ?>
					  <tr>
						<td><?php echo "IP	$count";?></td>
						<td><a href="#" id="editnama" data-pk="<?php echo $p->id_juri;?>"><?php echo $p->nama;?></a></td>
						<?php foreach($p->nilai as $n) { ?>
						<td>
							<a href="#" id="edit" data-pk="<?php echo $n->id_nilai;?>"><?php echo $n->gantangan;?></a>
						</td>
						<?php } ?>
					  </tr>
					  <?php $count+=1;} ?>
				 
				  
				  <!-- Koordinator Lapangan-->
                  <tr class="warning">
                    <td colspan="17">Koordinator Lapangan</td>
                  </tr>
					 <?php
					  $count = 1;
					  foreach($korlap as $p){
					  ?>
					  <tr>
						<td><?php echo "K$count";?></td>
						<td><a href="#" id="editnama" data-pk="<?php echo $p->id_juri;?>"><?php echo $p->nama;?></a></td>
						<?php foreach($p->nilai as $n) { ?>
							<td>
								<a href="#" id="edit" data-pk="<?php echo $n->id_nilai;?>"><?php echo $n->gantangan;?></a>
							</td>
						<?php } ?>
					  </tr>
					  <?php $count+=1;} ?>
				 
				  
				  <!-- Juri -->
                  <tr class="warning">
                    <td colspan="17">Juri</td>
                  </tr>
					  <?php
					  $count = 1;
					  foreach($juri as $p){
					  ?>
					  <tr>
						<td><?php echo "J$count";?></td>
						<td><a href="#" id="editnama" data-pk="<?php echo $p->id_juri;?>"><?php echo $p->nama;?></a></td>
						<?php foreach($p->nilai as $n) { ?>
							<td>
								<a href="#" id="edit" data-pk="<?php echo $n->id_nilai;?>"><?php echo $n->gantangan;?></a>
							</td>
						<?php } ?>
					  </tr>
					  <?php $count+=1;} ?>
				 
                </tbody>
              </table>
            </div>
			<!-- TABLE END -->
			</div>
			<!-- TAB HASIL NOMINASI -->
			<div class="tab-pane fade" id="profile">
			<!-- TABLE NOMINASI START -->
				
			  <div class="bs-example table-responsive">
					
				  <div class="col-lg-4">
				  
				  <a href="<?php echo base_url()."nilai/export_nominasi/".$urlhelper->id_jenis;?>" target="_BLANK">Export ke excel</a>
				  <table id="datanominasi" class="table table-striped table-bordered table-hover">
					<thead>
					  <tr class="success">
						<th style="text-align:center;">No Urut</th>
						<th style="text-align:center;">Nomor Gantangan</th>
						<th style="text-align:center;">Jumlah Pengajuan</th>
						<th style="text-align:center;">Ranking</th>
					  </tr>
					</thead>
					<tbody>
					<?php 
					$ranking = 0;
					$jml = 100;
					$no = 1;
					foreach($nominasi as $n){ 
						if($n->jumlah_gantangan < $jml) {
							$ranking++;$jml = $n->jumlah_gantangan;
						}
						
						if($no <= $jenis->jumlah_koncer){
							echo "<tr class='warning'>";
						}else{
							echo "<tr>";
						}
					?>
					  
						<td style="text-align:center;"><?php echo $no;?></th>
						<td style="text-align:center;"><?php echo $n->gantangan;?></th>
						<td style="text-align:center;"><?php echo $n->jumlah_gantangan;?></th>
						<td style="text-align:center;"><?php echo $ranking;?></th>
					  </tr>
					  <?php 
					  $no+=1;
					  }?>
					</tbody>
				   </table>
				   
				   
				   <!--MEMBUKA KONCER-->
				   <div class="row">
					<label class="lead">
						<?php
							if($jenis->koncer_dibuka != 0){
							echo "Tahap koncer telah dibuka untuk $jenis->jumlah_koncer peserta";
							}else{
							echo "Tahap koncer belum dibuka";
							}
						?>
					</label>
				   </div>
				   
				  </div>
				  <div class="col-lg-8">
				  <!--CHART NOMINASI-->
					<div id="nominasichart" style="margin: 0 auto"></div>
				  </div>
			</div>
		  </div>
		  
		  <!-- TAB KONCER -->
		  <div class="tab-pane fade" id="koncer">
			
			<!-- TABLE START -->
			  <div class="bs-example table-responsive">
              <table id="editnilai" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr class="success">
                    <th width='70px'>Kode Juri</th>
                    <th width='200px'>Nama</th>
					
					<?php
					
					echo "<th>Koncer A</th>";
					echo "<th>Koncer B</th>";
					echo "<th>Koncer C</th>";
                    ?>
                  </tr>
                </thead>
                <tbody>
				<!-- NILAI PENGAWAS -->
                  <tr class="warning">
                    <td colspan="5">Pengawas</td>
                  </tr>
				  <?php
				  $count = 1;
				  foreach($pengawas as $p){
				  ?>
                  <tr>
                    <td><?php echo "P$count";?></td>
                    <td><?php echo $p->nama;?></td>
					<td>
						<a href="#" id="editkoncera" data-type="select" data-pk="<?php echo $p->koncer->id_koncer;?>"
						data-value="0" 
						data-source="<?php echo base_url()."nilai/list_koncer/".$urlhelper->id_jenis."/".$jenis->jumlah_koncer;?>" 
						data-title="Pilih koncer" class="editable editable-click" data-original-title="" 
						title="" style="background-color: rgba(0, 0, 0, 0);"><?php echo $p->koncer->koncera;?></a>						
					</td>
                    <td>
						<a href="#" id="editkoncerb" data-type="select" data-pk="<?php echo $p->koncer->id_koncer;?>"
						data-value="0" 
						data-source="<?php echo base_url()."nilai/list_koncer/".$urlhelper->id_jenis."/".$jenis->jumlah_koncer;?>" 
						data-title="Pilih koncer" class="editable editable-click" data-original-title="" 
						title="" style="background-color: rgba(0, 0, 0, 0);"><?php echo $p->koncer->koncerb;?></a>
					</td>
					<td>
						<a href="#" id="editkoncerc" data-type="select" data-pk="<?php echo $p->koncer->id_koncer;?>"
						data-value="0" 
						data-source="<?php echo base_url()."nilai/list_koncer/".$urlhelper->id_jenis."/".$jenis->jumlah_koncer;?>" 
						data-title="Pilih koncer" class="editable editable-click" data-original-title="" 
						title="" style="background-color: rgba(0, 0, 0, 0);"><?php echo $p->koncer->koncerc;?></a>
					</td>
                  </tr>
				  <?php $count+=1;} ?>
				 
				 <!-- Inspektur PELAKSANA -->
                  <tr class="warning">
                    <td colspan="5">Inspektur Pelaksana</td>
                  </tr>
					  <?php
					  $count = 1;
					  foreach($inspektur as $p){
					  ?>
					  <tr>
						<td><?php echo "IP$count";?></td>
						<td><?php echo $p->nama;?></td>
						<td>
							<a href="#" id="editkoncera" data-type="select" data-pk="<?php echo $p->koncer->id_koncer;?>"
							data-value="0" 
							data-source="<?php echo base_url()."nilai/list_koncer/".$urlhelper->id_jenis."/".$jenis->jumlah_koncer;?>" 
							data-title="Pilih koncer" class="editable editable-click" data-original-title="" 
							title="" style="background-color: rgba(0, 0, 0, 0);"><?php echo $p->koncer->koncera;?></a>						
						</td>
						<td>
							<a href="#" id="editkoncerb" data-type="select" data-pk="<?php echo $p->koncer->id_koncer;?>"
							data-value="0" 
							data-source="<?php echo base_url()."nilai/list_koncer/".$urlhelper->id_jenis."/".$jenis->jumlah_koncer;?>" 
							data-title="Pilih koncer" class="editable editable-click" data-original-title="" 
							title="" style="background-color: rgba(0, 0, 0, 0);"><?php echo $p->koncer->koncerb;?></a>
						</td>
						<td>
							<a href="#" id="editkoncerc" data-type="select" data-pk="<?php echo $p->koncer->id_koncer;?>"
							data-value="0" 
							data-source="<?php echo base_url()."nilai/list_koncer/".$urlhelper->id_jenis."/".$jenis->jumlah_koncer;?>" 
							data-title="Pilih koncer" class="editable editable-click" data-original-title="" 
							title="" style="background-color: rgba(0, 0, 0, 0);"><?php echo $p->koncer->koncerc;?></a>
						</td>
					  </tr>
					  <?php $count+=1;} ?>
				  <tr>
                  </tr>
				  
				  <!-- Koordinator Lapangan-->
                  <tr class="warning">
                    <td colspan="5">Koordinator Lapangan</td>
                  </tr>
					 <?php
					  $count = 1;
					  foreach($korlap as $p){
					  ?>
					  <tr>
						<td><?php echo "K$count";?></td>
						<td><?php echo $p->nama;?></td>
						<td>
							<a href="#" id="editkoncera" data-type="select" data-pk="<?php echo $p->koncer->id_koncer;?>"
							data-value="0" 
							data-source="<?php echo base_url()."nilai/list_koncer/".$urlhelper->id_jenis."/".$jenis->jumlah_koncer;?>" 
							data-title="Pilih koncer" class="editable editable-click" data-original-title="" 
							title="" style="background-color: rgba(0, 0, 0, 0);"><?php echo $p->koncer->koncera;?></a>						
						</td>
						<td>
							<a href="#" id="editkoncerb" data-type="select" data-pk="<?php echo $p->koncer->id_koncer;?>"
							data-value="0" 
							data-source="<?php echo base_url()."nilai/list_koncer/".$urlhelper->id_jenis."/".$jenis->jumlah_koncer;?>" 
							data-title="Pilih koncer" class="editable editable-click" data-original-title="" 
							title="" style="background-color: rgba(0, 0, 0, 0);"><?php echo $p->koncer->koncerb;?></a>
						</td>
						<td>
							<a href="#" id="editkoncerc" data-type="select" data-pk="<?php echo $p->koncer->id_koncer;?>"
							data-value="0" 
							data-source="<?php echo base_url()."nilai/list_koncer/".$urlhelper->id_jenis."/".$jenis->jumlah_koncer;?>" 
							data-title="Pilih koncer" class="editable editable-click" data-original-title="" 
							title="" style="background-color: rgba(0, 0, 0, 0);"><?php echo $p->koncer->koncerc;?></a>
						</td>
					  </tr>
					  <?php $count+=1;} ?>
				
				  
				  <!-- Juri -->
                  <tr class="warning">
                    <td colspan="5">Juri</td>
                  </tr>
					  <?php
					  $count = 1;
					  foreach($juri as $p){
					  ?>
					  <tr>
						<td><?php echo "J$count";?></td>
						<td><?php echo $p->nama;?></td>
						<td>
							<a href="#" id="editkoncera" data-type="select" data-pk="<?php echo $p->koncer->id_koncer;?>"
							data-value="0" 
							data-source="<?php echo base_url()."nilai/list_koncer/".$urlhelper->id_jenis."/".$jenis->jumlah_koncer;?>" 
							data-title="Pilih koncer" class="editable editable-click" data-original-title="" 
							title="" style="background-color: rgba(0, 0, 0, 0);"><?php echo $p->koncer->koncera;?></a>						
						</td>
						<td>
							<a href="#" id="editkoncerb" data-type="select" data-pk="<?php echo $p->koncer->id_koncer;?>"
							data-value="0" 
							data-source="<?php echo base_url()."nilai/list_koncer/".$urlhelper->id_jenis."/".$jenis->jumlah_koncer;?>" 
							data-title="Pilih koncer" class="editable editable-click" data-original-title="" 
							title="" style="background-color: rgba(0, 0, 0, 0);"><?php echo $p->koncer->koncerb;?></a>
						</td>
						<td>
							<a href="#" id="editkoncerc" data-type="select" data-pk="<?php echo $p->koncer->id_koncer;?>"
							data-value="0" 
							data-source="<?php echo base_url()."nilai/list_koncer/".$urlhelper->id_jenis."/".$jenis->jumlah_koncer;?>" 
							data-title="Pilih koncer" class="editable editable-click" data-original-title="" 
							title="" style="background-color: rgba(0, 0, 0, 0);"><?php echo $p->koncer->koncerc;?></a>
						</td>
					  </tr>
					  <?php $count+=1;} ?>				  
                </tbody>
              </table>
            </div>
			<!-- TABLE END -->
			</div>
			
			<!-- TAB HASIL KONCER -->
			<div class="tab-pane fade" id="hasil">
			<!-- TABLE NOMINASI START -->
				
			  <div class="bs-example table-responsive">
					
				  <div class="col-lg-4">
				  
				  <!--<a href="<?php echo base_url()."nilai/export_nominasi/".$urlhelper->id_jenis;?>" target="_BLANK">Export ke excel</a>-->
				  <table id="datanominasi" class="table table-striped table-bordered table-hover">
					<thead>
					  <tr class="success">
						<th style="text-align:center;">Juara</th>
						<th style="text-align:center;">Nomor Gantangan</th>
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
					
				  </div>
				 
			</div>
		  </div>
	  </div>
      
	 </div>
	
	
<!-- FOOTER -->
	<div class="row">
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2013 Kicau Mania &middot; </p>
      </footer>
	</div>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>public/js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url();?>public/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>public/js/holder.js"></script>
	<link href="<?php echo base_url();?>public/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
	<script src="<?php echo base_url();?>public/bootstrap3-editable/js/bootstrap-editable.js"></script>
	<script src="<?php echo base_url();?>public/js/highcharts.js"></script>
	<script src="<?php echo base_url();?>public/js/exporting.js"></script>
  </body>
</html>

<script>
$(document).ready(function() {
 //toggle `popup` / `inline` mode
    $.fn.editable.defaults.mode = 'popup';     
    
    $('#editnilai #edit').editable({
	type: 'text',
    name: 'nilai',
    url: '<?php echo base_url()."nilai/edit";?>',
    title: 'Rubah gantangan: '
	});
	
	$('#editnilai #editkoncera').editable({
	type: 'text',
    name: 'koncera',
    url: '<?php echo base_url()."nilai/editkoncer/koncera";?>',
    title: 'Rubah koncer: '
	});
	
	$('#editnilai #editkoncerb').editable({
	type: 'text',
    name: 'koncerb',
    url: '<?php echo base_url()."nilai/editkoncer/koncerb";?>',
    title: 'Rubah koncer: '
	});
	
	$('#editnilai #editkoncerc').editable({
	type: 'text',
    name: 'koncerc',
    url: '<?php echo base_url()."nilai/editkoncer/koncerc";?>',
    title: 'Rubah koncer: '
	});
	
    $('#editnilai #editnama').editable({
	type: 'text',
    name: 'nama',
    url: '<?php echo base_url()."juri/edit";?>',
    title: 'Rubah Nama: '
	});
	
	$('#nominasichart').highcharts({
            chart: {
                type: 'bar', 
                height: 800
            },
            title: {
                text: 'Hasil Nominasi'
            },
            xAxis: {
				title:{text: "Gantangan"},
                categories: [
				<?php
				$size = count($nominasi);
				for($j = 0; $j < $size; $j++){
				$gantangan = $nominasi[$j]->gantangan;
					
					echo "'$gantangan'";
					if($j < $size-1)echo ",";
				}
				?>
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Pengajuan'
                }
            },
			  plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                enabled: false
            },			
            tooltip: {
				headerFormat: 'Gantangan <b>{point.x}</b><br/>',
                pointFormat: 'Jumlah pengajuan sebanyak <b>{point.y}</b>',
            },
            series: [{
                name: 'Pengajuan',
                data: [
					<?php
						$size = count($nominasi);
						for($j = 0; $j < $size; $j++){
						$jml = $nominasi[$j]->jumlah_gantangan;
							
							echo "$jml";
							if($j < $size-1)echo ",";
						}
					?>
				]
            }]
        });
});

function confirmDelete()
{
var x;
var r=confirm("Yakin akan menghapus?");
if (r==true)
  {
  
  }else{
  return false;
  }
}

</script>