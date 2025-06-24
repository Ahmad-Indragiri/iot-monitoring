<?php $this->load->view('layouts/header'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Sensor Log</h1>
    <a href="<?= site_url('sensor_log') ?>" class="btn btn-default">Kembali</a>
  </section>

  <section class="content">
    <form action="<?= site_url('sensor_log/update/'.$log->id) ?>" method="post">
      <div class="form-group">
        <label>Device</label>
        <select name="id_device" class="form-control" required>
          <option value="">-- Pilih Device --</option>
          <?php foreach($devices as $device): ?>
            <option value="<?= $device->id ?>" <?= $log->id_device == $device->id ? 'selected' : '' ?>>
              <?= $device->nama_device ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label>User</label>
        <select name="id_user" class="form-control" required>
          <option value="">-- Pilih User --</option>
          <?php foreach($users as $user): ?>
            <option value="<?= $user->id ?>" <?= $log->id_user == $user->id ? 'selected' : '' ?>>
              <?= $user->nama_user ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label>Waktu Log</label>
        <?php
          // Format untuk input datetime-local: yyyy-MM-ddTHH:mm
          $dt = date('Y-m-d\TH:i', strtotime($log->waktu_log));
        ?>
        <input type="datetime-local" name="waktu_log" class="form-control" value="<?= $dt ?>" required>
      </div>

      <div class="form-group">
        <label>Nilai Sensor</label>
        <input type="number" step="0.01" name="nilai_sensor" class="form-control" value="<?= $log->nilai_sensor ?>" required>
      </div>

      <div class="form-group">
        <label>Status Log</label>
        <select name="status_log" class="form-control" required>
          <option value="normal" <?= $log->status_log=='normal'?'selected':'' ?>>Normal</option>
          <option value="peringatan" <?= $log->status_log=='peringatan'?'selected':'' ?>>Peringatan</option>
          <option value="kritikal" <?= $log->status_log=='kritikal'?'selected':'' ?>>Kritikal</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </section>
</div>
