<div class="section no-pad-bot" id="index-banner">
  <div class="container">
  	<form method="post" action="<?=base_url("request/add_request");?>">
  		<div class="col s6 offset-s3">
  			<div class="card">
					<div class="card-content">
			  			<h5><i class="fa fa-edit"></i> Form Permintaan Karyawan</h5>
					</div>
					<div class="card-content">
						<div class="row">
							<div class="col s4">
								<p>Kebutuhan Tenaga Kerja</p>
							</div>
						<div class="col s8">
							<label>
						        <input name="kebutuhan" type="radio" value="penggantian" />
						        <span> Penggantian Tenaga Kerja</span>
						     </label>
							<label>
						        <input name="kebutuhan" type="radio" value="penambahan" />
						        <span> Penambahan Tenaga Kerja</span>
						      </label>
						      <span><?=form_error('kebutuhan');?></span>
						</div>
						</div>
						<div class="row">
							<div class="col s4">
								Jabatan
							</div>
							<div class="col s8">
								<input class="validate" name="jabatan" value="<?=set_value('jabatan');?>">
								<span><?=form_error('jabatan');?></span>
							</div>
						</div>
						<div class="row">
							<div class="col s4">
								Level
							</div>
							<div class="col s8">
								<label>
									<input type="radio" name="level" value="staff">
									<span>Staff</span>
								</label>
								<label>
									<input type="radio" name="level" value="middle">
									<span>Middle</span>
								</label>
								<label>
									<input type="radio" name="senior" value="senior">
									<span>Senior</span>
								</label>
								<span><?=form_error('level');?></span>
							</div>
						</div>
						<div class="row">
							<div class="col s4">
								Jumlah Kebutuhan
							</div>
							<div class="col s8">
							  <label>
						        <input class="jumlah_kebutuhan" name="j_kebutuhan" type="radio" value="1" />
						        <span>1</span>
						      </label>
						      <label>
						        <input class="jumlah_kebutuhan" name="j_kebutuhan" type="radio" value="2" />
						        <span>2</span>
						      </label>
						      <label>
						        <input class="jumlah_kebutuhan" name="j_kebutuhan" type="radio" value="0" />
						        <span>Lainnya</span>
						      </label>
						      <label>
						      	<input placeholder="minimal 1" type="number" type="text" name="jumlah_kebutuhan" value="" id="jumlah_kebutuhan" />
						      </label>
						      <span><?=form_error('jumlah_kebutuhan');?></span>
							</div>
						</div>
						<div class="row">
							<div class="col s4">
								Jenis Kelamin
							</div>
							<div class="col s8">
							  <label>
						        <input name="jenis_kelamin" type="radio" value='l'/>
						        <span>Laki-Laki</span>
						      </label>
						      <label>
						        <input name="jenis_kelamin" type="radio" value="p"/>
						        <span>Perempuan</span>
						      </label>
								<span><?=form_error('jenis_kelamin');?></span>
							</div>
						</div>
						<div class="row">
							<div class="col s4">
								Usia maximal
							</div>
							<div class="col s8">
								<input class="validate" name="usia" type="number" value="<?=set_value('usia');?>">
								<span><?=form_error('usia');?></span>
							</div>
						</div>
						<div class="row">
							<div class="col s4">
								Status Perkawinan
							</div>
							<div class="col s8">
							   <label>
						        <input name="status_perkawinan" type="radio" value="kawin" />
						        <span> Kawin</span>
						      </label>
						      <label>
						        <input name="status_perkawinan" type="radio" value="belum_nikah" />
						        <span> Belum Kawin</span>
						      </label>
						      <span><?=form_error('status_perkawinan');?></span>
							</div>
						</div>
						<div class="row">
							<div class="col s4">
								Agama
							</div>
							<div class="col s8">
							   <label>
						        <input name="agama[]" type="checkbox" value="islam" />
						        <span> Islam</span>
						      </label>
						      <label>
						        <input name="agama[]" type="checkbox" value="protestan" />
						        <span> Protestan</span>
						      </label>
						      <label>
						        <input name="agama[]" type="checkbox" value="katolik" />
						        <span> Katolik</span>
						      </label>
						      <label>
						        <input name="agama[]" type="checkbox" value="budha" />
						        <span> Budha</span>
						      </label>
						      <label>
						        <input name="agama[]" type="checkbox" value="hindu" />
						        <span> Hindu</span>
						      </label>
						      <span><?=form_error('agama');?></span>
							</div>
						</div>
						<div class="row">
							<div class="col s4"> Etnis</div>
							<div class="col s8"> 
								<input name="etnis" class="validate" value="<?=set_value('etnis');?>">
								<span><?=form_error('etnis');?></span>
							</div>
						</div>
						<div class="row">
							<div class="col s4">Pendidikan </div>
							<div class="col s8">
						      <label>
						        <input name="pendidikan[]" type="checkbox" value="smu" />
						        <span> SMK/SMU</span>
						      </label>
						      <label>
						        <input name="pendidikan[]" type="checkbox" value="d2" />
						        <span> D2</span>
						      </label>
						       <label>
						        <input name="pendidikan[]" type="checkbox" value="d3" />
						        <span> D3</span>
						       </label>
							   <label>
						        <input name="pendidikan[]" type="checkbox" value="s1" />
						        <span>  S1</span>
						      </label>
							  <label>
						        <input name="pendidikan[]" type="checkbox" value="s2" />
						        <span> S2</span>
						      </label>
						      <span><?=form_error('pendidikan');?></span>
							</div>
						</div>
						<div class="row">
							<div class="col s4"> Pengalaman</div>
							<div class="col s8"> 
								<textarea class="materialize-textarea" name="pengalaman"><?=set_value('pengalaman');?></textarea>
								<span><?=form_error('pengalaman');?></span>
							</div>
						</div>
						<div class="row">
							<div class="col s4"> Deksripsi Jabatan</div>
							<div class="col s8"> 
								<textarea class="materialize-textarea" name="deskripsi_jabatan"><?=set_value('deskripsi_jabatan');?></textarea>
								<span><?=form_error('deskripsi_jabatan');?></span>
							</div>
						</div>
						<div class="row">
							<div class="col s4"> Alasan Kebutuan</div>
							<div class="col s8"> 
								<textarea class="materialize-textarea" name="alasan_kebutuhan"><?=set_value('alasan_kebutuhan');?></textarea>
								<span><?=form_error('alasan_kebutuhan');?></span>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button type="submit" class=" btn "> <i class="fa fa-edit"></i> Ajukan</button>
						<a href="<?=base_url("request");?>" class="btn grey"> << Batal Requets</a>
					</div>
  			</div>
  		</div>
  	</form>	
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$('#jumlah_kebutuhan').hide();
		$('.jumlah_kebutuhan').click(function () {
			var jumlah_kebutuhan = $(this).val();
			if (jumlah_kebutuhan==0) {
				$('#jumlah_kebutuhan').show();
				$('#jumlah_kebutuhan').val(3);
			}else if(jumlah_kebutuhan==1 || jumlah_kebutuhan==2){
				$('#jumlah_kebutuhan').val(jumlah_kebutuhan);
				$('#jumlah_kebutuhan').hide()
			}
		})
	})
</script>