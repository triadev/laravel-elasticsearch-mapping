<?php
namespace Triadev\Es\Mapping\Provider;

use Illuminate\Foundation\AliasLoader;
use Triadev\Es\Mapping\Contract\ElasticsearchMappingContract;
use Triadev\Es\Mapping\ElasticsearchMapping;
use Triadev\Es\Mapping\Facade\ElasticMapping;
use Triadev\Es\Provider\ElasticsearchServiceProvider;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * All of the container singletons that should be registered.
     *
     * @var array
     */
    public $singletons = [
        ElasticsearchMappingContract::class => ElasticsearchMapping::class
    ];
    
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(ElasticsearchServiceProvider::class);
        
        AliasLoader::getInstance()->alias('ElasticMapping', ElasticMapping::class);
    }
}
