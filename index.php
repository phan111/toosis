<?php
include('controller.php');
echo "<pre>";
print_r(read("A2:L"));
/*$values = [
    ["a", "b", "C", "D", "E"]
];
$body = new Google_Service_Sheets_ValueRange([
    'values' => $values
]);
$params = [
    'valueInputOption' => "RAW"
];
$result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);*/
?>