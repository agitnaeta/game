<div class="container">
  <div class="row">
    <br>
    <img src="<?=base_url('/src/img/logo.jpg');?>" width="100%">
  </div>
  <div class="row">
  <div class="s6 col center-align">
      <a   class="link" data-link='<?=base_url("/home/mari_belajar_flora");?>' >
        <div class="card pop">
        <div class="card-image blue">
          <img src="<?=base_url('/src/img/flora_icon.png');?>">
          <span class="card-title-mobile">Flora</span>
        </div>
      </div>
      </a>
  </div>
  <div class="s6 col center-align">
      <a  class="link" data-link='<?=base_url("/home/mari_belajar_fauna");?>' >
        <div class="card pop">
          <div class="card-image orange">
            <img src="<?=base_url('/src/img/fauna_icon.png');?>">
            <span class="card-title-mobile">Fauna</span>
          </div>
        </div>
      </a>
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
     <a class="waves-effect waves-light btn-large btn-block btn-fixed  link" data-link='<?=base_url('home/content_home');?>'>
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