<?php

namespace App\Service;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class SomeService
{
    /**
     * @var UrlGeneratorInterface
     */
    private $router;

    /**
     * SomeService constructor.
     * @param UrlGeneratorInterface $router
     */
    public function __construct(UrlGeneratorInterface $router)
    {
        $this->router = $router;
    }

    public function someMethod()
    {
        $url = $this->router->generate(
            'blog_show',
            [
                'slug' => 'my-blog-post'
            ]
        );
    }
}
