<?php

namespace ContainerD4t6KhO;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getConsole_ErrorListenerService extends App_KernelProdContainer
{
    /*
     * Gets the private 'console.error_listener' shared service.
     *
     * @return \Symfony\Component\Console\EventListener\ErrorListener
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['console.error_listener'] = new \Symfony\Component\Console\EventListener\ErrorListener(($container->privates['logger'] ?? self::getLoggerService($container)));
    }
}
