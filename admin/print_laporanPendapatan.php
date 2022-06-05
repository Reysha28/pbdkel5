<?php
	function generateRow(){
		$contents = '';
		include_once('../connect.php');
		$result = pg_query($conn,"SELECT * FROM tabel_pengeluaran join tabel_kategori_pengeluaran on tabel_pengeluaran.id_katpengeluaran=tabel_kategori_pengeluaran.id_katpengeluaran");
        $total=0;
        while($row=pg_fetch_array($result)){
            $jumlah=$row['harga'];
            $total+=$jumlah;
        }

        $result2 = pg_query($conn,"SELECT * FROM tabel_detail_transaksi ");
        $total2=0;
        while($row2=pg_fetch_array($result2)){
            $jumlah2=$row2['total_harga'];
            $total2+=$jumlah2;
        }
        $total3=$total2-$total;
        $contents .= "
				<p>Pengeluaran : Rp".$total."</p>
                <p>Pendapatan  : Rp".$total2."</p>
                <p>Keuntungan  : Rp".$total3."</p>
			";
		return $contents;
	}

	require_once('../tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Laporan Pengeluaran Tatitatu");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 5);  
    $pdf->SetFont('helvetica', '', 12);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '
      	<h2 align="center">Laporan Pendapatan Tatitatu</h2>
        <br>
        <h4>Hasil Kalkulasi</h4>
      ';  
    $content .= generateRow();  
    
    $content .= '
    <br><br>
    <p align="right">Padang,...................</p>
    <p align="right">Mengetahui,</p>
    <br><br><br><br>
    <p align="right">Ananda Fitria</p>';
    $pdf->writeHTML($content);  
    $pdf->Output('Laporan Pendapatan Tatitatu.pdf', 'I');
	

?>