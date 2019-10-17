<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FrontPageController extends AbstractController
{
    /**
     * @Route("/", name="front_page")
     * @Cache(smaxage="15", public=true)
     */
    public function index()
    {
        return $this->render(
            'front_page/index.html.twig',
            [
                'controller_name' => 'FrontPageController',
            ]
        );
    }
}
