<?php

namespace App\Controller;

use App\Repository\PostRepository;
use App\Repository\SkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     * @param PostRepository $postRepository
     * @param SkillRepository $skillRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(PostRepository $postRepository, SkillRepository $skillRepository)
    {
        return $this->render('default/index.html.twig', [
            'posts' => $postRepository->findAll(),
            'skills' => $skillRepository->findAll(),
        ]);
    }
}
