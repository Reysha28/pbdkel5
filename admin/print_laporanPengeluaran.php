<?php
	function generateRow(){
        $contents = '';
		include_once('../connect.php');
		$query = pg_query($conn,"SELECT * FROM tabel_pengeluaran join tabel_kategori_pengeluaran on tabel_pengeluaran.id_katpengeluaran=tabel_kategori_pengeluaran.id_katpengeluaran");
		$total=0;
        while($row=pg_fetch_array($query)){
            $jumlah=$row['harga'];
            $total+=$jumlah;
			$contents .= "
			<tr>
				<td>".$row['id_pengeluaran']."</td>
				<td>".$row['tanggal_pengeluaran']."</td>
				<td>".$row['jenis_pengeluaran']."</td>
				<td>Rp".$row['harga']."</td>
			</tr>
			";
		}
        $total;
            $contents .= "
            <tr>
				<td rowspan='2'></td>
				<td></td>
				<td>Total</td>
				<td>Rp".$total."</td>
			</tr>
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
      	<h2 align="center">Laporan Pengeluaran Tatitatu</h2>
      	<h4>Daftar Pengeluaran</h4>
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr align="center">  
                <th width="20%">ID Pengeluaran</th>
                <th width="30%">Tanggal Pengeluaran</th> 
				<th width="30%">Kategori Pengeluaran</th>
				<th width="20%">Harga</th>
           </tr> 
      ';  
    $content .= generateRow();  
    $content .= '</table>';
    $content .= '
    <br><br>
    <p align="right">Padang,...................</p>
    <p align="right">Mengetahui,</p>
    <br><br><br><br>
    <p align="right">Ananda Fitria</p>';
    $pdf->writeHTML($content);  
    $pdf->Output('Laporan Pengeluaran Tatitatu.pdf', 'I');
	

?>