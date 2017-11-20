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
						<a href="data_error.php">Persentase Error</a> <span class="divider">/</span>
					</li>
				</ul>
			</div>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header">
						<h2><i class="icon-warning-sign"></i><span class="break"></span>Persentase Error</h2>
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
                <th>#</th>
                <th>xi</th>
                <th>yi</th>
                <th>Y</th>
                <th>Error</th>
						  </thead>
						  <tbody>
                <?php
                for($i=0;$i<10;$i++){
                ?>
                <tr>
                  <td></td>
                  <td><?php echo $xi[$i]; ?></td>
                  <td><?php echo $yi[$i]; ?></td>
                  <td>
                    <?php
										$y = $_SESSION['data_a_kecil']/(1+($_SESSION['data_b_kecil']*$xi[$i]));
								    $jumlah_y[] = $y;
										echo $y;
                    ?>
                  </td>
                  <td>
                    <?php
										$hitung_error = (abs($yi[$i] - $y));
								    $jumlah_error[] = $hitung_error;
                    echo $hitung_error;
                    ?>
                  </td>
                </tr>
                <?php
                }
                ?>
                <tr>
                  <td>Jumlah</td>
                  <td>
                    <?php
                    echo $_SESSION['sigma_xi'];
                    ?>
                  </td>
                  <td>
                    <?php
                    echo $_SESSION['sigma_yi'];
                    ?>
                  </td>
                  <td>
                    <?php
										$sigma_y = array_sum($jumlah_y);
                    echo $sigma_y;
                    ?>
                  </td>
                  <td>
                    <?php
										$sigma_error = array_sum($jumlah_error);
                    echo $sigma_error;
                    ?>
                  </td>
                </tr>
                <tr>
                  <td>Rata - Rata</td>
                  <td>
                    <?php
                    echo $_SESSION['ratarata_xi'];
                    ?>
                  </td>
                  <td>
                    <?php
                    echo $_SESSION['ratarata_yi'];
                    ?>
                  </td>
                  <td>
                    <?php
										$ratarata_y = $sigma_y / count($xi);
                    echo $ratarata_y;
                    ?>
                  </td>
                  <td>
                    <?php
										$ratarata_error = $sigma_error / count($xi);
                    echo $ratarata_error;
                    ?>
                  </td>
                </tr>
						  </tbody>
					  </table>
						<div class="row-fluid sortable">
							<div class="box span12">
								<div class="box-header">
									<h2><i class="icon-tasks"></i><span class="break"></span>Persentase Error</h2>
								</div>
								<div class="box-content">
									<?php
									$ratabagi = $ratarata_error / $_SESSION['ratarata_yi'];
									$percent = round((float)$ratabagi * 100 ) . '%';

									//Untuk ke Grafik
							    $_SESSION['data_sebenarnya'] = $yi;
							    $_SESSION['data_model']      = $jumlah_y;
			            ?>
									<ul class="skill-bar">
							        	<li>
							            <h5>( <?php echo $percent; ?> )</h5>
							            <div class="meter"><span style="width: <?php echo $percent; ?>"></span></div><!-- Edite width here -->
							          </li>
							      	</ul>
								</div>
							</div><!--/span-->

						</div><!--/row-->
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
