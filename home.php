<?php
session_start();

if (isset($_SESSION['status'])) {
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<?php include "page/header.php"; ?>
</head>

<body>
	<?php include "page/header_dua.php"; ?>
	<div id="under-header"></div>
	<!-- start: Header -->

		<div class="container-fluid">
		<div class="row-fluid">

			<?php include "page/sidebar.php"; ?>

			<div id="content" class="span10">
			<!-- start: Content -->

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="home.php">Home</a> <span class="divider">/</span>
					</li>
				</ul>
			</div>

			<div class="row-fluid">

				<div class="box span8">
					<div class="box-header">
						<h2><i class="icon-envelope"></i><span class="break"></span>Pesan</h2>
					</div>
					<div class="box-content">
						Selamat Datang di website perhitungan bentuk model resiprok<br>
						Jika ingin me-<font color='red'>reset</font> data silahkan klik <a href="reset_data.php"><b>Reset Data</b></a> di Menu Pilihan sebelah kiri.
					</div>
				</div>
			</div>
			</div>
			<!-- end: Content -->
	</div><!--/fluid-row-->

		<div class="clearfix"></div>
		<hr>

		<?php include "page/footer.php"; ?>
</div>
</body>
</html>
<?php
}else{
	header("Location: index.php");
}
?>
