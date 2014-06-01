
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

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
	
    <div class="container marketing">
		
      <!-- START THE FEATURETTES -->

      <hr class="custom-divider">

	  <ul class="breadcrumb" style="margin-bottom: 5px;">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li><a href="<?php echo base_url();?>event">Event</a></li>
                <li class="active"><?php echo $event->event;?></li>
              </ul>
      <div class="row featurette">
        <div class="col-md-7">
          <h2><?php echo $event->event;?> <span class="text-muted"></span></h2>
        </div>
        <div class="col-md-5">
          <!--<img class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="Generic placeholder image">-->
        </div>
      </div>

	  <div class="row">
	  
	  </div>
		<div class="row">
		
			<?php foreach($kelas as $kls){ ?>
			<div class="col-lg-4">
				<div class="panel panel-primary">
				  <div class="panel-heading">
					<h3 class="panel-title"><?php echo $kls->nama_kelas; ;?>
						<div class="panel-right">
						  <?php
						  if(!empty($username) ){
							if($username == "admin"){
						  ?>
							<a href="<?php echo base_url().'kelas/edit/'.$event->id_event.'/'.$kls->id_kelas;?>">
								<img alt="rubah" src="<?php echo base_url().'public/image/edit_icon.png';?>"/>
							</a>
							
							<a href="<?php echo base_url().'kelas/hapus/'.$event->id_event.'/'.$kls->id_kelas;?>" onClick="return confirmDelete()">
								<img alt="hapus" src="<?php echo base_url().'public/image/delete_icon.png';?>"/>
							</a>
							<?php }}?>
						</div>
					</h3>
				  </div>
				  <?php foreach($kls->jenis as $jenis){?>
				  <div class="panel-body">
					<a href="<?php echo base_url()."nilai/view/".$event->id_event.'/'.$jenis->id_jenis;?>"><?php echo $jenis->jenis;?></a>
					<div class="panel-right">
					  <?php
					  if(!empty($username) ){
						if($username == "admin"){
					  ?>
						<a href="<?php echo base_url().'jenis/edit/'.$event->id_event.'/'.$jenis->id_jenis;?>">
							<img alt="rubah" src="<?php echo base_url().'public/image/edit_icon.png';?>"/>
						</a>
						<a href="<?php echo base_url().'jenis/hapus/'.$event->id_event.'/'.$jenis->id_jenis;?>" onClick="return confirmDelete()">
							<img alt="hapus" src="<?php echo base_url().'public/image/delete_icon.png';?>"/>
						</a>
						<?php }}?>
					</div>
				  </div>
				  <?php }?>
				    <?php
				  if(!empty($username) ){
					if($username == "admin"){
				  ?>
				  <a href="<?php echo base_url().'jenis/add/'.$event->id_event.'/'.$kls->id_kelas;?>">Tambahkan Jenis</a>
				  <?php }} ?>
				</div>
			</div>
			<?php }?>
		</div>
		

      <hr class="custom-divider">
	
      <!-- /END THE FEATURETTES -->
	  <?php
	  if(!empty($username) ){
		if($username == "admin"){
	  ?>
		<a href="<?php echo base_url().'kelas/add/'.$event->id_event;?>" class="btn btn-default btn-lg btn-block">Tambahkan Kelas</a>
		<?php
		}
	  }
	?>
	
