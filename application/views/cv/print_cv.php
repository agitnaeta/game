<style type="text/css">
  .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }
    .invoice-box table td{
        padding:5px;
        vertical-align:top;
        text-align: left;
        border: 1px solid grey;
    }
    .invoice-box table tr td:nth-child(2){
        text-align:left;
    }
    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }
    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }
    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }
    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }
    .invoice-box table tr.details td{
        padding-bottom:20px;
    }
    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }
    .invoice-box table tr.item.last td{
        border-bottom:none;
    }
    .invoice-box table tr.total td:nth-child(2){
        border-top:1px solid #eee;
        font-weight:bold;
    }
    .text-right{
        text-align: right;;
    }
    .text-center{
        text-align: center;
    }
</style>
<div class="invoice-box">
  <h3>Curiculum Vitae</h3>
<table>
  <tr>
    <td colspan="3">
      <h6>1) Data Diri</h6>
    </td>
  </tr>
  <tr>
   <td rowspan="6">
     <?=fileuser($cv->foto);?>
   </td>
  </tr>
  <tr> <td>Nama Lengkap</td><td><?=$cv->nama;?></td> </tr> 
  <tr> <td>No Telp</td><td><?=$cv->no_telp;?></td> </tr> 
  <tr> <td>Email </td><td><a href="mailto:<?=$cv->email;?>"> <?=$cv->email;?></a></td> </tr> 
  <tr> <td>Jenis Kelamin</td><td><?=jk($cv->jenis_kelamin);?></td> </tr> 
  <tr> <td>Tempat, tanggal lahir</td><td><?=($cv->tempat_lahir);?>, <?=dateindo($cv->tanggal_lahir);?></td> </tr> 
</table>
<br>
<table>
  <tr>
    <td colspan="2">
      <h6><i class="fa fa-edit"></i>2) Kemampuan Diri </h6>
    </td>
  </tr>
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
<br>
<table>
  <tr>
    <td colspan="3"> <h6>3) Pendidikan</h6></td>
  </tr>
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
<br>
<table>
  <tr>
    <td colspan="2">
      <h6>4) File Lain</h6>
    </td>
  </tr>
  <tr>
    <td>Nama File</td>
    <td> Preview / Download</td>
  </tr>
  <?php foreach($file as $f):?>
  <tr>
    <td><?=$f->nama_file;?></td>
    <td><?=fileuser($f->path);?></td>
  </tr>
  <?php endforeach;?>
</table>
</div>
