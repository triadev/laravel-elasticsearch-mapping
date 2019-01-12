<?php
namespace Triadev\Es\Mapping\Mapping\Fluent;

use Illuminate\Support\Fluent;

/**
 * Class FluentLong
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
 * @method FluentLong type(string $type)
 * @method FluentLong coerce(bool $coerce)
 * @method FluentLong boost(int $boost)
 * @method FluentLong doc_values(bool $doc_values)
 * @method FluentLong ignore_malformed(bool $ignore_malformed)
 * @method FluentLong index(bool $index)
 * @method FluentLong null_value(?string $null_value)
 * @method FluentLong store(bool $store)
 */
class FluentLong extends Fluent
{

}
