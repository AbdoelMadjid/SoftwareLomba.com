
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
      <!-- START THE FEATURETTES -->

      <hr class="custom-divider">

	  <ul class="breadcrumb" style="margin-bottom: 5px;">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li><a href="<?php echo base_url().'event/detail/'.$id_event;?>">Event</a></li>
				<li class="active">Edit Kelas</li>
              </ul>
      <!-- START THE FEATURETTES -->

		<div class="well">
		<form class="bs-example form-horizontal" action="<?php echo base_url()."kelas/edit/".$id_event."/".$kelas->id_kelas;?>" method="POST" accept-charset="utf-8">
            <fieldset>
			  <legend>Rubah Nama Kelas</legend>
			  <div class="form-group">
				<label for="class_name" class="col-lg-2 control-label">Nama Kelas</label>
				<div class="col-lg-10">
				  <input type="text" class="form-control" id="nama_kelas" 
				  name="nama_kelas" value="<?php echo $kelas->nama_kelas;?>" placeholder="Nama Kelas" required autofocus>
				  <input type="hidden" id="id_kelas" name="id_kelas" value="<?php echo $kelas->id_kelas;?>">
				</div>
			  </div>
			  <div class="form-group">
				<div class="col-lg-2"></div>
					
				<div class="col-lg-10">
				  <button class="btn btn-primary" type="submit">Rubah Kelas</button>
				</div>
			  </div>
			  
			</fieldset>
        </form>
		</div>