<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', 'AppIndex')]
    public function index(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();

        return $this->render('main/index.html.twig', ['users' => $users]);
    }
}
