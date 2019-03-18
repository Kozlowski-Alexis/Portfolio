<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\Project;
use App\Repository\PostRepository;
use App\Repository\ProjectRepository;
use App\Repository\SkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @var PostRepository $postRepository
     */
    private $postRepository;

    /**
     * @var SkillRepository $skillRepository
     */
    private $skillRepository;

    /**
     * @var ProjectRepository $projectRepository
     */
    private $projectRepository;

    public function __construct(PostRepository $postRepository, SkillRepository $skillRepository, ProjectRepository $projectRepository)
    {
        $this->postRepository = $postRepository;
        $this->skillRepository = $skillRepository;
        $this->projectRepository = $projectRepository;
    }

    /**
     * @Route("/", name="default")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'posts' => $this->postRepository->findPostLimit3(),
            'projects' => $this->projectRepository->findProjects(),
        ]);
    }

    /**
     * @Route("/about_me", name="about_me")
     * @return Response
     */
    public function getSkill()
    {
        return $this->render('default/about_me.html.twig', [
            'skills' => $this->skillRepository->findAll(),
        ]);
    }

    /**
     * @Route("/projets", name="projets")
     * @return Response
     */
    public function getAllProject()
    {
        return $this->render('default/all_project.html.twig', [
            'projects' => $this->projectRepository->findAll(),
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     * @return Response
     */
    public function getContact()
    {
        return $this->render('default/contact.html.twig');
    }

    /**
     * @Route("/article/{id}", name="default_post_show", methods={"GET"})
     * @param Post $post
     * @return Response
     */
    public function showPost(Post $post): Response
    {
        return $this->render('default/post.html.twig', [
            'post' => $post,
        ]);
    }

    /**
     * @Route("/projet/{id}", name="default_project_show", methods={"GET"})
     * @param Project $project
     * @return Response
     */
    public function showProject(Project $project): Response
    {
        return$this->render('default/project.html.twig',[
            'project' => $project,
        ]);
    }
}
