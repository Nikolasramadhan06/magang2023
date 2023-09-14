<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  

  <!-- Main content -->
  
</div>
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

      <title>Informasi</title>
    </head>

    <body id="home" class="scrollspy">

      <!-- navbar -->
      <div class="navbar-fixed">
        <nav class="warna">
          <div class="logo">
            <div class="container">
              <div class="nav-wrapper">
                <div class="text-darken-3">
                
                <ul class="right hide-on-med-and-down">
                  <li><a class="list" href="../diskominfo">Pegawai</a></li>
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

      
<!-- /.content-wrapper -->

  </div>
  <div class="row">

<div class="col s12 m4 l3"> <!-- Note that "m4 l3" was added -->


</div>

<div class="col s12 m8 l9"> <!-- Note that "m8 l9" was added -->
<div class="card" >
        <div class="card-image">
        <?php if (!empty($kegiatan['gambar'])): ?>
                    <img src="<?php echo base_url('assets/user/img/' . $kegiatan['gambar']); ?>" width="100">
                <?php else: ?>
                    Gambar tidak tersedia.
                <?php endif; ?>
          <a><h4><?php echo $kegiatan['judul']; ?></h4></a>
        </div>
        <div class="card-content">
        <h5 style="text-align: justify;"> <?php echo $kegiatan['isi']; ?></h5>
        </div>
      </div>

</div>

</div>
    
  </body>
</html>