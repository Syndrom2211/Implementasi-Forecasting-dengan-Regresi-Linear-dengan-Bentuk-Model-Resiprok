<?php
session_start();

if (isset($_SESSION['status'])) {
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<?php include "page/header.php"; ?>
    <script type="text/javascript">
			var chart1; // globally available
		$(document).ready(function() {
		      chart1 = new Highcharts.Chart({
		         chart: {
		            renderTo: 'container',
		            type: 'column'
		         },
						 title: {
				         text: 'Grafik Data Simulasi Kadar Partikel Air Minum'
				     },
						 xAxis: {
				        title: {
				            enabled: true,
				            text: 'Kadar Partikel (mg)'
				        },
				        startOnTick: true,
				        endOnTick: true,
				        showLastLabel: true
				    },
						yAxis: {
				        title: {
				            text: 'Bulan'
				        }
				    },
						plotOptions: {
				        scatter: {
				            marker: {
				                radius: 3,
				                states: {
				                    hover: {
				                        enabled: true,
				                        lineColor: 'rgb(100,100,100)'
				                    }
				                }
				            },
				            states: {
				                hover: {
				                    marker: {
				                        enabled: false
				                    }
				                }
				            },
				            tooltip: {
				                headerFormat: '<b>{series.name}</b><br>',
				                pointFormat: '{point.x:.2f} bulan, {point.y:.2f} mg'
				            },
										pointStart: 1
				        }
				    },
				    series: [{
								 color: 'rgba(119, 151, 190, .5)',
							 	 type: 'scatter',
							 	 zoomType: 'xy',
				         name: 'Data Simulasi',
				         data:
								 	 [
										 <?php
										 foreach ($_SESSION['data_sim_y'] as $data) {
										 	echo $data.", ";
										 }
										 ?>
									 ],
								 marker: {
				             radius: 3
				         }
				     }]
		});
		});
		</script>
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
						<a href="grafik_simulasi.php">Grafik Simulasi</a> <span class="divider">/</span>
					</li>
				</ul>
			</div>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header">
						<h2><i class="icon-screenshot"></i><span class="break"></span>Grafik Simulasi</h2>
					</div>
					<div class="box-content">
						<div id="container" style="min-width: 200px; height: 400px; margin: 0 auto"></div>
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
