<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SécurityController extends AbstractController
{
    /**
     * @Route("/s/curity", name="app_s_curity")
     */
    public function index(): Response
    {
        return $this->render('sécurity/index.html.twig', [
            'controller_name' => 'SécurityController',
        ]);
    }
}
