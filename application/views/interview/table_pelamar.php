<table class="table">
	<thead>
		<th>Foto</th>
		<th>Nama</th>
		<th>Kontak</th>
		<th>J.Kelamin</th>
		<th>Lahir</th>
		<th>Preview</th>
	</thead>
	<tbody>
		<?php foreach($pelamar as $p):?>
		<tr>
			<td width="5%">
				<?=fileuser($p->foto);?>
			</td>
			<td>
				<?=$p->nama;?>
			</td>
			<td>
				<p><i class="fa fa-phone"></i> <?=$p->no_telp;?></p>
				<p><i class="fa fa-envelope"></i> <?=$p->email;?></p>
			</td>
			<td><?=jk($p->jenis_kelamin);?></td>
			<td><?=dateindo($p->tanggal_lahir);?></td>
			<td >
				<a href="<?=base_url("interview/detail_pelamar/$idreq/$p->idcv");?>" class="btn"><i class="fa fa-search"></i> </a>
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>
