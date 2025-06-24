<?php $this->load->view('layouts/header'); ?>
<?php $this->load->view('layouts/sidebar'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Data Sensor Log</h1>
    <?php
    $role = $this->session->userdata('role');
    if ($role === 'admin' || $role === 'operator'):
    ?>
      <a href="<?= site_url('sensor_log/create') ?>" class="btn btn-primary">Tambah Log</a>
    <?php endif; ?>

  </section>

  <section class="content">
    <div class="box">
      <div class="box-body">
        <table id="logTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Device</th>
              <th>User</th>
              <th>Waktu Log</th>
              <th>Nilai Sensor</th>
              <th>Status Log</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($logs as $log): ?>
              <tr>
                <td><?= $log->id ?></td>
                <td><?= $log->nama_device ?></td>
                <td><?= $log->nama_user ?: '-' ?></td>
                <td><?= $log->waktu_log ?></td>
                <td><?= $log->nilai_sensor ?></td>
                <td><?= ucfirst($log->status_log) ?></td>
                <td>
                  <?php
                  $role = $this->session->userdata('role');
                  $user_id = $this->session->userdata('id');
                  ?>

                  <?php if ($role === 'admin' || ($role === 'operator' && $log->id_user == $user_id)): ?>
                    <a href="<?= site_url('sensor_log/edit/' . $log->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= site_url('sensor_log/delete/' . $log->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                  <?php endif; ?>
                </td>

              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>

<script>
  $(function() {
    $('#logTable').DataTable();
  });
</script>