
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
          <div class="col-md-3">
            <div class="panel-sidebar">
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Profile</a></li>
                </ul>
            </div>
          </div>
          <div class="col-md-9">
          <?php foreach($blog as $p){ ?>
          <div class="row">
              <div class="col-md-8">
                <h2><?php echo $p->title;?></h2>
                <hr></hr>
                <p><?php echo (strlen($p->description) > 175)  ? substr($p->description, 0, 175) . '...' : $p->description;?></p>
                <div class="pull-right" style="padding-top:15px;">
                  <?php if($username == "admin"){?>
                    <a class="btn btn-success" href="<?php echo base_url() . "blog/edit/".$p->id;?> ">Edit News</a>
                    <a class="btn btn-danger" href="<?php echo base_url() . "blog/delete/".$p->id;?> ">Delete News</a>
                  <?php } ?>
                  <a class="btn btn-primary" href="<?php echo base_url() . "blog/detail/".$p->id;?> ">Read More</a>
                </div>
              </div>
              <div class="col-md-4">
                <a href="#" class="thumbnail">
                  <img src="<?php echo base_url()."/upload/news/".$p->gambar;?>" alt="...">
                </a>
              </div>
          </div>
          <hr/>
          <?php } ?>

          <div class="pull-right">
            <?php echo $halaman;?>
          </div>
        </div>
      </div>