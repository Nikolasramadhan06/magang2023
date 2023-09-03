<!-- views/admin/kegiatan_form.php -->

<?php echo validation_errors(); ?>

<?php echo form_open('admin/kegiatan/tambah_kegiatan'); ?>
<label for="judul">Judul</label>
<input type="text" name="judul" value="<?php echo set_value('judul'); ?>"><br>

<label for="isi">Isi</label>
<textarea name="isi"><?php echo set_value('isi'); ?></textarea><br>

<input type="submit" value="Tambah Kegiatan">
</form>
