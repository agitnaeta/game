<form id="form_item" method="post">
<div class="container-fluid">
	<div class="row">
		<div class="col s8 offset-s2">
			<div class="card">
				<div class="card-content">
					<h6>
						<i class="fa fa-table"></i> Table Item
					</h6>
				</div>
			</div>
			<div class="card">
				<p class="center-align"><?=$msg;?></p>
				<div class="card-content">
					<a href="<?=base_url("panel/add");?>" class="btn"><i class="fa fa-plus"></i> Tambah</a>
					<a href="#!" class="btn red submit_delete"><i class="fa fa-trash"></i> Delete</a>
					<a href="#!" class="btn orange submit_edit"><i class="fa fa-edit"></i> Edit</a>
				</div>
				<div class="card-content">

					<table class="table">
						<thead>
							<th>#</th>
							<th>Nama</th>
							<th>Code</th>
							<th>Ejaan</th>
							<th>Type</th>
							<th>Gambar</th>
							<th>Icon</th>
							
						</thead>
						<tbody>
						<?php foreach ($item as $i):?>
							<tr>
								<td>
									 <p>
								      <label>
								        <input type="checkbox" name="iditem[]" value="<?=$i->iditem;?>" />
								        <span></span>
								      </label>
								    </p>
								</td>
								<td><?=$i->nama;?></td>
								<td><?=$i->code;?></td>
								<td><?=strtoupper($i->ejaan);?></td>
								<td><?=$i->type;?></td>
								<td>
									<a href="<?=base_url();?>src/img/<?=$i->gambar;?>" target="__blank"><?=$i->nama;?></a>
								</td>
								<td>
									<a href="<?=base_url();?>src/img/<?=$i->icon;?>" target="__blank">Icon <?=$i->nama;?></a>
								</td>
								

							</tr>
						<?php endforeach;?>	
					</tbody>
					</table>
					
				</div>
			</div>
		</div>
	</div>
</div>
</form>
<script type="text/javascript">
	 $('table').DataTable();
	 $(document).ready(function () {
	 	$('.form-control').attr("placeholder"," Cari Item")
	 })

	 $('.submit_delete').click(function () {
	 	swal({
		  title: "Apakah Anda Yakun",
		  text: "Data tidak dapat dikembalikan ketika di hapus",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		     var form = $('#form_item').serialize();
		     $.post('<?=base_url("panel/delete");?>',form,function (data) {
		     	var obj = JSON.parse(data)
		     	swal(obj.msg,obj.param.des,obj.param.icon)
		     	.then((value) => {
				  	if(obj.code=='1000'){
				  		location.reload();
				  	}
				})

		     })
		  } else {
		    swal("Okay, data aman");
		  }
		});
	 })

	 $('.submit_edit').click(function () {
	 	 var form = $('#form_item').serialize();
	 	 	$.post('<?=base_url("panel/edit");?>',form,function (data) {
		     	var obj = JSON.parse(data)
		     	if(obj.code!=1000){
			     	swal(obj.msg,obj.param.des,obj.param.icon)
		     	}else{
		     		window.location.href = obj.param.des;
		     	}

		    })
	 })
</script>