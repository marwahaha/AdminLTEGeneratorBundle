<?php
namespace Donjohn\AdminLTEGeneratorBundle\Menu;
/**
 * @author jgn
 * @date 17/10/2016
 * @description For ...
 */

use Donjohn\AdminLTEGeneratorBundle\Event\KnpMenuEvent;
use Avanzu\AdminThemeBundle\Event\ThemeEvents;
use Knp\Menu\FactoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Routing\RouterInterface;


class AdminLTEMenuBuilder
{
    private $factory;
    private $eventDispatcher;
    private $router;

    public function __construct(FactoryInterface $factory, EventDispatcherInterface $eventDispatcher, RouterInterface $router)
    {
        $this->factory = $factory;
        $this->eventDispatcher = $eventDispatcher;
        $this->router = $router;
    }


    public function createAdminMenu(array $options)
    {
        $menu = $this->factory->createItem('root', $options);

        foreach ($this->router->getRouteCollection() as $name => $route)
        {
            if ($route->hasOption('knp_menu')) $menu->addChild($route->getOption('knp_menu'), array('route' => $name ));
        }


        $this->eventDispatcher->dispatch(
            ThemeEvents::THEME_SIDEBAR_SETUP_KNP_MENU,
           new KnpMenuEvent( $menu, $this->factory, $options, array() )
        );

        return $menu;


    }
}