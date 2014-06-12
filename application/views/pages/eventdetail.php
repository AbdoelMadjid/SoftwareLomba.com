<script>
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
	<section class="splash">
      <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
              <div class="row">
              <div class="col-lg-6 col-lg-offset-3">
               <a href="<?php echo base_url();?>"><img class="logo-header" src="http://localhost/lomba/public/image/logo_header.png"/></a>
              </div>
              </div>
            </div>
          </div>
        </div>
      </section>

     
	      <div class="container">
	      		<ul class="breadcrumb" style="margin-top:15px;margin-bottom: 5px;">
	                <li><a href="<?php echo base_url();?>">Home</a></li>
	                <li><a href="<?php echo base_url();?>event">Event</a></li>
	                <li class="active"><?php echo $event->event;?></li>
              	</ul>
	      </div>
    
      

      	<div class="container">
      		<div class="page-header">
      			<h1><?php echo $event->event;?> <?php
		  if(!empty($username) ){
			if($username == "admin"){
		  ?>
			<button data-toggle="modal" data-target="#addKelas" class="pull-right btn btn-primary btn-lg">Tambahkan Kelas</button>
			<?php
			}
		  }
		?></h1>
      		</div>
      	</div>

      	<div class="container">
      		<?php foreach($kelas as $kls){ ?>
			<div class="col-md-4">
				<div class="panel panel-primary">
				  <div class="panel-heading">
				  	<?php echo $kls->nama_kelas; ;?>
						<?php
						  	if(!empty($username) ){
								if($username == "admin"){
						?>
								<div class="pull-right">
									<a href="<?php echo base_url().'kelas/edit/'.$event->id_event.'/'.$kls->id_kelas;?>">
										<span style="color:#F7CA18" class="glyphicon glyphicon-edit"></span>
									</a>
									<a href="<?php echo base_url().'kelas/hapus/'.$event->id_event.'/'.$kls->id_kelas;?>" onClick="return confirmDelete()">
										<span style="color:#CF000F;" class="glyphicon glyphicon-remove"></span>
									</a>
								</div>
								<?php }
							}?>
				  </div>
				  <?php foreach($kls->jenis as $jenis){?>
				  <div class="panel-body">
					<a href="<?php echo base_url()."nilai/view/".$event->id_event.'/'.$jenis->id_jenis;?>"><?php echo $jenis->jenis;?></a>
					<div class="pull-right">
					  <?php
					  if(!empty($username) ){
						if($username == "admin"){
					  ?>
						<a href="<?php echo base_url().'jenis/edit/'.$event->id_event.'/'.$jenis->id_jenis;?>">
							<span style="color:#F7CA18" class="glyphicon glyphicon-edit"></span>
						</a>
						<a href="<?php echo base_url().'jenis/hapus/'.$event->id_event.'/'.$jenis->id_jenis;?>" onClick="return confirmDelete()">
							<span style="color:#CF000F;" class="glyphicon glyphicon-remove"></span>
						</a>
						<?php }}?>
					</div>
				  </div>
				  
					  <?php }?>
					    <?php
					  if(!empty($username) ){
						if($username == "admin"){
					  ?>
					  <div class="panel-footer">
					  	<button data-toggle="modal" data-target="#addJenis" class="btn btn-success btn-block">Tambahkan Jenis</button>
					  </div>
					  <div class="modal fade" id="addJenis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">Tambahkan Kelas dalam event <?php echo $event->event;?></h4>
						      </div>
						      <div class="modal-body">
									<form class="bs-example form-horizontal" action="<?php echo base_url();?>jenis/add" method="POST" accept-charset="utf-8">
							            <fieldset>
										  <legend>Tambahkan jenis burung</legend>
										  <div class="form-group">
											<label for="jenis" class="col-lg-2 control-label">Jenis Burung</label>
											<div class="col-lg-10">
											  <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis Burung" required autofocus>
											  <input type="hidden" id="id_kelas" name="id_kelas" value="<?php echo $kls->id_kelas;?>">
											  <input type="hidden" id="id_event" name="id_event" value="<?php echo $event->id_event;?>">
											</div>
										  </div>
										</fieldset>
						      </div>
						      <div class="modal-footer">
						        <button type="submit" class="btn btn-primary">Add Jenis</button>
						        </form>
						        </form>
						      </div>
						    </div>
						</div>
					</div>
					  <?php }} ?>
				</div>
			</div>
			<?php }?>
      	</div>

      	<div class="modal fade" id="addKelas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title" id="myModalLabel">Tambahkan Kelas dalam event <?php echo $event->event;?></h4>
			      </div>
			      <div class="modal-body">
						<form class="bs-example form-horizontal" action="<?php echo base_url();?>kelas/add" method="POST" accept-charset="utf-8">
				            <fieldset>
							  <div class="form-group">
								<label for="class_name" class="col-lg-2 control-label">Nama Kelas</label>
								<div class="col-lg-10">
								  <input type="text" class="form-control" id="class_name" name="class_name" placeholder="Nama Kelas" required autofocus>
								  <input type="hidden" id="id_event" name="id_event" value="<?php echo $event->id_event;?>">
								</div>
							  </div> 
							</fieldset>
			      </div>
			      <div class="modal-footer">
			        <button type="submit" class="btn btn-primary">Add Kelas</button>
			        </form>
			      </div>
			    </div>
			</div>
		</div>
