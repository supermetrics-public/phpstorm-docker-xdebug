<?php

declare(strict_types=1);

namespace Supermetrics\Connector\Test\Filtering;

use PHPUnit\Framework\TestCase;
use Supermetrics\Connector\Filtering\FieldValueFilter;

class FieldValueFilterTest extends TestCase
{
    public function provideRows(): array
    {
        return [
            'not matching' => [['account' => 3424324866000135], false],
            'int matching' => [['account' => 3424324866000134], true],
            'string matching' => [['account' => '3424324866000134'], true],
        ];
    }

    /**
     * @test
     * @dataProvider provideRows
     *
     * @param array $row
     * @param bool $expectedValue
     */
    public function testFilter(array $row, bool $expectedValue): void
    {
        $filter = new FieldValueFilter($fieldName = 'account', '3424324866000134');

        $this->assertSame($expectedValue, $filter($row));
    }
}
