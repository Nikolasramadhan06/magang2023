<!DOCTYPE html>
<html>
<head>
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

      

</head>
<body>


<section id="informasi" class="contact grey lighten-3 scrollspy">
    <div class="container">
        <div class="row">
        <?php foreach ($pegawai as $row): ?>
            <div class="col m4 s12">
                <div class="card-panel center">
                <img src="<?= base_url('assets/user/img/' . $row->gambar) ?>" alt="">
                <h5><?= $row->nama ?></h5>

                <h6><?= $row->jabatan ?></h6>
                </div>
        </div>
        <?php endforeach; ?>
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
