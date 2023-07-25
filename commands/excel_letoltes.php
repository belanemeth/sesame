<?php
require '/var/www/html/sesame/vendor/autoload.php';
require_once '/var/www/html/sesame/vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Spreadsheet.php';
require_once '/var/www/html/sesame/vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xlsx.php';
require_once '/var/www/html/sesame/commands/dbconfig.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Adatok lekérdezése
$sql = "SELECT ITEM.id, ITEM_TYPE.Tipus, ITEM.Megnev, ITEM.Meret, ITEM.leiras, CONTACT.Nev, CASE WHEN ITEM.Kolcson = 1 THEN 'igen' ELSE 'nem' END AS Kolcson, ITEM.Datum 
						FROM ITEM 
						LEFT JOIN CONTACT ON ITEM.Kitol=CONTACT.id 
						LEFT JOIN ITEM_TYPE ON ITEM.ItemTypeID = ITEM_TYPE.id";
$result = mysqli_query($conn, $sql);

// Excel fájl létrehozása
$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

// Fejléc beállítása
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Típus')
      ->setCellValue('B1', 'Megnevezés')
      ->setCellValue('C1', 'Méret')
      ->setCellValue('D1', 'Leírás')
      ->setCellValue('E1', 'Kölcsön')
      ->setCellValue('F1', 'Kitől')
      ->setCellValue('G1', 'Dátum');

// Adatok feltöltése
$i = 2;
while ($row = mysqli_fetch_assoc($result)) {
    $sheet->setCellValue('A' . $i, $row['Tipus'])
          ->setCellValue('B' . $i, $row['Megnev'])
          ->setCellValue('C' . $i, $row['Meret'])
          ->setCellValue('D' . $i, $row['leiras'])
          ->setCellValue('E' . $i, $row['Kolcson'])
          ->setCellValue('F' . $i, $row['Nev'])
          ->setCellValue('G' . $i, $row['Datum']);
    $i++;
}

// Fájl formázása
$sheet->setTitle('Adatok');
$sheet->getColumnDimension('A')->setWidth(20);
$sheet->getColumnDimension('B')->setWidth(30);
$sheet->getColumnDimension('C')->setWidth(20);
$sheet->getColumnDimension('D')->setWidth(20);
$sheet->getColumnDimension('E')->setWidth(20);
$sheet->getColumnDimension('F')->setWidth(20);
$sheet->getColumnDimension('G')->setWidth(20);

// Fájl mentése
$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save('adatok.xlsx');

$file_url = '/var/www/html/sesame/commands/adatok.xlsx';
$file_name = 'adatok.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename=' . $file_name);
header('Content-Length: ' . filesize($file_url));

readfile($file_url);
exit;

?>
