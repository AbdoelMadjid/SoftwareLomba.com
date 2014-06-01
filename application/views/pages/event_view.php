
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- START THE FEATURETTES -->

      <hr class="custom-divider">

	  <?php
		foreach ($event as $row){
	  ?>
      <div class="row featurette">
        <div class="col-md-8">
          <h2><?php echo $row->event;?> <span class="text-muted"></span></h2>
          <p class="lead"><?php echo $row->deskripsi;?></p>
        </div>
        <div class="col-md-5">
          <!--<img class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="Generic placeholder image">-->
        </div>
      </div>
      <div class="row">
      	<div class="col-md-12">
      		<div class="pull-right">
      		<?php if($username == "admin") { ?> <a class="btn btn-success" href="<?php echo base_url().'juri/tambah/'.$row->id_event;?>">Tambah Juri</a> <?php } ?>
			  <a class="btn btn-info" href="<?php echo base_url().'event/detail/'.$row->id_event;?>">Detail Acara</a>
			  <?php if($username == "admin") { ?> <a class="btn btn-danger" href="<?php echo base_url().'event/delete/'.$row->id_event;?>">Delete Acara</a> <?php } ?>
		  </div>
      	</div>
	  <div class="custom-divider">
	<div class="row">
	<?php
	  if(!empty($username) ){
		if($username == "admin"){
	  ?>
		<a href="<?php echo base_url();?>event/add" class="btn btn-default btn-lg btn-block">Tambahkan Event</a>

		<?php
		}
	  }
	?>
	</div>
	</div>
      <hr class="featurette-divider">
		<?php
		} //end the loop
		?>
      <!-- /END THE FEATURETTES -->
	  