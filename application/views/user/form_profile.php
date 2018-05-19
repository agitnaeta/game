<div class="section no-pad-bot" id="index-banner">
  <div class="container">
   <h5><i class="fa fa-users"></i> Profile </h5>
   <form method="post" action="<?=base_url("user/edit_user_profile");?>">
    <?php foreach($users as $user):?> 
    <div class="card">
      <div class="card-content">
            <p class ="center-align">
              <?=$this->session->flashdata('pesan');?>
            </p>
           <label>Name </label>
           <input class="validate" name="iduser" required="" hidden="" value="<?=$user->iduser;?>">
           <input class="validate" name="name" required="" value="<?=$user->name;?>">
           <?=form_error('name');?>
            <input name="role" value="3" hidden>
           <label>Username</label>
           <input required="" class="validate" name="username" value="<?=$user->username;?>">
           <?=form_error('username');?>
           <label>Password</label>
           <input required="" class="validate" name="password" type="password" value="<?=$user->password;?>">
           <?=form_error('password');?>
      </div>
      <div class="card-action ">
        <button type="submit" class="waves-effect waves-light btn"><i class="fa fa-save"></i> Save</button>
        <a class="btn grey" href="<?=base_url("dashboard");?>"> << back</a>
      </div>
    </div>
    <?php endforeach;?>
   </form>
  </div>
</div>

