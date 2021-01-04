<?php
namespace App\Service;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class SomeService
{
    private $router;
    private $twig;

    public function __construct(UrlGeneratorInterface $router, Environment $twig)
    {
        $this->router = $router;
         $this->twig = $twig;
    }

    public function someMethod()
    {
        // ...

        // generate a URL with no route arguments
        $signUpPage = $this->router->generate('sign_up');

        // generate a URL with route arguments
        $userProfilePage = $this->router->generate('user_profile', [
            'username' => $user->getUsername(),
        ]);

        // generated URLs are "absolute paths" by default. Pass a third optional
        // argument to generate different URLs (e.g. an "absolute URL")
        $signUpPage = $this->router->generate('sign_up', [], UrlGeneratorInterface::ABSOLUTE_URL);

        // when a route is localized, Symfony uses by default the current request locale
        // pass a different '_locale' value if you want to set the locale explicitly
        $signUpPageInDutch = $this->router->generate('sign_up', ['_locale' => 'nl']);
    }
    
    public function someMethod2()
    {
        // ...

        $htmlContents = $this->twig->render('product/index.html.twig', [
            'category' => '...',
            'promotions' => ['...', '...'],
        ]);
    }
}
