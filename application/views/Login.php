<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/fonts/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css?v=3.2.0">
    <script nonce="f19f5cc4-02e2-46b7-866d-a94950555ab8">
        // Your script here
    </script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?php echo base_url() ?>assets/index2.html"><b>Nabil</b>Jaya</a>
        </div>

        <?php if ($this->session->flashdata('salah')):?>
        <div class="alert alert-danger" role="alert">
          Username atau Password Salah!
        </div>        
      <?php endif?>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan Input</p>
                <form action="<?php echo site_url('admin/validasi')?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-mail"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            </div>
                        </div>
                    </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </form>
                <div class="social-auth-links text-center mb-3">
                    <!-- Additional social authentication links can be added here -->
                </div>
                <p class="mb-1">
                <p class="mb-0">
            </div>
        </div>
    </div>

    <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>
