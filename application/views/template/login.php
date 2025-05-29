<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="<?php echo base_url(); ?>assets/dist/img/logo.png" alt="">
    <a href="<?php echo base_url(); ?>"><h2 style="color: white;"><b>Trash2</b>Cash</h2></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silahkan Masukan Username dan Password untuk Masuk</p>

      <form action="<?php echo base_url(); ?>index.php/auth/login" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              Sudah punya akun? <a href="<?php base_url("auth/register"); ?>index.php/auth/register">Daftar</a>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" style="width:100%" class="btn btn-primary btn-success">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>



    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
