<div class="section no-pad-bot" id="index-banner">
  <div class="container-fluid">
    <div class="row">
      <div class="col s6">
			<div class="card">
				<div class="card-content">
					<h5><i class="fa fa-briefcase"></i> Detail Loker</h5>
				</div>
			</div>
			<div class="card">
				<div class="card-content">
					<table>
			            <tr>
			              <td>Jabatan</td>
			              <td><?=ucfirst($request->jabatan);?></td>
			            </tr>
			            <tr>
			              <td>Deksripsi Jabatan</td>
			              <td><?=ucfirst($request->deskripsi_jabatan);?></td>
			            </tr>
			            <tr>
			              <td>Level</td>
			              <td><?=ucfirst($request->level);?></td>
			            </tr>
			            <tr>
			              <td>Jumlah Kebutuhan</td>
			              <td><?=($request->jumlah_kebutuhan);?> orang</td>
			            </tr>
			            <tr>
			              <td>Usia Maximal</td>
			              <td><?=($request->usia);?></td>
			            </tr>
			            <tr>
			              <td>Agama</td>
			              <td><?=str_replace(",","/",$request->agama);?></td>
			            </tr>
			            <tr>
			              <td>Etnis</td>
			              <td><?=ucfirst($request->etnis);?></td>
			            </tr>
			            <tr>
			              <td>Pendidikan</td>
			              <td><?=str_replace(",","/",$request->pendidikan);?></td>
			            </tr>
			            <tr>
			              <td>Etnis</td>
			              <td><?=ucfirst($request->etnis);?></td>
			            </tr>
			            <tr>
			              <td>Jenis Kelamin</td>
			              <td><?=($request->jenis_kelamin=='l') ? 'Laki-Laki' : 'Perempuan';?></td>
			            </tr>
			            <tr>
			              <td>Status Perkawinan</td>
			              <td><?=ucfirst($request->status_perkawinan);?></td>
			            </tr>
			            <tr>
			              <td>Pengalaman</td>
			              <td><?=ucfirst($request->pengalaman);?></td>
			            </tr>
			            <tr>
			              <td>Alasan Kebutuhan</td>
			              <td><?=ucfirst($request->alasan_kebutuhan);?></td>
			            </tr>
			            <tr>
			              <td>Request Oleh</td>
			              <td><?=ucfirst($request->name);?></td>
			            </tr>
			            <tr>
			              <td>Tanggal</td>
			              <td><?=dateindo($request->tanggal);?></td>
			            </tr>
			          </table>  
				</div>
			</div>
      </div> 
      <div class="col s6">
			<div class="card">
				<div class="card-content">
					<h5> 
							<i class="fa fa-user"></i> Detail Pelamar 
							 <div class="pull-right">
						        <a href="<?=base_url("cv/print/$cv->iduser");?>" target="__blank"  class="btn grey"><i class="fa fa-print"></i> Cetak CV</a>
						          <a class="waves-effect waves-light btn modal-trigger" href="#modal1"><i class="fa fa-phone"></i> Panggil Interview</a>
						    </div>
					</h5>
				</div>
			</div>
			<div class="">
			    <div class="card">
			      <div class="card-content">
			        <div class="row">
			          <div class="col s12">
			            <h6><i class="fa fa-user"></i> Data Diri</h6>
			             <?=$this->session->flashdata('pesan');?>
			          <hr>    
			          </div>
			          <div class="col s4">
			            <img width="100%" src="<?=base_url("uploads/$cv->foto");?>">
			          </div>
			          <div class="col s8">
			          <table>
			            <tr> <td>Nama Lengkap</td><td><?=$cv->nama;?></td> </tr> 
			            <tr> <td>No Telp</td><td><?=$cv->no_telp;?></td> </tr> 
			            <tr> <td>Email </td><td><a href="mailto:<?=$cv->email;?>"> <?=$cv->email;?></a></td> </tr> 
			            <tr> <td>Jenis Kelamin</td><td><?=jk($cv->jenis_kelamin);?></td> </tr> 
			            <tr> <td>Tempat, tanggal lahir</td><td><?=($cv->tempat_lahir);?>, <?=dateindo($cv->tanggal_lahir);?></td> </tr> 
			          </table>
			          </div>
			        </div>
			        <br>
			        <div class="row">
			          <div class="col s12">
			            <h6><i class="fa fa-edit"></i> Kemampuan Diri </h6>
			          <hr>
			            <table>
			              <tr>
			                <td>Kemampian Ahli</td><td><?=$cv->kemampuan_ahli;?></td>
			              </tr>
			              <tr>
			                <td>Kemampian Menengah</td><td><?=$cv->kemampuan_menengah;?></td>
			              </tr>
			              <tr>
			                <td>Kemampian Dasar</td><td><?=$cv->kemampuan_dasar;?></td>
			              </tr>
			              <tr>
			                <td>Bahasa</td>
			                <td>
			                  <?=bahasa($cv->bahasa);?> 
			                </td>
			              </tr>
			            </table>
			          </div>
			        </div>
			        <br>
			        <div class="row">
			          <div class="col s12">
			            <h6><i class="fa fa-briefcase"></i> Pengalaman</h6>
			            <hr>
			            <table>
			              <thead>
			                <th>Posisi</th>
			                <th>Tahun Kerja</th>
			                <th>Deskripsi Pekerjaan</th>
			              </thead>
			              <?php foreach($pengalaman as $p):?>
			                <tr>
			                  <td><?=$p->posisi;?></td>
			                  <td><?=$p->dari;?> - <?=$p->sampai;?></td>
			                  <td><?=$p->deskripsi_kerja;?></td>
			                </tr>
			              <?php endforeach;?> 
			            </table>
			          </div>
			        </div>
			        <br>
			        <div class="row">
			          <div class="col s12">
			            <h6><i class="fa fa-graduation-cap"></i> Pendidikan</h6>
			            <hr>
			          <table>
			            <tr>
			              <td>Nama Institusi</td>
			              <td>Lama Belajar</td>
			              <td>Jenjang Pendidikan</td>
			            </tr>
			            <?php foreach($pendidikan as $pn):?>
			            <tr>
			              <td><?=$pn->nama_institusi;?></td>
			              <td><?=$pn->dari;?> - <?=$pn->sampai;?></td>
			              <td><?=$pn->jenjang_pendidikan;?></td>
			            </tr>
			            <?php endforeach;?>
			          </table>
			          </div>
			        </div>
			        <br>
			        <div class="row">
			          <div class="col s12">
			            <h6><i class="fa fa-files-o"></i> File Pendukung</h6>
			            <hr>
			            <table>
			            <tr>
			              <td>Nama File</td>
			              <td> Preview / Download</td>
			            </tr>
			            <tr>
			              <td>Curiculum Vitae</td>
			              <td><?=fileuser($cv->cv);?></td>
			            </tr>
			            <?php foreach($file as $f):?>
			            <tr>
			              <td><?=$f->nama_file;?></td>
			              <td><?=fileuser($f->path);?></td>
			            </tr>
			            <?php endforeach;?>
			          </table>
			          </div>
			        </div>
			      </div>
			    </div>
			  </div>
      </div> 
  </div>
