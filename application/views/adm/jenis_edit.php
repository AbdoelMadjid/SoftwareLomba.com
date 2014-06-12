		<div class="container" style="margin-top:75px">
	      	<ul class="breadcrumb" style="margin-top:15px;margin-bottom: 5px;">
	            <li><a href="<?php echo base_url();?>">Home</a></li>
                <li><a href="<?php echo base_url().'event/detail/'.$id_event;?>">Event</a></li>
				<li class="active">Rubah Jenis</li>
            </ul>
	    </div>
      
      <div class="container" style="margin-top:15px;margin-bottom:240px;">
      	<div class="well">
	      	<form class="bs-example form-horizontal" action="<?php echo base_url()."jenis/edit/".$id_event."/".$jenis->id_jenis;?>" method="POST" accept-charset="utf-8">
	            <fieldset>
				  <legend>Rubah Nama Jenis</legend>
				  <div class="form-group">
					<label for="jenis" class="col-lg-2 control-label">Jenis Burung</label>
					<div class="col-lg-10">
					  <input type="text" class="form-control" value="<?php echo $jenis->jenis;?>" id="jenis" name="jenis" placeholder="Jenis Burung" required autofocus>
					  <input type="hidden" id="id_jenis" name="id_jenis" value="<?php echo $jenis->id_jenis;?>">
					  <input type="hidden" id="id_event" name="id_event" value="<?php echo $id_event;?>">
					</div>
				  </div>
				  <div class="form-group pull-right">
					<div class="col-lg-12">
					  <button class="btn btn-primary" type="submit">Rubah Jenis</button>
					</div>
				  </div>
				  
				</fieldset>
        	</form>
	    </div>
      </div>