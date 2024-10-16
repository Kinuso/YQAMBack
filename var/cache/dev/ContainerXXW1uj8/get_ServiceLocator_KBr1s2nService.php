<?php

namespace ContainerXXW1uj8;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_KBr1s2nService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.KBr1s2n' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.KBr1s2n'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.4wc4Ag1.kernel::registerContainerConfiguration()', 'get_ServiceLocator_4wc4Ag1_KernelregisterContainerConfigurationService', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.4wc4Ag1.kernel::registerContainerConfiguration()', 'get_ServiceLocator_4wc4Ag1_KernelregisterContainerConfigurationService', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.4wc4Ag1.kernel::loadRoutes()', 'get_ServiceLocator_4wc4Ag1_KernelloadRoutesService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.4wc4Ag1.kernel::loadRoutes()', 'get_ServiceLocator_4wc4Ag1_KernelloadRoutesService', true],
            'App\\Controller\\Api\\RecipeController::recent' => ['privates', '.service_locator.btwogvC.App\\Controller\\Api\\RecipeController::recent()', 'getRecipeControllerrecentService', true],
            'App\\Controller\\Api\\RecipeController::categories' => ['privates', '.service_locator.GVqZ9Id.App\\Controller\\Api\\RecipeController::categories()', 'getRecipeControllercategoriesService', true],
            'App\\Controller\\Api\\RecipeController::types' => ['privates', '.service_locator.J6mK8KI.App\\Controller\\Api\\RecipeController::types()', 'getRecipeControllertypesService', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.4wc4Ag1.kernel::registerContainerConfiguration()', 'get_ServiceLocator_4wc4Ag1_KernelregisterContainerConfigurationService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.4wc4Ag1.kernel::loadRoutes()', 'get_ServiceLocator_4wc4Ag1_KernelloadRoutesService', true],
            'App\\Controller\\Api\\RecipeController:recent' => ['privates', '.service_locator.btwogvC.App\\Controller\\Api\\RecipeController::recent()', 'getRecipeControllerrecentService', true],
            'App\\Controller\\Api\\RecipeController:categories' => ['privates', '.service_locator.GVqZ9Id.App\\Controller\\Api\\RecipeController::categories()', 'getRecipeControllercategoriesService', true],
            'App\\Controller\\Api\\RecipeController:types' => ['privates', '.service_locator.J6mK8KI.App\\Controller\\Api\\RecipeController::types()', 'getRecipeControllertypesService', true],
        ], [
            'kernel::registerContainerConfiguration' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Controller\\Api\\RecipeController::recent' => '?',
            'App\\Controller\\Api\\RecipeController::categories' => '?',
            'App\\Controller\\Api\\RecipeController::types' => '?',
            'kernel:registerContainerConfiguration' => '?',
            'kernel:loadRoutes' => '?',
            'App\\Controller\\Api\\RecipeController:recent' => '?',
            'App\\Controller\\Api\\RecipeController:categories' => '?',
            'App\\Controller\\Api\\RecipeController:types' => '?',
        ]);
    }
}