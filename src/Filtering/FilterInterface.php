<?php

declare(strict_types=1);

namespace Supermetrics\Connector\Filtering;

interface FilterInterface
{
    public function __invoke(array $row): bool;
}
