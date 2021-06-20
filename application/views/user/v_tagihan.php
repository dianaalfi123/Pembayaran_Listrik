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

  <div class="container-fluid">
    <h2>
      <center><strong>Halaman Data Tagihan</strong></center>
    </h2><br />
    <div class="box">
      <div class="box-header">
      </div>
      <!-- /.box-header -->
      <div class="box-body">
      <p><center><font color="green" size="4px"><b><?= $this->session->flashdata('pesan'); ?></b></font></center></p>
        <table id="tabletarif" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nomor</th>
              <th>ID Tagihan</th>
              <th>Bulan Tagihan</th>
              <th>Jumlah Kwh Penggunaan</th>
              <th>Total Pembayaran</th>
              <th>Bukti</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>

            <?php $no=1; foreach ($DataTagihan as $data) : 
                $cek_bayar=$this->user->cek_pembayaran($data->id_tagihan); ?>
            <tr>
              <td>
                <?=$no++ ?>
              </td>
              <td>
                <?=$data->id_tagihan ?>
              </td>
              <td>
                <?=$data->bulan ?> <?=$data->tahun ?>
              </td>
              <td>
                <?= $data->jumlah_meter ?>
              </td>
              <td>
                <?php $bayar = $data->jumlah_meter * $data->terperkwh ?>
                <?= $bayar ?>
              </td> 
              <td>
                <?php if(@$cek_bayar->bukti!=""): ?>
                    <img src="<?=base_url('assets/bukti/'.$cek_bayar->bukti )?>" width="60px;">
                <?php endif ?>
              </td>
              <td>
                <?=$data->status?>
              </td>
              <td>
                <?php if($data->status != "Lunas"): ?>
                <a class="btn btn-primary" data-toggle="modal" data-target="#upload" href="#" onclick="bayar('<?=$data->id_tagihan?>')">Upload Bukti</a></td>
                <?php else: ?>
                Pembayaran Sudah Lunas
                <?php endif ?>
            </td>
            </tr>
            <?php endforeach ?>
            </tfoot>
          </table>
        </div>
      </div>


        <!-- Modal Upload Bukti Bayar-->
        <div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4><strong>Upload Bukti Pembayaran</strong></h4>
            </div>
            <div class="modal-body">
              <br />

              <form action="<?=base_url('user_home/upload_bukti')?>" method="post" class="form-horizontal form-label-left"  enctype="multipart/form-data">

                <input type="hidden" name="id_tagihan" id="id_tagihan" required="required" class="form-control col-md-7 col-xs-12">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload File :
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="bukti" name="bukti" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <input type="submit" name="upload" value="Simpan Bukti" class="btn btn-primary">
            </div>
          </div>
          </form>
        </div>
        </div>

    </div>
   
    <script type="text/javascript">
        function bayar(id_tagihan){
            $("#id_tagihan").val(id_tagihan);
        }
    </script>
</body>

</html>
