	<div class="container" style="padding-top:80px;">
			<!-- TABLE START -->
			  <div class="bs-example table-responsive">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr class="success">
                    <th width='70px'>Kode Juri</th>
                    <th width='200px'>Nama</th>
                  </tr>
                </thead>
                <tbody>
				   <!-- Pengawas -->
	                  <tr class="warning">
	                    <td colspan="2">Pengawas <button class="pull-right btn btn-primary btn-xs" data-toggle="modal" data-target="#modalPengawas">Tambahkan Pengawas</button></td> 
	                  </tr>
						  <?php
						  if($pengawas == null){
						  	echo '
						  	<tr>
								<td colspan="2" class="text-center"> <strong>--- Belum ada Data ---</strong></td>
						  	</tr>';
						  } else {
						  $count = 1;
						  foreach($pengawas as $p){
						  ?>
						  <tr>
							<td><?php echo "P$count";?></td>
							<td><a href="#" id="editnama" data-pk="<?php echo $p->id_juri;?>"><?php echo $p->nama;?></a></td>

						  </tr>
						  <?php $count+=1;} }?>

					 <!-- Inspektur Pelaksana -->
	                  <tr class="warning">
	                    <td colspan="2">Inspektur Pelaksana <button class="pull-right btn btn-primary btn-xs" data-toggle="modal" data-target="#modalInspektur">Tambahkan Inspektur</button></td>
	                  </tr>
						  <?php
						  if($inspektur == null){
						  	echo '
						  	<tr>
								<td colspan="2" class="text-center"> <strong>--- Belum ada Data ---</strong></td>
						  	</tr>';
						  } else {
						  $count = 1;
						  foreach($inspektur as $p){
						  ?>
						  <tr>
							<td><?php echo "IP$count";?></td>
							<td><a href="#" id="editnama" data-pk="<?php echo $p->id_juri;?>"><?php echo $p->nama;?></a></td>
						  </tr>
						  <?php $count+=1;} }?>

					<!-- Koordinator Lapangan -->
	                  <tr class="warning">
	                    <td colspan="2">Koordinator Lapangan <button class="pull-right btn btn-primary btn-xs" data-toggle="modal" data-target="#modalKorlap">Tambahkan Koordinator</button></td>
	                  </tr>
						  <?php
						  if($korlap == null){
						  	echo '
						  	<tr>
								<td colspan="2" class="text-center"> <strong>--- Belum ada Data ---</strong></td>
						  	</tr>';
						  } else {
						  $count = 1;
						  foreach($korlap as $p){
						  ?>
						  <tr>
							<td><?php echo "K$count";?></td>
							<td><a href="#" id="editnama" data-pk="<?php echo $p->id_juri;?>"><?php echo $p->nama;?></a></td>
						  </tr>
						  <?php $count+=1;} }?>

					  <!-- Juri -->
	                  <tr class="warning">
	                    <td colspan="2">Juri <button class="pull-right btn btn-primary btn-xs" data-toggle="modal" data-target="#modalJuri">Tambahkan Juri</button></td>
	                  </tr>

						  <?php
						  if($juri == null){
						  	echo '
						  	<tr>
								<td colspan="2" class="text-center"> <strong>--- Belum ada Data ---</strong></td>
						  	</tr>';
						  } else {
						  $count = 1;
						  foreach($juri as $p){
						  ?>
						  <tr>
							<td><?php echo "A$count";?></td>
							<td><a href="#" id="editnama" data-pk="<?php echo $p->id_juri;?>"><?php echo $p->nama;?></a></td>
						  </tr>
						  <?php $count+=1;} }?>
                </tbody>
              </table>
            </div>
			<!-- TABLE END -->
			</div>

<!-- Modal Pengawas -->
	<div class="modal fade" id="modalPengawas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		 <form class="bs-example form-horizontal" action="<?php echo base_url();?>juri/add" method="POST" accept-charset="utf-8">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel">Tambah Pengawas</h4>
		  </div>
		  <div class="modal-body">
			  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pengawas" required autofocus>
			  <input type="hidden" id="tipe_juri" name="tipe_juri" value="1">
			  <input type="hidden" id="id_event" name="id_event" value="<?php echo $this->uri->segment(3)?>">
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
			<button type="submit" class="btn btn-primary">Tambahkan</button>
		  </div>
		 </form>
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<!-- Modal INSPEKTUR -->
	<div class="modal fade" id="modalInspektur" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		 <form class="bs-example form-horizontal" action="<?php echo base_url();?>juri/add" method="POST" accept-charset="utf-8">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel">Tambah Inspektur Pelaksana</h4>
		  </div>
		  <div class="modal-body">
			  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Inspektur Pelaksana" required autofocus>
			  <input type="hidden" id="tipe_juri" name="tipe_juri" value="2">
			  <input type="hidden" id="id_event" name="id_event" value="<?php echo $this->uri->segment(3)?>">
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
			<button type="submit" class="btn btn-primary">Tambahkan</button>
		  </div>
		 </form>
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
      <!-- Modal KORLAP -->
	<div class="modal fade" id="modalKorlap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		 <form class="bs-example form-horizontal" action="<?php echo base_url();?>juri/add" method="POST" accept-charset="utf-8">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel">Tambah Koordinator Lapangan</h4>
		  </div>
		  <div class="modal-body">
			  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Korlap" required autofocus>
			  <input type="hidden" id="tipe_juri" name="tipe_juri" value="3">
			  <input type="hidden" id="id_event" name="id_event" value="<?php echo $this->uri->segment(3)?>">
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
			<button type="submit" class="btn btn-primary">Tambahkan</button>
		  </div>
		 </form>
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	
	<!-- Modal JURI -->
	<div class="modal fade" id="modalJuri" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		 <form class="bs-example form-horizontal" action="<?php echo base_url();?>juri/add" method="POST" accept-charset="utf-8">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel">Tambah Juri</h4>
		  </div>
		  <div class="modal-body">
			  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Juri" required autofocus>
			  <input type="hidden" id="tipe_juri" name="tipe_juri" value="4">
			  <input type="hidden" id="id_event" name="id_event" value="<?php echo $this->uri->segment(3)?>">
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
			<button type="submit" class="btn btn-primary">Tambahkan</button>
		  </div>
		 </form>
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<div class="navbar navbar-inverse navbar-static-bottom" style="margin-top:152px" role="navigation">
            <div class="container">
            <div class="text-center">
            <p style="color:#000;padding-top:15px">Copyright &copy; Kicau Mania . Created by <strong>Pandawa</strong> Rama Zeta signature</p>
            </div>
            </div>

      </div>


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