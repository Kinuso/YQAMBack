<?php

namespace Container3U81LHU;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCacheWarmerService extends App_KernelProdContainer
{
    /*
     * Gets the public 'cache_warmer' shared service.
     *
     * @return \Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerAggregate
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->services['cache_warmer'] = new \Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerAggregate(new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['doctrine.orm.default_metadata_cache_warmer'] ?? $container->load('getDoctrine_Orm_DefaultMetadataCacheWarmerService'));
            yield 1 => ($container->privates['config_builder.warmer'] ?? $container->load('getConfigBuilder_WarmerService'));
            yield 2 => ($container->privates['router.cache_warmer'] ?? $container->load('getRouter_CacheWarmerService'));
            yield 3 => ($container->privates['serializer.mapping.cache_warmer'] ?? $container->load('getSerializer_Mapping_CacheWarmerService'));
            yield 4 => ($container->privates['doctrine.orm.proxy_cache_warmer'] ?? $container->load('getDoctrine_Orm_ProxyCacheWarmerService'));
            yield 5 => ($container->privates['Vich\\UploaderBundle\\Metadata\\CacheWarmer'] ?? $container->load('getCacheWarmer2Service'));
        }, 6), false, ($container->targetDir.''.'/App_KernelProdContainerDeprecations.log'));
    }
}
