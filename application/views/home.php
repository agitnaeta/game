<nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo" style="font-size: 18px;"> <?=$web_title;?></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="<?=base_url("lamaran");?>"><i class="fa fa-briefcase"></i> Lowongan Pekerjaan</a></li>
        <!-- <li><a href="<?=base_url("login");?>"><i class="fa fa-sign-out"></i> Login</a></li> -->
        <li><a href="<?=base_url("daftar");?>"><i class="fa fa-edit"></i> Pendaftaran</a></li>
      </ul>
      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">#</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">

  <div class="container">

        <div class="row">
          <div class="col s8">
            <h3><?=$web_title;?></h3>
            <h6><?=$web_des;?></h6>
            <img width="100%" src="<?=base_url("/src/img/vv.jpg");?>">
          </div>
          <div class="col s4">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <form method="post" action="<?=base_url("login/auth");?>">
            <div class="card">
              <div class="card-image">
              </div>
              <div class="card-content">
                <h5 class="header">Silahkan Login!</h5>
                <p class="center-align">
                  <?=$error=(isset($msg)) ? $msg : null;?>
                </p> 
                <br>
                <label> Username</label>
                 <input placeholder="Username" id="username" name="username" type="text" class="validate">
                 <label> Password</label>
                 <input placeholder="Username" id="password" name="password" type="password" class="validate">
              </div>
               <div class="card-action">
                    <button type="submit" class="waves-effect waves-light btn-small">Login</button>
                  </div>
            </div>
            </form>
          </div>
        </div>
  </div>
  <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">PT. Kaldu Sari Nabati</h5>
          <p class="grey-text text-lighten-4">

PT Kaldu Sari Nabati Indonesia atau Nabati adalah salah satu kelompok bisnis produk konsumen di Indonesia, yang didirikan pada tahun 2002. Perusahaan ini terkenal memproduksi makanan ringan bermerek Nabati Wafer, Richeese, POW (dicabut dari peredaran), Penter (dicabut dari peredaran), Richoco, Nextar, Nabati Bisvit dan Nabati Hanzel. </p>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Lowongan</h5>
          <ul>
            <li><a class="white-text" href="<?=base_url("lamaran");?>">List Loker</a></li>
           
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Penerimaan</h5>
          <ul>
            <li><a class="white-text" href="<?=base_url("interview");?>">Pengumuman</a></li>
           
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      <!-- Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a> -->
      </div>
    </div>
  </footer>
</div>