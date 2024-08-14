<?php
$csvFile = 'registrations.csv';

if (!file_exists($csvFile)) {
    echo "Error: The CSV file does not exist.";
    exit;
}

$registrants = array_map('str_getcsv', file($csvFile));
?>

<html>
<head>
    <title>Registrants</title>
    <style>
        table { border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 10px; }
    </style>
</head>
<body>
    <h1>Registrants</h1>
    <table>
        <?php foreach ($registrants as $row) { ?>
            <tr>
                <?php foreach ($row as $cell) { ?>
                    <td><?= $cell ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
</body>
</html>