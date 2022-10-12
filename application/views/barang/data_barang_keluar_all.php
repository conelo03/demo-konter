
<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Data Barang Keluar</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Barang Keluar</h4>
              <div class="card-header-action">
                <a href="<?= base_url('tambah-barang-keluar');?>" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Data</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="datatables-jabatan">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Tanggal Keluar</th>
                      <th>Merk HP</th>
                      <th>Tipe HP</th>
                      <th>Harga Beli</th>
                      <th>Harga Jual</th>
                      <th>Keterangan</th>
                      <?php if(is_admin()): ?>
                      <th class="text-center" style="width: 250px;">Aksi</th>
                      <?php endif; ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($barang as $u):?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= date('d F Y', strtotime($u['tanggal']));?></td>
                      <td><?= $u['merk_hp'];?></td>
                      <td><?= $u['tipe_hp'];?></td>
                      <td><?= 'Rp '.number_format($u['harga_beli'], 2, ',', '.');?></td>
                      <td><?= 'Rp '.number_format($u['harga_jual'], 2, ',', '.');?></td>
                      <td><?= $u['keterangan'];?></td>
                      <?php if(is_admin()): ?>
                      <td class="text-center">
                        <a href="<?= base_url('edit-barang-keluar/'.$u['id_barang_keluar']);?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                        <button class="btn btn-danger" data-confirm="Anda yakin ingin menghapus data ini?|Data yang sudah dihapus tidak akan kembali." data-confirm-yes="document.location.href='<?= base_url('hapus-barang-keluar/'.$u['id_barang_keluar']); ?>';"><i class="fa fa-trash"></i> Delete</button>
                        <button class="btn btn-warning" data-confirm="Anda yakin ingin mengcancel data ini?|Data yang sudah dicancel akan kembali ke Data Barang." data-confirm-yes="document.location.href='<?= base_url('cancel-barang-keluar/'.$u['id_barang_keluar']); ?>';"><i class="fa fa-times"></i> Cancel</button>
                      </td>
                      <?php endif; ?>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('template/footer');?>