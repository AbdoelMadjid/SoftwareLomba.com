
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
      <!-- START THE FEATURETTES -->

      <hr class="custom-divider">

	  <ul class="breadcrumb" style="margin-bottom: 5px;">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li><a href="<?php echo base_url();?>event">Event</a></li>
                <li><a href="<?php echo base_url().'event/detail/'.$event->id_event;?>"><?php echo $event->event;?></a></li>
				<li class="active"><?php echo $kelas->nama_kelas;?></li>
              </ul>
      <!-- START THE FEATURETTES -->

		<div class="well">
		<form class="bs-example form-horizontal" action="<?php echo base_url();?>jenis/add" method="POST" accept-charset="utf-8">
            <fieldset>
			  <legend>Tambahkan jenis burung ke kelas <?php echo $kelas->nama_kelas;?></legend>
			  <div class="form-group">
				<label for="jenis" class="col-lg-2 control-label">Jenis Burung</label>
				<div class="col-lg-10">
				  <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis Burung" required autofocus>
				  <input type="hidden" id="id_kelas" name="id_kelas" value="<?php echo $kelas->id_kelas;?>">
				  <input type="hidden" id="id_event" name="id_event" value="<?php echo $event->id_event;?>">
				</div>
			  </div>
			  <div class="form-group">
				<div class="col-lg-2"></div>
					
				<div class="col-lg-10">
				  <button class="btn btn-primary" type="submit">Tambahkan Jenis</button>
				</div>
			  </div>
			  
			</fieldset>
        </form>
		</div>