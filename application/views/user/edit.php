<?php $this->load->view('layouts/header'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit User</h1>
    <a href="<?= site_url('user') ?>" class="btn btn-default">Kembali</a>
  </section>

  <section class="content">
    <form action="<?= site_url('user/update/'.$user->id) ?>" method="post">
      <div class="form-group">
        <label>Nama User</label>
        <input type="text" name="nama_user" class="form-control" value="<?= $user->nama_user ?>" required>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?= $user->email ?>" required>
      </div>
      <div class="form-group">
        <label>Password (kosongkan jika tidak diubah)</label>
        <input type="password" name="password" class="form-control">
      </div>
      <div class="form-group">
        <label>Role</label>
        <select name="role" class="form-control" required>
          <option value="admin" <?= $user->role=='admin'?'selected':'' ?>>Admin</option>
          <option value="operator" <?= $user->role=='operator'?'selected':'' ?>>Operator</option>
          <option value="viewer" <?= $user->role=='viewer'?'selected':'' ?>>Viewer</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </section>
</div>
