<?php $this->load->view('layouts/header'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Tambah User</h1>
    <a href="<?= site_url('user') ?>" class="btn btn-default">Kembali</a>
  </section>

  <section class="content">
    <?php if (validation_errors()): ?>
      <div class="alert alert-danger">
        <?= validation_errors(); ?>
      </div>
    <?php endif; ?>

    <form action="<?= site_url('user/store') ?>" method="post">
      <div class="form-group">
        <label>Nama User</label>
        <input type="text" name="nama_user" class="form-control" value="<?= set_value('nama_user') ?>" required>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?= set_value('email') ?>" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Role</label>
        <select name="role" class="form-control" required>
          <option value="">-- Pilih Role --</option>
          <option value="admin" <?= set_select('role', 'admin') ?>>Admin</option>
          <option value="operator" <?= set_select('role', 'operator') ?>>Operator</option>
          <option value="viewer" <?= set_select('role', 'viewer') ?>>Viewer</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </section>
</div>
