<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Task;
use AppBundle\Form\TaskType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {   $task=new Task();
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);
        if ($form->isSubmitted() ) { //&->isValid() testi wa7dek el validation           
            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();
        return  $this->redirect($this->generateUrl('homepage', array()));
        } 

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', ['form'=>$form->createView()]);
    }
}
