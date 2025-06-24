<?php $this->load->view('layouts/header'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Tambah Sensor Log</h1>
    <a href="<?= site_url('sensor_log') ?>" class="btn btn-default">Kembali</a>
  </section>

  <section class="content">
    <form action="<?= site_url('sensor_log/store') ?>" method="post">
      <div class="form-group">
        <label>Device</label>
        <select name="id_device" class="form-control" required>
          <option value="">-- Pilih Device --</option>
          <?php foreach($devices as $device): ?>
            <option value="<?= $device->id ?>"><?= $device->nama_device ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label>User</label>
        <select name="id_user" class="form-control" required>
          <option value="">-- Pilih User --</option>
          <?php foreach($users as $user): ?>
            <option value="<?= $user->id ?>"><?= $user->nama_user ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label>Waktu Log</label>
        <input type="datetime-local" name="waktu_log" class="form-control" required>
      </div>

      <div class="form-group">
        <label>Nilai Sensor</label>
        <input type="number" step="0.01" name="nilai_sensor" class="form-control" required>
      </div>

      <div class="form-group">
        <label>Status Log</label>
        <select name="status_log" class="form-control" required>
          <option value="normal">Normal</option>
          <option value="peringatan">Peringatan</option>
          <option value="kritikal">Kritikal</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </section>
</div>
