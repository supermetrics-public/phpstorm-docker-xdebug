<?php

declare(strict_types=1);

namespace Supermetrics\Connector\Filtering;

class FieldValueFilter implements FilterInterface
{
    protected $fieldName;

    protected $fieldValue;

    public function __construct(string $fieldName, $fieldValue)
    {
        $this->fieldName = $fieldName;
        $this->fieldValue = $fieldValue;
    }

    public function __invoke(array $row): bool
    {
        return isset($row[$this->fieldName]) && $row[$this->fieldName] === $this->fieldValue;
    }
}
