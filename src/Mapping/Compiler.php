<?php
namespace Triadev\Es\Mapping\Mapping;

use Illuminate\Support\Fluent;

class Compiler
{
    /**
     * Compile: text
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileText(Fluent $fluent) : array
    {
        return $this->formatAttributes([
            'type' => 'text',
            'analyzer' => $fluent->analyzer,
            'boost' => $fluent->boost,
            'eager_global_ordinals' => $fluent->eager_global_ordinals,
            'fielddata' => $fluent->fielddata,
            'fielddata_frequency_filter' => $fluent->fielddata_frequency_filter,
            'fields' => $fluent->fields,
            'index' => $fluent->index,
            'index_options' => $fluent->index_options,
            'index_prefixes' => $fluent->index_prefixes,
            'index_phrases' => $fluent->index_phrases,
            'norms' => $fluent->norms,
            'position_increment_gap' => $fluent->position_increment_gap,
            'store' => $fluent->store,
            'search_analyzer' => $fluent->search_analyzer,
            'search_quote_analyzer' => $fluent->search_quote_analyzer,
            'similarity' => $fluent->similarity,
            'term_vector' => $fluent->term_vector
        ]);
    }
    
    /**
     * Compile: keyword
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileKeyword(Fluent $fluent) : array
    {
        return $this->formatAttributes([
            'type' => 'keyword',
            'boost' => $fluent->boost,
            'doc_values' => $fluent->doc_values,
            'eager_global_ordinals' => $fluent->eager_global_ordinals,
            'fields' => $fluent->fields,
            'ignore_above' => $fluent->ignore_above,
            'index' => $fluent->index,
            'index_options' => $fluent->index_options,
            'norms' => $fluent->norms,
            'null_value' => $fluent->null_value,
            'store' => $fluent->store,
            'similarity' => $fluent->similarity,
            'normalizer' => $fluent->normalizer,
            'split_queries_on_whitespace' => $fluent->split_queries_on_whitespace
        ]);
    }
    
    /**
     * Compile: long
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileLong(Fluent $fluent) : array
    {
        return $this->compileNumeric($fluent);
    }
    
    /**
     * Compile: integer
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileInteger(Fluent $fluent) : array
    {
        return $this->compileNumeric($fluent);
    }
    
    /**
     * Compile: short
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileShort(Fluent $fluent) : array
    {
        return $this->compileNumeric($fluent);
    }
    
    /**
     * Compile: byte
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileByte(Fluent $fluent) : array
    {
        return $this->compileNumeric($fluent);
    }
    
    /**
     * Compile: double
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileDouble(Fluent $fluent) : array
    {
        return $this->compileNumeric($fluent);
    }
    
    /**
     * Compile: float
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileFloat(Fluent $fluent) : array
    {
        return $this->compileNumeric($fluent);
    }
    
    /**
     * Compile: half float
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileHalfFloat(Fluent $fluent) : array
    {
        return $this->compileNumeric($fluent);
    }
    
    /**
     * Compile: scaled float
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileScaledFloat(Fluent $fluent) : array
    {
        return $this->compileNumeric($fluent);
    }
    
    /**
     * Compile: numeric
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileNumeric(Fluent $fluent) : array
    {
        return $this->formatAttributes([
            'type' => $fluent->type,
            'coerce' => $fluent->coerce,
            'boost' => $fluent->boost,
            'doc_values' => $fluent->doc_values,
            'ignore_malformed' => $fluent->ignore_malformed,
            'index' => $fluent->index,
            'null_value' => $fluent->null_value,
            'store' => $fluent->store
        ]);
    }
    
    /**
     * Compile: date
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileDate(Fluent $fluent) : array
    {
        return $this->formatAttributes([
            'type' => 'date',
            'boost' => $fluent->boost,
            'doc_values' => $fluent->doc_values,
            'format' => $fluent->format,
            'locale' => $fluent->locale,
            'ignore_malformed' => $fluent->ignore_malformed,
            'index' => $fluent->index,
            'null_value' => $fluent->null_value,
            'store' => $fluent->store
        ]);
    }
    
    /**
     * Compile: boolean
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileBoolean(Fluent $fluent) : array
    {
        return $this->formatAttributes([
            'type' => 'boolean',
            'boost' => $fluent->boost,
            'doc_values' => $fluent->doc_values,
            'index' => $fluent->index,
            'null_value' => $fluent->null_value,
            'store' => $fluent->store
        ]);
    }
    
    /**
     * Compile: binary
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileBinary(Fluent $fluent) : array
    {
        return $this->formatAttributes([
            'type' => 'binary',
            'doc_values' => $fluent->doc_values,
            'store' => $fluent->store
        ]);
    }
    
    /**
     * Compile: integer range
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileIntegerRange(Fluent $fluent) : array
    {
        return $this->compileRange($fluent);
    }
    
    /**
     * Compile: float range
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileFloatRange(Fluent $fluent) : array
    {
        return $this->compileRange($fluent);
    }
    
    /**
     * Compile: long range
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileLongRange(Fluent $fluent) : array
    {
        return $this->compileRange($fluent);
    }
    
    /**
     * Compile: double range
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileDoubleRange(Fluent $fluent) : array
    {
        return $this->compileRange($fluent);
    }
    
    /**
     * Compile: date range
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileDateRange(Fluent $fluent) : array
    {
        return $this->compileRange($fluent);
    }
    
    /**
     * Compile: ip range
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileIpRange(Fluent $fluent) : array
    {
        return $this->compileRange($fluent);
    }
    
    /**
     * Compile: range
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileRange(Fluent $fluent) : array
    {
        return $this->formatAttributes([
            'type' => $fluent->type,
            'coerce' => $fluent->coerce,
            'boost' => $fluent->boost,
            'index' => $fluent->index,
            'store' => $fluent->store
        ]);
    }
    
    /**
     * Compile: nested
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileNested(Fluent $fluent) : array
    {
        return $this->formatAttributes([
            'type' => 'nested',
            'dynamic' => $fluent->dynamic,
            'properties' => $this->compileFields(
                $this->blueprintCallback(
                    $fluent
                )->getFields()
            )
        ]);
    }
    
    /**
     * Compile: object
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileObject(Fluent $fluent) : array
    {
        return $this->formatAttributes([
            'type' => 'nested',
            'dynamic' => $fluent->dynamic,
            'enabled' => $fluent->enabled,
            'properties' => $this->compileFields(
                $this->blueprintCallback(
                    $fluent
                )->getFields()
            )
        ]);
    }
    
    private function blueprintCallback(Fluent $fluent) : Blueprint
    {
        $blueprint = new Blueprint();
    
        /** @var \Closure $callback */
        $callback = $fluent->callback;
    
