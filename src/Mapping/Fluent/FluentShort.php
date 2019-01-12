<?php
namespace Triadev\Es\Mapping\Mapping\Fluent;

use Illuminate\Support\Fluent;

/**
 * Class FluentShort
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
 * @method FluentShort type(string $type)
 * @method FluentShort coerce(bool $coerce)
 * @method FluentShort boost(int $boost)
 * @method FluentShort doc_values(bool $doc_values)
 * @method FluentShort ignore_malformed(bool $ignore_malformed)
 * @method FluentShort index(bool $index)
 * @method FluentShort null_value(?string $null_value)
 * @method FluentShort store(bool $store)
 */
class FluentShort extends Fluent
{

}
