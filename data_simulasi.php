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
						<a href="data_simulasi.php">Simulasi Model</a> <span class="divider">/</span>
					</li>
				</ul>
			</div>

			<div class="row-fluid sortable">
				<div class="box span12">
					<?php
					$jum_bulan_filter_min = trim($_POST['jum_bulan'], "-");
					$jum_bulan = $jum_bulan_filter_min;
					if(($jum_bulan > 0) && ($jum_bulan <= count($_SESSION['xi']))){
						echo '<meta http-equiv="refresh" content="0; url=data_simulasi.php">';
					}else{
					?>
					<div class="box-header">
						<h2><i class="icon-tint"></i><span class="break"></span>Data Simulasi (Dalam Jangka Waktu <?php echo $jum_bulan; ?> Bulan)</h2>
					</div>
					<div class="box-content">
						<?php
            foreach ($_SESSION['xi'] as $nilai_xi) {
              $xi[] = $nilai_xi;
            }

						$iterasi 		= count($xi) + $jum_bulan;
						$iterasidua = $iterasi - count($xi);
            ?>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
                <th>Waktu pengamatan bulan ke-</th>
                <th>Kadar Partikel Air Minum (mg)</th>
						  </thead>
						  <tbody>
                <?php
                for($i=1;$i<=$iterasidua;$i++){
								?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td>
                    <?php
										$y = $_SESSION['data_a_kecil']/(1+($_SESSION['data_b_kecil']*$i));
										$datasim_y[] = $y;
										echo $y;
                    ?>
                  </td>
                </tr>
                <?php
                }

								$_SESSION['data_sim_y'] = $datasim_y;
                ?>
						  </tbody>
					  </table>
					</div>
				</div>
			</div>

			</div>
			<!-- end: Content -->
	</div><!--/fluid-row-->
	<?php
	}
	?>

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
