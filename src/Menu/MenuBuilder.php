<?php
/**
 * Copyright (c) 2019.  Slepnoga.
 */

namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class MenuBuilder
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(RequestStack $requestStack)
    {
        $menu = $this->factory->createItem('root');

        $menu
            ->addChild('Front Page', ['route' => 'front_page']);

        // ... add more children

        return $menu;
    }

    public function createSidebarMenu(RequestStack $requestStack)
    {
        $menu = $this->factory->createItem('sidebar');

        $menu->addChild('Logout', ['route' => 'app_logout']);
        $menu->addChild('Register', ['route' => 'app_register']);

        // ... add more children

        return $menu;
    }
}
