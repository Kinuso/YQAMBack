<?php

namespace Container3U81LHU;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDoctrine_Orm_DefaultEntityManagerService extends App_KernelProdContainer
{
    /*
     * Gets the public 'doctrine.orm.default_entity_manager' shared service.
     *
     * @return \Doctrine\ORM\EntityManager
     */
    public static function do($container, $lazyLoad = true)
    {
        if (true === $lazyLoad) {
            return $container->services['doctrine.orm.default_entity_manager'] = $container->createProxy('EntityManagerGhostC135a4f', static fn () => \EntityManagerGhostC135a4f::createLazyGhost(static fn ($proxy) => self::do($container, $proxy)));
        }

        $a = new \Doctrine\ORM\Configuration();

        $b = new \Doctrine\Persistence\Mapping\Driver\MappingDriverChain();

        $c = new \Doctrine\ORM\Mapping\Driver\SimplifiedXmlDriver([(\dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'vich'.\DIRECTORY_SEPARATOR.'uploader-bundle'.\DIRECTORY_SEPARATOR.'config'.\DIRECTORY_SEPARATOR.'doctrine') => 'Vich\\UploaderBundle\\Entity'], '.orm.xml', true);
        $c->setGlobalBasename('mapping');

        $b->addDriver(new \Doctrine\ORM\Mapping\Driver\AttributeDriver([(\dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Entity')], true), 'App\\Entity');
        $b->addDriver($c, 'Vich\\UploaderBundle\\Entity');

        $a->setEntityNamespaces(['App' => 'App\\Entity', 'VichUploaderBundle' => 'Vich\\UploaderBundle\\Entity']);
        $a->setMetadataCache(new \Symfony\Component\Cache\Adapter\PhpArrayAdapter(($container->targetDir.''.'/doctrine/orm/default_metadata.php'), new \Symfony\Component\Cache\Adapter\ArrayAdapter()));
        $a->setQueryCache(($container->privates['doctrine.system_cache_pool'] ?? $container->load('getDoctrine_SystemCachePoolService')));
        $a->setResultCache(($container->privates['doctrine.result_cache_pool'] ?? $container->load('getDoctrine_ResultCachePoolService')));
        $a->setMetadataDriverImpl(new \Doctrine\Bundle\DoctrineBundle\Mapping\MappingDriver($b, new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'doctrine.ulid_generator' => ['privates', 'doctrine.ulid_generator', 'getDoctrine_UlidGeneratorService', true],
            'doctrine.uuid_generator' => ['privates', 'doctrine.uuid_generator', 'getDoctrine_UuidGeneratorService', true],
        ], [
            'doctrine.ulid_generator' => '?',
            'doctrine.uuid_generator' => '?',
        ])));
        $a->setProxyDir(($container->targetDir.''.'/doctrine/orm/Proxies'));
        $a->setProxyNamespace('Proxies');
        $a->setAutoGenerateProxyClasses(false);
        $a->setSchemaIgnoreClasses([]);
        $a->setClassMetadataFactoryName('Doctrine\\Bundle\\DoctrineBundle\\Mapping\\ClassMetadataFactory');
        $a->setDefaultRepositoryClassName('Doctrine\\ORM\\EntityRepository');
        $a->setNamingStrategy(new \Doctrine\ORM\Mapping\UnderscoreNamingStrategy(0, true));
        $a->setQuoteStrategy(new \Doctrine\ORM\Mapping\DefaultQuoteStrategy());
        $a->setTypedFieldMapper(new \Doctrine\ORM\Mapping\DefaultTypedFieldMapper());
        $a->setEntityListenerResolver(new \Doctrine\Bundle\DoctrineBundle\Mapping\ContainerEntityListenerResolver($container));
        $a->setLazyGhostObjectEnabled(true);
        $a->setIdentityGenerationPreferences([]);
        $a->setRepositoryFactory(new \Doctrine\Bundle\DoctrineBundle\Repository\ContainerRepositoryFactory(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'App\\Repository\\CategoriesRepository' => ['privates', 'App\\Repository\\CategoriesRepository', 'getCategoriesRepositoryService', true],
            'App\\Repository\\IngredientRepository' => ['privates', 'App\\Repository\\IngredientRepository', 'getIngredientRepositoryService', true],
            'App\\Repository\\RecipeRepository' => ['privates', 'App\\Repository\\RecipeRepository', 'getRecipeRepositoryService', true],
            'App\\Repository\\StepRepository' => ['privates', 'App\\Repository\\StepRepository', 'getStepRepositoryService', true],
            'App\\Repository\\TypeRepository' => ['privates', 'App\\Repository\\TypeRepository', 'getTypeRepositoryService', true],
            'App\\Repository\\UpVoteRepository' => ['privates', 'App\\Repository\\UpVoteRepository', 'getUpVoteRepositoryService', true],
            'App\\Repository\\UserRepository' => ['privates', 'App\\Repository\\UserRepository', 'getUserRepositoryService', true],
        ], [
            'App\\Repository\\CategoriesRepository' => '?',
            'App\\Repository\\IngredientRepository' => '?',
            'App\\Repository\\RecipeRepository' => '?',
            'App\\Repository\\StepRepository' => '?',
            'App\\Repository\\TypeRepository' => '?',
            'App\\Repository\\UpVoteRepository' => '?',
            'App\\Repository\\UserRepository' => '?',
        ])));

        $instance = ($lazyLoad->__construct(($container->services['doctrine.dbal.default_connection'] ?? $container->load('getDoctrine_Dbal_DefaultConnectionService')), $a, ($container->privates['doctrine.dbal.default_connection.event_manager'] ?? $container->load('getDoctrine_Dbal_DefaultConnection_EventManagerService'))) && false ?: $lazyLoad);

        (new \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator([], []))->configure($instance);

        return $instance;
    }
}