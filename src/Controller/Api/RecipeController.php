<?php

namespace App\Controller\Api;

use App\Manager\RecipeManager;
use App\Repository\CategoriesRepository;
use App\Repository\RecipeRepository;
use App\Repository\TypeRepository;
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

            return $this->json(['status' => 'success', 'recipes' => $this->recipeManager->index()], Response::HTTP_OK, [], ['groups' => "recipe_information"]);
        } catch (\Exception $e) {
            return $this->json(['status' => 'error', 'message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    #[Route('/recent', name: 'app_api_recent_recipes')]
    public function recent(RecipeRepository $recipeRepository): JsonResponse
    {
        try {

            return $this->json(['status' => 'success', 'recipes' => $recipeRepository->recent()], Response::HTTP_OK, [], ['groups' => "recipe_information"]);
        } catch (\Exception $e) {
            return $this->json(['status' => 'error', 'message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }



    #[Route('/admin/new', name: 'app_api_new_recipes')]
    public function new(Request $request): JsonResponse
    {
        try {

            $data = json_decode($request->getContent(), true);
            $this->recipeManager->new($data);
            return $this->json(['status' => 'success', 'message' => 'Recette créée'], Response::HTTP_OK, [], ['groups' => "recipe_information"]);
        } catch (\Exception $e) {
            return $this->json(['status' => 'error', 'message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    #[Route('/admin/update', name: 'app_api_update_recipes')]
    public function update(Request $request): JsonResponse
    {
        try {

            $data = json_decode($request->getContent(), true);
            $this->recipeManager->update($data);

            return $this->json(['status' => 'success', 'message' => 'Recette éditée'], Response::HTTP_OK, [], ['groups' => "recipe_information"]);
        } catch (\Exception $e) {
            return $this->json(['status' => 'error', 'message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }


    #[Route('/categories', name: 'app_api_categories')]
    public function categories(CategoriesRepository $categoriesRepository): JsonResponse
    {
        try {

            $categories = $categoriesRepository->findAll();

            return $this->json(['status' => 'success', 'categories' => $categories], Response::HTTP_OK, [], ['groups' => "recipe_information"]);
        } catch (\Exception $e) {
            return $this->json(['status' => 'error', 'message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    #[Route('/types', name: 'app_api_types')]
    public function types(TypeRepository $typeRepository): JsonResponse
    {
        try {

            $types = $typeRepository->findAll();

            return $this->json(['status' => 'success', 'types' => $types], Response::HTTP_OK, [], ['groups' => "recipe_information"]);
        } catch (\Exception $e) {
            return $this->json(['status' => 'error', 'message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    #[Route('/search', name: 'app_api_search_recipe')]
    public function search(Request $request, RecipeRepository $recipeRepository): JsonResponse
    {
        try {
            $searchValue = $request->query->get('searchValue', '');

            return $this->json(['status' => 'success', 'recipes' => $recipeRepository->findBySearch($searchValue)], Response::HTTP_OK, [], ['groups' => "recipe_information"]);
        } catch (\Exception $e) {
            return $this->json(['status' => 'error', 'message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    #[Route('/specific/{title}', name: 'app_api_specific_recipe')]
    public function specific(string $title): JsonResponse
    {
        try {

            return $this->json(['status' => 'success', 'recipe' => $this->recipeManager->specific($title)], Response::HTTP_OK, [], ['groups' => "recipe_information"]);
        } catch (\Exception $e) {
            return $this->json(['status' => 'error', 'message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
