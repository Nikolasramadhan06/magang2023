  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title; ?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <?php foreach($kegiatan as $row) : ?>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $row->judul; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="progress">
                No telepon : <?php echo $row->isi; ?> || 
              </div>
              <hr>
              <div class="card">
                <?php echo $row->gambar; ?>
              </div>

              <br><br><br><br>
              <a class="btn btn-warning" href="<?php echo base_url('admin/pesan'); ?>">Kembali</a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

      </div>
    <?php endforeach; ?>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->