<?php

namespace App\Controller\Api;

use App\Manager\RecipeManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('api/recipe')]
class RecipeController extends AbstractController
{

    public function __construct(
        private RecipeManager $recipeManager,
    ) {}

    #[Route('s', name: 'app_api_all_recipes')]
    public function index(): JsonResponse
    {
        try {

            return $this->json(['status' => 'success', 'recipes' => $this->recipeManager->index()], Response::HTTP_OK,[], ['groups' => "recipe_information"]);
        
        } catch (\Exception $e) {
            return $this->json(['status' => 'error', 'message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    #[Route('/new', name: 'app_api_new_recipes')]
    public function new(Request $request): JsonResponse
    {
        try {

            $data = json_decode($request->getContent(), true);
            $this->recipeManager->new($data);

            return $this->json(['status' => 'success'], Response::HTTP_OK, [], ['groups' => "recipe_information"]);
            
        } catch (\Exception $e) {
            return $this->json(['status' => 'error', 'message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    #[Route('/update', name: 'app_api_update_recipes')]
    public function update(Request $request): JsonResponse
    {
        try {

            $data = json_decode($request->getContent(), true);
            $this->recipeManager->update($data);

            return $this->json(['status' => 'success'], Response::HTTP_OK, [], ['groups' => "recipe_information"]);

        } catch (\Exception $e) {
            return $this->json(['status' => 'error', 'message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
