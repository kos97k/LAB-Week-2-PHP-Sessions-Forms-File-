<?php

define('CUSTOMERS_FILE_PATH', 'customers-100000.csv');

function get_ten_thousand_customers_data()
{
    $opened_file_handler = fopen(CUSTOMERS_FILE_PATH, 'r');

    $data = [];
    $headers = [];
    $row_count = 0;
    while (!feof($opened_file_handler)) {

        $row = fgetcsv($opened_file_handler, 1024);
        if (!empty($row)) {
            if ($row_count == 0) {
                array_push($headers, $row);    
            } else {
                array_push($data, $row);
            }
        }

        $row_count++;

    }

    return [
        'headers' => $headers,
        'data' => $data
    ];
}

$start_time = microtime(true);

$customers = get_ten_thousand_customers_data();

$end_time = microtime(true);
$execution_time = $end_time - $start_time;

?>

<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #2</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />   
</head>
<body>

<h1>
    Customers
</h1>
<small>
    The dataset is retrieved from this URL <a href="https://www.datablist.com/learn/csv/download-sample-csv-files">https://www.datablist.com/learn/csv/download-sample-csv-files</a>
</small>
<table aria-label="Customers Dataset">
    <thead>
        <tr>
            <th>Customer ID</th>
            <th>Complete Name</th>
            <th>Company</th>
            <th>Address</th>
            <th>Email Address</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach ($customers['data'] as $record):
    ?>
        <tr>
            <td><?php echo $record[1]; ?></td>
            <td><?php echo "<strong>{$record[3]}</strong>, {$record[2]}"; ?></td>
            <td><?php echo $record[4]; ?></td>
            <td><?php echo $record[7]; ?></td>
            <td><?php echo $record[9]; ?></td>
        </tr>
    <?php
    endforeach;
    ?>
    </tbody>
</table>

<p>Execution time: <?php echo $execution_time; ?> seconds</p>

</body>
</html>