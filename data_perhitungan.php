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
						<a href="data_perhitungan.php">Data Perhitungan</a> <span class="divider">/</span>
					</li>
				</ul>
			</div>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header">
						<h2><i class="icon-edit"></i><span class="break"></span>Data Perhitungan</h2>
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
						<div class="row-fluid sortable">
							<div class="box span4">
								<div class="box-header">
									<h2><i class="icon-edit"></i><span class="break"></span>Data parameter</h2>
									<div class="box-icon">
										<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
									</div>
								</div>
								<div class="box-content">
									<table class="table table-bordered table-striped">
										<tr>
											<td>a</td>
											<td>
												<?php
						            echo $_SESSION['data_a_kecil'];
						            ?>
											</td>
										</tr>
										<tr>
											<td>b</td>
											<td>
												<?php
						            echo $_SESSION['data_b_kecil'];
						            ?>
											</td>
										</tr>
										<tr>
											<td>A</td>
											<td>
												<?php
						            echo $_SESSION['data_a_besar'];
						            ?>
											</td>
										</tr>
										<tr>
											<td>B</td>
											<td>
												<?php
						            echo $_SESSION['data_b_besar'];
						            ?>
											</td>
										</tr>
									</table>
								</div>
							</div><!--/span-->

						</div><!--/row-->
            <table class="table table-striped table-bordered">
						  <thead>
                <th>#</th>
                <th>xi</th>
                <th>yi</th>
                <th>xi/yi</th>
								<th>1/yi</th>
                <th>xi^2</th>
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
										$xi_bagi_yi = $xi[$i] / $yi[$i];
								    $jumlah_xi_bagi_yi[] = $xi_bagi_yi;
                    echo $xi_bagi_yi;
                    ?>
                  </td>
									<td>
                    <?php
										$satu_bagi_yi = 1 / $yi[$i];
								    $jumlah_satu_bagi_yi[] = $satu_bagi_yi;
                    echo $satu_bagi_yi;
                    ?>
                  </td>
                  <td>
                    <?php
										$hitung_kuadrat = $xi[$i] * $xi[$i];
								    $jumlah_kuadrat[] = $hitung_kuadrat;
                    echo $hitung_kuadrat;
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
                    echo $_SESSION['sigma_xiyi'];
                    ?>
                  </td>
									<td>
                    <?php
                    echo $_SESSION['sigma_satu_bagi_yi'];
                    ?>
                  </td>
                  <td>
                    <?php
                    echo $_SESSION['sigma_kuadrat'];
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
                    echo $_SESSION['ratarata_xiyi'];
                    ?>
                  </td>
									<td>
                    <?php
                    echo $_SESSION['ratarata_satu_bagi_yi'];
                    ?>
                  </td>
                  <td>
                    <?php
                    echo $_SESSION['ratarata_kuadrat'];
                    ?>
                  </td>
                </tr>
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
