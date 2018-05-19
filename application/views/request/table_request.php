<div class="section no-pad-bot" id="index-banner">
  <div class="container-fluid">
  	<div class="row">
  		<div class="col s12">
  					<h5> <i class="fa fa-edit"></i> Table Request </h5>
  					<hr>
  					<p class="center-align"><?=$this->session->flashdata('pesan');?></p>
  					<a href="<?=base_url("request/form_request");?>" class="btn "><i class="fa fa-plus"></i> Tambah</a>
  			<table class="table">
  				<thead>
  						<th>Request Oleh</th>
  						<th>Jabatan</th>
  						<th>Jumlah Kebutuhan</th>
  						<th>Pendidikan</th>
  						<th>Pengalaman</th>
  						<th>Deksripsi</th>
  						<th>Alasan</th>
  						<th>Status</th>
  						<th>Action</th>
  					</thead>
  					<tbody>
  					<?php foreach($request as $r):?>
  					<tr>
  						<td><?=$r->name;?></td>
  						<td><?=$r->jabatan;?></td>
  						<td><?=$r->jumlah_kebutuhan;?></td>
  						<td><?=str_replace(",","/",$r->pendidikan);?></td>
  						<td><?=$r->pengalaman;?></td>
  						<td><?=$r->deskripsi_jabatan;?></td>
  						<td><?=$r->alasan_kebutuhan;?></td>
  						<td><?=approval($r->status);?></td>
  						<td width="20%">
  							<a href="<?=base_url("request/detail/$r->idreq");?>" class="btn blue lighten-1" title="Detail">
  								<i class="fa fa-search"></i> Detail
  							</a>
  							<a href="#" class="btn orange cancel" data-link="<?=base_url("request/cancel/$r->idreq");?>" title="Batalkan permintaan">
  								<i class="fa fa-remove"></i> Batal
  							</a>
  						</td>
  					</tr>
	  				<?php endforeach;?>
  				</tbody>
  				</table>
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
				window.location.replace('<?=base_url("request");?>') 
            }
            })
          } else {
            return false;
          }
        });
    })
  })
</script>