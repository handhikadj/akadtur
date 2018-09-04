<?php 
$db = new PDO('mysql:host=localhost;dbname=sandbox', 'root', '');
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

if (isset($_POST['submit-excel']) && isset($_FILES['excel-file']) && in_array($_FILES['excel-file']['type'], $file_mimes)) {

	$arr_file = explode('.', $_FILES['excel-file']['name']);
    $extension = end($arr_file);

    if ($extension == 'csv') {
    	$reader = new Csv();
    } elseif ($extension == 'xls') {
    	$reader = new Xls();
    } else {
    	$reader = new Xlsx();
    }

    $spreadsheet = $reader->load($_FILES['excel-file']['tmp_name']);
    
    $sheetData = $spreadsheet->getActiveSheet()->toArray();

	for($row = 0; $row < count($sheetData); $row++)
	{
	    $firstRow = $sheetData[$row][0];
	    $secondRow = $sheetData[$row][1];

	    $query = "INSERT INTO student (firstname, lastname) VALUES(:name, :post)";
	    $stmt = $db->prepare($query);

	    $data = [
	    	':name' => $firstRow,
	    	':post' => $secondRow
	    ];

	    foreach ($data as $key => $value) {
	    	$stmt->bindValue($key, $value);
	    }
	    $stmt->execute();
	}
	if ($stmt) {
		echo "sukses";
	} else echo "gagal";
	
} else echo "Kosong";