<?php

declare(strict_types=1);

use Supermetrics\Connector\FbConnector;
use Supermetrics\Connector\Filtering\FieldValueFilter;
use Supermetrics\Connector\Filtering\FilterPipeline;
use Supermetrics\Connector\Request;

require_once __DIR__ . '/vendor/autoload.php';

$request = new Request();

$accountId = $request->getAccountId();

$filters = new FilterPipeline();
$filters->addFilter(
    new FieldValueFilter($fieldName = 'account', $accountId)
);

$connector = new FbConnector();
$rows = $connector->fetchData();

$output = [];

foreach ($rows as $row) {
    if (!$filters->execute($row)) {
        continue;
    }

    $output[] = $row;
}

echo json_encode($output);
