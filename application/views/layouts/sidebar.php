<aside class="main-sidebar bg-dark text-white p-3" style="width: 250px; height: 100vh; position: fixed;">
  <section class="sidebar">
    <div class="user-panel mb-3">
      <div class="info">
        <p class="mb-0"><?= $this->session->userdata('nama_user'); ?></p>
        <small class="text-muted"><?= ucfirst($this->session->userdata('role')); ?></small>
      </div>
    </div>

    <ul class="sidebar-menu list-unstyled">
      <li class="mb-2">
        <a href="<?= site_url('dashboard') ?>" class="text-white text-decoration-none d-flex align-items-center">
          <i class="fa fa-tachometer-alt me-2"></i> Dashboard
        </a>
      </li>

      <?php $role = $this->session->userdata('role'); ?>

      <?php if ($role == 'admin'): ?>
        <li class="mb-2">
          <a href="<?= site_url('user') ?>" class="text-white text-decoration-none d-flex align-items-center">
            <i class="fa fa-users me-2"></i> Manajemen User
          </a>
        </li>
        <li class="mb-2">
          <a href="<?= site_url('device') ?>" class="text-white text-decoration-none d-flex align-items-center">
            <i class="fa fa-cogs me-2"></i> Manajemen Device
          </a>
        </li>
        <li class="mb-2">
          <a href="<?= site_url('sensor_log') ?>" class="text-white text-decoration-none d-flex align-items-center">
            <i class="fa fa-chart-bar me-2"></i> Sensor Log
          </a>
        </li>

      <?php elseif ($role == 'operator'): ?>
        <li class="mb-2">
          <a href="<?= site_url('device') ?>" class="text-white text-decoration-none d-flex align-items-center">
            <i class="fa fa-cogs me-2"></i> Lihat Device
          </a>
        </li>
        <li class="mb-2">
          <a href="<?= site_url('sensor_log') ?>" class="text-white text-decoration-none d-flex align-items-center">
            <i class="fa fa-edit me-2"></i> Sensor Log
          </a>
        </li>

      <?php elseif ($role == 'viewer'): ?>
        <li class="mb-2">
          <a href="<?= site_url('device') ?>" class="text-white text-decoration-none d-flex align-items-center">
            <i class="fa fa-cogs me-2"></i> Lihat Device
          </a>
        </li>
        <li class="mb-2">
          <a href="<?= site_url('sensor_log') ?>" class="text-white text-decoration-none d-flex align-items-center">
            <i class="fa fa-chart-bar me-2"></i> Lihat Sensor Log
          </a>
        </li>
      <?php endif; ?>

      <li class="mt-5">
        <a href="<?= site_url('auth/logout') ?>" class="text-danger text-decoration-none d-flex align-items-center">
          <i class="fa fa-sign-out-alt me-2"></i> Logout
        </a>
      </li>
    </ul>
  </section>
</aside>

<div class="content-wrapper" style="margin-left: 260px; padding: 20px;">
