<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Data Barang</a></div>
        <div class="breadcrumb-item">Edit Barang</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('edit-barang/'.$b['id_barang']); ?>" method="post">
              <div class="card-header">
                <h4>Form Edit Barang</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Nama Item</label>
                  <input type="text" name="nama_bolu" class="form-control" value="<?= set_value('nama_bolu', $b['nama_bolu']); ?>" required="">
                  <?= form_error('nama_bolu', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Stok</label>
                  <input type="number" name="stok" class="form-control" value="<?= set_value('stok', $b['stok'] != 0 ? $b['stok'] : 0); ?>" required="">
                  <?= form_error('stok', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Harga Beli</label>
                  <input type="number" name="harga_beli" class="form-control" value="<?= set_value('harga_beli', $b['harga_beli']); ?>" required="">
                  <?= form_error('harga_beli', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Harga Jual</label>
                  <input type="number" name="harga_jual" class="form-control" value="<?= set_value('harga_jual', $b['harga_jual']); ?>" required="">
                  <?= form_error('harga_jual', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Diskon (%)</label>
                  <input type="number" name="diskon" class="form-control" value="<?= set_value('diskon', $b['diskon'] != 0 ? $b['diskon'] : 0); ?>" required="">
                  <?= form_error('diskon', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>PPn (%)</label>
                  <input type="number" name="ppn" class="form-control" value="<?= set_value('ppn', $b['ppn'] != 0 ? $b['diskon'] : 0); ?>" required="">
                  <?= form_error('ppn', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea type="text" name="keterangan" class="form-control" required=""><?= set_value('keterangan', $b['keterangan']); ?></textarea>
                  <?= form_error('keterangan', '<span class="text-danger small">', '</span>'); ?>
                </div>
              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('barang');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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