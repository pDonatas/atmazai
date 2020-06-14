<?php

namespace App\Controller;

use App\Service\EvasionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class EvasionController
 * @package App\Controller
 * @Route("/api", name="api_")
 */
class EvasionController extends AbstractController
{
    /**
     * @Route("/evasion", name="evasion")
     */
    public function index(EvasionService $evasionService)
    {
        return $this->json($evasionService->getAllData());
    }
    /**
     * @Route("/random", name="random")
     */
    public function random(EvasionService $evasionService)
    {
        return $this->json($evasionService->getRandomData());
    }

    /**
     * @Route("/find", name="find")
     */
    public function find(Request $request, EvasionService $evasionService)
    {
        return $this->json($evasionService->findData($request));
    }

}
