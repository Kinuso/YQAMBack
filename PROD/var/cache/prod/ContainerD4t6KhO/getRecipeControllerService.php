<?php

namespace ContainerD4t6KhO;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getRecipeControllerService extends App_KernelProdContainer
{
    /*
     * Gets the public 'App\Controller\Api\RecipeController' shared autowired service.
     *
     * @return \App\Controller\Api\RecipeController
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->services['App\\Controller\\Api\\RecipeController'] = $instance = new \App\Controller\Api\RecipeController(new \App\Manager\RecipeManager(($container->privates['App\\Repository\\RecipeRepository'] ?? $container->load('getRecipeRepositoryService')), ($container->services['doctrine.orm.default_entity_manager'] ?? $container->load('getDoctrine_Orm_DefaultEntityManagerService')), ($container->privates['App\\Repository\\UserRepository'] ?? $container->load('getUserRepositoryService')), ($container->privates['App\\Repository\\CategoriesRepository'] ?? $container->load('getCategoriesRepositoryService')), ($container->privates['App\\Repository\\TypeRepository'] ?? $container->load('getTypeRepositoryService'))));

        $instance->setContainer(($container->privates['.service_locator.QaaoWjx'] ?? $container->load('get_ServiceLocator_QaaoWjxService'))->withContext('App\\Controller\\Api\\RecipeController', $container));

        return $instance;
    }
}