</div>
  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <form id="form_lamaran" method="post" action="<?=base_url("interview/panggil_lamaran");?>">
	      <h4>Panggil Interview</h4>
	      <p>Tanggal Interview</p>
	      <input  name="idlamaran" value="<?=$idlamaran;?>" hidden>
	      <div class="row">
	      	<div class="col s6">
	      		<p></p>
	      		<input type="date" name="tanggal" class="datepicker">
	      		
	      	</div>
	      	<div class="col s6">
	      		<div class="row">
	      		<div class="col s6">
	      			<label>Jam</label>
	      				<select name="jam" >
			      			<?php 
			      				for ($i=0; $i <23 ; $i++) { ?> 
			      				<option value="<?=sprintf('%02d',$i);?>"><?=sprintf('%02d',$i);?></option>	
			      			<?php 	} ;?>
			      		</select>
			      		
	      		</div>
	      		<div class="col s6">
	      			<label>Menit</label>
	      				<select name="menit">
			      			<?php 
			      				for ($i=0; $i <60 ; $i++) { ?> 
			      				<option value="<?=sprintf('%02d',$i);?>"><?=sprintf('%02d',$i);?></option>	
			      			<?php 	} ;?>
			      		</select>
	      		</div>	
	      		</div>
	      		
	      		
	      	</div>
	      </div>
		  <br>

	      <p>Keterangan</p>
	      <textarea name="keterangan" style="height: 300px;"></textarea>
      </form>
    </div>
    <div class="modal-footer">
      <a href="#!" class="btn grey modal-close"> Tutup</a>
      <a href="#!" class="btn panggil">Panggil</a>
    </div>
  </div>
  <script type="text/javascript">
	  $(document).ready(function(){
	    $('.modal').modal();
	    $('.panggil').click(function () {
	    	var form = $('#form_lamaran').serialize();
	    	var url ='<?=base_url('interview/panggil_pelamar');?>' 
	    	$.post(url,form,function (data) {
	    	 var obj =JSON.parse(data);
	    	 swal(obj.msg,obj.param.des,obj.param.icon)
	    	})
	    })

	     $('.timepicker').pickatime({
		    default: 'now', // Set default time: 'now', '1:30AM', '16:30'
		    fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
		    twelvehour: false, // Use AM/PM or 24-hour format
		    donetext: 'OK', // text for done-button
		    cleartext: 'Clear', // text for clear-button
		    canceltext: 'Cancel', // Text for cancel-button
		    autoclose: false, // automatic close timepicker
		    ampmclickable: true, // make AM PM clickable
		    aftershow: function(){} //Function for after opening timepicker
		  });

	  });
  </script>