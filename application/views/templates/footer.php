    <div class="modal fade" id="addNews" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add News</h4>
              </div>
              <div class="modal-body">
                <form class="bs-example form-horizontal" action="<?php echo base_url();?>blog/add" enctype='multipart/form-data' method="POST" accept-charset="utf-8">
                    <fieldset>
                      <div class="form-group">
                        <label for="event_name" class="col-lg-2 control-label">Title</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="title" name="title" placeholder="Title" required autofocus>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="deskripsi" class="col-lg-2 control-label" required>Content</label>
                        <div class="col-lg-10">
                          <?php echo $this->ckeditor->editor("content"); ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="deskripsi" class="col-lg-2 control-label" required>Cover</label>
                        <input type="file" name="image_news" class="filestyle" data-icon="false">
                      </div>
                      </fieldset>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Buat Berita</button>
                </form>
              </div>
            </div>
        </div>
    </div> 

    <div class="modal fade" id="addTeam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add Team</h4>
              </div>
              <div class="modal-body">
                <form class="bs-example form-horizontal" action="<?php echo base_url();?>team/add" enctype='multipart/form-data' method="POST" accept-charset="utf-8">
                    <fieldset>
                      <div class="form-group">
                        <label for="event_name" class="col-lg-2 control-label">Nama</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required autofocus>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="event_name" class="col-lg-2 control-label">Jobdesk</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="jobdesk" name="jobdesk" placeholder="Job Desk" required autofocus>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="event_name" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="email" name="email" placeholder="Email" required autofocus>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="event_name" class="col-lg-2 control-label">No. HP</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No HP." required autofocus>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="deskripsi" class="col-lg-2 control-label" required>Foto</label>
                        <input type="file" name="image_team" class="filestyle" data-icon="false">
                      </div>
                      </fieldset>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Buat Berita</button>
                </form>
              </div>
            </div>
        </div>
    </div> 
<!-- FOOTER -->
      <div class="navbar navbar-inverse navbar-static-bottom" role="navigation">
            <div class="container">
            <div class="text-center">
            <p style="color:#000;padding-top:15px">Copyright &copy; Kicau Mania . Created by <strong>Pandawa</strong> Rama Zeta signature</p>
            </div>
            </div>

      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>public/js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url();?>public/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>public/dist/js/bs-filestyle.js"></script>
    <script src="<?php echo base_url();?>public/js/holder.js"></script>
	<link href="<?php echo base_url();?>public/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
	<script src="<?php echo base_url();?>public/bootstrap3-editable/js/bootstrap-editable.js"></script>
  </body>
</html>

<script>

$("#img-logo").hover(function(){
    $("#btn-logo").slideToggle("slow").show();
}

$(document).ready(function() {
 //toggle `popup` / `inline` mode
    $.fn.editable.defaults.mode = 'popup';
    $('#editnilai a').editable({
    	type: 'text',
        name: 'nilai',
        url: '/post',
        title: 'Rubah nilai: '
    	});

    $(":file").filestyle({icon: false});
});

</script>