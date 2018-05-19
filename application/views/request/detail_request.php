<div class="section no-pad-bot" id="index-banner">
  <div class="container">
  	<div class="col s12">
  		<div class="card">
  			<div class="card-content">
  				<h5><i class="fa fa-edit"></i> Detail FPK </h5>
  			</div>		
  		</div>
  		<div class="card">
  			<div class="card-content">
  				<table>
  					<tr>
  						<td>Status Approval</td>
  						<td>
  							<b><?=approval($request->status);?></b>
  						</td>
  					</tr>
  					<tr>
  						<td>Kebutuhan</td>
  						<td><?=ucfirst($request->kebutuhan);?> Tenaga Kerja</td>
  					</tr>
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
  			<div class="card-action">
  				<a href="<?=base_url("request");?>" class="btn grey"> << Kembali</a>
  				<?php if(isset($_SESSION['divisi']) or isset($_SESSION['admin'])) { ?>
	  				<a href="#" class="btn orange cancel" data-link="<?=base_url("request/cancel/$request->idreq");?>"> 
	  					<i class="fa fa-remove"></i> Batalkan
	  				</a>
  				<?php } ;?>
  				<?php if(isset($_SESSION['hrd']) or isset($_SESSION['admin']))  { ?>

  				<a href="#" class="btn red cancel" data-link="<?=base_url("request/cancel/$request->idreq");?>"> <i class="fa fa-remove"></i> Tolak</a>
  				<?php };?>
  			</div>		
  		</div>
  	</div>
  </div>
</div>
  	<script type="text/javascript">
  $(document).ready(function () {
    $('.cancel').click(function () {
      swal({
          title: "Apakah anda yakin?",
          text: "Pembatalan permintaan tidak dapat dikembalikan",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            var url = $(this).attr('data-link');
            $.get(url,function (data) {
                var obj = JSON.parse(data);
                swal({
                title: obj.msg,
                text: obj.param.des,
                icon: obj.param.icon,
              });
		        if (obj.code!='1000') {
		        }else{
					window.location.replace('<?=$_SERVER["REQUEST_URI"];?>'); 
		        }
            })
          } else {
            return false;
          }
        });
    })
  })
</script>