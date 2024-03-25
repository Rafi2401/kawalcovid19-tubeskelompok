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
            <a href="<?php echo base_url() ?>index.php/dashboard/logout" type="submit" class="btn btn-success"><i class="fa fa-sign-out"></i> Logout</a>
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
            <a href="<?php echo base_url() ?>dashboard" class="list-group-item"><i class="fa fa-dashboard"></i> Dashboard</a>
            <a href="#" class="list-group-item"><i class="fa fa-folder"></i> Data Kasus</a>
            <a href="<?php echo base_url() ?>adm_odp" class="list-group-item"><i class="fa fa-folder"></i> Data ODP</a>
            <a href="<?php echo base_url() ?>adm_pdp" class="list-group-item"><i class="fa fa-folder"></i> Data PDP</a>
            <a href="<?php echo base_url() ?>dashboard/logout" class="list-group-item"><i class="fa fa-sign-out"></i> Logout</a>
          </div>
      </div>
      <div class="col-md-9">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-folder"></i> Data Kasus</h3>
            </div>
            <div class="panel-body">
              <table class="table mt-5">
                <thead>
                  <tr>
                    <th class="text-center" scope="col">Terkonfirmasi</th>
                    <th class="text-center" scope="col">Dalam Perawatan</th>
                    <th class="text-center" scope="col">Sembuh</th>
                    <th class="text-center" scope="col">Meninggal</th>
                    <th class="text-center" scope="col">Provinsi</th>
                    <th class="text-center" scope="col">Waktu</th>
                    <th class="text-center" scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody id="trgtkasus">
                  
                </tbody>
              </table>
            </div>
            <div class="modal fade" id="form" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header" style="background-color: #204051;border-radius: 4px 4px 0px 0px;">
                    <h1 style="text-align: center;color:FFFFFF;">Form Data Kasus</h1>
                  </div>
                  <center><font color= "red"><p id="pesan"></p></font></center>
                  <table class="table">
                    <tr>
                      <td>Terkonfirmasi<font color="red">*</font></td>
                      <td>
                        <input type="text" name="terkonfirmasi" class="form-control">
                        <input type="hidden" name="id" value="">
                      </td>
                    </tr>
                    <tr>
                      <td>Dalam Perawatan<font color="red">*</font></td>
                      <td><input type="text" name="perawatan" class="form-control"></td>
                    </tr>
                    <tr>
                      <td>Sembuh<font color="red">*</font></td>
                      <td><input type="text" name="sembuh" class="form-control"></td>
                    </tr>
                    <tr>
                      <td>Meninggal<font color="red">*</font></td>
                      <td><input type="text" name="meninggal" class="form-control"></td>
                    </tr>
                    <tr>
                      <td>Provinsi<font color="red">*</font></td>
                      <td><input type="text" name="provinsi" class="form-control"></td>
                    </tr>
                    <tr>
                      <td>Waktu<font color="red">*</font></td>
                      <td><input type="date" name="waktu" class="form-control"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        <button type="button" id="btn-add" onclick="tambahKasus()" class="btn btn-primary">Tambah Data</button>
                        <button type="button" id="btn-update" onclick="ubahKasus()" class="btn btn-primary">Ubah</button>
                        <button type="button" data-dismiss="modal" class="btn btn-danger">Batal</button>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col md-6 text-center mt-5" style="margin-bottom: 20px">
              <a href="#form" class="btn btn-primary" data-toggle="modal" onclick="submit('tambah')">Tambah Data Kasus</a>
              </div>
            </div>
            <script type="text/javascript">
              ambilKasus();
              function ambilKasus() {
                $.ajax({
                  type: 'POST',
                  url: '<?php echo base_url()."Adm_kasus/ambilKasus"?>',
                  dataType: 'json',
                  success: function(data){
                    var baris='';
                    for (var i=0;i<data.length;i++){
                      baris += '<tr>'+
                                    '<td class="text-center">'+data[i].terkonfirmasi+'</td>'+
                                    '<td class="text-center">'+data[i].perawatan+'</td>'+
                                    '<td class="text-center">'+data[i].sembuh+'</td>'+
                                    '<td class="text-center">'+data[i].meninggal+'</td>'+
                                    '<td class="text-center">'+data[i].provinsi+'</td>'+
                                    '<td class="text-center">'+data[i].waktu+'</td>'+
                                    '<td><a href="#form" data-toggle="modal" class="btn btn-primary" onclick="submit('+data[i].id+')">Ubah</a> <a class="btn btn-danger" onclick="hapusKasus('+data[i].id+')">Hapus</a></td>'
                                '</tr>';
                    }
                    $('#trgtkasus').html(baris);
                  }
                });
              }

              function tambahKasus() {
                var terkonfirmasi = $("[name= 'terkonfirmasi']").val();
                var perawatan = $("[name= 'perawatan']").val();
                var sembuh = $("[name= 'sembuh']").val();
                var meninggal = $("[name= 'meninggal']").val();
                var provinsi = $("[name= 'provinsi']").val();
                var waktu = $("[name= 'waktu']").val();

                $.ajax({
                  type: 'POST',
                  data: 'terkonfirmasi='+terkonfirmasi+'&perawatan='+perawatan+'&sembuh='+sembuh+'&meninggal='+meninggal+
                  '&provinsi='+provinsi+'&waktu='+waktu,
                  url: '<?php echo base_url().'Adm_kasus/tambah'?>',
                  dataType: 'json',
                  success: function(hasil){
                    $("#pesan").html(hasil.pesan);
                    if (hasil.pesan=='') {
                      $('#form').modal('hide');
                      ambilKasus();

                      $("[name='terkonfirmasi']").val('');
                      $("[name='perawatan']").val('');
                      $("[name='sembuh']").val('');
                      $("[name='meninggal']").val('');
                      $("[name='provinsi']").val('');
                      $("[name='waktu']").val('');
                    }
                  }
                });
              }

              function submit(x) {
                if (x=='tambah') {
                  $('#btn-add').show();
                  $('#btn-update').hide();
                }else {
                  $('#btn-update').show();
                  $('#btn-add').hide();

                  $.ajax({
                    type: 'POST',
                    data: 'id='+x,
                    url: '<?php echo base_url()."Adm_kasus/getKasusId"?>',
                    dataType: 'json',
                    success: function(hasil){
                      $('[name="id"]').val(hasil[0].id);
                      $('[name="terkonfirmasi"]').val(hasil[0].terkonfirmasi);
                      $('[name="perawatan"]').val(hasil[0].perawatan);
                      $('[name="sembuh"]').val(hasil[0].sembuh);
                      $('[name="meninggal"]').val(hasil[0].meninggal);
                      $('[name="provinsi"]').val(hasil[0].provinsi);
                      $('[name="waktu"]').val(hasil[0].waktu);
                    }
                  });
                }
              }

              function ubahKasus() {
                var id = $("[name= 'id']").val();
                var terkonfirmasi = $("[name= 'terkonfirmasi']").val();
                var perawatan = $("[name= 'perawatan']").val();
                var sembuh = $("[name= 'sembuh']").val();
                var meninggal = $("[name= 'meninggal']").val();
                var provinsi = $("[name= 'provinsi']").val();
                var waktu = $("[name= 'waktu']").val();

                $.ajax({
                  type: 'POST',
                  data: 'id='+id+'&terkonfirmasi='+terkonfirmasi+'&perawatan='+perawatan+'&sembuh='+sembuh+'&meninggal='+meninggal+
                  '&provinsi='+provinsi+'&waktu='+waktu,
                  url: '<?php echo base_url().'Adm_kasus/ubah'?>',
                  dataType: 'json',
                  success: function(hasil) {
                    $("#pesan").html(hasil.pesan);
                    if (hasil.pesan=='') {
                      $('#form').modal('hide');
                      ambilKasus();
                    }
                  }
                });
              }

              function hapusKasus(id) {
                var tanya = confirm("Apakah anda yakin akan menghapus data?");
                if (tanya){
                  $.ajax({
                    type: 'POST',
                    data: 'id='+id,
                    url: '<?php echo base_url()."Adm_kasus/hapus"?>',
                    success: function() {
                      ambilKasus();
                    }
                  });
                }
              }
            </script>
          </div>
      </div>
  </div>
</div>
</body>
</html>