<!-- start: Main Menu -->
<div class="span2 main-menu-span">
  <div class="nav-collapse sidebar-nav">
    <ul class="nav nav-tabs nav-stacked main-menu">
      <li class="nav-header hidden-tablet">Menu Pilihan</li>
      <li><a href="home.php"><i class="icon-home"></i><span class="hidden-tablet"> Halaman Depan</span></a></li>
      <li><a href="data_pengamatan.php"><i class="icon-eye-open"></i><span class="hidden-tablet"> Data Pengamatan</span></a></li>
      <li><a href="data_perhitungan.php"><i class="icon-edit"></i><span class="hidden-tablet"> Data Perhitungan</span></a></li>
      <li><a href="data_error.php"><i class="icon-warning-sign"></i><span class="hidden-tablet"> Persentase Error</span></a></li>
      <li><a href="grafik_data_real.php"><i class="icon-screenshot"></i><span class="hidden-tablet"> Grafik Data Real</span></a></li>
      <li><a href="grafik_data_model.php"><i class="icon-screenshot"></i><span class="hidden-tablet"> Grafik Data Model</span></a></li>
      <li><a href="grafik_data_perbandingan.php"><i class="icon-screenshot"></i><span class="hidden-tablet"> Grafik Data Perbandingan</span></a></li>
      <li><a href="#" data-toggle="modal" data-target="#myModal"><i class="icon-tint"></i><span class="hidden-tablet"> Data Simulasi</span></a></li>
      <li><a href="grafik_simulasi.php"><i class="icon-screenshot"></i><span class="hidden-tablet"> Grafik Simulasi</span></a></li>
      <li><a href="reset_data.php"><i class="icon-remove"></i><span class="hidden-tablet"> Reset Data</span></a></li>
    </ul>
  </div><!--/.well -->
</div><!--/span-->
<!-- end: Main Menu -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Masukan Jangka Waktu</h4>
      </div>
      <div class="modal-body">
        <p>Dalam Jangka Waktu Berapa Bulan ? (<i>Harus lebih dari <?php echo count($_SESSION['xi']); ?></i>)</p>
        <form action="data_simulasi.php" method="post">
          <input type="text" class="span6 typeahead" name="jum_bulan">
          <br>
          <input type="submit" name="sim_bulan" class="btn btn-primary" value="Submit"/>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>
