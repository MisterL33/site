<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Appbundle\Entity\Movies;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use AppBundle\Entity\Contact;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $contact = new Contact;

# Add form fields
        $form = $this->createFormBuilder($contact)
                ->add('name', TextType::class, array('label' => 'Email', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
                ->add('email', TextType::class, array('label' => 'Nom', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
                ->add('subject', TextType::class, array('label' => 'Object', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
                ->add('message', TextareaType::class, array('label' => 'Message', 'attr' => array('class' => 'form-control')))
                ->add('Save', SubmitType::class, array('label' => 'Valider', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-top:15px')))
                ->getForm();

# Handle form response
        /*  $form->handleRequest($request);

          if ($form->isSubmitted() && $form->isValid())
          {
          $name = $form['name']->getData();
          $email = $form['email']->getData();
          $subject = $form['subject']->getData();
          $message = $form['message']->getData();

          // ... perform some action, such as saving the task to the database
          // for example, if Task is a Doctrine entity, save it!
          $contact->setName($name);
          $contact->setEmail($email);
          $contact->setSubject($subject);
          $contact->setMessage($message);

          $sn = $this->getDoctrine()->getManager();
          $sn->persist($contact);
          $sn->flush();
          }
         */

// replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
                    'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR,
                    'form' => $form->createView()
        ));
    }

    /**
     * @Route("/ajax", name="ajax")
     */
    public function ajaxAction(Request $request)
    {


        $contact = new Contact;
        $name = $request->request->get('name');
        $email = $request->request->get('email');
        $subject = $request->request->get('object');
        $message = $request->request->get('msg');

// ... perform some action, such as saving the task to the database
// for example, if Task is a Doctrine entity, save it!


        $contact->setName($name);
        $contact->setEmail($email);
        $contact->setSubject($subject);
        $contact->setMessage($message);

        $sn = $this->getDoctrine()->getManager();
        $sn->persist($contact);
        $sn->flush();
        $response = new JsonResponse();
        $response->setStatusCode(200);
//ajout de données éventuelles
        $response->setData(array(
            'success' => "Votre message a bien été envoyé"));
        return $response;


//envoi des données JSON en front
    }

}
