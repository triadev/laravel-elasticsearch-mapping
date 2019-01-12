<?php
namespace Triadev\Es\Mapping\Mapping\Fluent;

use Illuminate\Support\Fluent;

/**
 * Class FluentByte
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
 * @method FluentByte type(string $type)
 * @method FluentByte coerce(bool $coerce)
 * @method FluentByte boost(int $boost)
 * @method FluentByte doc_values(bool $doc_values)
 * @method FluentByte ignore_malformed(bool $ignore_malformed)
 * @method FluentByte index(bool $index)
 * @method FluentByte null_value(?string $null_value)
 * @method FluentByte store(bool $store)
 */
class FluentByte extends Fluent
{

}
