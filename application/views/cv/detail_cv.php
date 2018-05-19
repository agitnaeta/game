<div class="section no-pad-bot" id="index-banner">
  <div class="container">
    <div class="right-align">
        <a href="<?=base_url("cv/form_edit_cv/$cv->idcv");?>" class="btn orange"><i class="fa fa-edit"></i> Update CV</a>
        <a href="<?=base_url("cv/print/$cv->idcv");?>" target="__blank"  class="btn grey"><i class="fa fa-print"></i> Cetak CV</a>
    </div>
    <div class="card">
      <div class="card-content">
        <div class="row">
          <div class="col s12">
            <h6><i class="fa fa-user"></i> Data Diri</h6>
             <?=$this->session->flashdata('pesan');?>
          <hr>    
          </div>
          <div class="col s4">
            <img width="100%" src="<?=base_url("uploads/$cv->foto");?>">
          </div>
          <div class="col s8">
          <table>
            <tr> <td>Nama Lengkap</td><td><?=$cv->nama;?></td> </tr> 
            <tr> <td>No Telp</td><td><?=$cv->no_telp;?></td> </tr> 
            <tr> <td>Email </td><td><a href="mailto:<?=$cv->email;?>"> <?=$cv->email;?></a></td> </tr> 
            <tr> <td>Jenis Kelamin</td><td><?=jk($cv->jenis_kelamin);?></td> </tr> 
            <tr> <td>Tempat, tanggal lahir</td><td><?=($cv->tempat_lahir);?>, <?=dateindo($cv->tanggal_lahir);?></td> </tr> 
          </table>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col s12">
            <h6><i class="fa fa-edit"></i> Kemampuan Diri </h6>
          <hr>
            <table>
              <tr>
                <td>Kemampian Ahli</td><td><?=$cv->kemampuan_ahli;?></td>
              </tr>
              <tr>
                <td>Kemampian Menengah</td><td><?=$cv->kemampuan_menengah;?></td>
              </tr>
              <tr>
                <td>Kemampian Dasar</td><td><?=$cv->kemampuan_dasar;?></td>
              </tr>
              <tr>
                <td>Bahasa</td>
                <td>
                  <?=bahasa($cv->bahasa);?> 
                </td>
              </tr>
            </table>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col s12">
            <h6><i class="fa fa-briefcase"></i> Pengalaman</h6>
            <hr>
            <table>
              <thead>
                <th>Posisi</th>
                <th>Tahun Kerja</th>
                <th>Deskripsi Pekerjaan</th>
              </thead>
              <?php foreach($pengalaman as $p):?>
                <tr>
                  <td><?=$p->posisi;?></td>
                  <td><?=$p->dari;?> - <?=$p->sampai;?></td>
                  <td><?=$p->deskripsi_kerja;?></td>
                </tr>
              <?php endforeach;?> 
            </table>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col s12">
            <h6><i class="fa fa-graduation-cap"></i> Pendidikan</h6>
            <hr>
          <table>
            <tr>
              <td>Nama Institusi</td>
              <td>Lama Belajar</td>
              <td>Jenjang Pendidikan</td>
            </tr>
            <?php foreach($pendidikan as $pn):?>
            <tr>
              <td><?=$pn->nama_institusi;?></td>
              <td><?=$pn->dari;?> - <?=$pn->sampai;?></td>
              <td><?=$pn->jenjang_pendidikan;?></td>
            </tr>
            <?php endforeach;?>
          </table>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col s12">
            <h6><i class="fa fa-files-o"></i> File Pendukung</h6>
            <hr>
            <table>
            <tr>
              <td>Nama File</td>
              <td> Preview / Download</td>
            </tr>
            <tr>
              <td>Curiculum Vitae</td>
              <td><?=fileuser($cv->cv);?></td>
            </tr>
            <?php foreach($file as $f):?>
            <tr>
              <td><?=$f->nama_file;?></td>
              <td><?=fileuser($f->path);?></td>
            </tr>
            <?php endforeach;?>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>