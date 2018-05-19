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
  <div class="s12">
   	<div class="row center-align">
   		<div class="s6 col">
   			<a href="#!" class="btn">{PIlihan}</a>
   		</div>
   		<div class="s6 col">
   			<a href="#!" class="btn">{PIlihan}</a>
   		</div>
   		  <div class="s12 col">
   		  	<br>
   		  </div>
   		<div class="s6 col">
   			<a href="#!" class="btn">{PIlihan}</a>
   		</div>
   		<div class="s6 col">
   			<a href="#!" class="btn">{PIlihan}</a>
   		</div>
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
<div id="modal1" class="modal">
    <div class="modal-content">
      <h6>Belajar Bunga Mawar</h6>
      <div class="row">
        <div class="s6 col">
          <img height="200px" src="<?=base_url('./src/img/guru.jpg');?>">
        </div>
        <div class="s6 col center-align" style="padding-top: 80px">
          <a href="#!"> <i class="fa fa-play  fa-spin fa-3x"></i></a>
        </div>
       <a href="#!" class="modal-close waves-effect waves-green btn btn-block"> Aku Mengerti!</a>
      </div>
    </div>
  </div>
 <div id="modal_ejaan" class="modal">
  <div class="modal-content">
    <h6><i class="fa fa-edit"></i> Ejaan </h6>
    <table>
      <tr>
        <td>M</td>
        <td>A</td>
        <td>W</td>
        <td>A</td>
        <td>R</td>
      </tr>
    </table>
     <a href="#!" class="modal-close waves-effect waves-green btn btn-block"> Aku Mengerti!</a>
  </div>
</div>
 <div id="modal_info" class="modal bottom-sheet-full">
  <div class="modal-content">
    <h6><i class="fa fa-edit"></i> Informasi </h6>
    <blockquote>
      Mawar adalah suatu jenis tanaman semak dari genus Rosa sekaligus nama bunga yang dihasilkan tanaman ini. Mawar liar terdiri dari 100 spesies lebih, kebanyakan tumbuh di belahan bumi utara yang berudara sejuk. Spesies mawar umumnya merupakan tanaman semak yang berduri atau tanaman memanjat yang tingginya bisa mencapai 2 sampai 5 meter. Walaupun jarang ditemui, tinggi tanaman mawar yang merambat di tanaman lain bisa mencapai 20 meter.
    </blockquote>
     <a href="#!" class="modal-close waves-effect waves-green btn btn-block play_info_stop"> Aku Mengerti!</a>
  </div>
</div>
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
</script>