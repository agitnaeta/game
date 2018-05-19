<div class="container">
  <div class="row center-align">
    <img height="100px" src="<?=base_url('/src/img/logo.jpg');?>" width="160px">
  </div>
  <div class="row">
  <div class="s6 col center-align">
      <a   class="link" data-link='<?=base_url("/home/bermain_puzzle");?>' >
        <div class="card pop">
        <div class="card-image center-align orange lighten-1">
          <img src="<?=base_url('/src/img/puzzle-icon.png');?>">
          <span class="card-title-mobile ">Puzzle</span>
        </div>
      </div>
      </a>
  </div>
  <div class="s6 col center-align">
      <a  class="link" data-link='<?=base_url("/home/bermain_susun_huruf");?>' >
        <div class="card pop">
          <div class="card-image center-align green">
            <img src="<?=base_url('/src/img/susun_huruf_icon.png');?>">
            <span class="card-title-mobile ">Susun Huruf</span>
          </div>
        </div>
      </a>
  </div>
  </div>
  <div class="row">
    <div class="col s6 offset-s3">
      <a  class="link" data-link='<?=base_url("/home/bermain_tebak_gambar");?>' >
        <div class="card pop">
          <div class="card-image center-align red lighten-2">
            <img src="<?=base_url('/src/img/tebak_gambar_icon.png');?>">
            <span class="card-title-mobile ">Tebak Gambar</span>
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