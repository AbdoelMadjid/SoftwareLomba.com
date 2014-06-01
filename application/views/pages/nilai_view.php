
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
			<li><a href="#profile" data-toggle="tab">Ranking Nominasi</a></li>
			<li><a class="active" href="#hasil" data-toggle="tab">Hasil Koncer</a></li>
		</ul>
		<div id="myTabContent" class="tab-content">
			
			<!-- TAB HASIL NOMINASI -->
			<div class="tab-pane fade" id="profile">
			<!-- TABLE NOMINASI START -->
			  <div class="bs-example table-responsive">
				  <div class="col-lg-4">
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


</script>