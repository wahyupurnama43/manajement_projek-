<?php 




class Laporan extends Controller
{
	private $db;
	public function __construct()
	{
		$this->db = new Database;
	}
	
	public function cetak() {
        require_once 'C:\xampp\htdocs\projek_perpustakaan\Perpustakaan_mvc\public/vendor/vendor/autoload.php';
        $html = '
			<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<title>Daftar Buku</title>
				<link rel="alternate" href=" ' . BASEURL . '/css/style-cetak.css">
				<link rel="alternate" href=" ' . BASEURL . '/css/sb-admin-2.css">
				<style type="text/css" >
					.table {
				    border-collapse: collapse !important;
				    margin-top:5rem;
				    font-size:10px;
				    box-sizing: content-box;
				  }
				  .table td,
				  .table th {
				    background-color: #fff !important;
				    padding: 0.75rem;
				    vertical-align: top;
				    text-align:center  }
				  .table-bordered th,
				  .table-bordered td {
				    border: 1px solid #333 !important;
				  }
				</style>
			</head>
			<body>
			<h1 style="text-align:center">Cetak Laporan Harian Member</h1>
			<table class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                         <tr>
                            <th>No</th>
                            <th>Member </th>
                            <th>Projek</th>
                            <th>Tugas Harian</th>
                            <th>Tanggal - Waktu</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">';
        $i = 1;
        if (isset($_POST['submit'])) {
        	$tgl = $_POST['tgl_awal'];
            $tgl2 = $_POST['tgl_akhir'];
            if (!empty($tgl) && empty($tgl2)) {
	             $query = "SELECT * FROM tb_laporan
                 		   INNER JOIN auth ON tb_laporan.id_auth =  auth.id_auth
                 		   INNER JOIN jenis_projek ON tb_laporan.id_jenis =  jenis_projek.id_jenis WHERE tanggal_input >= '$tgl'";
        		$this->db->query($query);
        		$data = $this->db->resultSet();
            }elseif (!empty($tgl2) && empty($tgl)) {
            	 $query = "SELECT * FROM tb_laporan
                 		   INNER JOIN auth ON tb_laporan.id_auth =  auth.id_auth
                 		   INNER JOIN jenis_projek ON tb_laporan.id_jenis =  jenis_projek.id_jenis WHERE tanggal_input <= '$tgl2'";
        		$this->db->query($query);
        		$data = $this->db->resultSet();
            }else {
            	 $query = "SELECT * FROM tb_laporan
                 		   INNER JOIN auth ON tb_laporan.id_auth =  auth.id_auth
                 		   INNER JOIN jenis_projek ON tb_laporan.id_jenis =  jenis_projek.id_jenis WHERE tanggal_input BETWEEN '$tgl' AND '$tgl2'";
        		$this->db->query($query);
        		$data = $this->db->resultSet();
            }
        }
        foreach ($data as $buku) {
            $html.= '
					<tr>
						<td>' . $i++ . '</td>
						<td>' . $buku['nama'] . '</td>
						<td>' . $buku['jenis_projek'] . '</td>
						<td>' . $buku['tugas'] . '</td>
						<td>' . date('d F Y', strtotime($buku['tanggal_input'])) . '</td>
					</tr>
					';
        }
        $html.= '</tbody>
                </table>
				
			</body>
			</html>
		';
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output("Daftar-buku.pdf", \Mpdf\Output\Destination::INLINE);
    }

