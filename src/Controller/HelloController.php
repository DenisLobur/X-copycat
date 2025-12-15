<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\UserProfile;
use App\Repository\UserProfileRepository;
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

    #[Route('/', name: 'app_index')]
    public function index(UserProfileRepository $profiles): Response
    {
        // $user = new User();
        // $user->setEmail('email@email.com');
        // $user->setPassword('12345678');


        // $profile = new UserProfile();
        // $profile->setUser($user);
        // $profiles->add($profile, true);

        // $profile = $profiles->find(1);
        // $profiles->remove($profile, true);

        return $this -> render(
            'hello/index.html.twig',
            [
                'messages' => $this->messages,
                'limit' => 3
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
