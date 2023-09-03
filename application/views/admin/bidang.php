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
        <div class="box">
        <div class="box-header">
    <h3 class="box-title">Tabel Kegiatan</h3>
    <a class="btn btn-success pull-right" href="<?php echo base_url('admin/bidang/tambah_bidang/'); ?>">Tambah Data</a>
</div>
            <table class="table table-condensed table-bordered table-striped">
              <thead>
                <tr>
                  <th class="text-center" style="width: 40px;">No</th>
                  <th>Judul</th>
                  <th>Isi</th>
                  <th>Gambar</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $i = 1;
                foreach($pegawai as $row) { ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $row->nama; ?></td>
                  <td><?php echo $row->jabatan; ?></td>
                  <td><img style="max-width: 60px;" src="<?php echo base_url('assets/user/img/' . $row->gambar); ?>" class="img-fluid" alt=""></td>
                  <td>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/bidang/edit/' . $row->id_pegawai); ?>">
                      <i class="fa fa-edit"></i> Edit
                    </a>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/bidang/hapusbidang/' . $row->id_pegawai); ?>">
                      <i class="fa fa-trash"></i> Hapus
                    </a>
                  </td>
                  <td><?php echo $row->admin_id; ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
