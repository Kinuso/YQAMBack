<?php

namespace ContainerD4t6KhO;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Firewall_Authenticator_ApiService extends App_KernelProdContainer
{
    /*
     * Gets the private 'security.firewall.authenticator.api' shared service.
     *
     * @return \Symfony\Component\Security\Http\Firewall\AuthenticatorManagerListener
     */
    public static function do($container, $lazyLoad = true)
    {
        $a = ($container->privates['security.authenticator.jwt.api'] ?? $container->load('getSecurity_Authenticator_Jwt_ApiService'));

        if (isset($container->privates['security.firewall.authenticator.api'])) {
            return $container->privates['security.firewall.authenticator.api'];
        }

        return $container->privates['security.firewall.authenticator.api'] = new \Symfony\Component\Security\Http\Firewall\AuthenticatorManagerListener(new \Symfony\Component\Security\Http\Authentication\AuthenticatorManager([$a], ($container->privates['security.token_storage'] ?? self::getSecurity_TokenStorageService($container)), ($container->privates['security.event_dispatcher.api'] ?? $container->load('getSecurity_EventDispatcher_ApiService')), 'api', ($container->privates['logger'] ?? self::getLoggerService($container)), true, true, []));
    }
}
