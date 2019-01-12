<?php
namespace Triadev\Es\Mapping\Mapping\Fluent;

use Illuminate\Support\Fluent;

/**
 * Class FluentTokenCount
 * @package Triadev\Es\Mapping\Mapping\Fluent
 *
 * @property string $analyzer
 * @property bool $enable_position_increments
 * @property int $boost
 * @property bool $doc_values
 * @property bool $index
 * @property string|null $null_value
 * @property bool $store
 *
 * @method FluentTokenCount analyzer(string $analyzer)
 * @method FluentTokenCount enable_position_increments(bool $enable_position_increments)
 * @method FluentTokenCount boost(int $boost)
 * @method FluentTokenCount doc_values(bool $doc_values)
 * @method FluentTokenCount index(bool $index)
 * @method FluentTokenCount null_value(bool $null_value)
 * @method FluentTokenCount store(bool $store)
 */
class FluentTokenCount extends Fluent
{

}
