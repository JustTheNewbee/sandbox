<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends Controller
{
    /**
     * @Route("/")
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        return new Response($request->query->get('page', 1));
    }

    /**
     * @Route("/lucky/number/{max}", name="app_lucky_number", requirements={"max"="\d+"})
     * @param int $max
     *
     * @return Response
     */
    public function number(int $max = 100): Response
    {
        $number = mt_rand(0, $max);

        return $this->render('lucky/number.html.twig', [
            'number' => $number
        ]);
//        return new Response(
//            '<html><body>Lucky number: '.$number.'</body></html>'
//        );
    }
}