<?php

/*
 * Обучение: https://symfony.com/doc/current/page_creation.html
 */

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
/**
 * Генерирует псевдорандомное число и печатает его на экране
 *
 * @author Ivan
 */
class LuckyController extends AbstractController 
{
    
    /**
     * @Route("/lucky/number/{max}", name="app_lucky_number")
     */
    public function number(int $max, LoggerInterface $logger): Response
    {
        $logger->info('We are logging!');
         
        $number = random_int(0, $max);
        
        $url = $this->generateUrl('app_lucky_number', ['max' => 10]);

        return $this->render('lucky/number.html.twig', ['number' => $number]);
    }
    
    public function index(): RedirectResponse
    {
        // redirects to the "homepage" route
        return $this->redirectToRoute('homepage');

        // redirectToRoute is a shortcut for:
        // return new RedirectResponse($this->generateUrl('homepage'));

        // does a permanent - 301 redirect
        return $this->redirectToRoute('homepage', [], 301);

        // redirect to a route with parameters
        return $this->redirectToRoute('app_lucky_number', ['max' => 10]);

        // redirects to a route and maintains the original query string parameters
        return $this->redirectToRoute('blog_show', $request->query->all());

        // redirects externally
        return $this->redirect('http://symfony.com/doc');
    }
    
    public function index404(): Response
    {
        // retrieve the object from database
        $product = '';
        if (!$product) {
            throw $this->createNotFoundException('The product does not exist');

            // the above is just a shortcut for:
            // throw new NotFoundHttpException('The product does not exist');
        }

        // this exception ultimately generates a 500 status error
        throw new \Exception('Something went wrong!');
        
        return $this->render('');
    }
    
    public function indexRequest(Request $request, string $firstName, string $lastName): Response
    {
        $page = $request->query->get('page', 1);

        // ...
    }
    
    public function indexSession(SessionInterface $session): Response
    {
        // stores an attribute for reuse during a later user request
        $session->set('foo', 'bar');

        // gets the attribute set by another controller in another request
        $foobar = $session->get('foobar');

        // uses a default value if the attribute doesn't exist
        $filters = $session->get('filters', []);

        // ...
    }
    
    public function update(Request $request): Response
    {
        // ...

        if ($form->isSubmitted() && $form->isValid()) {
            // do some sort of processing

            $this->addFlash(
                'notice',
                'Your changes were saved!'
            );
            // $this->addFlash() is equivalent to $request->getSession()->getFlashBag()->add()

            return $this->redirectToRoute('...');
        }

        return $this->render('...');
    }
    
    public function indexHeaders(Request $request): Response
    {
        $request->isXmlHttpRequest(); // is it an Ajax request?

        $request->getPreferredLanguage(['en', 'fr']);

        // retrieves GET and POST variables respectively
        $request->query->get('page');
        $request->request->get('page');

        // retrieves SERVER variables
        $request->server->get('HTTP_HOST');

        // retrieves an instance of UploadedFile identified by foo
        $request->files->get('foo');

        // retrieves a COOKIE value
        $request->cookies->get('PHPSESSID');

        // retrieves an HTTP request header, with normalized, lowercase keys
        $request->headers->get('host');
        $request->headers->get('content-type');
    }
    
    public function indexConfiguration(): Response
    {
        $contentsDir = $this->getParameter('kernel.project_dir').'/contents';
        // ...
    }
    
    public function indexJson(): Response
    {
        // returns '{"username":"jane.doe"}' and sets the proper Content-Type header
        return $this->json(['username' => 'jane.doe']);

        // the shortcut defines three optional arguments
        // return $this->json($data, $status = 200, $headers = [], $context = []);
    }
    
    public function download(): Response
    {
        // send the file contents and force the browser to download it
        return $this->file('/path/to/some_file.pdf');
    }
    
    public function download2(): Response
    {
        // load the file from the filesystem
        $file = new File('/path/to/some_file.pdf');

        return $this->file($file);

        // rename the downloaded file
        return $this->file($file, 'custom_name.pdf');

        // display the file contents in the browser instead of downloading it
        return $this->file('invoice_3241.pdf', 'my_invoice.pdf', ResponseHeaderBag::DISPOSITION_INLINE);
    }
}
