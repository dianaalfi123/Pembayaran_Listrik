<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pembayaran Listrik | Halaman Registrasi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/iCheck/square/blue.css">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="<?=base_url()?>home/register"><b>Pembayaran</b> Listrik</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Daftar Sebagai Pengguna Baru</p>

    <form action="<?=base_url('user/register_akun')?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" name="alamat" class="form-control" placeholder="Alamat">
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="number" name="nomor_kwh" class="form-control" placeholder="Nomor Kwh">
        <span class="glyphicon glyphicon-certificate form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-globe form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
         <select  class="form-control"  name="id_tarif" required="required">
            <option>Pilih Tarif</option>
                <?php foreach ($DataTarif as $data) { ?>
                    <option value="<?=$data->id_tarif?>"><?= $data->nama_tarif ?></option>
                <?php } ?>
          </select>

      </div>


      <div class="row">

        <!-- /.col -->
        <div class="col-xs-12">
          <input name="submit" id="submit" type="submit" class="btn btn-primary btn-block btn-flat" value="Daftar">
        </div>
        <!-- /.col -->
      </div>
    </form>
    <br>
    Saya Sudah Punya Akun ? <a href="<?=base_url()?>user/login" class="text-center">Login</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?=base_url()?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
