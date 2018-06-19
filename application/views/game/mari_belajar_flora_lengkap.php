<div class="container">
   <div class="row">
    <div class="col s6">
      <br>
      <img src="<?=base_url('/src/img/logo.jpg');?>" width="100%">
    </div>
    <div class="col s6">
      <h5>
         Mengenal <?=ucfirst($judul);?> 
      </h5>
      <span>Di Indonesia</span>
    </div>
  </div>
  <div class="row">
  <div class="s12 col center-align">
      <a href="#!" >
        <div class="card pop">
        <div class="card-image blue">
          <img src="<?=base_url("/src/img/$f->gambar");?>" height="100px;">
          <span class="center-align card-title-mobile"><?=$f->nama;?></span>
        </div>
      </div>
      </a>
  </div>
  <div class="s12 col">
     <div class="row">
       <div class="col s6">
         <a href="#modal1" class="btn btn-block  modal-trigger play"><i class="fa fa-play"></i> Mainkan </a>
       </div>
       <div class="s6 col">
        <a href="#modal_ejaan" class="btn btn-block modal-trigger"><i class="fa fa-edit"></i> Ejaan </a>
       </div>
     </div>
     <a href="#modal_info" class="btn btn-block btn-large modal-trigger play_info"><i class="fa fa-info-circle"></i> Info</a>
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
     <a class="waves-effect waves-light btn-large btn-block btn-fixed link" data-link="<?=base_url('home/mari_belajar_flora');?>">
         <i class="fa fa-backward"></i>  Kembali
    </a>
    </div>
  </div>
</div>
<div id="modal1" class="modal">
    <div class="modal-content">
      <h6>Belajar <?=$f->nama;?></h6>
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
        <?php $split = str_split($f->ejaan);?>
        <?php foreach($split as $row):?>
        <td><?=strtoupper($row);?></td>
        <?php endforeach;?>
      </tr>
    </table>
     <a href="#!" class="modal-close waves-effect waves-green btn btn-block"> Aku Mengerti!</a>
  </div>
</div>
 <div id="modal_info" class="modal bottom-sheet-full">
  <div class="modal-content">
    <h6><i class="fa fa-edit"></i> Informasi </h6>
    <blockquote>
     <?=$f->deskripsi;?>
    </blockquote>
     <a href="#!" class="modal-close waves-effect waves-green btn btn-block play_info_stop"> Aku Mengerti!</a>
  </div>
</div>
<audio  class="audios" id="yes-audio" controls preload="none">  
<source src="<?=base_url("src/sound/$f->suara");?>" type="audio/mpeg">
</audio>
<audio  class="audios" id="yes-audio-info" controls preload="none"> 
<source src="<?=base_url("src/sound/$f->suara_deskripsi");?>" type="audio/mpeg">
</audio>
<script type="text/javascript">
  $('.link').click(function load_link() {
    var link = $(this).attr('data-link')
    $('#index-banner').load(link)
  })
  $('.modal').modal()
  $('.play').click(function () {
    var x = document.getElementById("yes-audio"); 
    x.play();
  })
  $('.play_info').click(function () {
    var x = document.getElementById("yes-audio-info"); 
    x.play();
  })
   $('.play_info_stop').click(function () {
    var x = document.getElementById("yes-audio-info"); 
    x.pause();
    x.currentTime = 0;
  })
</script>