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
        $menuItems = [
            $users = new MenuItemModel('UserId', 'Usuarios', false, array(/* options */), 'iconclasses fa fa-users'),
            $roles = new MenuItemModel('RoleId', 'Roles','backend_users', array(/* options */), 'iconclasses fa fa-task'),
        ];

        // Add some children

        // A child with an icon
        $users->addChild(new MenuItemModel('AddUserId', 'Nuevo usuario', 'backend_new_user', array(), 'fa fa-user-plus'));

        // A child with default circle icon
        $users->addChild(new MenuItemModel('ListUserId', 'Listado usuarios', 'backend_users', array(), 'fa fa-list'));


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