<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
    /**
     * @Route("/index")
     */
    public function afficheAction(){
        return $this->render("index.html.twig");
    }
    
    /**
     * @Route("/login", name="fos_user_security_check")
     */
    public function loginAction()
    {
        if($this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY'))
    {
        return $this->redirect($this->generateUrl('archive_index'));
    }
    }

}