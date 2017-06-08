<?php

/**
 * Created by PhpStorm.
 * User: binll
 * Date: 05/06/2017
 * Time: 9:48
 */

namespace  BackendBundle\EventListener;

use BackendBundle\Model\MenuItemModel;
use Avanzu\AdminThemeBundle\Event\SidebarMenuEvent;
use Symfony\Component\HttpFoundation\Request;

class MyMenuItemListListener {

    // ...

    public function onSetupMenu(SidebarMenuEvent $event) {
        $request = $event->getRequest();

        foreach ($this->getMenu($request) as $item) {
            $event->addItem($item);
        }

    }

    protected function getMenu(Request $request) {
        // Build your menu here by constructing a MenuItemModel array
        $menuItems = array(
            $blog = new MenuItemModel('ItemId', 'ItemDisplayName', 'backend_users', array(/* options */), 'iconclasses fa fa-plane')
        );

        // Add some children

        // A child with an icon
        $blog->addChild(new MenuItemModel('ChildOneItemId', 'ChildOneDisplayName', 'backend_users', array(), 'fa fa-rss-square'));

        // A child with default circle icon
        $blog->addChild(new MenuItemModel('ChildTwoItemId', 'ChildTwoDisplayName', 'backend_users'));
        return $this->activateByRoute($request->get('_route'), $menuItems);
    }

    protected function activateByRoute($route, $items) {

        foreach($items as $item) {
            if($item->hasChildren()) {
                $this->activateByRoute($route, $item->getChildren());
            }
            else {
                if($item->getRoute() == $route) {
                    $item->setIsActive(true);
                }
            }
        }

        return $items;
    }

}