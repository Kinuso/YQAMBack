<?php

namespace Container3U81LHU;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Security_RequestMatcher_7JLSkpService extends App_KernelProdContainer
{
    /*
     * Gets the private '.security.request_matcher._7JLSkp' shared service.
     *
     * @return \Symfony\Component\HttpFoundation\ChainRequestMatcher
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.security.request_matcher._7JLSkp'] = new \Symfony\Component\HttpFoundation\ChainRequestMatcher([($container->privates['.security.request_matcher..tvo6Vp'] ??= new \Symfony\Component\HttpFoundation\RequestMatcher\PathRequestMatcher('^/api/login'))]);
    }
}