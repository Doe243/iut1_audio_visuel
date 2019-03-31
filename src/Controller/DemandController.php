<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DemandController extends AbstractController
{
    /**
     * @Route("/demand", name="demand")
     */
    public function index()
    {
        return $this->render('demand/user.demand.html.twig');
    }
}
