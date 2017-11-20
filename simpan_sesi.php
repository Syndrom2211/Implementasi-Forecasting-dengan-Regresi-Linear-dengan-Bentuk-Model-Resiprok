<?php
session_start();
foreach ($_SESSION['xi'] as $nilai_xi) {
  $xi[] = $nilai_xi;
}

foreach ($_SESSION['yi'] as $nilai_yi) {
  $yi[] = $nilai_yi;
}

for($i=0;$i<10;$i++){
    // 1/yi
    $satu_bagi_yi = 1 / $yi[$i];
    $jumlah_satu_bagi_yi[] = $satu_bagi_yi;

    // xi/yi
    $xi_bagi_yi = $xi[$i] / $yi[$i];
    $jumlah_xi_bagi_yi[] = $xi_bagi_yi;

    // x^2
    $hitung_kuadrat = $xi[$i] * $xi[$i];
    $jumlah_kuadrat[] = $hitung_kuadrat;

    // Y
    $y = $_SESSION['data_a_kecil']/(1+($_SESSION['data_b_kecil']*$xi[$i]));
    $jumlah_y[] = $y;

    // Error
    $hitung_error = (abs($yi[$i] - $y));
    $jumlah_error[] = $hitung_error;

    // SIGMA xi
    $sigma_xi = array_sum($xi);
    $_SESSION['sigma_xi'] = $sigma_xi;

    // SIGMA yi
    $sigma_yi = array_sum($yi);
    $_SESSION['sigma_yi'] = $sigma_yi;

    // SIGMA 1/y
    $sigma_satu_bagi_yi = array_sum($jumlah_satu_bagi_yi);
    $_SESSION['sigma_satu_bagi_yi'] = $sigma_satu_bagi_yi;

    // SIGMA xi/yi
    $sigma_xiyi = array_sum($jumlah_xi_bagi_yi);
    $_SESSION['sigma_xiyi'] = $sigma_xiyi;

    // SIGMA x^2
    $sigma_kuadrat = array_sum($jumlah_kuadrat);
    $_SESSION['sigma_kuadrat'] = $sigma_kuadrat;

    // SIGMA Y
    $sigma_y = array_sum($jumlah_y);

    // SIGMA Error
    $sigma_error = array_sum($jumlah_error);

    // RATA-RATA xi
    $ratarata_xi = $sigma_xi / count($xi);
    $_SESSION['ratarata_xi'] = $ratarata_xi;

    // RATA-RATA yi
    $ratarata_yi = $sigma_yi / count($xi);
    $_SESSION['ratarata_yi'] = $ratarata_yi;

    // RATA-RATA 1/yi
    $ratarata_satu_bagi_yi = $sigma_satu_bagi_yi / count($xi);
    $_SESSION['ratarata_satu_bagi_yi'] = $ratarata_satu_bagi_yi;

    // RATA-RATA xi/yi
    $ratarata_xiyi = $sigma_xiyi / count($xi);
    $_SESSION['ratarata_xiyi'] = $ratarata_xiyi;

    // RATA-RATA xi^2
    $ratarata_kuadrat = $sigma_kuadrat / count($xi);
    $_SESSION['ratarata_kuadrat'] = $ratarata_kuadrat;

    // RATA-RATA Y
    $ratarata_y = $sigma_y / count($xi);

    // RATA-RATA Error
    $ratarata_error = $sigma_error / count($xi);

    // Perhitungan Parameter A dan B
    $b_besar = ((10*$sigma_xiyi)-($sigma_xi*$sigma_satu_bagi_yi))/((10*$sigma_kuadrat)-(($sigma_xi)*($sigma_xi)));
    $a_besar = ($ratarata_satu_bagi_yi-($b_besar*$ratarata_xi));
    // Tampung sesi agar bisa digunakan di a dan b
    $_SESSION['data_a_besar'] = $a_besar;
    $_SESSION['data_b_besar'] = $b_besar;

    // Perhitungan Parameter a dan b
    $a_kecil = 1/$_SESSION['data_a_besar'];
    $b_kecil = $_SESSION['data_b_besar']*$a_kecil;
    // Tampung sesi agar bisa digunakan di a dan b
    $_SESSION['data_a_kecil'] = $a_kecil;
    $_SESSION['data_b_kecil'] = $b_kecil;

    //Sesi Status
    $_SESSION['status'] = TRUE;
}

    header("Location: home.php");
?>
