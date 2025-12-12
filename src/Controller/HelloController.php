<?php

namespace App\Controller;

use Doctrine\DBAL\Query\Limit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HelloController extends AbstractController
{
    private array $messages = [
        ['message' => 'Hello', 'created' => '2025/06/12'],
        ['message' => 'Hi', 'created' => '2025/04/12'],
        ['message' => 'Bye!', 'created' => '2024/05/12']
    ];

    #[Route('/{limit}', name: 'app_index', requirements: ['limit' => '\\d+'], defaults: ['limit' => 3])]
    public function index(int $limit): Response
    {
        return $this -> render(
            'hello/index.html.twig',
            [
                'messages' => $this->messages,
                'limit' => $limit
            ]
        );

        // return $this -> render(
        //     'hello/index.html.twig',
        //     [
        //         'messages' => array_slice($this->messages, 0, $limit)
        //     ]
        // );

        // return $this -> render(
        //     'hello/index.html.twig',
        //     [
        //         'messages' => implode(',', array_slice($this->messages, 0, $limit))
        //     ]
        // );
        
        // return new Response(
        //     implode(',', array_slice($this->messages, 0, $limit))
        // );
    }

    #[Route('/messages/{id}', name: 'app_show_one', requirements: ['id' => '\\d+'])]
    public function showOne(int $id): Response
    {
        return $this -> render(
            'hello/show_one.html.twig',
            [
                'message' => $this -> messages[$id]
            ]
        );

        // return new Response($this->messages[$id]);
    }
}
