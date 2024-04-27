<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainApiController extends AbstractController
{
    #[Route('/api/healthcheck', 'ApiHealthCheck')]
    public function index(): Response
    {
        return new Response('OK');
    }

    #[Route('/api/data', 'ApiData')]
    public function getApiData(UserRepository $userRepository): Response
    {
        $data = $userRepository->findAll();
        return $this->json($data);
    }
}
