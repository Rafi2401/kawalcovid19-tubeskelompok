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
            <a href="<?php echo base_url() ?>adm_kasus" class="list-group-item"><i class="fa fa-folder"></i> Data Kasus</a>
            <a href="#" class="list-group-item"><i class="fa fa-folder"></i> Data ODP</a>
            <a href="<?php echo base_url() ?>adm_pdp" class="list-group-item"><i class="fa fa-folder"></i> Data PDP</a>
            <a href="<?php echo base_url() ?>dashboard/logout" class="list-group-item"><i class="fa fa-sign-out"></i> Logout</a>
            </div>
        </div>
      <div class="col-md-9">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-folder"></i> Data ODP (Orang Dalam Pemantauan)</h3>
            </div>
            <div class="panel-body">
                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">Proses Pemantauan</th>
                            <th class="text-center" scope="col">Selesai Pemantauan</th>
                            <th class="text-center" scope="col">Provinsi</th>
                            <th class="text-center" scope="col">Waktu</th>
                            <th class="text-center" scope="col">Total ODP</th>
                            <th class="text-center" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="trgtodp">
                    
                    </tbody>
                </table>
                </div>
                <div class="modal fade" id="form" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #204051;border-radius: 4px 4px 0px 0px;">
                                <h1 style="text-align: center;color:FFFFFF;">Form Data ODP</h1>
                            </div>
                            <center><font color= "red"><p id="pesan"></p></font></center>
                            <table class="table">
                                <tr>
                                    <td>Proses Pemantauan<font color="red">*</font></td>
                                    <td>
                                        <input type="text" name="proses" class="form-control">
                                        <input type="hidden" name="id" value="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Selesai Pemantauan<font color="red">*</font></td>
                                    <td><input type="text" name="selesai" class="form-control"></td>
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
                                    <td>Total ODP<font color="red">*</font></td>
                                    <td><input type="text" name="total" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button type="button" id="btn-add" onclick="tambahOdp()" class="btn btn-primary">Tambah Data</button>
                                        <button type="button" id="btn-update" onclick="ubahOdp()" class="btn btn-primary">Ubah</button>
                                        <button type="button" data-dismiss="modal" class="btn btn-danger">Batal</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col md-6 text-center mt-5" style="margin-bottom: 20px">
                        <a href="#form" class="btn btn-primary" data-toggle="modal" onclick="submit('tambah')">Tambah Data ODP</a>
                    </div>
                </div>
                <script type="text/javascript">
                    ambilOdp();
                    function ambilOdp() {
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo base_url()."Adm_odp/ambilOdp"?>',
                            dataType: 'json',
                            success: function(data){
                                var baris='';
                                for (var i=0;i<data.length;i++){
                                    baris += '<tr>'+
                                                '<td class="text-center">'+data[i].proses+'</td>'+
                                                '<td class="text-center">'+data[i].selesai+'</td>'+
                                                '<td class="text-center">'+data[i].provinsi+'</td>'+
                                                '<td class="text-center">'+data[i].waktu+'</td>'+
                                                '<td class="text-center">'+data[i].total+'</td>'+
                                                '<td><a href="#form" data-toggle="modal" class="btn btn-primary" onclick="submit('+data[i].id+')">Ubah</a> <a class="btn btn-danger" onclick="hapusOdp('+data[i].id+')">Hapus</a></td>'
                                            '</tr>';
                            }
                            $('#trgtodp').html(baris);
                        }
                        });
                    }

                    function tambahOdp() {
                        var proses = $("[name= 'proses']").val();
                        var selesai = $("[name= 'selesai']").val();
                        var provinsi = $("[name= 'provinsi']").val();
                        var waktu = $("[name= 'waktu']").val();
                        var total = $("[name= 'total']").val();

                        $.ajax({
                            type: 'POST',
                            data: 'proses='+proses+'&selesai='+selesai+'&provinsi='+provinsi+'&waktu='+waktu+'&total='+total,
                            url: '<?php echo base_url().'Adm_odp/tambah'?>',
                            dataType: 'json',
                            success: function(hasil){
                                $("#pesan").html(hasil.pesan);
                                if (hasil.pesan=='') {
                                    $('#form').modal('hide');
                                    ambilOdp();

                                    $("[name='proses']").val('');
                                    $("[name='selesai']").val('');
                                    $("[name='provinsi']").val('');
                                    $("[name='waktu']").val('');
                                    $("[name='total']").val('');
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
                                url: '<?php echo base_url()."Adm_odp/getOdpId"?>',
                                dataType: 'json',
                                success: function(hasil){
                                    $('[name="id"]').val(hasil[0].id);
                                    $('[name="proses"]').val(hasil[0].proses);
                                    $('[name="selesai"]').val(hasil[0].selesai);
                                    $('[name="provinsi"]').val(hasil[0].provinsi);
                                    $('[name="waktu"]').val(hasil[0].waktu);
                                    $('[name="total"]').val(hasil[0].total);
                                }
                            });
                        }
                    }

                    function ubahOdp() {
                        var id = $("[name= 'id']").val();
                        var proses = $("[name= 'proses']").val();
                        var selesai = $("[name= 'selesai']").val();
                        var provinsi = $("[name= 'provinsi']").val();
                        var waktu = $("[name= 'waktu']").val();
                        var total = $("[name= 'total']").val();

                        $.ajax({
                            type: 'POST',
                            data: 'id='+id+'&proses='+proses+'&selesai='+selesai+'&provinsi='+provinsi+'&waktu='+waktu+'&total='+total,
                            url: '<?php echo base_url().'Adm_odp/ubah'?>',
                            dataType: 'json',
                            success: function(hasil) {
                                $("#pesan").html(hasil.pesan);
                                if (hasil.pesan=='') {
                                    $('#form').modal('hide');
                                    ambilOdp();
                                }
                            }
                        });
                    }

                    function hapusOdp(id) {
                        var tanya = confirm("Apakah anda yakin akan menghapus data?");
                        if (tanya){
                            $.ajax({
                                type: 'POST',
                                data: 'id='+id,
                                url: '<?php echo base_url()."Adm_odp/hapus"?>',
                                success: function() {
                                    ambilOdp();
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