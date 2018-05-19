<div class="section no-pad-bot" id="index-banner">
  <div class="container">
    <div class="row">
      <div class="col s12">
        <h5><i class="fa fa-briefcase"></i> Hasil Interview</h5>
      </div>
    </div>
    <div class="row">
      <div class="col s12">
          <table class="table">
            <thead> 
              <th>Tanggal</th>
              <th>Divisi</th>
              <th>Jabatan</th>
              <th>Nama</th>
              <th>Kontak</th>
              <th>Hasil</th>
              <th>Keterangan HRD</th>
             
            </thead>
            <tbody>
              <?php foreach($interview as $i):?>
              <tr>
                <td><?=$i->tanggal;?></td>
                <td><?=$i->name;?></td>
                <td><?=$i->jabatan;?></td>
                <td><?=$i->nama;?></td>
                <td>
                  <p><i class="fa fa-phone"></i> <?=$i->no_telp;?></p>
                  <p><i class="fa fa-envelope"></i> <?=$i->email;?></p>
                </td>
                <td><?=hasil_interview($i->hasil,'Diterima','Ditolak','Belum');?></td>
                <td>
                  <?=$i->keterangan_hasil;?>
                </td>
              </tr>
              <?php endforeach;?>
            </tbody>
          </table>
      </div>
    </div>
  </div>

  
</div>


  <!-- Modal Trigger -->


  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <form action="#" method="post" id="form_review">
    <div class="modal-content">
      <h4>Hasil Interview</h4>
      <label>Masukan hasil keputusan interview</label>
      <p>Keputusan Interview</p>
      <input type="number" name="idjadwal" name="idjadwal" id="idjadwal" hidden="">
      <select name="hasil" required="">
        <option value="">-Pilih Hasil-</option>
        <option value="ditolak">Ditolak</option>
        <option value="diterima">Diterima</option>
      </select>

      <br>
      <p>Keterangan interview</p>
      <textarea class="materialize-textarea" name="keterangan_hasil"></textarea>
       <label><i>* Masukan keterangan detail review</i></label>
      
      <br>
      <p>Password HRD </p>
      <input type="password" name="password" class="validate">
      <label><i>* Password untuk melakukan validasi</i></label>
    </div>
    </form>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Tutup</a>
      <a href="#!" class=" waves-effect waves-green btn rate">Simpan</a>
    </div>
  </div>


  <script type="text/javascript">
     $(document).ready(function(){
      $('.modal').modal();
      $('.review').click(function () {
        var id = $(this).attr('data-id');
        $('#idjadwal').val(id)
      })

      $('.rate').click(function () {
        var form = $('#form_review').serialize();
        var url = '<?=base_url('interview/rate');?>';
        $.post(url,form,function (data) {
          var obj = JSON.parse(data);
      
          
          swal({
            title: obj.msg,
            text: obj.param.des,
            icon: obj.param.icon,
          })
          .then((willDelete) => {
            if (willDelete && obj.code=='1000') {
               window.location.replace('<?=base_url("interview");?>') 
            } else {
              return false;
            }
          });


        })
      })
    });
  </script>