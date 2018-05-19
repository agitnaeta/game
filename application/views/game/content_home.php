<div class="container">
  <div class="row">
    <br>
    <img src="<?=base_url('/src/img/logo.jpg');?>" width="100%">
  </div>
  <div class="row" id="konten">
  <div class="s6 col center-align">
      <a class="link" data-link="<?=base_url("home/mari_belajar");?>" >
        <div class="card pop">
        <div class="card-image green lighten-1">
          <img src="<?=base_url('/src/img/mari_belajar.png');?>">
          <span class="card-title-mobile">Belajar</span>
        </div>
      </div>
      </a>
  </div>
  <div class="s6 col center-align">
      <a class="link" data-link="<?=base_url("home/mari_bermain");?>" >
        <div class="card pop">
          <div class="card-image red lighten-2">
            <img src="<?=base_url('/src/img/mari_bermain.png');?>">
            <span class="card-title-mobile">Bermain</span>
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
     <a class="waves-effect waves-light btn-large btn-block btn-fixed modal-trigger" href="#modal1">
         <i class="fa fa-info-circle"></i>  Tentang
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