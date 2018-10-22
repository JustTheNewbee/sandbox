<?php

namespace App\Controller;


use App\GreetingGenerator;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route(path="/{name}")
     * @param string $name
     * @param LoggerInterface $logger
     * @return Response
     */
    public function index(string $name, LoggerInterface $logger, GreetingGenerator $generator): Response
    {
        $greeting = $generator->getRandomGreeting();
        $logger->info("Saying $greeting to $name");

        return $this->render('default/index.html.twig', [
            'name' => $name,
        ]);
    }

    /**
     * @Route(path="/api/hello/{name}")
     * @param string $name
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function apiExample(string $name)
    {
        return $this->json([
            'name' => $name,
            'symfony' => 'rocks',
        ]);
    }
}