<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Data Barang Masuk</a></div>
        <div class="breadcrumb-item">Edit Barang Masuk</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('edit-barang-masuk/'.$b['id_barang_masuk']); ?>" method="post">
              <div class="card-header">
                <h4>Form Edit Barang Masuk</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Tanggal Masuk</label>
                  <input type="date" name="tanggal" class="form-control" value="<?= set_value('tanggal', $b['tanggal']); ?>" required="">
                  <?= form_error('tanggal', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Merk HP</label>
                  <input type="text" name="merk_hp" class="form-control" value="<?= set_value('merk_hp', $b['merk_hp']); ?>" required="">
                  <?= form_error('merk_hp', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Tipe HP</label>
                  <input type="text" name="tipe_hp" class="form-control" value="<?= set_value('tipe_hp', $b['tipe_hp']); ?>" required="">
                  <?= form_error('tipe_hp', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Harga Beli</label>
                  <input type="number" name="harga_beli" class="form-control" value="<?= set_value('harga_beli', $b['harga_beli']); ?>" required="">
                  <?= form_error('harga_beli', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea type="text" name="keterangan" class="form-control" required=""><?= set_value('keterangan', $b['keterangan']); ?></textarea>
                  <?= form_error('keterangan', '<span class="text-danger small">', '</span>'); ?>
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