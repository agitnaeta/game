<form action="<?=base_url("panel/update");?>" method="post" enctype="multipart/form-data">
<div class="container">
	<div class="col s6 offset-s3">
		<div class="card">
			<div class="card-content">
				<h5>Tambah Item</h5>
				<?=$error;?>
			</div>
			<div class="card-content">
				<label>Nama</label>
				<input hidden class="validate" name="iditem" value="<?=$item->iditem;?>" placeholder="Nama Item">
				<input required class="validate" name="nama" value="<?=$item->nama;?>" placeholder="Nama Item">
				
				<label>Type</label>
				<select name="type" required="" id="type">
					<option value="">-Pilih Type-</option>
					<option value="flora">Flora</option>
					<option value="flora">Fauna</option>
				</select>
				<label>Deskripsi</label>
				<textarea name="deskripsi" class="materialize-textarea"  required=""><?=$item->deskripsi;?></textarea>
				<div class="row">
					<div class="s4">
						<label>Suara</label>
					</div>
					<div class="s6">
						<input type="file" name="suara" >
						<span>Tinggalkan kosong jika tidak di edit</span>
					</div>
				</div>
				<div class="row">
					<div class="s4">
						<label>Suara Deskripsi</label>
					</div>
					<div class="s6">
						<input type="file" name="suara_deskripsi" >
						<span>Tinggalkan kosong jika tidak di edit</span>
					</div>
				</div>
				<div class="row">
					<div class="s4">
						<label>Gambar</label>
					</div>
					<div class="s6">
						<input type="file" name="gambar" >
						<span>Tinggalkan kosong jika tidak di edit</span>
					</div>
				</div>
			</div>
			<div class="card-action">
				<button class="btn "> Simpan</button>
				<a href="<?=base_url("panel/table");?>" class="btn grey"> << Kembali</a>
			</div>
		</div>
	</div>
</div>
</form>
<script type="text/javascript">
	$(document).ready(function () {
		var type = '<?=$item->type;?>';
		$('#type').val(type);
	})
</script>