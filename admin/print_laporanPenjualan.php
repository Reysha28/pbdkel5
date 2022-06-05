<?php
	function generateRow(){
		$contents = '';
		include_once('../connect.php');
		$query = pg_query($conn,"SELECT * FROM tabel_detail_transaksi JOIN tabel_transaksi on tabel_transaksi.id_penjualan=tabel_detail_transaksi.id_penjualan JOIN tabel_barang on tabel_barang.id_barang=tabel_detail_transaksi.id_barang");
        $total=0;
        while($row=pg_fetch_array($query)){
            $jumlah=$row['total_harga'];
            $total+=$jumlah;
			$contents .= "
			<tr>
				<td>".$row['id_penjualan']."</td>
				<td>".$row['tanggal_penjualan']."</td>
				<td>".$row['pembeli']."</td>
				<td>".$row['id_pegawai']."</td>
                <td>".$row['nama_barang']."</td>
				<td>".$row['qty']."</td>
				<td>Rp".$row['total_harga']."</td>
			</tr>
			";
		}
        $contents .= "
            <tr>
				<td></td>
				<td></td>
                <td></td>
                <td></td>
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
      	<h2 align="center">Laporan Penjualan Tatitatu</h2>
      	<h4>Daftar Penjualan</h4>
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr align="center">  
                <th width="15%">ID Penjualan</th>
                <th width="15%">Tanggal</th> 
                <th width="15%">Pembeli</th>
                <th width="15%">ID Pegawai</th>
				<th width="20%">Barang</th>
                <th width="7%">Qty</th>
				<th width="15%">Sub Harga</th>
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
    $pdf->Output('Laporan Penjualan Tatitatu.pdf', 'I');
	

?>