    public function cetakL() {
        require_once 'C:\xampp\htdocs\projek_perpustakaan\Perpustakaan_mvc\public/vendor/vendor/autoload.php';
        $html = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Daftar Buku</title>
                <link rel="alternate" href=" ' . BASEURL . '/css/style-cetak.css">
                <link rel="alternate" href=" ' . BASEURL . '/css/sb-admin-2.css">
                <style type="text/css" >
                    .table {
                    border-collapse: collapse !important;
                    margin-top:5rem;
                    font-size:10px;
                    box-sizing: content-box;
                  }
                  .table td,
                  .table th {
                    background-color: #fff !important;
                    padding: 0.75rem;
                    vertical-align: top;
                    text-align:center  }
                  .table-bordered th,
                  .table-bordered td {
                    border: 1px solid #333 !important;
                  }
                </style>
            </head>
            <body>
            <h1 style="text-align:center">Cetak Laporan List Project</h1>
            <table class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                         <tr>
                            <th>No</th>
                            <th>Leader </th>
                            <th>Projek</th>
                            <th>Tugas</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Akhir</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">';
        $i = 1;
        if (isset($_POST['submit'])) {
            $tgl = $_POST['tgl_awal'];
            $tgl2 = $_POST['tgl_akhir'];
             if (!empty($tgl) && empty($tgl2)) {
                $query = "SELECT * FROM tb_projek
                           INNER JOIN auth ON tb_projek.id_auth =  auth.id_auth
                           INNER JOIN jenis_projek ON tb_projek.id_jenis =  jenis_projek.id_jenis WHERE
                           tanggal_awal >= '$tgl'";
                $this->db->query($query);
                $data = $this->db->resultSet();
             }elseif (!empty($tgl2) && empty($tgl)) {
                 $query = "SELECT * FROM tb_projek
                           INNER JOIN auth ON tb_projek.id_auth =  auth.id_auth
                           INNER JOIN jenis_projek ON tb_projek.id_jenis =  jenis_projek.id_jenis WHERE
                           tanggal_awal <= '$tgl2'";
                $this->db->query($query);
                $data = $this->db->resultSet();
             }else{
                 $query = "SELECT * FROM tb_projek
                           INNER JOIN auth ON tb_projek.id_auth =  auth.id_auth
                           INNER JOIN jenis_projek ON tb_projek.id_jenis =  jenis_projek.id_jenis WHERE
                           tanggal_awal BETWEEN '$tgl' AND '$tgl2'";
                $this->db->query($query);
                $data = $this->db->resultSet();
             }
        }
        foreach ($data as $buku) {
            $html.= '
                    <tr>
                        <td>' . $i++ . '</td>
                        <td>' . $buku['nama'] . '</td>
                        <td>' . $buku['jenis_projek'] . '</td>
                        <td>' . $buku['tugas'] . '</td>
                        <td>' . date('d F Y', strtotime($buku['tanggal_awal'])) . '</td>
                        <td>' . date('d F Y', strtotime($buku['tanggal_akhir'])) . '</td>
                    </tr>
                    ';
        }
        $html.= '</tbody>
                </table>
                
                
            </body>
            </html>
        ';
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output("Daftar-buku.pdf", \Mpdf\Output\Destination::INLINE);
    }

    public function cetakLprojek() {
        require_once 'C:\xampp\htdocs\projek_perpustakaan\Perpustakaan_mvc\public/vendor/vendor/autoload.php';
        $html = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Daftar Buku</title>
                <link rel="alternate" href=" ' . BASEURL . '/css/style-cetak.css">
                <link rel="alternate" href=" ' . BASEURL . '/css/sb-admin-2.css">
                <style type="text/css" >
                    .table {
                    border-collapse: collapse !important;
                    margin-top:5rem;
                    font-size:10px;
                    box-sizing: content-box;
                  }
                  .table td,
                  .table th {
                    background-color: #fff !important;
                    padding: 0.75rem;
                    vertical-align: top;
                    text-align:center  }
                  .table-bordered th,
                  .table-bordered td {
                    border: 1px solid #333 !important;
                  }
                </style>
            </head>
            <body>
            <h1 style="text-align:center">Laporan List Project Leader</h1>
            <table class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                         <tr>
                            <th>No</th>
                            <th>Leader</th>
                            <th>Projek</th>
                            <th>Tugas Projek</th>
                            <th>Tanggal Awal</th>
                            <th>Tanggal Akhir</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">';
        $i = 1;
        if (isset($_POST['submit'])) {
            $tgl = $_POST['tgl_awal'];
            $tgl2 = $_POST['tgl_akhir'];
            $id_auth = $_POST['auth'];
             if (!empty($tgl) && empty($tgl2)) {
                $query = "SELECT * FROM tb_projek
                           INNER JOIN auth ON tb_projek.id_auth =  auth.id_auth
                           INNER JOIN jenis_projek ON tb_projek.id_jenis =  jenis_projek.id_jenis WHERE
                           tanggal_awal >= '$tgl' AND tanggal_akhir != 0000-000-00 AND tb_projek.id_auth = $id_auth";
                $this->db->query($query);
                $data = $this->db->resultSet();
             }elseif (!empty($tgl2) && empty($tgl)) {
                 $query = "SELECT * FROM tb_projek
                           INNER JOIN auth ON tb_projek.id_auth =  auth.id_auth
                           INNER JOIN jenis_projek ON tb_projek.id_jenis =  jenis_projek.id_jenis WHERE
                           tanggal_awal <= '$tgl2' AND tanggal_akhir != 0000-000-00 AND tb_projek.id_auth = $id_auth";
                $this->db->query($query);
                $data = $this->db->resultSet();
             }else{
                 $query = "SELECT * FROM tb_projek
                           INNER JOIN auth ON tb_projek.id_auth =  auth.id_auth
                           INNER JOIN jenis_projek ON tb_projek.id_jenis =  jenis_projek.id_jenis WHERE
                           tanggal_awal BETWEEN '$tgl' AND '$tgl2' AND tanggal_akhir != 0000-000-00 AND tb_projek.id_auth = $id_auth";
                $this->db->query($query);
                $data = $this->db->resultSet();
             }
        }
        foreach ($data as $buku) {
            $html.= '
                    <tr>
                        <td>' . $i++ . '</td>
                        <td>' . $buku['nama'] . '</td>
                        <td>' . $buku['jenis_projek'] . '</td>
                        <td>' . $buku['tugas'] . '</td>
                        <td>' . date('d F Y', strtotime($buku['tanggal_awal'])) . '</td>
                        <td>' . date('d F Y', strtotime($buku['tanggal_akhir'])) . '</td>
                    </tr>
                    ';
        }
        $html.= '</tbody>
                </table>
                
                
            </body>
            </html>
        ';
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output("Daftar-buku.pdf", \Mpdf\Output\Destination::INLINE);
    }

