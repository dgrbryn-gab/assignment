<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(): Response
    {
        $user = $this->getUser();

        if (in_array('ROLE_ADMIN', $user->getRoles())) {
            $message = 'You are logged in as Admin. You have full access.';
        } else {
            $message = 'You are logged in as Regular User. Limited access granted.';
        }

        return $this->render('dashboard/index.html.twig', [
            'role_message' => $message,
        ]);
    }
}
