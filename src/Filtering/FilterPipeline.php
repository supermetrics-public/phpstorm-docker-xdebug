<?php

declare(strict_types=1);

namespace Supermetrics\Connector\Filtering;

class FilterPipeline
{
    protected $filters = [];

    public function addFilter(FilterInterface $filter): void
    {
        $this->filters[] = $filter;
    }

    public function execute(array $row): bool
    {
        foreach ($this->filters as $filter) {
            if (!$filter($row)) {
                return false;
            }
        }

        return true;
    }
}
