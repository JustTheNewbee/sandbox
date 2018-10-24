<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends Controller
{
    /**
     * @Route("/ses")
     */
    public function index(SessionInterface $session)
    {
        $session->set('foo', 'bar');

        $foobar = $session->get('foobar');

        $filters = $session->get('filters', []);

        return new Response(
            "$foobar  [" . implode(',', $filters). ']'
        );
    }

    /**
     * @Route("/blog/{page}", name="blog_list", requirements={"page"="\d+"})
     *
     * @param int $page
     */
    public function list(int $page = 1)
    {

    }

    /**
     * @Route("/blog/{slug}", name="blog_show")
     *
     * @param string $slug
     */
    public function show(string $slug)
    {

    }
}