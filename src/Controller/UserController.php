<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    #[Route('/user/{id<\d+>}', 'UserIndex')]
    public function index(int $id, UserRepository $userRepository): Response
    {
        $user = $userRepository->findById($id);

        if (!$user) {
            throw $this->createNotFoundException('User not found');
        }

        return $this->render('user/index.html.twig', ['user' => $user]);
    }
}
