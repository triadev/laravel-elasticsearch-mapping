<?php
namespace Triadev\Es\Mapping\Mapping\Fluent;

use Illuminate\Support\Fluent;

/**
 * Class FluentInteger
 * @package Triadev\Es\Mapping\Mapping\Fluent
 *
 * @property string $type
 * @property bool $coerce
 * @property int $boost
 * @property bool $doc_values
 * @property bool $ignore_malformed
 * @property bool $index
 * @property string|null $null_value
 * @property bool $store
 *
 * @method FluentInteger type(string $type)
 * @method FluentInteger coerce(bool $coerce)
 * @method FluentInteger boost(int $boost)
 * @method FluentInteger doc_values(bool $doc_values)
 * @method FluentInteger ignore_malformed(bool $ignore_malformed)
 * @method FluentInteger index(bool $index)
 * @method FluentInteger null_value(?string $null_value)
 * @method FluentInteger store(bool $store)
 */
class FluentInteger extends Fluent
{

}
