  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Struktur</h3>
            </div>

            <?php echo form_open_multipart('admin/struktur/tambah_struktur'); ?>
        
             <label>Gambar</label>
             <input type="file" name="gambar"><br><br>

             <label>admin_id</label>
             <input type="text" name="admin_id"><br><br>

             <label>user_id</label>
             <input type="text" name="user_id"><br><br>
          </div>
           <div class="box-footer">
             <button type="submit">Tambah Data</button>
           </div>
    <?php echo form_close(); ?>
      </div>



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
