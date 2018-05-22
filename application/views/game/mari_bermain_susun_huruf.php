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
          <img src="<?=base_url("/src/img/$item->gambar");?>" height="100px;">
          <span class="center-align card-title-mobile">Bunga Mawar</span>
        </div>
      </div>
      </a>
  </div>
  <div class="s12 col">
    <form action="#!" method="post" id="form_ejaan">
    <table>
      <tr>
        <?php 
          $string = str_split($item->ejaan);
          $i=1;

          foreach($string as $row):
        ?>
        <td>
          <input name="string[]" id="string-<?=$i++;?>" class="validate" readonly>
        </td>
        <?php endforeach;?>
      </tr>
      <tr>
      
      <?php 
        $shuffle = str_split(str_shuffle($item->ejaan));

        foreach($shuffle as $row):
      ?>
        <td>
          <a href="#!" data-id ='<?=$row;?>' class="btn"> <?=$row;?></a>
        </td>
      <?php endforeach;?>  
      </tr>
    </table>
    </form>
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
<input type="hidden" id="count" name="" value="0">
<input type="hidden" id="max" name="" value="<?=count($string);?>">

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
          var form = $('#form_ejaan').serialize();
          var url = './home/validation_ejaan/<?=$item->iditem;?>';
          $.post(url,form,function (data) {
            var obj = JSON.parse(data);
              swal(obj.msg,obj.param.des,obj.param.icon)
              if (obj.code=='1000') {
                $('#index-banner').load('./home/bermain_susun_huruf');
              }else{

                console.log(obj.code)
                $('.validate').val('');
                return false;
              }
          })
     }else{
       $('#count').val(next)
     }
  })
</script>