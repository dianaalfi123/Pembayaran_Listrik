<style>
    h1{
        text-align:center;
        font-weight:600;
    }

    p{
        font-size: 16px;
    }

    label{
	position: relative;
	cursor: pointer;
	color: #666;
	font-size: 16px;
    margin-top:12px;
}

input[type=button]{
 font-size:16px;
 font-weight: 550;
}

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


}
</style>

<div class="container" style="margin-bottom: 20px;">
    <h1>Profil Pengguna</h1>
</div>
<div class="row">

    <?php foreach($getDataUser as $data): ?>

    <div class="col-md-3" style="text-align:center">
        <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="center-block img-responsive img-circle" width="80%;" alt="User Image">
        <input type="file" style="margin-left:20px;display:inline-block" class="btn center-block" ><br><br>
    </div>
    <div class="col-md-8">
        <div>
            <p>Nama Pengguna :</p>
             <input type="text" style="padding-right:80px!important;" value="<?= $data->nama_pelanggan ?>" name="nama_pengguna" class="form-control" placeholder="Nama">
        </div>
        <br>
        <div>
            <p>Alamat :</p>
             <input type="text" style="padding-right:80px!important;" value="<?= $data->alamat ?>" name="alamat" class="form-control" placeholder="Alamat">

        </div> 
        <br>
            <p>Jenis Tarif :</p>
        <select  class="form-control" name="" style="border:none;">
								<option>Provinsi</option>
								<?php foreach($get_provinsi as $provinsi): ?>
									<option value="<?=$provinsi->nama?>"><?=$provinsi->nama?></option>
								<?php endforeach?>
		</select>
        <br>
        <div>
            <p>Username :</p>
             <input type="text" style="padding-right:80px!important;" value="<?= $data->username ?>"  name="username" class="form-control" placeholder="Username">
        </div> 
        <br>
        <div>
            <p>Password :</p>
             <input type="password" id="sp" style="padding-right:80px!important;" value="<?= $data->password ?>"  name="password" class="form-control" placeholder="Password">
       </div> 
       <div class="form-check">
					<label>
						<input type="checkbox" name="check" type="checkbox" onclick="FPassword()"> <span class="label-text">Lihat Password</span>
					</label>
				</div>
        <br> 
        <input type="button" class="btn btn-primary pull-right" value="Ubah Profil">
        <br>
    <?php endforeach ?>   

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
    </div>
</div>