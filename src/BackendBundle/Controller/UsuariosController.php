<?php
/**
 * Created by PhpStorm.
 * User: binll
 * Date: 05/06/2017
 * Time: 12:50
 */

namespace BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Session\Session;

class UsuariosController extends Controller{

    private $session;

    public function __construct()    {

        $this->session = new Session();
    }
    public function usuariosAction()
    {
        return $this->render('BackendBundle:Usuarios:usuarios.html.twig');
    }

    public function newAction()
    {

        return $this->render('BackendBundle:Usuarios:new.html.twig');
    }
}