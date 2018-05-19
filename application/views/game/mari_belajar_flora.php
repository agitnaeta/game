<div class="container">
  <div class="row">
    <div class="col s6">
      <br>
      <img src="<?=base_url('/src/img/logo.jpg');?>" width="100%">
    </div>
    <div class="col s6">
      <h5>
         Mengenal <?=$judul;?> 
      </h5>
      <span>Di Indonesia</span>
    </div>
  </div>
  <div class="row">
    <?php foreach($flora as $f):?>
    <div class="s6 col center-align">
        <a href="#!" class="link"  data-link='<?=base_url("home/mari_belajar_flora_lengkap/$f->iditem");?>'>
          <div class="card pop">
          <div class="card-image blue">
            <img src="<?=base_url("/src/img/$f->icon");?>">
            <span class="center-align card-title-mobile"><?=$f->nama;?></span>
          </div>
        </div>
        </a>
    </div>
    <?php endforeach ;?>
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
     <a class="waves-effect waves-light btn-large btn-block btn-fixed  link" data-link="<?=base_url("home/mari_belajar");?>">
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
</script>