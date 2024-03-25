<html>
<head>
    <title>Dashboard Admin - Kawal Informasi COVID-19 2020</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #204051;">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="color: white;">Dashboard Admin</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <div class="navbar-form navbar-right">
            <a href="<?php echo base_url() ?>dashboard/logout" type="submit" class="btn btn-success"><i class="fa fa-sign-out"></i> Logout</a>
        </div>
  </div>
</nav>
<div class="container" style="margin-top: 80px">
  <div class="row">
      <div class="col-md-3">
          <div class="list-group">
            <a class="list-group-item active" style="text-align: center;background-color: #204051;">
              ADMINISTRATOR
            </a>
            <a href="#" class="list-group-item"><i class="fa fa-dashboard"></i> Dashboard</a>
            <a href="<?php echo base_url() ?>adm_kasus" class="list-group-item"><i class="fa fa-folder"></i> Data Kasus</a>
            <a href="<?php echo base_url() ?>adm_odp" class="list-group-item"><i class="fa fa-folder"></i> Data ODP</a>
            <a href="<?php echo base_url() ?>adm_pdp" class="list-group-item"><i class="fa fa-folder"></i> Data PDP</a>
            <a href="logout" class="list-group-item"><i class="fa fa-sign-out"></i> Logout</a>
          </div>
      </div>
      <div class="col-md-9">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-dashboard"></i> Dashboard</h3>
            </div>
            <div class="panel-body">
              Selamat Datang <b><?php echo $this->session->userdata("admin_nama") ?></b> di halaman Administrator Website Kawal Informasi COVID-19
            </div>
          </div>
      </div>
  </div>
</div>
</body>
</html>