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
    <?php echo $this->session->flashdata('pesan'); ?>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Fasilitas</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php foreach($fasilitas as $row) : ?>

            <form role="form" action="<?php echo base_url('admin/identitas/aksiFasilitas'); ?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="id_fasilitas" value="<?php echo $row->id_fasilitas; ?>">

                  <label for="about">Judul</label>
                  <input type="text" name="judul" class="form-control" value="<?php echo $row->judul; ?>">
                </div>
                <div class="form-group">
                  <label for="misi">Isi</label>
                  <textarea style="width: 700px; height: 110px;" name="isi" class="form-control"><?php echo $row->isi; ?></textarea>
                </div>
                <div class="form-group">
                <input type="file" name="gambar">
              </div>
                
              </div>
              <!-- /.box-body -->

             
              <a class="btn btn-sm btn-warning" href="<?php echo base_url('admin/identitas'); ?>">Batal</a>
              <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"> Simpan</i></button>
            </form>
            <?php endforeach; ?>

          </div>
        </div>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->