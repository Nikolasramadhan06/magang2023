<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  

  <!-- Main content -->
  
</div>
<!DOCTYPE html>
<html>
<head>
<?php echo $this->session->flashdata('pesan'); ?>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
</style>   
</head>
<body>

   <div>
    <p></p>
   </div>
<!-- /.content-wrapper -->
<div class="row">
    <div class="col s12 m7">
      <div class="card">
        <div class="card-image">
        <?php if (!empty($kegiatan['gambar'])): ?>
                    <img src="<?php echo base_url('assets/user/img/' . $kegiatan['gambar']); ?>" width="100">
                <?php else: ?>
                    Gambar tidak tersedia.
                <?php endif; ?>
          <a><h4><?php echo $kegiatan['judul']; ?></h4></a>
        </div>
        <div class="card-content">
        <h5><?php echo $kegiatan['isi']; ?></h5>
        </div>
      </div>
    </div>
  </div>
  </body>
</html>