    public function cetakUprojek() {
        require_once 'C:\xampp\htdocs\projek_perpustakaan\Perpustakaan_mvc\public/vendor/vendor/autoload.php';
        $html = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Daftar Buku</title>
                <link rel="alternate" href=" ' . BASEURL . '/css/style-cetak.css">
                <link rel="alternate" href=" ' . BASEURL . '/css/sb-admin-2.css">
                <style type="text/css" >
                    .table {
                    border-collapse: collapse !important;
                    margin-top:5rem;
                    font-size:10px;
                    box-sizing: content-box;
                  }
                  .table td,
                  .table th {
                    background-color: #fff !important;
                    padding: 0.75rem;
                    vertical-align: top;
                    text-align:center  }
                  .table-bordered th,
                  .table-bordered td {
                    border: 1px solid #333 !important;
                  }
                </style>
            </head>
            <body>
            <h1 style="text-align:center">Laporan List Project Leader</h1>
            <table class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                         <tr>
                            <th>No</th>
                            <th>Member </th>
                            <th>Projek</th>
                            <th>Tugas Harian</th>
                            <th>Tanggal - Waktu</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">';
        $i = 1;
        if (isset($_POST['submit'])) {
            $tgl = $_POST['tgl_awal'];
            $tgl2 = $_POST['tgl_akhir'];
            $id_auth = $_POST['auth'];
             if (!empty($tgl) && empty($tgl2)) {
                $query = "SELECT * FROM tb_laporan
                          INNER JOIN auth ON tb_laporan.id_auth =  auth.id_auth
                          INNER JOIN jenis_projek ON tb_laporan.id_jenis =  jenis_projek.id_jenis WHERE 
                           tanggal_input >= '$tgl' AND tb_laporan.id_auth = $id_auth";
                $this->db->query($query);
                $data = $this->db->resultSet();
             }elseif (!empty($tgl2) && empty($tgl)) {
                 $query = "SELECT * FROM tb_laporan
                          INNER JOIN auth ON tb_laporan.id_auth =  auth.id_auth
                          INNER JOIN jenis_projek ON tb_laporan.id_jenis =  jenis_projek.id_jenis WHERE 
                           tanggal_input <= '$tgl2' AND tb_laporan.id_auth = $id_auth";
                $this->db->query($query);
                $data = $this->db->resultSet();
             }else{
                 $query = "SELECT * FROM tb_laporan
                          INNER JOIN auth ON tb_laporan.id_auth =  auth.id_auth
                          INNER JOIN jenis_projek ON tb_laporan.id_jenis =  jenis_projek.id_jenis WHERE 
                           tanggal_input BETWEEN '$tgl' AND '$tgl2' AND tb_laporan.id_auth = $id_auth";
                $this->db->query($query);
                $data = $this->db->resultSet();
             }
        }
        foreach ($data as $buku) {
            $html.= '
                    <tr>
                        <td>' . $i++ . '</td>
                        <td>' . $buku['nama'] . '</td>
                        <td>' . $buku['jenis_projek'] . '</td>
                        <td>' . $buku['tugas'] . '</td>
                        <td>' . date('d F Y', strtotime($buku['tanggal_input'])) . '</td>
                    </tr>
                    ';
        }
        $html.= '</tbody>
                </table>
                
                
            </body>
            </html>
        ';
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output("Daftar-buku.pdf", \Mpdf\Output\Destination::INLINE);
    }






/*

-------------------------------------------- Khusus Excel --------------------------------------------------


 */
    public function cetakexcel() {

		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Data List Projek.xls");
		if (isset($_POST['submit'])) {
			$tgl = $_POST['tgl_awal'];
            $tgl2 = $_POST['tgl_akhir'];
             if (!empty($tgl)) {
	             $query = "SELECT * FROM tb_laporan
                 		   INNER JOIN auth ON tb_laporan.id_auth =  auth.id_auth
                 		   INNER JOIN jenis_projek ON tb_laporan.id_jenis =  jenis_projek.id_jenis WHERE tanggal_input >= '$tgl'";
        		$this->db->query($query);
        		$data = $this->db->resultSet();
            }elseif (!empty($tgl2)) {
            	 $query = "SELECT * FROM tb_laporan
                 		   INNER JOIN auth ON tb_laporan.id_auth =  auth.id_auth
                 		   INNER JOIN jenis_projek ON tb_laporan.id_jenis =  jenis_projek.id_jenis WHERE tanggal_input <= '$tgl2'";
        		$this->db->query($query);
        		$data = $this->db->resultSet();
            }else {
            	 $query = "SELECT * FROM tb_projek 
                          INNER JOIN auth ON tb_projek.id_auth = auth.id_auth
                          INNER JOIN jenis_projek ON tb_projek.id_jenis = jenis_projek.id_jenis WHERE tanggal_akhir != 0000-00-00 AND tanggal_awal BETWEEN '$tgl' AND '$tgl2'";
        		$this->db->query($query);
        		$data = $this->db->resultSet();
            }
		}
    ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
        	<meta charset="UTF-8">
        	<title>Document</title>
        	<style type="text/css">
				body{
					font-family: sans-serif;
				}
				table{
					margin: 20px auto;
					border-collapse: collapse;
				}
				table th,
				table td{
					border: 1px solid #989898;
					padding: 3px 8px;

				}
				</style>
        </head>
        <body>
        	<center>		
	        	<h1>Manajement Project</h1>
	        	<h3>Laporan Harian</h3>
        	</center>
        	<table>	
	        	<tr>
	        		<th>No</th>
	        		<th>Member</th>
	        		<th>Projek</th>
	        		<th>Tugas Harian</th>
	        		<th>Tanggal - Waktu</th>
	        	</tr>
	        	 <?php $i=1; ?>
                        <?php foreach ($data as $lp): ?>
                            <tr>
                                <td>
                                    <?= $i++ ?>
                                </td>
                                <td>
                                    <?= $lp['nama'] ?>
                                </td>
                                <td>
                                    <?= $lp['jenis_projek'] ?>
                                </td>
                                <td>
                                    <?= $lp['tugas'] ?>
                                </td>
                                <td>
                                    <?= date('d F Y', strtotime($lp['tanggal_input'])) ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
	        </table>
        </body>
        </html>
        <?php 
    }

