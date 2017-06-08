<?php

namespace BackendBundle\Controller;

use BackendBundle\Model\MenuItemModel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BackendBundle:Default:index.html.twig');
    }
}
