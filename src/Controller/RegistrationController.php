<?php
/**
 * Copyright (c) 2019.  Slepnoga.
 */

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\LoginAuthenticator;
use App\Utils\Helpers\LoggingUserhelper;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

class RegistrationController extends AbstractController
{
    use LoggingUserhelper;

    /**
     * @param Request                      $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param GuardAuthenticatorHandler    $guardHandler
     * @param LoginAuthenticator           $authenticator
     * @return Response
     * @throws Exception
     * @Route("/register", name="app_register")
     */
    public function register(
        Request $request,
        UserPasswordEncoderInterface $passwordEncoder,
        GuardAuthenticatorHandler $guardHandler,
        LoginAuthenticator $authenticator
    ): Response {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $user->setEmail($form->get('email')->getData());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $authenticator,
                'main' // firewall name in security.yaml
            );

            $this->addFlash('succes', 'Registracion succes, please wait');
        }

        return $this->render(
            'registration/register.html.twig',
            [
                'registrationForm' => $form->createView(),
            ]
        );
    }
}
