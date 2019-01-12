<?php
namespace Triadev\Es\Mapping\Mapping\Fluent;

use Illuminate\Support\Fluent;

/**
 * Class FluentScaledFloat
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
 * @method FluentScaledFloat type(string $type)
 * @method FluentScaledFloat coerce(bool $coerce)
 * @method FluentScaledFloat boost(int $boost)
 * @method FluentScaledFloat doc_values(bool $doc_values)
 * @method FluentScaledFloat ignore_malformed(bool $ignore_malformed)
 * @method FluentScaledFloat index(bool $index)
 * @method FluentScaledFloat null_value(?string $null_value)
 * @method FluentScaledFloat store(bool $store)
 */
class FluentScaledFloat extends Fluent
{

}
