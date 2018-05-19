<div class="container" style="padding-top: 100px;">
	<div class="row">
		<h3 class="header center-align">E-recruitment <br>PT. Kaldu Sari Nabati</h3>
		<form method="post" action="<?=base_url("login/auth");?>">
		<div class="col s6 offset-s3">
			<div class="card">
				<div class="card-image">
					
				</div>
				<div class="card-content">
					<h5 class="header">Silahkan Login!</h5>
					<p class="center-align">
						<?=$error=(isset($msg)) ? $msg : null;?>
					</p> 
					<br>
					<label> Username</label>
					 <input placeholder="Username" id="username" name="username" type="text" class="validate">
					 <label> Password</label>
					 <input placeholder="Username" id="password" name="password" type="password" class="validate">
				</div>
				 <div class="card-action">
		          <button type="submit" class="waves-effect waves-light btn-small">Login</button>
		        </div>
			</div>
		</div>
		</form>
	</div>
</div>