<?php

/**
 * Created by PhpStorm.
 * User: binll
 * Date: 05/06/2017
 * Time: 16:03
 */
namespace  BackendBundle\AdminMenuBuilder;

use BackendBundle\Model\MenuItemModel;

class AdminMenuBuilder{

    private function buildMenu(){

        $menu_usuarios = new MenuItemModel('usuarios','Usuarios',false,[],'fa fa-users');
        $url_new_usuario = $this->generateUrl('backend_new_user');
        $submenu_new_user = new MenuItemModel('new_user','Nuevo usuario',$url_new_usuario,'[]','fa fa-user-plus ');
        $url_usuarios = $this->generateUrl('backend_users');
        $submenu_list_users = new MenuItemModel('list_user','Listado usuarios',$url_usuarios,'[]','fa fa-list');
        $menu_usuarios->addChild($submenu_new_user);
        $menu_usuarios->addChild($submenu_list_users);
        $menu_roles = new MenuItemModel('roles','Roles','/roles');
        $menu = ["menu"=>[$menu_usuarios,$menu_roles]];
        return $menu;
    }
}