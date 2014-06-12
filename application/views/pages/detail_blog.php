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

      <div class="container" style="margin-top:15px;">
        <div class="row">
          <div class="col-md-9">
            <div class="page-header">
              <h1><?php echo $detail->title;?></h1>
            </div>
            <img src="<?php echo base_url() . "upload/news/848x300" . $detail->gambar?>">
            <?php echo $detail->description;?>
          </div>

          <div class="col-md-3">
            <div class="panel-sidebar">
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Profile</a></li>
                </ul>
            </div>
          </div>
        </div>
      </div>