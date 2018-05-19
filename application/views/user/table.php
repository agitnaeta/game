<div class="section no-pad-bot" id="index-banner">
  <div class="container">
   <h5><i class="fa fa-users"></i> Manage User</h5>
   <hr>
   <div class="left-align" style="padding-bottom: 10px !important">
     <a href="<?=base_url("user/add");?>" class="waves-effect waves-light btn">
       <i class="fa fa-plus"></i> Add User
     </a>
   </div>
   <div class="center-align">
      <?=$this->session->flashdata('pesan');?>
   </div>
   <table  class="table">
     <thead>
       <th>Name / Division</th>
       <th>Role</th>
       <th>Username</th>
       <th>Action</th>
     </thead>
      <tbody>
        <?php foreach ($users as $user) :?>
          <tr>
            <td><?=$user->name;?></td>
            <td><?=role($user->role);?></td>
            <td><?=$user->username;?></td>
            <td width="30%">
              <a href ="<?=base_url("user/edit/$user->iduser");?>" class="waves-effect orange btn">
               <i class="fa fa-edit"></i> Edit
             </a>
              <a data-link="<?=base_url("user/delete/$user->iduser");?>" class="waves-effect red btn remove">
               <i class="fa fa-trash"></i> Remove
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

    
    $('.remove').click(function () {
      swal({
          title: "Apakah anda yakin?",
          text: "Ketika di delete data tidak akan kembali",
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
                if (obj.code!=1000) {
                }else{
                  window.location.replace('<?=base_url("user");?>') 
                }
            })
            
          } else {
            return false;
          }
        });
    })
  })
</script>