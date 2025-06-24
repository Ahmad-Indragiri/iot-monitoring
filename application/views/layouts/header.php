<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>IoT Monitoring App</title>

  <!-- Bootstrap 5 CSS via CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- FontAwesome via CDN untuk icon -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  
  <!-- Viewport agar responsive -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header bg-primary p-3 d-flex justify-content-between align-items-center text-white">
    <a href="<?= site_url() ?>" class="logo text-white text-decoration-none">
      <span class="logo-lg fs-4"><b>IoT</b> Monitoring</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle text-white" role="button" onclick="toggleSidebar()">
        <i class="fa fa-bars"></i>
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav list-unstyled mb-0 d-flex align-items-center">
          <li><a href="<?= site_url('auth/logout') ?>" class="text-white text-decoration-none"><i class="fa fa-sign-out-alt me-1"></i> Logout</a></li>
        </ul>
      </div>
    </nav>
  </header>

<script>
  function toggleSidebar() {
    document.querySelector('aside.main-sidebar').classList.toggle('d-none');
  }
</script>
