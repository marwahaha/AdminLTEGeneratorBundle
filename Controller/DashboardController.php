<?php

namespace Donjohn\AdminLTEGeneratorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('@DonjohnAdminLTEGenerator/Dashboard/index.html.twig');
    }
}
