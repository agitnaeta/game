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
          <img src="<?=base_url('/src/img/flora_icon.png');?>" height="100px;">
          <span class="center-align card-title-mobile">Bunga Mawar</span>
        </div>
      </div>
      </a>
  </div>
  <div class="s12 col">
    <table>
      <tr>
        <td>
          <input name="string[]" id="string-1" class="validate" readonly id="f">
        </td>
        <td>
          <input name="string[]" id="string-2" class="validate" readonly>
        </td>
        <td>
          <input name="string[]" id="string-3" class="validate" readonly>
        </td>
        <td>
          <input name="string[]" id="string-4" class="validate" readonly>
        </td>
        <td>
          <input name="string[]" id="string-5" class="validate" readonly>
        </td>
      </tr>
      <tr>
        <td>
          <a href="#!" data-id ='m' class="btn"> M</a>
        </td>
        <td>
          <a href="#!" data-id='a' class="btn"> A</a>
        </td>
        <td>
          <a href="#!" data-id='r' class="btn"> R</a>
        </td>
        <td>
          <a href="#!" data-id='w' class="btn"> W</a>
        </td>
        <td>
          <a href="#!" data-id='a' class="btn"> A</a>
        </td>
      </tr>
    </table>
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
<input type="" id="count" name="" value="0">
<input type="" id="max" name="" value="5">
<audio  class="audios" id="yes-audio" controls preload="none">  
<source src="<?=base_url("src/sound/bunga_mawar.mp3");?>" type="audio/mpeg">
</audio>
<audio  class="audios" id="yes-audio-info" controls preload="none"> 
<source src="<?=base_url("src/sound/bunga_mawar_deskripsi.mp3");?>" type="audio/mpeg">
</audio>
<script type="text/javascript">
  $('.link').click(function load_link() {
    var link = $(this).attr('data-link')
    $('#index-banner').load(link)
  })
  $(document).ready(function () {
    $('#f').focus()
  })
  $('.btn').click(function () {
     var string = $(this).attr('data-id');
     var count  = $('#count').val();
     var next   = parseInt(count)+1;
     var max    = $('#max').val();
     $('#string-'+next).val(string)
     if (parseInt(max)==next) {
      swal('success','Yeay','success')
     }else{
       $('#count').val(next)
     }
  })
</script>