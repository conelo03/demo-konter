<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Data Barang Keluar</a></div>
        <div class="breadcrumb-item">Tambah Barang Keluar</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('tambah-barang-keluar'); ?>" method="post">
              <div class="card-header">
                <h4>Form Tambah Barang Keluar</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Tanggal Keluar</label>
                  <input type="date" name="tanggal" class="form-control" value="<?= set_value('tanggal'); ?>" required="">
                  <?= form_error('tanggal', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Pilih Barang</label>
                  <select class="form-control" name="id_barang" id="select-pegawai" data-live-search="true">
                    <option disabled selected>-- Pilih Barang --</option>
                    <?php foreach ($barang as $b):?>
                    <option value="<?= $b['id_barang']?>" <?= set_value('id_barang') == $b['id_barang'] ? 'selected' : '' ; ?> ><?= $b['merk_hp'].' '.$b['tipe_hp'].' - '.'Rp '.number_format($b['harga_beli'], 2, ',', '.') ?></option>
                    <?php endforeach;?>
                  </select>
                  <?= form_error('id_barang', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Harga Jual</label>
                  <input type="number" name="harga_jual" class="form-control" value="<?= set_value('harga_jual'); ?>" required="">
                  <?= form_error('harga_jual', '<span class="text-danger small">', '</span>'); ?>
                </div>
              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('barang-masuk');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
                <button type="reset" class="btn btn-danger"><i class="fa fa-sync"></i> Reset</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('template/footer');?>