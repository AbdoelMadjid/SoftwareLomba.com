<div class="container">
<div class="tab-pane fade active in" id="home">
			
			<!-- TABLE START -->
			  <div class="bs-example table-responsive">
              <table id="editnilai" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr class="success">
                    <th width='70px'>Kode Juri</th>
                    <th width='200px'>Nama</th>
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
                  </tr>
				  <?php $count+=1;} ?>
				  <tr>
                    <td colspan="17">
					<a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalPengawas">Tambahkan Pengawas</button>
					</td>
                  </tr>
				 
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
					  </tr>
					  <?php $count+=1;} ?>
				  <tr>
                    <td colspan="17">
					<a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalInspektur">Tambahkan Inspektur Pelaksana</button>
					</td>
                  </tr>
				  
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
					  </tr>
					  <?php $count+=1;} ?>
				  <tr>
                    <td colspan="17">
					<a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalKorlap">Tambahkan KorLap</button>
					</td>
                  </tr>
				  
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
					  </tr>
					  <?php $count+=1;} ?>
				  <tr>
                    <td colspan="17">
					<a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalJuri">Tambahkan Juri</button>
					</td>
                  </tr>
                </tbody>
              </table>
            </div>
			<!-- TABLE END -->
			</div>
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