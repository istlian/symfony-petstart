<?php

use App\Controller\BlogController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {
    $routes->add('blog_list', '/blog')
        // the controller value has the format [controller_class, method_name]
        ->controller([BlogController::class, 'blog_list'])
    ;
    $routes->add('api_post_show', '/api/posts/{id}')
        ->controller([BlogApiController::class, 'show'])
        ->methods(['GET', 'HEAD'])
    ;
    $routes->add('api_post_edit', '/api/posts/{id}')
        ->controller([BlogApiController::class, 'edit'])
        ->methods(['PUT'])
    ;
    $routes->add('contact', '/contact')
        ->controller([DefaultController::class, 'contact'])
        ->condition('context.getMethod() in ["GET", "HEAD"] and request.headers.get("User-Agent") matches "/firefox/i"')
        // expressions can also include config parameters:
        // 'request.headers.get("User-Agent") matches "%app.allowed_browsers%"'
    ;
    $routes->add('doc_shortcut', '/doc')
        ->controller(RedirectController::class)
         ->defaults([
            'route' => 'doc_page',
            // optionally you can define some arguments passed to the route
            'page' => 'index',
            'version' => 'current',
            // redirections are temporary by default (code 302) but you can make them permanent (code 301)
            'permanent' => true,
            // add this to keep the original query string parameters when redirecting
            'keepQueryParams' => true,
            // add this to keep the HTTP method when redirecting. The redirect status changes:
            // * for temporary redirects, it uses the 307 status code instead of 302
            // * for permanent redirects, it uses the 308 status code instead of 301
            'keepRequestMethod' => true,
        ])
    ;
    $routes->add('legacy_doc', '/legacy/doc')
        ->controller(RedirectController::class)
         ->defaults([
            // this value can be an absolute path or an absolute URL
            'path' => 'https://legacy.example.com/doc',
            // redirections are temporary by default (code 302) but you can make them permanent (code 301)
            'permanent' => true,
        ])
    ;
};
