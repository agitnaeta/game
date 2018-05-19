<div class="section no-pad-bot" id="index-banner">
  <div class="container">
  	<h3 class="header center-align">E-recruitment <br>PT. Kaldu Sari Nabati</h3>
   <h5><i class="fa fa-users"></i> Form Pendaftaran</h5>
   <form method="post" action="<?=base_url("daftar/add_user");?>">
     
    <div class="card">
      <div class="card-content">
            <p class ="center-align">
              <?=$this->session->flashdata('pesan');?>
            </p>
           <label>Name </label>
           <input class="validate" name="name" required="" value="<?=set_value("name");?>">
           <?=form_error('name');?>
            <input name="role" value="3" hidden="">
          
           <label>Username</label>
           <input required="" class="validate" name="username" value="<?=set_value("username");?>">
           <?=form_error('username');?>
           
           <label>Password</label>
           <input required="" class="validate" name="password" type="password" value="<?=set_value("password");?>">
           <?=form_error('password');?>
      </div>
      <div class="card-action ">
        <button type="submit" class="waves-effect waves-light btn"><i class="fa fa-edit"></i> Daftar</button>
       
      </div>
    </div>
   </form>
  </div>
</div>