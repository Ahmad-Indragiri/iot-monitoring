<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Login</h2>
    
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <form action="<?= site_url('auth/login_action') ?>" method="post">
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required />
        </div>

        <div class="form-group mt-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required />
        </div>

        <button type="submit" class="btn btn-primary mt-4">Login</button>
    </form>
</div>
</body>
</html>
