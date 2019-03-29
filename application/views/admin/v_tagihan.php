<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>
    <?=$judul?>
  </title>
</head>

<body>
<style>
    
input[type="checkbox"], input[type="radio"]{
  position: absolute;
  right: 9000px;
}

/*Check box*/
input[type="checkbox"] + .label-text:before{
  content: "\f096";
  font-family: "FontAwesome";
  speak: none;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  line-height: 1;
  -webkit-font-smoothing:antialiased;
  width: 1em;
  display: inline-block;
  margin-right: 5px;
}

input[type="checkbox"]:checked + .label-text:before{
  content: "\f14a";
  color: #2980b9;
  animation: effect 250ms ease-in;
}

input[type="checkbox"]:disabled + .label-text{
  color: #aaa;
}

input[type="checkbox"]:disabled + .label-text:before{
  content: "\f0c8";
  color: #ccc;
}

/*Radio box*/

input[type="radio"] + .label-text:before{
  content: "\f10c";
  font-family: "FontAwesome";
  speak: none;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  line-height: 1;
  -webkit-font-smoothing:antialiased;
  width: 1em;
  display: inline-block;
  margin-right: 5px;
}

input[type="radio"]:checked + .label-text:before{
  content: "\f192";
  color: #8e44ad;
  animation: effect 250ms ease-in;
}

input[type="radio"]:disabled + .label-text{
  color: #aaa;
}

input[type="radio"]:disabled + .label-text:before{
  content: "\f111";
  color: #ccc;
}

/*Radio Toggle*/

.toggle input[type="radio"] + .label-text:before{
  content: "\f204";
  font-family: "FontAwesome";
  speak: none;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  line-height: 1;
  -webkit-font-smoothing:antialiased;
  width: 1em;
  display: inline-block;
  margin-right: 10px;
}

.toggle input[type="radio"]:checked + .label-text:before{
  content: "\f205";
  color: #16a085;
  animation: effect 250ms ease-in;
}

.toggle input[type="radio"]:disabled + .label-text{
  color: #aaa;
}

.toggle input[type="radio"]:disabled + .label-text:before{
  content: "\f204";
  color: #ccc;
}


@keyframes effect{
  0%{transform: scale(0);}
  25%{transform: scale(1.3);}
  75%{transform: scale(1.4);}
  100%{transform: scale(1);}
}
</style>
  <div class="container-fluid">
    <h2>
      <center><strong>Halaman Data Tagihan</strong></center>
    </h2><br>
    <a data-toggle="modal" data-target="#tambah" class="btn btn-primary">+ Tambah Data Tagihan</a><br><br>

    <div class="box">
      <div class="box-header">
      </div>
      <!-- /.box-header -->
      <div class="box-body">
      <p><center><font color="green" size="4px"><b><?= $this->session->flashdata('pesan_sukses'); ?></b></font></center></p>
        <table id="tabletarif" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Id Tagihan</th>
              <th>Id Penggunaan</th>
              <th>Bukan</th>
              <th>Tahun</th>
              <th>Jumlah Meter</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            <?php $no=1; foreach ($DataTagihan as $data) {  ?>
            <tr>
              <td>
                <?=$data->id_tagihan  ?>
              </td>
              <td>
                <?=$data->id_penggunaan ?>
              </td>
              <td>
                <?=$data->bulan ?> 
              </td>
              <td>
                <?=$data->tahun?> 
              </td>
              <td>
                <?=$data->jumlah_meter?> 
              </td>
              <td>
                <?=$data->status?>  
              </td>
              <td>
                <a class="btn btn-primary" data-toggle="modal" data-target="#edit" href="#" onclick="edit('<?=$data->id_pelanggan?>')"> <?=$data->id_tagihan?> Edit</a>
                <a class="btn btn-danger" data-toggle="modal" data-target="#hapus" href="#" onclick="edit('<?=$data->id_pelanggan?>')">Hapus</a></td>
            </tr>
            <?php } ?>
            </tfoot>
          </table>
        </div>
      </div>

  
        <!-- Modal Tambah Tarif-->
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4><strong>Tambah Data Tagihan</strong></h4>
            </div>
            <div class="modal-body">
              <br />

              <form action="<?=base_url('admin_home/tambah_tagihan')?>" method="post" class="form-horizontal form-label-left">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Id Penggunaan :
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="id_penggunaan" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Bulan :
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="bulan" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun : </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="tahun" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Meter : </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="jumlah_meter" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Status : </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="status" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <input type="submit" name="tambah" value="Simpan" class="btn btn-primary">
            </div>
          </div>
          </form>
        </div>
        </div>
        
       <!-- Modal Edit Data Tarif-->
       <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4><strong>Edit Data Tarif</strong></h4>
            </div>
            <div class="modal-body">
              <br />

              <form action="<?=base_url('admin_home/edit_tagihan')?>" method="post" class="form-horizontal form-label-left">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Id Penggunaan :
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="id_penggunaan" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Bulan :
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="bulan" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun : </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="tahun" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Meter : </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="jumlah_meter" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Status : </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="status" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <input type="submit" name="tambah" value="Simpan" class="btn btn-primary">
            </div>
          </div>
          </form>
        </div>
       </div>
            

    </div>
    <script>
            function FPassword() {
                var x = document.getElementById("sp");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
      <script type="text/javascript">
        function edit(a) {
          $.ajax({
            type: "post",
            url: "<?=base_url()?>admin_home/data_pelanggan/" + a,
            dataType: "json",
            success: function (data) {
              $("#id_tagihan").val(data.id_tagihan);
              $("#id_penggunaan").val(data.id_penggunaan);
              $("#bulan").val(data.bulan);
              $("#tahun").val(data.tahun);
              $("#jumlah_meter").val(data.jumlah_meter);
              $("#status").val(data.status);  
            }
          });
        }
      </script>
</body>

</html>