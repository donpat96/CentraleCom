<?php

namespace App\Controller;

use App\Entity\Cour;
use App\Repository\CourRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class CourController extends AbstractController
{
    /**
     * @Route("/cour",name="cour")
     */
    public function index()
    {
        $courRepo = $this->getDoctrine()->getRepository(Cour::class);
        $cours = $courRepo->findAll();
//        $cours = $courRepo->findBy([
//            'id' => $this->getUser()->getId(),
//        ]);

        return $this->render('cour/index.html.twig', [
            'cours' => $cours,
        ]);}

    /**
     * @Route("/detail/{id<\d+>}", name="cour.detail")
     */
    public function detailCour(Cour $cour= null) {
        return $this->render('cour/detail.html.twig',
            array(
                'cour' => $cour
            )
        );
    }
}
