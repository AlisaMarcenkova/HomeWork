<?php

$search = $_GET['search'] ?? '';
$offset = $_GET['offset'] ?? 0;
$onPage = 50;
$data = json_decode(file_get_contents("https://data.gov.lv/dati/lv/api/3/action/datastore_search?q={$search}&offset={$offset}&resource_id=d499d2f0-b1ea-4ba2-9600-2c701b03bd4a&limit=$onPage"));

//echo "<pre>";
//var_dump($data);
?>

<form method="get" action="/">
    <input name="search" placeholder="search" value="">
    <button type="submit">Search</button>
</form>
<form method="get" action="/">
    <input name="search" type="date" value="">
    <input name="search" type="date" value="">
    <button type="submit">Search</button>
</form>

<table border="dotted">
    <tr>
    <th>Datums</th>
    <th>Testu skaits</th>
    <th>Apstiprināto gadījumu skaits</th>
    </tr>
    <?php foreach($data->result->records as $record) { ?>
        <tr>
            <td><?php echo $record->Datums; ?></td>
            <td><?php echo $record->TestuSkaits; ?></td>
            <td><?php echo $record->ApstiprinataCOVID19InfekcijaSkaits; ?></td>
        </tr>
    <?php } ?>
</table>
<form method="get" action="/">
    <?php if ($offset > 0): ?>
        <button type="submit" name="offset" value="<?php echo $offset-$onPage ?>">Previous Page</button>
    <?php endif; ?>
    <?php if (count($data->result->records) >= $onPage): ?>
        <button type="submit" name="offset" value="<?php echo $offset+$onPage ?>">Next Page</button>
    <?php endif;?>
</form>