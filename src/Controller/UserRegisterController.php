<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserRegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserRegisterController extends AbstractController
{
    /**
     * @Route("/user/register", name="user_register")
     */
    public function index(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = new User();
        $form = $this->createForm(UserRegisterType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entity_manager = $this->getDoctrine()->getManager();
            $user->setActive(true);
            $user->setRoles(['ROLE_USER']);
            $user->setPassword($passwordEncoder->encodePassword($user, $form['password']->getData()));
            $entity_manager->persist($user);
            $entity_manager->flush();
            $this->addFlash('success', 'User has been registered successfully');

            return $this->redirectToRoute('user_register');
        }

        return $this->render('user_register/index.html.twig', [
            'controller_name' => 'UserRegisterController',
            'form' => $form->createView(),
        ]);
    }
}
