<?php

namespace App\Controller\Api;

use App\Manager\SecurityManager;
use App\Manager\UserManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/api/admin')]
class UserController extends AbstractController
{

    public function __construct(
        private SecurityManager $securityManager,
        private UserManager $userManager
    ) {}


    #[Route('/updateAccount', name: 'api_security_update', methods: 'POST')]
    public function updateAccount(Request $request): JsonResponse
    {

        try {

            $data = json_decode($request->getContent(), true);
            $this->securityManager->update($data);


            return $this->json(['status' => 'success', 'message' => 'compte créer avec succes'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->json(['status' => 'error', 'message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    #[Route('/userRecipes/{id}', name: 'api_security_user_recipes', methods: 'get')]
    public function usersRecipes(UserManager $userManager, int $id): JsonResponse
    {

        try {

            $recipes = $userManager->getUserRecipe($id);

            return $this->json(['status' => 'success', 'recipes' => $recipes], Response::HTTP_OK, [], ['groups' => "recipe_information"]);
        } catch (\Exception $e) {
            return $this->json(['status' => 'error', 'message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    #[Route('/user/deleteAccount', name: 'api_security_delete', methods: 'POST')]
    public function deleteAccount(Request $request): JsonResponse
    {

        try {

            $data = json_decode($request->getContent(), true);
            $this->userManager->delete($data);

            return $this->json(['status' => 'success', 'message' => 'compte supprimé'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->json(['status' => 'error', 'message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
