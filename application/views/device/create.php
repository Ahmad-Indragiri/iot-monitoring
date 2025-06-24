<?php $this->load->view('layouts/header'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Tambah Device</h1>
    <a href="<?= site_url('device') ?>" class="btn btn-default">Kembali</a>
  </section>

  <section class="content">
    <form action="<?= site_url('device/store') ?>" method="post">
      <div class="form-group">
        <label>Nama Device</label>
        <input type="text" name="nama_device" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Tipe Device</label>
        <input type="text" name="tipe_device" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Lokasi</label>
        <input type="text" name="lokasi" class="form-control">
      </div>
      <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control" required>
          <option value="aktif">Aktif</option>
          <option value="nonaktif">Nonaktif</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </section>
</div>
