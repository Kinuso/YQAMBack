<?php

namespace ContainerXXW1uj8;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getRecipeControllerrecentService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.btwogvC.App\Controller\Api\RecipeController::recent()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.btwogvC.App\\Controller\\Api\\RecipeController::recent()'] = (new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'recipeRepository' => ['privates', 'App\\Repository\\RecipeRepository', 'getRecipeRepositoryService', true],
        ], [
            'recipeRepository' => 'App\\Repository\\RecipeRepository',
        ]))->withContext('App\\Controller\\Api\\RecipeController::recent()', $container);
    }
}
