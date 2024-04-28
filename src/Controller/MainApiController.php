<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api')]
class MainApiController extends AbstractController
{
    #[Route('/healthcheck', 'ApiHealthCheck', methods: ['GET'])]
    public function index(): Response
    {
        return new Response('OK');
    }

    #[Route('/data', 'ApiData', methods: ['GET'])]
    public function getApiData(UserRepository $userRepository): Response
    {
        $data = $userRepository->findAll();

        return $this->json($data);
    }

    #[Route('/data/{id<\d+>}', 'ApiDataById', methods: ['GET'])]
    public function getApiDataById(UserRepository $userRepository, int $id): Response
    {
        $data = $userRepository->findById($id);

        if (!$data) {
            throw $this->createNotFoundException('Data not found');
        }

        return $this->json($data);
    }
}
