<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class UsersCheck implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $uri = service('uri');

        if($uri->getSegment(1) == 'users' && $uri->getSegment(2) != '')
        {
            return redirect()->to('/' . $uri->getSegment(2));
        }
        
        if($uri->getSegment(1) == 'users' && $uri->getSegment(2) == '')
        {
            return redirect()->to('/');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}