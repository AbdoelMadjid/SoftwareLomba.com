
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">
		<div class="well">
		<form class="bs-example form-horizontal" action="<?php echo base_url();?>event/add" method="POST" accept-charset="utf-8">
            <fieldset>
			  <legend>Tambahkan Event</legend>
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
				<div class="col-lg-2"></div>
					
				<div class="col-lg-10">
				  <button class="btn btn-primary" type="submit">Tambahkan Event</button>
				</div>
			  </div>
			  
			</fieldset>
        </form>
		</div>