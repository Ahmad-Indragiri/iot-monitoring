<?php $this->load->view('layouts/header'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Device</h1>
    <a href="<?= site_url('device') ?>" class="btn btn-default">Kembali</a>
  </section>

  <section class="content">
    <form action="<?= site_url('device/update/'.$device->id) ?>" method="post">
      <div class="form-group">
        <label>Nama Device</label>
        <input type="text" name="nama_device" class="form-control" value="<?= $device->nama_device ?>" required>
      </div>
      <div class="form-group">
        <label>Tipe Device</label>
        <input type="text" name="tipe_device" class="form-control" value="<?= $device->tipe_device ?>" required>
      </div>
      <div class="form-group">
        <label>Lokasi</label>
        <input type="text" name="lokasi" class="form-control" value="<?= $device->lokasi ?>">
      </div>
      <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control" required>
          <option value="aktif" <?= $device->status=='aktif'?'selected':'' ?>>Aktif</option>
          <option value="nonaktif" <?= $device->status=='nonaktif'?'selected':'' ?>>Nonaktif</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </section>
</div>
