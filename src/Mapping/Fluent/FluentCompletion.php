<?php
namespace Triadev\Es\Mapping\Mapping\Fluent;

use Illuminate\Support\Fluent;

/**
 * Class FluentCompletion
 * @package Triadev\Es\Mapping\Mapping\Fluent
 *
 * @property string $analyzer
 * @property string $search_analyzer
 * @property bool $preserve_separators
 * @property string $preserve_position_increments
 * @property int $max_input_length
 *
 * @method FluentCompletion analyzer(string $analyzer)
 * @method FluentCompletion search_analyzer(string $search_analyzer)
 * @method FluentCompletion preserve_separators(bool $preserve_separators)
 * @method FluentCompletion preserve_position_increments(string $preserve_position_increments)
 * @method FluentCompletion max_input_length(int $max_input_length)
 */
class FluentCompletion extends Fluent
{

}
