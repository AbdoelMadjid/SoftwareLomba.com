
<!-- Main jumbotron for a primary marketing message or call to action -->
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

      <div class="list-event">
	      	<div class="container">
	      	<?php
			  if(!empty($username) ){
				if($username == "admin"){
			  ?>
				<!--<a href="<?php echo base_url();?>event/add" id="toTop" style="display:inline" class="btn btn-primary btn-lg">Tambahkan Event</a>-->
				<button style="display:inline" id="toTop" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
				  Add Event
				</button>
				<?php
				}
			  }
			?>
	      	<?php
				foreach ($event as $row){
	 		?>
	      		<div class="col-sm-6 col-md-4">
				    <div class="thumbnail">

				      <img src="<?php echo (($row->gambar != "") ? base_url().'upload/event/'.$row->gambar : base_url().'upload/source/default-event.jpg');?>" alt="...">
				      <div class="caption">
				        <h3><a class="td-event" href="<?php echo base_url().'event/detail/'.$row->id_event;?>"><?php echo $row->event;?></a></h3>
				        <p><?php echo $row->deskripsi;?></p>
				        <p><?php if($username == "admin") { ?> <a class="btn btn-success" href="<?php echo base_url().'juri/tambah/'.$row->id_event;?>">Tambah Juri</a> <?php } ?> <?php if($username == "admin") { ?> <a class="btn btn-danger" href="<?php echo base_url().'event/delete/'.$row->id_event;?>">Delete Acara</a> <?php } ?></p>
				      </div>
				    </div>
			  	</div>
			<?php } ?>
	      	</div>
      </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel">Tambah Event</h4>
		      </div>
		      <div class="modal-body">
		        <form class="bs-example form-horizontal" action="<?php echo base_url();?>event/add" enctype='multipart/form-data' method="POST" accept-charset="utf-8">
		            <fieldset>
					  <div class="form-group">
						<label for="event_name" class="col-lg-2 control-label">Nama Event</label>
						<div class="col-lg-10">
						  <input type="text" class="form-control" id="event_name" name="event_name" placeholder="Nama Event" required autofocus>
						</div>
					  </div>
					  <div class="form-group">
						<label for="deskripsi" class="col-lg-2 control-label" required>Deksripsi</label>
						<div class="col-lg-10">
						  <textarea class="form-control" rows="3" id="deskripsi" name="deskripsi"></textarea>
						</div>
					  </div>
					  <div class="form-group">
						<label for="deskripsi" class="col-lg-2 control-label" required>Cover</label>
						<input type="file" name="image_event" class="filestyle" data-icon="false">
					  </div>
					  </fieldset>
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-primary">Buat Event</button>
		        </form>
		      </div>
		    </div>
		</div>
	</div>