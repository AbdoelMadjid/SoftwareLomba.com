
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

      <section class="container bagian-home about-section">
        <div class="row">
          <div class="col-md-6">
            <img class="img-about" src="<?php echo base_url()."public/image/about-image.png";?>" alt="Generic placeholder image">
          </div>
          <div class="col-md-6">
            <h2>Sejarah lomba KM</h2>
            <p>Lomba resmi KM dimukai tahun 2007, merupakan lomba Non Teriak dimana situasi Lomba burung saat itu sudah bukan lomba lagi karena teriak pelomba sangat kencang dan mengganggu kinerjka juri. KM merupakan pemrakarasa Lomba Tanpa teriak pertama kali yag dimulai jaman kepengurusan Agus Hasan, ini lomba KM menggunakan Juri PBI.</p>
          </div>
        </div>
      </div>
      </section>

      <section class="container bagian-home sfnominasi-section">
        <div class="row">
          <div class="col-md-6">
            <h2>Tentang Software Nominasi</h2>
            <p>Software nominasi ini dicipakan untuk membantu juri, untuk menghasilkan rangking nominasi burung-burung dari juri, dan burung dikoncerin oleh juri juga, demi teciptanya penilaian lomba yang fair play sesuai keinginan semua Kicaumania.</p>
          </div>
          <div class="col-md-6 text-center">
            <img class="img-about" src="<?php echo base_url()."public/image/sfnominasi.png";?>" alt="Generic placeholder image">
          </div>
        </div>
      </div>
      </section>

      <section class="team-section">
        <div class="color-overlay">
          <div class="container">
          <?php foreach($list_anggota as $p){?>
            <div class="col-md-3 text-center">
              <img src="<?php echo base_url()."/upload/team/".$p->gambar;?>" class="img-circle batas-img-profil" alt="<?php echo $p->nama;?>">
              <p><strong><?php echo $p->nama;?> | <?php echo $p->jobdesk;?></strong></p>
              <p><?php echo $p->email;?></p>
              <p><?php echo $p->no_hp;?></p>
            </div>
          <?php } ?>
          </div>
        </div>
      </section>

      

      <section class="container bagian-home about-section">
        <div class="row">
          <div class="col-md-4">
            <div class="row">
              <h2>Berita Terbaru</h2>
              <p>Info info terbaru mengenai Kicau Mania dan juga update tentang Lomba Kicau Burung yang akan di adakan</p>
              
              <div class="pull-right batas-btn">
              <a href="blog" class="btn btn-primary btn-lg">Read More</a>
              </div>
            </div>
          </div>
          <div class="col-md-8">
          <div class="row">
          <?php foreach($list_news as $p){?>
                <div class="col-sm-6 col-md-4">
                    <img src="<?php echo base_url()."/upload/news/".$p->gambar;?>" alt="...">
                    <div class="caption">
                    
                      <a href="<?php echo base_url() . "blog/detail/". $p->id;?> "><h3><?php echo $p->title;?></h3></a>
                      <p><?php echo (strlen($p->description) > 250)  ? substr($p->description, 0, 150) . '...' : $p->description;?></p>
                    </div>
                </div>
          <?php } ?>
            </div>
          </div>
        </div>
      </section>

      <section class="contact">
        <div class="container">
            <h1 class="text-center"> Get in touch with us</h1>
            <p class="text-center">Please feel be free to contact us and ask to us</p>
              <form role="form" action="<?php echo base_url() . "home/contact";?> " action="post" class="contact-form">
                <div class="wow fadeInLeft animated animated" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.15s" style="visibility: visible;-webkit-animation-duration: 1.5s; -moz-animation-duration: 1.5s; animation-duration: 1.5s;-webkit-animation-delay: 0.15s; -moz-animation-delay: 0.15s; animation-delay: 0.15s;">
                <div class="col-lg-4 col-sm-4">
                  <input type="text" name="nama_pengirim" placeholder="Your Name" class="form-control input-box">
                </div>
                <div class="col-lg-4 col-sm-4">
                  <input type="email" name="pengirim" placeholder="Your Email" class="form-control input-box">
                </div>
                <div class="col-lg-4 col-sm-4">
                  <input type="text" name="subject" placeholder="Subject" class="form-control input-box">
                </div>
                </div>
                
                <div class="col-md-12 wow fadeInRight animated animated" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.15s" style="visibility: visible;-webkit-animation-duration: 1.5s; -moz-animation-duration: 1.5s; animation-duration: 1.5s;-webkit-animation-delay: 0.15s; -moz-animation-delay: 0.15s; animation-delay: 0.15s;">
                  <textarea name="isinya" class="form-control textarea-box" rows="7" placeholder="Your Message"></textarea>
                </div>

                  <div class="col-md-6">
                    <button type="button" class="btn btn-success">PIN : 74D32F2A</button>
                  </div>
                  <div class="col-md-6">
                    <button class="pull-right btn btn-lg btn-success custom-button red-btn wow fadeInLeft animated animated" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.15s" type="submit" style="visibility: visible;-webkit-animation-duration: 1.5s; -moz-animation-duration: 1.5s; animation-duration: 1.5s;-webkit-animation-delay: 0.15s; -moz-animation-delay: 0.15s; animation-delay: 0.15s;">Send Message</button>
                  </div>
              </form>
            </div>
      </section>


 