    public function cetakexcellist() {

        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Data List Projek.xls");
        if (isset($_POST['submit'])) {
            $tgl = $_POST['tgl_awal'];
            $tgl2 = $_POST['tgl_akhir'];
             if (!empty($tgl) && empty($tgl2)) {
                $query = "SELECT * FROM tb_projek
                           INNER JOIN auth ON tb_projek.id_auth =  auth.id_auth
                           INNER JOIN jenis_projek ON tb_projek.id_jenis =  jenis_projek.id_jenis WHERE
                           tanggal_awal >= '$tgl' AND tanggal_akhir != 0000-000-00";
                $this->db->query($query);
                $data = $this->db->resultSet();
             }elseif(!empty($tgl2) && empty($tgl)) {
                 $query = "SELECT * FROM tb_projek
                           INNER JOIN auth ON tb_projek.id_auth =  auth.id_auth
                           INNER JOIN jenis_projek ON tb_projek.id_jenis =  jenis_projek.id_jenis WHERE
                           tanggal_awal <= '$tgl2' AND tanggal_akhir != 0000-000-00";
                $this->db->query($query);
                $data = $this->db->resultSet();
             }else{
                 $query = "SELECT * FROM tb_projek
                           INNER JOIN auth ON tb_projek.id_auth =  auth.id_auth
                           INNER JOIN jenis_projek ON tb_projek.id_jenis =  jenis_projek.id_jenis WHERE
                           tanggal_awal BETWEEN '$tgl' AND '$tgl2' AND tanggal_akhir != 0000-000-00";
                $this->db->query($query);
                $data = $this->db->resultSet();
             }
        }
    ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title></title>
            <style type="text/css">
                body{
                    font-family: sans-serif;
                }
                table{
                    margin: 20px auto;
                    border-collapse: collapse;
                }
                table th,
                table td{
                    border: 1px solid #989898;
                    padding: 3px 8px;

                }
                </style>
        </head>
        <body>
            <center>        
                <h1>Manajement Project</h1>
                <h3>Laporan List Projek Selesai</h3>
            </center>
            <table> 
                <tr>
                            <th>No</th>
                            <th>Leader</th>
                            <th>Projek</th>
                            <th>Tugas</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                </tr>
                 <?php $i=1; ?>
                        <?php foreach ($data as $lp): ?>
                          <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $lp['nama'] ?></td>
                                <td><?= $lp['jenis_projek'] ?></td>
                                <td><?= $lp['tugas'] ?></td>
                                <td><?= date('d F Y', strtotime($lp['tanggal_awal'])) ?></td>
                                <td><?= date('d F Y', strtotime($lp['tanggal_akhir'])) ?></td>
                            </tr>
                        <?php endforeach ?>
            </table>
        </body>
        </html>
        <?php 
    }
    

