<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(UserRepository $userRepo)
    {
        $user = new User();
        $user->setEmail('diarki.talaiporia@gmail.com');
        $cours = $userRepo->findBy([
        'id' => $user->getId(),
    ]);

        return $this->render('cour/index.html.twig', [
            'cours' => $cours,]);
    }
}