        if (is_callable($callback)) {
            $callback($blueprint);
        }
    
        return $blueprint;
    }
    
    /**
     * Compile: geo point
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileGeoPoint(Fluent $fluent) : array
    {
        return $this->formatAttributes([
            'type' => 'geo_point',
            'ignore_malformed' => $fluent->ignore_malformed,
            'ignore_z_value' => $fluent->ignore_z_value,
            'null_value' => $fluent->null_value
        ]);
    }
    
    /**
     * Compile: geo shape
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileGeoShape(Fluent $fluent) : array
    {
        return $this->formatAttributes([
            'type' => 'geo_shape',
            'tree' => $fluent->tree,
            'precision' => $fluent->precision,
            'tree_levels' => $fluent->tree_levels,
            'strategy' => $fluent->strategy,
            'distance_error_pct' => $fluent->distance_error_pct,
            'orientation' => $fluent->orientation,
            'points_only' => $fluent->points_only,
            'ignore_malformed' => $fluent->ignore_malformed,
            'ignore_z_value' => $fluent->ignore_z_value
        ]);
    }
    
    /**
     * Compile: ip
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileIp(Fluent $fluent) : array
    {
        return $this->formatAttributes([
            'type' => 'ip',
            'boost' => $fluent->boost,
            'doc_values' => $fluent->doc_values,
            'index' => $fluent->index,
            'null_value' => $fluent->null_value,
            'store' => $fluent->store
        ]);
    }
    
    /**
     * Compile: completion
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileCompletion(Fluent $fluent) : array
    {
        return $this->formatAttributes([
            'type' => 'completion',
            'analyzer' => $fluent->analyzer,
            'search_analyzer' => $fluent->search_analyzer,
            'preserve_separators' => $fluent->preserve_separators,
            'preserve_position_increments' => $fluent->preserve_position_increments,
            'max_input_length' => $fluent->max_input_length
        ]);
    }
    
    /**
     * Compile: token count
     *
     * @param Fluent $fluent
     * @return array
     */
    public function compileTokenCount(Fluent $fluent) : array
    {
        return $this->formatAttributes([
            'type' => 'token_count',
            'analyzer' => $fluent->analyzer,
            'enable_position_increments' => $fluent->enable_position_increments,
            'boost' => $fluent->boost,
            'doc_values' => $fluent->doc_values,
            'index' => $fluent->index,
            'null_value' => $fluent->null_value,
            'store' => $fluent->store
        ]);
    }
    
    private function formatAttributes(array $attributes) : array
    {
        return array_filter($attributes);
    }
    
    /**
     * Compile fields
     *
     * @param array $fields
     * @return array
     */
    public function compileFields(array $fields) : array
    {
        $statements = [];
    
        foreach ($fields as $field) {
            if ($field instanceof Fluent && !is_null($field->type)) {
                $method = 'compile' . ucfirst($this->camelize($field->type));
                if (method_exists($this, $method)) {
                    $statements[$field->name] = (array)$this->$method($field);
                }
            }
        }
    
        return $statements;
    }
    
    private function camelize(string $input, string $separator = '_') : string
    {
        return str_replace($separator, '', ucwords($input, $separator));
    }
}
