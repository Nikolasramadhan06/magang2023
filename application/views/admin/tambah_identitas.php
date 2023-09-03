  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
      <?php echo form_open_multipart('admin/identitas/tambah_identitas'); ?>
        <label>Dinas</label>
        <input type="text" name="judul_website" required><br><br>

        <label>Alamat</label>
        <textarea name="alamat" required></textarea><br><br>

       <label>provinsi</label>
        <input  name="provinsi" required><br><br>

        <label>email</label>
        <input  name="email" required><br><br>

        <label>No Telepon</label>
        <input  name="no_telepon" required><br><br>

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