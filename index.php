<?php
include('controller.php');
//echo "<pre>";
//print_r(read("A2:L"));
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
if(isset($_POST['submit'])){
    insert($_POST);
}
?>
<html>
    <head></head>
    <body>
        <form action="#" method="post">
            <select name="item">
                <?php foreach(get_item() AS $key) : ?>
                <option value="<?=$key[0]?>"><?=$key[0]?></option>
                <?php endforeach ; ?>
            </select>
            <input name="budget" type="number" placeholder="ต้นทุน"><br>
            <input name="sold" type="number" placeholder="ขาย">
            <input name="amount" type="number" value="1" step="1">
            <input name="date" type="hidden" value="<?=today()?>">
            <input type="submit" value="บันทึก">
        </form>
        <hr>
        <table border="1">
            <thead>
                <tr>
                    <th>สินค้า</th>
                    <th>ต้นทุน</th>
                    <th>ขาย</th>
                    <th>จำนวน</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $budget = 0;
                    $sold = 0;
                    ?>
                <?php foreach(read("A1229:E") AS $key) : ?>
                <?php if(isset($key[0])) : ?>
                <?php
                    $budget += (int)$key[1];
                    $sold += (int)$key[2];
                    ?>
                <tr>
                    <td><?=$key[0]?></td>
                    <td><?=$key[1]?></td>
                    <td><?=$key[2]?></td>
                    <td><?=$key[3]?></td>
                </tr>
                <?php endif; ?>
                <?php endforeach ;?>
            </tbody>
        </table>
        <table>
            <tr>
                <td>ต้นทุน</td>
                <td><?=$budget?></td>
            </tr>
            <tr>
                <td>ขาย</td>
                <td><?=$sold?></td>
            </tr>
            <tr>
                <td>กำไร</td>
                <td><?=$sold-$budget?></td>
            </tr>
        </table>
    </body>
</html>