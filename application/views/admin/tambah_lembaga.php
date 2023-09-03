  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
      <?php echo form_open_multipart('admin/identitas/tambah_lembaga'); ?>
        <label>Misi</label>
        <input type="text" name="about_us" required><br><br>

        <label>Visi</label>
        <textarea name="visi" required></textarea><br><br>

       <label>Judul</label>
        <input  name="misi" required><br><br>

    

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