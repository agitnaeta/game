<div class="container">
   <div class="row">
    <div class="col s6">
      <br>
      <img src="<?=base_url('/src/img/logo.jpg');?>" width="100%">
    </div>
    <div class="col s6">
      <h5>
          Susun Huruf
      </h5>
    </div>
  </div>
  <div class="row">
  <div class="s12 col center-align">
      <a href="#!" >
        <div class="card pop">
        <div class="card-image blue">
          <img src="<?=base_url("/src/img/");?><?=$item['gambar'];?>" height="100px;">
          <span class="center-align card-title-mobile">Bunga Mawar</span>
        </div>
      </div>
      </a>
  </div>
  <div class="s12">
    <div class="row center-align">
      <?php foreach($urutan as $row):?>
      <div class="s6 col">
        <a href="#!" data-id="<?=$pilih[$row]['iditem'];?>" class="jawab btn btn-large"><?php print_r($pilih[$row]['nama']);?></a>
        <br>
        <br>
        <br>

      </div>

      <?php endforeach;?>
     
    </div>
  </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
 <div class="row">
    <div class="col s12">
     <a class="waves-effect waves-light btn-large btn-block btn-fixed link" data-link="<?=base_url('home/mari_bermain');?>">
         <i class="fa fa-backward"></i>  Kembali
    </a>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('.link').click(function load_link() {
    var link = $(this).attr('data-link')
    $('#index-banner').load(link)
  })
  $(document).ready(function () {
    $('#f').focus()
  })

  $('.jawab').click(function () {
      var iditem = $(this).attr('data-id');
      var url ='./home/tebak/<?=$item['iditem'];?>';
      $.post(url,{iditem:iditem},function (data) {
        var obj = JSON.parse(data);
        swal(obj.msg, obj.param.des,obj.param.icon)
      })
  })
</script>