<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title; ?>
      </h1>
    </section>

    <section class="content">
      <?php echo $this->session->flashdata('pesan'); ?>

      <div class="row">
        <div class="col-md-12">

          <div class="box">
          
            <div class="box-header">
            <a class="btn btn-success pull-right" href="<?php echo base_url('admin/identitas/tambah_pegawai/'); ?>">Tambah Data</a>
              <h3 class="box-title">Pegawai</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed table-bordered table-striped">
                <tbody>
                  <tr>
                    <th style="width: 60px;">Aksi</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>gambar</th>
                  </tr>

                  <?php 
                    foreach($pegawai as $fs) :
                   ?>
                  <tr>
                    <td>
                      <a title="Edit Tentang Perusahaan" href="<?php echo base_url('admin/Pegawai/edit_pegawai/'.$fs->id_pegawai); ?>" class="btn btn-sm btn-primary">
                        <i class="fa fa-edit"></i>
                      </a>
                    </td>
                    <td><?php echo $fs->nama; ?></td>
                    <td><?php echo $fs->jabatan; ?></td>
                    <td><?php echo $fs->gambar; ?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>

    </section>
</div>