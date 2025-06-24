<?php $this->load->view('layouts/header'); ?>
<?php $this->load->view('layouts/sidebar'); ?>
<?php if ($this->session->flashdata('success')): ?>
  <div class="alert alert-success">
    <?= $this->session->flashdata('success'); ?>
  </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
  <div class="alert alert-danger">
    <?= $this->session->flashdata('error'); ?>
  </div>
<?php endif; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Data User</h1>
    <?php if ($this->session->userdata('role') === 'admin'): ?>
      <?php if ($this->session->userdata('role') === 'admin'): ?>
        <a href="<?= site_url('user/create') ?>" class="btn btn-primary">Tambah User</a>
      <?php endif; ?>

    <?php endif; ?>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-body">

        <?php if ($this->session->flashdata('success')): ?>
          <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')): ?>
          <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <table id="userTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama User</th>
              <th>Email</th>
              <th>Role</th>
              <?php if ($this->session->userdata('role') === 'admin'): ?>
                <th>Aksi</th>
              <?php endif; ?>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $u): ?>
              <?php if ($this->session->userdata('role') === 'admin' || $this->session->userdata('id') == $u->id): ?>
                <tr>
                  <td><?= $u->id ?></td>
                  <td><?= htmlspecialchars($u->nama_user) ?></td>
                  <td><?= htmlspecialchars($u->email) ?></td>
                  <td><?= htmlspecialchars($u->role) ?></td>
                  <?php if ($this->session->userdata('role') === 'admin'): ?>
                    <td>
                      <?php if ($this->session->userdata('role') === 'admin'): ?>
                        <a href="<?= site_url('user/edit/' . $u->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= site_url('user/delete/' . $u->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                      <?php endif; ?>
                    </td>

                  <?php endif; ?>
                </tr>
              <?php endif; ?>
            <?php endforeach; ?>
          </tbody>
        </table>

      </div>
    </div>
  </section>
</div>

<script>
  $(function() {
    $('#userTable').DataTable();
  });
</script>

<?php $this->load->view('layouts/footer'); ?>