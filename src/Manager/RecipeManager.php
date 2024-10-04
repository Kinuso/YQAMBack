<?php

namespace App\Manager;

use App\Entity\Ingredient;
use App\Entity\Recipe;
use App\Entity\Step;
use App\Entity\UpVote;
use App\Entity\User;
use App\Repository\CategoriesRepository;
use App\Repository\RecipeRepository;
use App\Repository\TypeRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class RecipeManager
{

    public function __construct(
        private RecipeRepository $recipeRepository,
        private EntityManagerInterface $entityManagerInterface,
        private UserRepository $userRepository,
        private CategoriesRepository $categoriesRepository,
        private TypeRepository $typeRepository,
    ) {}

    public function index(): array
    {
        return $this->recipeRepository->findAll();
    }

    public function specific(string $title): Recipe
    {
        return $this->recipeRepository->findOneBy(["title" => $title]);
    }

    public function new(array $data): Recipe
    {
        $recipe = new Recipe;

        if ($this->recipeRepository->findOneBy(['title' => $data["title"]])) {
            throw new Exception("Recette déjà existante");
        }

        $recipe = $this->recipeCredentials($data, $recipe);

        return $recipe;
    }

    public function update(array $data): Recipe
    {
        $recipe = $this->recipeRepository->findOneBy(["id" => $data["recipeId"]]);

        $recipe = $this->recipeCredentials($data, $recipe);

        return $recipe;
    }




    private function recipeCredentials(array $data, recipe $recipe): Recipe
    {

        $user = new User;
        $user = $this->userRepository->findOneBy(['email' => $data["user"]]);
        $title = htmlspecialchars(strip_tags(trim($data["title"])));
        $description = htmlspecialchars(strip_tags(trim($data["description"])));
        $carbs = htmlspecialchars(strip_tags(trim($data["carbs"])));
        $protein = htmlspecialchars(strip_tags(trim($data["protein"])));
        $fat = htmlspecialchars(strip_tags(trim($data["fat"])));
        $calories = htmlspecialchars(strip_tags(trim($data["calories"])));
        $forHowManyPeople = htmlspecialchars(strip_tags(trim($data["forHowManyPeople"])));
        $imageUrl = htmlspecialchars(strip_tags(trim($data["imgUrl"])));

        $recipe->setUserID($user);
        $recipe->setTitle($title);
        $recipe->setDescription($description);
        $recipe->setProtein($protein);
        $recipe->setCarbs($carbs);
        $recipe->setFat($fat);
        $recipe->setCalories($calories);
        $recipe->setForHowManyPeople($forHowManyPeople);
        $recipe->setImageUrl($imageUrl);

        $categories = $data["categories"];
        foreach ($categories as $categoryData) {
            $recipe->addCategory($this->categoriesRepository->findOneBy(["name" => $categoryData]));
        }

        $types = $data["types"];
        foreach ($types as $typeData) {
            $recipe->addType($this->typeRepository->findOneBy(["name" => $typeData]));
        }




        $this->entityManagerInterface->persist($recipe);
        $this->entityManagerInterface->flush();


        $steps = $data["steps"];
        $i = 1;
        foreach ($steps as $stepData) {
            $step = new Step;
            $step->setDescription($stepData["name"]);
            $step->setNumber($i);
            $step->setRecipe($recipe);
            $i++;

            $this->entityManagerInterface->persist($step);
            $this->entityManagerInterface->flush();
        }

        $ingredients = $data["ingredients"];
        foreach ($ingredients as $ingredientData) {

            $ingredient = new Ingredient;
            $ingredient->setQuantity($ingredientData['quantity']);
            $ingredient->setName($ingredientData['name']);
            $ingredient->setRecipe($recipe);

            $this->entityManagerInterface->persist($ingredient);
            $this->entityManagerInterface->flush();
        }

        return $recipe;
    }
}