    public function cetakexcelleader() {

        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Data List Projek Leader.xls");
        if (isset($_POST['submit'])) {
            $tgl = $_POST['tgl_awal'];
            $tgl2 = $_POST['tgl_akhir'];
             $id_auth = $_POST['auth'];
             if (!empty($tgl)) {
                $query = "SELECT * FROM tb_projek
                           INNER JOIN auth ON tb_projek.id_auth =  auth.id_auth
                           INNER JOIN jenis_projek ON tb_projek.id_jenis =  jenis_projek.id_jenis WHERE
                           tanggal_awal >= '$tgl' AND tanggal_akhir != 0000-000-00 AND tb_projek.id_auth = $id_auth";
                $this->db->query($query);
                $data = $this->db->resultSet();
             }elseif (!empty($tgl2)) {
                 $query = "SELECT * FROM tb_projek
                           INNER JOIN auth ON tb_projek.id_auth =  auth.id_auth
                           INNER JOIN jenis_projek ON tb_projek.id_jenis =  jenis_projek.id_jenis WHERE
                           tanggal_awal <= '$tgl2' AND tanggal_akhir != 0000-000-00 AND tb_projek.id_auth = $id_auth";
                $this->db->query($query);
                $data = $this->db->resultSet();
             }else{
                 $query = "SELECT * FROM tb_projek
                           INNER JOIN auth ON tb_projek.id_auth =  auth.id_auth
                           INNER JOIN jenis_projek ON tb_projek.id_jenis =  jenis_projek.id_jenis WHERE
                           tanggal_awal BETWEEN '$tgl' AND '$tgl2' AND tanggal_akhir != 0000-000-00 AND tb_projek.id_auth = $id_auth";
                $this->db->query($query);
                $data = $this->db->resultSet();
             }
        }
    ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title></title>
            <style type="text/css">
                body{
                    font-family: sans-serif;
                }
                table{
                    margin: 20px auto;
                    border-collapse: collapse;
                }
                table th,
                table td{
                    border: 1px solid #989898;
                    padding: 3px 8px;

                }
                </style>
        </head>
        <body>
            <center>        
                <h1>Manajement Project</h1>
                <h3>Laporan Projek  Leader Selesai</h3>
            </center>
            <table> 
                <tr>
                            <th>No</th>
                            <th>Leader</th>
                            <th>Projek</th>
                            <th>Tugas Projek</th>
                            <th>Tanggal Awal</th>
                            <th>Tanggal Akhir</th>
                </tr>
                 <?php $i=1; ?>
                        <?php foreach ($data as $lp): ?>
                          <tr>
                                 <td><?=  $i++ ?></td>
                                <td><?=  $lp['nama'] ?></td>
                                <td><?=  $lp['jenis_projek'] ?></td>
                                <td><?=  $lp['tugas'] ?></td>
                                <td><?=  date('d F Y', strtotime($lp['tanggal_awal'])) ?></td>
                                <td><?=  date('d F Y', strtotime($lp['tanggal_akhir'])) ?></td>
                            </tr>
                        <?php endforeach ?>
            </table>
        </body>
        </html>
        <?php 
    }
    
    
}
