<?php

namespace ContainerIIhv7Rh;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_6TCRd3JService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.6TCRd3J' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.6TCRd3J'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.zHyJIs5.kernel::registerContainerConfiguration()', 'get_ServiceLocator_ZHyJIs5_KernelregisterContainerConfigurationService', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.zHyJIs5.kernel::registerContainerConfiguration()', 'get_ServiceLocator_ZHyJIs5_KernelregisterContainerConfigurationService', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.zHyJIs5.kernel::loadRoutes()', 'get_ServiceLocator_ZHyJIs5_KernelloadRoutesService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.zHyJIs5.kernel::loadRoutes()', 'get_ServiceLocator_ZHyJIs5_KernelloadRoutesService', true],
            'App\\Controller\\AddMediaListController::add' => ['privates', '.service_locator.y_ywWFe.App\\Controller\\AddMediaListController::add()', 'getAddMediaListControlleraddService', true],
            'App\\Controller\\ArchMediaListController::archive' => ['privates', '.service_locator.RG6Wi7B.App\\Controller\\ArchMediaListController::archive()', 'getArchMediaListControllerarchiveService', true],
            'App\\Controller\\ArchivedIndexController::index' => ['privates', '.service_locator.cKEcjF9.App\\Controller\\ArchivedIndexController::index()', 'getArchivedIndexControllerindexService', true],
            'App\\Controller\\DeleteMediaListController::delete' => ['privates', '.service_locator.xj.FVVU.App\\Controller\\DeleteMediaListController::delete()', 'getDeleteMediaListControllerdeleteService', true],
            'App\\Controller\\EditMediaListController::edit' => ['privates', '.service_locator.xj.FVVU.App\\Controller\\EditMediaListController::edit()', 'getEditMediaListControllereditService', true],
            'App\\Controller\\IndexController::index' => ['privates', '.service_locator.cKEcjF9.App\\Controller\\IndexController::index()', 'getIndexControllerindexService', true],
            'App\\Controller\\MediaListController::show' => ['privates', '.service_locator.cKEcjF9.App\\Controller\\MediaListController::show()', 'getMediaListControllershowService', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.zHyJIs5.kernel::registerContainerConfiguration()', 'get_ServiceLocator_ZHyJIs5_KernelregisterContainerConfigurationService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.zHyJIs5.kernel::loadRoutes()', 'get_ServiceLocator_ZHyJIs5_KernelloadRoutesService', true],
            'App\\Controller\\AddMediaListController:add' => ['privates', '.service_locator.y_ywWFe.App\\Controller\\AddMediaListController::add()', 'getAddMediaListControlleraddService', true],
            'App\\Controller\\ArchMediaListController:archive' => ['privates', '.service_locator.RG6Wi7B.App\\Controller\\ArchMediaListController::archive()', 'getArchMediaListControllerarchiveService', true],
            'App\\Controller\\ArchivedIndexController:index' => ['privates', '.service_locator.cKEcjF9.App\\Controller\\ArchivedIndexController::index()', 'getArchivedIndexControllerindexService', true],
            'App\\Controller\\DeleteMediaListController:delete' => ['privates', '.service_locator.xj.FVVU.App\\Controller\\DeleteMediaListController::delete()', 'getDeleteMediaListControllerdeleteService', true],
            'App\\Controller\\EditMediaListController:edit' => ['privates', '.service_locator.xj.FVVU.App\\Controller\\EditMediaListController::edit()', 'getEditMediaListControllereditService', true],
            'App\\Controller\\IndexController:index' => ['privates', '.service_locator.cKEcjF9.App\\Controller\\IndexController::index()', 'getIndexControllerindexService', true],
            'App\\Controller\\MediaListController:show' => ['privates', '.service_locator.cKEcjF9.App\\Controller\\MediaListController::show()', 'getMediaListControllershowService', true],
        ], [
            'kernel::registerContainerConfiguration' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Controller\\AddMediaListController::add' => '?',
            'App\\Controller\\ArchMediaListController::archive' => '?',
            'App\\Controller\\ArchivedIndexController::index' => '?',
            'App\\Controller\\DeleteMediaListController::delete' => '?',
            'App\\Controller\\EditMediaListController::edit' => '?',
            'App\\Controller\\IndexController::index' => '?',
            'App\\Controller\\MediaListController::show' => '?',
            'kernel:registerContainerConfiguration' => '?',
            'kernel:loadRoutes' => '?',
            'App\\Controller\\AddMediaListController:add' => '?',
            'App\\Controller\\ArchMediaListController:archive' => '?',
            'App\\Controller\\ArchivedIndexController:index' => '?',
            'App\\Controller\\DeleteMediaListController:delete' => '?',
            'App\\Controller\\EditMediaListController:edit' => '?',
            'App\\Controller\\IndexController:index' => '?',
            'App\\Controller\\MediaListController:show' => '?',
        ]);
    }
}