<?php
namespace Triadev\Es\Mapping\Mapping\Fluent;

use Illuminate\Support\Fluent;

/**
 * Class FluentGeoShape
 * @package Triadev\Es\Mapping\Mapping\Fluent
 *
 * @property string $tree
 * @property string $precision
 * @property string $tree_levels
 * @property string $strategy
 * @property float $distance_error_pct
 * @property string $orientation
 * @property bool $points_only
 * @property bool $ignore_malformed
 * @property bool $ignore_z_value
 *
 * @method FluentGeoShape tree(string $tree)
 * @method FluentGeoShape precision(string $precision)
 * @method FluentGeoShape tree_levels(string $tree_levels)
 * @method FluentGeoShape strategy(string $strategy)
 * @method FluentGeoShape distance_error_pct(float $distance_error_pct)
 * @method FluentGeoShape orientation(string $orientation)
 * @method FluentGeoShape points_only(bool $points_only)
 * @method FluentGeoShape ignore_malformed(bool $ignore_malformed)
 * @method FluentGeoShape ignore_z_value(bool $ignore_z_value)
 */
class FluentGeoShape extends Fluent
{

}
