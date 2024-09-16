<?php

namespace App\Controller\Api;

use App\Manager\SecurityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api')]
class SecurityController extends AbstractController
{
    public function __construct(
        private SecurityManager $securityManager
    ) {}

    #[Route('/login', name: 'api_security_login', methods: 'POST')]
    public function  login(Request $request): JsonResponse
    {

        try {

            $data = json_decode($request->getContent(), true);
            $response = $this->securityManager->login($data);

            return $this->json(['status' => 'success', 'loginInfo' => $response], Response::HTTP_OK);

        } catch (\Exception $e) {
            return $this->json(['status'=>'error', 'message' => $e->getMessage()],Response::HTTP_BAD_REQUEST);
        }
    }

    #[Route('/register', name: 'api_security_register', methods: 'POST')]
    public function register(Request $request): JsonResponse
    {

        try {

            $data = json_decode($request->getContent(), true);
            $this->securityManager->register($data);
            

            return $this->json(['status'=> 'success'], Response::HTTP_CREATED);

        } catch (\Exception $e) {
            return $this->json(['status' => 'error', 'message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
