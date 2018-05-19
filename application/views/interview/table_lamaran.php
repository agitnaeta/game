<div class="section no-pad-bot" id="index-banner">
  <div class="container-fluid">
    <div class="row">
      <div class="col s12">
        <h5><i class="fa fa-briefcase"></i> List Lamaran Pekejaan</h5>
      </div>
    </div>
    <div class="row">
      <div class="col s4">
           <?php foreach($loker as $r):?>
              <div class="card">
                <div class="card-content">
                  <h6><?=$r->jabatan;?> (<?=$r->lamaran;?>)</h6>
                  <table id="table-<?=$r->idreq;?>" class="block_hide">
                    <tr>
                      <td>Divisi</td><td><?=$r->name;?></td>
                    </tr>
                    <tr>
                       <td>Dibutuhkan</td><td><?=$r->jumlah_kebutuhan;?> orang</td>
                    </tr>
                    <tr>
                      <td>Pelamar</td><td><?=$r->lamaran;?> orang</td>
                    </tr>
                  </table>
                </div>
                <div class="card-action right-align">
                  <a class="btn tinjau" data-req='<?=$r->idreq;?>'> Tinjau >></a>
                </div>
              </div>
           <?php endforeach;?>
      </div>
      <div id="table_loker" class="col s8 center-align">
        <h6 style="color:grey"><i class="fa fa-briefcase fa-3x"></i><br> Klik Tinjau Berdasarkan Lowongan Kerja</h6>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function () {
    var link_detail = '<?=base_url('interview/list_pelamar');?>/';

    $('.block_hide').hide()
    $('.tinjau').click(function () {
       var rq = $(this).attr('data-req')
       $('#table-'+rq).show();


       $.get(link_detail+rq,function (data) {
          $('#table_loker').html(data);
       })
    })
  })
</script>