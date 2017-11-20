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
					<li>
						<a href="data_pengamatan.php">Data Pengamatan</a> <span class="divider">/</span>
					</li>
				</ul>
			</div>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header">
						<h2><i class="icon-eye-open"></i><span class="break"></span>Data Pengamatan</h2>
					</div>
					<div class="box-content">
            <?php
            foreach ($_SESSION['xi'] as $nilai_xi) {
              $xi[] = $nilai_xi;
            }

            foreach ($_SESSION['yi'] as $nilai_yi) {
              $yi[] = $nilai_yi;
            }
            ?>
            <table class="table table-striped table-bordered">
						  <thead>
                <th>Waktu pengamatan bulan ke-</th>
                <th>Kadar Partikel Air Minum (mg)</th>
						  </thead>
						  <tbody>
                <?php
                for($i=0;$i<10;$i++){
                ?>
                <tr>
                  <td><?php echo $xi[$i]; ?></td>
                  <td><?php echo $yi[$i]; ?></td>
                </tr>
                <?php
                }
                ?>
						  </tbody>
					  </table>
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
