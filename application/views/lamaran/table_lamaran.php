<div class="section no-pad-bot" id="index-banner">
  <div class="container">
  	<div class="row">
  		<div class="col s12">
  			<h5><i class="fa fa-briefcase"></i> Lowongan Pekerjaan</h5>
  		</div>
  	</div>
  	<div class="row">
  		<div class="col s12">
  		<table class="table">
  			<thead>
  				<th>Jabatan</th>
  				<th>Level</th>
  				<th>Jenis Kelamin</th>
  				<th>Jumlah Loker</th>
  				<th>Usia Maximal</th>
  				<th>Pendidikan</th>
  				<th>Status Lamaran</th>
  				<td>Action</td>
  			</thead>
  			<tbody>
	  			<?php foreach($request as $row):?>
	  			<tr>
	  				<td> <?=$row->jabatan;?> </td> 
	  				<td> <?=$row->level;?> </td> 
	  				<td> <?=jk($row->jenis_kelamin);?> </td> 
	  				<td> <?=$row->jumlah_kebutuhan;?> Orang</td> 
	  				<td> <?=$row->usia;?> </td> 
	  				<td> <?=str_replace(",","/",$row->pendidikan);?> </td> 
	  				<td> <?=yesno($row->lamaran,"Mengajukan","Belum Mengajukan");?>  </td> 
	  				<td width="30%">
	  					<a href="<?=base_url("lamaran/detail/$row->idreq");?>" class="btn "> <i class="fa fa-seach"></i> Detail</a>
	  				</td>
	  			</tr>
		  		<?php endforeach;?>
	  		</tbody>
  		</table>
  		</div>
  	</div>
  </div>
</div>