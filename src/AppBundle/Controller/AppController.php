<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;

class AppController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:AppController:index.html.twig', [

        ]);
    }

    /**
     *
     * @Route("/message", name="new_message")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newMessageAction(Request $request)
    {
        if(null !== $request->get('user') && null  !== $request->get('message'))
        {
            return $this->render('@App/AppController/partial/message.html.twig', [
                'user'      => $request->get('user'),
                'message'   => $request->get('message'),
                'date'      => new \DateTime()
            ]);
        }
        throw new Exception('not valid request data');
    }
}
