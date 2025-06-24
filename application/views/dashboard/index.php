<?php $this->load->view('layouts/header'); ?>
<?php $this->load->view('layouts/sidebar'); ?>

<section class="content-header mb-4">
  <h1>Dashboard</h1>
  <small>Selamat datang, <?= $this->session->userdata('nama_user'); ?>!</small>
</section>

<section class="content">
  <div class="card p-4 shadow-sm">
    <p>Role Anda: <strong><?= ucfirst($this->session->userdata('role')); ?></strong></p>

    <?php if ($this->session->userdata('role') == 'admin'): ?>
      <p>Anda memiliki akses penuh untuk mengelola User, Device, dan Sensor Log.</p>
    <?php elseif ($this->session->userdata('role') == 'operator'): ?>
      <p>Anda dapat melihat Device dan mengelola Sensor Log milik Anda.</p>
    <?php elseif ($this->session->userdata('role') == 'viewer'): ?>
      <p>Anda hanya dapat melihat informasi Device dan Sensor Log.</p>
    <?php endif; ?>
  </div>
</section>

<section class="content">
    <div class="row">
      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?= $total_user ?></h3>
            <p>Total Users</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?= $total_device ?></h3>
            <p>Total Devices</p>
          </div>
          <div class="icon">
            <i class="fa fa-cogs"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?= $total_log ?></h3>
            <p>Total Sensor Logs</p>
          </div>
          <div class="icon">
            <i class="fa fa-bar-chart"></i>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php $this->load->view('layouts/footer'); ?>
