<?php

namespace App\Controller;

use App\Entity\MicroPost;
use App\Repository\MicroPostRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MicroPostController extends AbstractController
{
    #[Route('/micro-post', name: 'app_micro_post')]
    public function index(MicroPostRepository $posts): Response
    {
        // $microPost = new MicroPost();
        // $microPost->setTitle('It comes from Controller');
        // $microPost->setText('Texting here');
        // $microPost->setCreated(new DateTime());

        $microPost = $posts->find(4);
        // $microPost->setTitle('I just updated it!');

        // $posts->remove($microPost, true);

        # Debugging
        // dd($posts->findAll());
        // dd($posts->find(2));
        // dd($posts->findOneBy(['title' => 'Welcome just saying']));
        // dd($posts->findBy(['title' => 'Welcome just saying']));
        
        return $this->render('micro_post/index.html.twig', [
            'posts' => $posts->findAll(),
        ]);
    }

    #[Route('/micro-post/{post}', name: 'app_micro_post_show')]
    public function showOne(MicroPost $post): Response
    {
        // dd($posts->find($id));
        return $this->render('micro_post/show.html.twig', [
            'post' => $post,
        ]);
    }
}
