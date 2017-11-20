<?php
session_start();

if (isset($_SESSION['status'])) {
	header("Location: home.php");
}else{
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<?php include "page/header.php"; ?>
</head>

<body>
	<div class="container-fluid">
	<div class="row-fluid">

		<div class="row-fluid">
			<div class="login-box">
				<div class="icons">
					<center>
						<a href="index.php">Perhitungan Bentuk Model Resiprok</a>
						<img src="img/resiprok.png" />
					</center>
				</div>
				<?php
				if(isset($_POST['hitung'])){
					for($i=0;$i<count($_POST['data_x']);$i++){
						$datax = $_POST['data_x'][$i];
						$_SESSION['xi'][] = $datax;

						$datay = $_POST['data_y'][$i];
						$_SESSION['yi'][] = $datay;
					}

					header("Location: simpan_sesi.php");
				}

		    if (isset($_POST["ok"])) {
		      $jumdata = $_POST["jumdata"];
					$_SESSION['nama_pengamatan'] = $_POST['nama_pengamatan'];
		    ?>
				<form class="form-horizontal" action="index.php" method="post">
					<fieldset>
						<?php
		        for($i=1;$i<=$jumdata;$i++){
		        ?>
						<h2><font color="black">Data ke-<?php echo $i; ?></font></h2>
						<div class="input-prepend" title="Data xi">
							<span class="add-on"><i class="icon-eye-open"></i></span>
							<input class="input-large span10" name="data_x[]" type="text" placeholder="Data xi ke-<?php echo $i; ?>" required=""/>
						</div>
						<div class="clearfix"></div>

						<div class="input-prepend" title="Data yi">
							<span class="add-on"><i class="icon-eye-open"></i></span>
							<input class="input-large span10" name="data_y[]" type="text" placeholder="Data yi ke-<?php echo $i; ?>" required=""/>
						</div>
						<div class="clearfix"></div>
						<hr>
						<?php
						}
						?>
						<div class="clearfix"></div>

						<div class="btn-group button-login">
							<a href="index.php"><button class="btn btn-default"><< Kembali</button></a>
							&nbsp;
							<button type="submit" class="btn btn-primary" name="hitung">Hitung</button>
						</div>
						<div class="clearfix"></div>
				</form>
				<?php
				}else{
				?>
				<form class="form-horizontal" action="index.php" method="post">
					<fieldset>

						<div class="input-prepend" title="Nama Pengamatans">
							<span class="add-on"><i class="icon-eye-open"></i></span>
							<input class="input-large span10" name="nama_pengamatan" type="text" value="Kadar Partikel Air Minum" placeholder="Masukan nama pengamatan" required=""/>
						</div>
						<div class="clearfix"></div>

						<div class="input-prepend" title="Jumlah Data">
							<span class="add-on"><i class="icon-th-list"></i></span>
							<input class="input-large span10" name="jumdata" type="text" placeholder="Masukan jumlah data" required=""/>
						</div>
						<div class="clearfix"></div>

						<div class="btn-group button-login">
							<button type="submit" class="btn btn-primary" name="ok">Submit</button>
						</div>
						<div class="clearfix"></div>
				</form>
				<?php
				}
				?>
			</div><!--/span-->
		</div><!--/row-->

			</div><!--/fluid-row-->

			<div class="clearfix"></div>
			<hr>

			<?php include "page/footer.php"; ?>
</div><!--/.fluid-container-->


</body>
</html>
<?php
}
?>
