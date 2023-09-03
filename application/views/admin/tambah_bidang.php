  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
      <?php echo form_open_multipart('admin/bidang/tambah_bidang'); ?>
        <label>Judul</label>
        <input type="text" name="nama" required><br><br>

        <label>Isi</label>
        <textarea name="jabatan" required></textarea><br><br>

        <label>Gambar</label>
        <input type="file" name="gambar"><br><br>

        <label>admin_id</label>
        <input type="text" name="admin_id"><br><br>

        <label>user_id</label>
        <input type="text" name="user_id"><br><br>
        <button type="submit">Tambah Data</button>
    <?php echo form_close(); ?>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->