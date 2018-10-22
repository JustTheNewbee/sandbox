<?php

namespace App\Twig;

use App\GreetingGenerator;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class GreetExtension extends AbstractExtension
{
    /**
     * @var GreetingGenerator
     */
    private $greeringGenerator;

    /**
     * GreetExtension constructor.
     * @param GreetingGenerator $greeringGenerator
     */
    public function __construct(GreetingGenerator $greeringGenerator)
    {
        $this->greeringGenerator = $greeringGenerator;
    }

    /**
     * @return array|\Twig_Filter[]
     */
    public function getFilters()
    {
        return [
            new TwigFilter('greet', [$this, 'greetUser']),
        ];
    }

    /**
     * @param $name
     * @return string
     */
    public function greetUser($name)
    {
        $greeting = $this->greeringGenerator->getRandomGreeting();

        return "$greeting $name!";
    }
}