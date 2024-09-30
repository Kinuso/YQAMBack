<?php

namespace ContainerD4t6KhO;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getStepRepositoryService extends App_KernelProdContainer
{
    /*
     * Gets the private 'App\Repository\StepRepository' shared autowired service.
     *
     * @return \App\Repository\StepRepository
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['App\\Repository\\StepRepository'] = new \App\Repository\StepRepository(($container->services['doctrine'] ?? $container->load('getDoctrineService')));
    }
}
