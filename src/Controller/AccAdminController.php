<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccAdminController extends AbstractController
{
    /**
     * @Route("/acc/admin", name="app_acc_admin")
     */
    public function index(): Response
    {
        return $this->render('acc_admin/index.html.twig', [
            'controller_name' => 'AccAdminController',
        ]);
    }
}
