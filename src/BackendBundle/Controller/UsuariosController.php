<?php
/**
 * Created by PhpStorm.
 * User: binll
 * Date: 05/06/2017
 * Time: 12:50
 */

namespace BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use BackendBundle\Model\MenuItemModel;

class UsuariosController extends Controller
{
    public function usuariosAction()
    {
       /*
        $menu_usuarios = new MenuItemModel('usuarios','Usuarios',false);
        $submenu_new_user = new MenuItemModel('new_user','Nuevo usuario','/Backend/new','[]');

        $submenu_list_users = new MenuItemModel('list_user','Listado usuarios',"/usuarios",'[]');
        $menu_usuarios->addChild($submenu_new_user);
        $menu_usuarios->addChild($submenu_list_users);

        $menu_roles = new MenuItemModel('roles','Roles','/roles');


        return $this->render('BackendBundle:Usuarios:usuarios.html.twig',["menu"=>[$menu_usuarios,$menu_roles]]);
       */
        $menu = $this->get("backend.helpers");
        return $this->render('BackendBundle:Usuarios:usuarios.html.twig',$menu->menu());
    }

    public function newAction()
    {
        /*
         $menu_usuarios = new MenuItemModel('usuarios','Usuarios',false);
         $submenu_new_user = new MenuItemModel('new_user','Nuevo usuario','/Backend/new','[]');

         $submenu_list_users = new MenuItemModel('list_user','Listado usuarios',"/usuarios",'[]');
         $menu_usuarios->addChild($submenu_new_user);
         $menu_usuarios->addChild($submenu_list_users);

         $menu_roles = new MenuItemModel('roles','Roles','/roles');


         return $this->render('BackendBundle:Usuarios:usuarios.html.twig',["menu"=>[$menu_usuarios,$menu_roles]]);
        */
        $menu = $this->get("backend.helpers");
        return $this->render('BackendBundle:Usuarios:new.html.twig',$menu->menu());
    }
}