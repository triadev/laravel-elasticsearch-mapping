<?php
namespace Triadev\Es\Mapping\Mapping\Fluent;

use Illuminate\Support\Fluent;

/**
 * Class FluentFloat
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
 * @method FluentFloat type(string $type)
 * @method FluentFloat coerce(bool $coerce)
 * @method FluentFloat boost(int $boost)
 * @method FluentFloat doc_values(bool $doc_values)
 * @method FluentFloat ignore_malformed(bool $ignore_malformed)
 * @method FluentFloat index(bool $index)
 * @method FluentFloat null_value(?string $null_value)
 * @method FluentFloat store(bool $store)
 */
class FluentFloat extends Fluent
{

}
