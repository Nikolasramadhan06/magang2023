<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets') ?>/user/css/materialize.min.css"  media="screen,projection"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <!-- my css -->
      <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets') ?>/user/css/style.css">

      <style type="text/css">
        .parallax-container{
          height: 400px;
        }

        .active{
          background-color: #00008B;
          color: #fff;
        }

        .clients h3{
          text-shadow: 2px 2px 4px rgba(0,0,0,1);
        }

        .warna{
          background-color: #00008B;
        }
      </style>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <title><?php echo $title; ?></title>
    </head>

    <body id="home" class="scrollspy">

      <!-- navbar -->
      <div class="navbar-fixed">
        <nav class="warna">
          <div class="logo">
            <div class="container">
              <div class="nav-wrapper">
                <div class="text-darken-3">
                <?php foreach($identitas as $idn) : ?>
                  <a href="" class="brand-logo">
                    <?php echo $idn->judul_website; ?>
                  </a>
                <?php endforeach; ?>
                <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                  <li><a class="list" href="#pegawai">Pegawai</a></li>
                  <li><a class="list" href="#informasi">Informasi</a></li>
                  <li><a class="list" href="#struktur">Struktur Organisasi</a></li>
                  <li><a class="list" href="#contact">Kontak</a></li>
                  <li><a href="<?php echo base_url('login'); ?>">Login</a></li>
                </ul>
                </div>
              </div>
            </div>
          </div>
        </nav> 
      </div>

      <!-- sidenav mobile nav-->
      <ul class="sidenav" id="mobile-nav">
        <li><a href="#pegawai">Pegawai </a></li>
        <li><a href="#informasi">Informasi</a></li>
        <li><a href="#struktur">Struktur Organisasi</a></li>
        <li><a href="#contact">Kontak</a></li>
        <li><a href="<?php echo base_url('login'); ?>">Login</a></li>
      </ul>


      

     <!-- ini adalah slider -->
     <div class="slider">
        <ul class="slides">
        <?php foreach($slide as $row) { ?>
          
          <li>
            <img src="<?php echo base_url('assets/user/img/'.$row->gambar) ?>" style="width:100%; height:100%" >
        </li>
              <?php } ?>  
        </ul>
      </div>
      
     

      <!-- about us -->
      <section id="about" class="about scrollspy">
        <div class="container">
          <div class="row">
            
            <h3 class="center"></h3>
            <?php foreach($about as $abt) : ?>
            <div class="col m12">
              <h5>Tugas Pokok</h5>
              <p align="justify">
                <?php echo $abt->about_us; ?>
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col m6">
              <h5>Visi</h5> 
              <p align="justify">
                <?php echo $abt->visi; ?>
              </p>
              
            </div>

            <div class="col m6">
             <center> <h5>Misi</h5> </center>
              <p align="justify">
                <?php echo $abt->misi; ?>
              </p>
            </div>
            <?php endforeach; ?>

          
          </div>
        </div>
      </section>


      <!-- services -->
      <section id="pegawai" class="blue lighten-2 scrollspy">
        <div class="container">
          <div class="row">
            <div class="clients">
              <h3 class="light center grey-text white-text">Pegawai</h3>
            </div>
            <?php foreach($fasilitas as $row) { ?>
            <div class="col m6 s10">
              <div class="card-panel center">
                <img style="border-radius: 40%; display:block; margin:auto;" src="<?php echo base_url('assets/user/img/portfolio/'.$row->gambar) ?>" class="responsive-img materialboxed">
                <h5><?php echo $row->judul; ?></h5>
                <h6><?php echo $row->isi; ?></h6>
              </div>
            </div>
            <?php } ?>
          </div>
          </div>
          <div class="row white center">
          <?php foreach($pegawai as $row) { ?>
              <a class="col s12 m6 l3" href="<?= base_url('admin/bidang/lihat_bidang/' . $row->id_pegawai);?>" ><p>Bidang</p></a>
            <?php } ?>
          </div>
  
        </div>
      </section>
      

      <!-- sistem -->
      <section id="informasi" class="contact grey lighten-3 scrollspy">
        <div class="container">
          <h3 class="center light grey-text text-darken-3">Informasi</h3>
          <div class="row">
              <?php foreach($kegiatan as $row) { ?>
               <div class="col m4 s12">
                  <div class="card-panel center">
                    <img style="border-radius: 10%;" src="<?php echo base_url('assets/user/img/'.$row->gambar) ?>" class="responsive-img materialboxed">
                    <h5><?php echo $row->judul; ?></h5>
                   
 
                    <a class="waves-effect waves-light btn" href="<?php echo base_url('admin/kegiatan/lihat_kegiatan/' . $row->id_kegiatan); ?>">Lihat</a>
                  </div>
              </div>
              <?php } ?>
              
          </div>
        </div>
      </section>

      <!-- portfolio -->
      <section id="struktur" class="portfolio scrollspy">
        <div class="container">
          <h3 class="light center grey-text text-darken-3">Struktur Organisasi</h3>
          <div class="row">
            <div class="col s12">
            <?php foreach($struktur as $row) { ?>
          
          <li>
            <img src="<?php echo base_url('assets/user/img/'.$row->gambar) ?>" style="width:100%; height:100%" >
        </li>
              <?php } ?>
            </div>
          </div>
        </div>
      </section>
      

      <!-- contact -->
      <section id="contact" class="contact grey lighten-3 scrollspy">
        <div class="container">
          <h3 class="center light grey-text text-darken-3">Kontak</h3>
          <div class="row">
            <div class="col m5 s12">
              <div class="card-panel yellow darken-3 center white-text">
                <i class="material-icons medium">email</i>
                <h3>Kontak</h3>
              </div>
              <?php foreach($identitas as $idn) : ?>
              <ul class="collection with-header">
                <li class="collection-header"><h4>Alamat</h4></li>
                <li class="collection-item"><?php echo $idn->judul_website; ?></li>
                <li class="collection-item"><?php echo $idn->alamat; ?></li>
                <li class="collection-item"><?php echo $idn->provinsi; ?></li>
                <li class="collection-item">Phone : <?php echo $idn->no_telepon; ?></li>
              </ul>
              <?php endforeach; ?>
            </div>

            <div class="col m7 s12">
              <form method="post" action="<?php echo base_url('user/message'); ?>">
                <div class=" card-panel">
                  <div class="input-field">
                    <input id="name" type="text" name="nama" required >
                    <label for="name">Nama</label>
                  </div>
                  <div class="input-field">
                    <input id="email" type="email" name="email" class="validate">
                    <label for="email">Email</label>
                  </div>
                  <div class="input-field">
                    <input id="phone" type="text" name="no_telepon">
                    <label for="phone">Nomor Telepon</label>
                  </div>
                  <div class="input-field">
                    <textarea name="pesan" id="message" class="materialize-textarea"></textarea>
                    <label for="message">Pesan</label>
                  </div>

                  <button class="btn warna text-darken-2" type="submit">Kirim</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>


      

      <!-- JAVASCRIPT -->

      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="<?php echo base_url('assets') ?>/user/js/materialize.min.js"></script>

      <!-- sidenav -->
      <script>
        const sideNav = document.querySelectorAll('.sidenav');
        M.Sidenav.init(sideNav);
      

      //slider
     
        const slider = document.querySelectorAll('.slider');
        M.Slider.init(slider, {
          duration : 400,
          interval : 5000
        });

        const paralax = document.querySelectorAll('.parallax');
        M.Parallax.init(paralax);

        const materialbox = document.querySelectorAll('.materialboxed');
        M.Materialbox.init(materialbox);

        const scroll = document.querySelectorAll('.scrollspy');
        M.ScrollSpy.init(scroll, {
          scrollOffset: 50
        });

      </script>
      <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
            <script type="text/javascript">
          $(document).ready(function(){
                $('ul li a').click(function(){
                  $('li a').removeClass("active");
                  $(this).addClass("active");
              });
          });
      </script>
    </body>
</html>