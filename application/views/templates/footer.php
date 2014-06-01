 
<!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Kembali ke atas</a></p>
        <p>&copy; 2013 www.kicaumania.or.id &middot; </p>
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>public/js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url();?>public/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>public/js/holder.js"></script>
	<link href="<?php echo base_url();?>public/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
	<script src="<?php echo base_url();?>public/bootstrap3-editable/js/bootstrap-editable.js"></script>
  </body>
</html>

<script>
$(document).ready(function() {
 //toggle `popup` / `inline` mode
    $.fn.editable.defaults.mode = 'popup';     
    
    $('#editnilai a').editable({
	type: 'text',
    name: 'nilai',
    url: '/post',
    title: 'Rubah nilai: '
	});
});

</script>