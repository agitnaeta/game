<div class="section no-pad-bot" id="index-banner">
  <div class="container">
   <h5><i class="fa fa-users"></i> Add User</h5>
   <form method="post" action="<?=base_url("user/add_user");?>">
     
    <div class="card">
      <div class="card-content">
            <p class ="center-align">
              <?=$this->session->flashdata('pesan');?>
            </p>
           <label>Name / Division Name</label>
           <input class="validate" name="name" required="" value="<?=set_value("name");?>">
           <?=form_error('name');?>
           <label>Role</label>
            <select name="role" class="browser-default">
             <option required value="" disabled selected>Pilih Role</option>
              <option value="0">Admin</option>
              <option value="1">HRD</option>
              <option value="2">Divisi</option>
              <option value="3">Pelamar</option>
              <option value="4">Management</option>
            </select>
            <?=form_error('role');?>
           <label>Username</label>
           <input required="" class="validate" name="username" value="<?=set_value("username");?>">
           <?=form_error('username');?>
           <label>Password</label>
           <input required="" class="validate" name="password" type="password" value="<?=set_value("password");?>">
           <?=form_error('password');?>
      </div>
      <div class="card-action ">
        <button type="submit" class="waves-effect waves-light btn"><i class="fa fa-save"></i> Save</button>
        <a class="btn grey" href="<?=base_url("user");?>"> << back</a>
      </div>
    </div>
   </form>
  </div>
</div>