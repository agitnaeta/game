<div class="section no-pad-bot" id="index-banner">
  <div class="container">
  	<form method="post" action="<?=base_url("cv/upload");?>" enctype="multipart/form-data">
  	<div class="col s12">
  		<div class="card">
  			<div class="card-content">
  				<h5><i class="fa fa-edit"></i> Curiculum Vitae</h5>
          <?=$this->session->flashdata('pesan');?>
  			</div>		
  		</div>
  		<div class="card">
  			<div class="card-content">
  				<h6><i class="fa fa-user"></i> Data Diri</h6>
  				<hr>
  				<div class="row">
  					<div class="col s4">Nama lengkap</div>
	  				<div class="col s8">
	  					<input name="nama" class="validate" value="<?=set_value("nama");?>">
	  					<?=form_error("nama");?>
	  				</div>
  				</div>
  				<div class="row">
  					<div class="col s4">Nomor Telp</div>
	  				<div class="col s8">
	  					<input name="no_telp" class="validate" type="number" value="<?=set_value("no_telp");?>">
	  					<?=form_error("no_telp");?>
	  				</div>
  				</div>
  				<div class="row">
  					<div class="col s4">Email</div>
	  				<div class="col s8">
	  					<input name="email" class="validate" type="email" value="<?=set_value("email");?>">
	  					<?=form_error("email");?>
	  				</div>
  				</div>
  				<div class="row">
  					<div class="col s4">Alamat lengkap</div>
	  				<div class="col s8">
	  					<textarea name="alamat"><?=set_value("alamat");?></textarea>
	  					<?=form_error("alamat");?>
	  				</div>
  				</div>
  				<div class="row">
  					<div class="col s4">Jenis Kelamin</div>
	  				<div class="col s8">
	  					<label>
	  						<input type="radio" name="jenis_kelamin" value="l">
	  						<span>Laki-Laki</span>
	  					</label>
	  					<label>
	  						<input type="radio" name="jenis_kelamin" value="p">
	  						<span>Perempuan</span>
	  					</label>
	  					<?=form_error("jenis_kelamin");?>
	  				</div>
  				</div>
  				<div class="row">
  					<div class="col s4">Tempat Tanggal Lahir</div>
  					<div class="col s4">
  						<input name="tempat_lahir" class="validate" value="<?=set_value("tempat_lahir");?>">
	  					<?=form_error("tempat_lahir");?>
  					</div>
  					<div class="col s4">
  						<input name="tanggal_lahir" type="date">
	  					<?=form_error("tanggal_lahir");?>
  					</div>
  				</div>
  			</div>
  		</div>
  		<div class="card">
  				<div class="card-content">
  					<div class="row">
  						<h6><i class="fa fa-edit"></i> Keahlian Diri</h6>
  						<hr>
  						<div class="col s4"> Level Ahli <br> <i style="color: grey">* Misal : akuntansi</i></div>
  						<div class="col s8">
  							<textarea name="kemampuan_ahli" style="height: 200px"><?=set_value('kemampuan_ahli');?></textarea>
	  					<?=form_error("kemampuan_ahli");?>
  						</div>
  					</div>
  					<div class="row">
  						<div class="col s4"> Level Menegah <br> <i style="color: grey">* Misal : akuntansi</i></div>
  						<div class="col s8">
  							<textarea name="kemampuan_menengah" style="height: 200px"><?=set_value('kemampuan_menengah');?></textarea>
	  					<?=form_error("kemampuan_menengah");?>
  						</div>
  					</div>
  					<div class="row">
  						<div class="col s4"> Level Mendasar <br> <i style="color: grey">* Misal : akuntansi</i></div>
  						<div class="col s8">
  							<textarea name="kemampuan_dasar" style="height: 200px"><?=set_value('kemampuan_dasar');?></textarea>
	  					<?=form_error("kemampuan_dasar");?>
  						</div>
  					</div>
  					<div class="row">
  						<div class="col s4">
  							Bahasa
  						</div>
  						<div class="col s8">
  						<div class="row">
  							<div class="col s6">
  								<input name="bahasa[]" class="valdiate" placeholder="B.inggris">
  							</div>
  							<div class="col s6">
  								<select name="level_bahasa[]">
  									<option value="dasar">Dasar</option>
  									<option value="menengah">Menengah</option>
  									<option value="mahir">Mahir</option>
  								</select>
  							</div>
  						</div>
  						<div id="block_bahasa"></div>
	  					<?=form_error("bahasa");?>
  						</div>
  						<div class="right-align">
  							<a  class="btn grey" id="more_bahasa"> <i class="fa fa-plus"></i> Tambah</a>
  						</div>
  					</div>
  				</div>
  			</div>
        <div class="card">
          <div class="card-content">
              <h6><i class="fa fa-graduation-cap"></i> Pendidikan</h6>
              <hr>
              <div class="row" id="pendidikan">
              
              <div class="col s4">
                <p>Nama Institusi</p>
                <input name="nama_institusi[]" class="validate">
              </div>
              <div class="col s4">
                <p>Lama Belajar</p>
                <div class="col s6">
                  <input placeholder="dari tahun" name="dari_pendidikan[]" class="validate" type="number" >  
                </div>
                <div class="col s6">
                  <input placeholder="sampai tahun" name="sampai_pendidikan[]" class="validate" type="number" >
                </div>
              </div>
              <div class="col s4">
                Deksripsi Pekerjaan
                <select name="jenjang_pendidikan[]">
                  <option value="sd">SD</option>
                  <option value="smp">SMP</option>
                  <option value="smu">SMA/SMK</option>
                  <option value="d2">D2</option>
                  <option value="d3">D3</option>
                  <option value="S1">S1</option>
                  <option value="S2">S2</option>
                </select>
              </div>
              
              <div class="col s12" id="block_pendidikan"></div>
              
              <div class="col s12">
                <a class="btn grey" id="more_pendidikan">
                  <i class="fa fa-plus"></i>
                Tambah Data
                </a>
              </div>
            </div>
          </div>
        </div>
  			<div class="card">
  				<div class="card-content">
  					<h6><i class="fa fa-suitcase"></i> Pengalaman Kerja</h6>
  					<hr>
  					<div class="row" id="pengalaman">
	  					
	  					<div class="col s4">
	  						<p>Nama posisi</p>
	  						<input name="posisi[]" class="validate">
	  					</div>
	  					<div class="col s4">
	  						<p>Lama Kerja</p>
	  						<div class="col s6">
		  						<input placeholder="dari tahun" name="dari[]" class="validate" type="number" >	
	  						</div>
	  						<div class="col s6">
		  						<input placeholder="sampai tahun" name="sampai[]" class="validate" type="number" >
	  						</div>
	  					</div>
	  					<div class="col s4">
	  						Deksripsi Pekerjaan
	  						<input name="deskripsi_kerja[]" class="validate">
	  					</div>
	  					<div class="col s12" id="block_pengalaman"></div>
	  					<div class="col s12">
	  					<a class="btn grey" id="more_pengalaman">
	  						<i class="fa fa-plus"></i>
							Tambah Data
	  					</a>
	  					</div>
  					</div>

  				</div>
  			</div>
  			<div class="card">
  				<div class="card-content">
  					<h6><i class="fa fa-file-o"></i> Dokumen Diri</h6>
  					<hr>
  					<div class="row">
  						<div class="col s4">Curiculum Vitae</div>
  						<div class="col s8">
  							<input class="validate" name="cv" type="file">
  						</div>
	  					<?=form_error("cv");?>
  					</div>
  					<div class="row">
  						<div class="col s4">Foto Profil </div>
  						<div class="col s8">
  							<input class="validate" name="foto" type="file">
  						</div>
	  					<?=form_error("foto");?>
  					</div>
  				</div>
  			</div>
  			<div class="card">
  				<div class="card-content">
  					<h6><i class="fa fa-file-o"></i> Dokumen Pendukung</h6>
  					<hr>
  					<div class="row">
  						<div class="col s4">
  							<input name="nama_file[]" type="text" placeholder="nama file">
  						</div>
  						<div class="col s8">
  							<input name="doc_file[]" type="file">
  						</div>
  					</div>
  					<div id="block_file">
  						
  					</div>
  					<div class="col s12">
	  					<a class="btn grey" id="more_file">
	  						<i class="fa fa-plus"></i>
							Tambah Data
	  					</a>
	  					</div>
  				</div>
  			</div>
  			<div class="card">
  				<div class="card-content">
  					<button class="btn"><i class="fa fa-upload"></i> Upload CV</button>
  					<label>Dengan Mendaftar saya mengisi data dengan lengkap dan benar!</label>
  				</div>
  			</div>
  	</div>
  	</form>
  </div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$('#more_pengalaman').click(function () {
			var objTo         = document.getElementById('block_pengalaman');
			var divtest       = document.createElement("div");
			divtest.setAttribute("class", "row");
			divtest.innerHTML = '<div class="col s4"> <p>Nama posisi</p> <input name="posisi[]" class="validate"> </div> <div class="col s4"> <p>Lama Kerja</p> <div class="col s6"> <input placeholder="dari tahun" name="dari[]" class="validate" type="number" > </div> <div class="col s6"> <input placeholder="sampai tahun" name="sampai[]" class="validate" type="number" > </div> </div> <div class="col s4"> Deksripsi Pekerjaan <input name="deskripsi_kerja[]" class="validate"> </div>'; objTo.appendChild(divtest)
		})

		$('#more_bahasa').click(function () {
			var objTo         = document.getElementById('block_bahasa');
			var divtest       = document.createElement("div");
			divtest.setAttribute("class", "row");
			divtest.innerHTML = '<div class="col s6"> <input name="bahasa[]" class="valdiate" placeholder="B.inggris"> </div> <div class="col s6"> <select class="browser-default" name="level_bahasa[]"> <option value="dasar">Dasar</option><option value="menengah">Menengah</option> <option value="mahir">Mahir</option> </select> </div>'; 
			objTo.appendChild(divtest)
		})


		$('#more_file').click(function () {
		var objTo         = document.getElementById('block_file');
		var divtest       = document.createElement("div");
		divtest.setAttribute("class", "row");
		divtest.innerHTML = '<div class="col s4"> <input name="nama_file[]" type="text" placeholder="nama file"> </div> <div class="col s8"> <input name="doc_file[]" type="file"> </div>'; objTo.appendChild(divtest)
		})

    $('#more_pendidikan').click(function () {
    var objTo         = document.getElementById('block_pendidikan');
    var divtest       = document.createElement("div");
    divtest.setAttribute("class", "row");
    divtest.innerHTML = '<div class="col s4"> <p>Nama Institusi</p> <input name="nama_institusi[]" class="validate"> </div> <div class="col s4"> <p>Lama Belajar</p> <div class="col s6"> <input placeholder="dari tahun" name="dari_pendidikan[]" class="validate" type="number" > </div> <div class="col s6"> <input placeholder="sampai tahun" name="sampai_pendidikan[]" class="validate" type="number" > </div> </div> <div class="col s4"> Deksripsi Pekerjaan <select class="browser-default" name="jenjang_pendidikan[]"> <option value="sd">SD</option> <option value="smp">SMP</option> <option value="smu">SMA/SMK</option> <option value="d2">D2</option> <option value="d3">D3</option> <option value="S1">S1</option> <option value="S2">S2</option> </select> </div>'; 
      objTo.appendChild(divtest) 
    })


	})
</script>



