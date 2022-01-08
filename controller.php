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
?>