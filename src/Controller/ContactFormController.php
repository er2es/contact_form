<?php

namespace App\Controller;

use App\Form\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Contact;

class ContactFormController extends AbstractController
{
    #[Route('/', name: 'contact_index')]
    public function index(Request $request,EntityManagerInterface $entityManager)
    {
        $form = $this->createForm(ContactFormType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $contactFormData = $form->getData();
            $contactData = new Contact();
            $contactData->setName($contactFormData['name']);
            $contactData->setEmail($contactFormData['email']);
            $contactData->setMessage($contactFormData['message']);
            $entityManager->persist($contactData);
            $entityManager->flush();
            $this->addFlash('success', "Köszönjük szépen a kérdésedet. Válaszunkkal hamarosan keresünk a megadott e-mail címen.");
            return $this->redirect('/');
        }

        return $this->render('contact/index.html.twig', [
            'develery_form' => $form->createView()
        ]);
    }
    
}
