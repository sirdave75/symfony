<?php

namespace BackendBundle\Services;



use BackendBundle\Model\MenuItemModel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class Helpers{
        public function menu(){

            $menu_usuarios = new MenuItemModel('usuarios','Usuarios',false,[],'fa fa-users');
            $url_new_usuario = "/symfony/web/app_dev.php/backend/new";
            $submenu_new_user = new MenuItemModel('new_user','Nuevo usuario',$url_new_usuario,'[]','fa fa-user-plus ');
            $url_usuarios = "/symfony/web/app_dev.php/backend/usuarios";
            $submenu_list_users = new MenuItemModel('list_user','Listado usuarios',$url_usuarios,'[]','fa fa-list');
            $menu_usuarios->addChild($submenu_new_user);
            $menu_usuarios->addChild($submenu_list_users);
            $menu_roles = new MenuItemModel('roles','Roles','/roles');
            $menu = ["menu"=>[$menu_usuarios,$menu_roles]];
            return $menu;

    }
}