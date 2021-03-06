<?php
function conn_sheet()
{
    require __DIR__ . '/vendor/autoload.php';
    $client = new \Google_Client();
    $client->setApplicationName('Google Sheets and PHP');
    $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
    $client->setAccessType('offline');
    $client->setAuthConfig(__DIR__ . '/credentials.json');
    $service = new Google_Service_Sheets($client);
    return $service;
}

function spreadsheetId()
{
    return '1cHien6U6kqUIgQttwfM_rlYMb25-8u4LrUuiHT8m4vw';
}

function read($range)
{
    $service = conn_sheet();
    $response = $service->spreadsheets_values->get(spreadsheetId(), $range);
    return $response->getValues();
}

function insert($values)
{
    $service = conn_sheet();
    $item = $values['item'];
    $budget = $values['budget'];
    $sold = $values['sold'];
    $amount = $values['amount'];
    $date = $values['date'];
    $insert = [
        ["$item", "$budget", "$sold", "$amount", "$date"]
    ];
    $body = new Google_Service_Sheets_ValueRange([
        'values' => $insert
    ]);
    $params = [
        'valueInputOption' => "RAW"
    ];
    $service->spreadsheets_values->append(spreadsheetId(), "A2:A", $body, $params);
}

function rental($value)
{
    $service = conn_sheet();
    $rental = $value['rental'];
    $date = today();
    $insert = [
        ["$rental", "$date"]
    ];
    $body = new Google_Service_Sheets_ValueRange([
        'values' => $insert
    ]);
    $params = [
        'valueInputOption' => "RAW"
    ];
    $service->spreadsheets_values->append(spreadsheetId(), "ค่าที่!A2:A", $body, $params);
}

function get_rental(){
    $service = conn_sheet();
    $range = "ค่าที่!A61:B";
    $response = $service->spreadsheets_values->get(spreadsheetId(), $range);
    return $response->getValues();
}

function get_item()
{
    $service = conn_sheet();
    $range = "รายการสินค้า!B1:B";
    $response = $service->spreadsheets_values->get(spreadsheetId(), $range);
    return $response->getValues();
}

function add_item()
{
    $service = conn_sheet();
    $item = $_POST['item'];
    $insert = [
        ["$item"]
    ];
    $body = new Google_Service_Sheets_ValueRange([
        'values' => $insert
    ]);
    $params = [
        'valueInputOption' => "RAW"
    ];
    $service->spreadsheets_values->append(spreadsheetId(), "รายการสินค้า!B23:B", $body, $params);   
}

function today()
{
    date_default_timezone_set("Asia/Bangkok");
    return date('d/m/Y');
}

function all_transaction()
{
    $service = conn_sheet();
    $range = "A2:E";
    $response = $service->spreadsheets_values->get(spreadsheetId(), $range);
    return $response->getValues();
}

function all_rental()
{
    $service = conn_sheet();
    $range = "ค่าที่!A2:B";
    $response = $service->spreadsheets_values->get(spreadsheetId(), $range);
    return $response->getValues();
}

function date_conv($date)
{
    return date("d/m/Y", strtotime($date));
}

function test()
{
    print_r($_POST);
}
?>