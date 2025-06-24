<?php $this->load->view('layouts/header'); ?>
<?php $this->load->view('layouts/sidebar'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Data Device</h1>
    <?php if ($this->session->userdata('role') === 'admin'): ?>
      <a href="<?= site_url('device/create') ?>" class="btn btn-primary">Tambah Device</a>
    <?php endif; ?>

  </section>

  <section class="content">
    <div class="box">
      <div class="box-body">
        <table id="deviceTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Device</th>
              <th>Tipe Device</th>
              <th>Lokasi</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($devices as $d): ?>
              <tr>
                <td><?= $d->id ?></td>
                <td><?= $d->nama_device ?></td>
                <td><?= $d->tipe_device ?></td>
                <td><?= $d->lokasi ?></td>
                <td><?= $d->status ?></td>
                <td>
                  <?php if ($this->session->userdata('role') === 'admin'): ?>
                    <a href="<?= site_url('device/edit/' . $d->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= site_url('device/delete/' . $d->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
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
    $('#deviceTable').DataTable();
  });
</script>