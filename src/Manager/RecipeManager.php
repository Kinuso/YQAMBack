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
        $title = $data["title"];
        $description = $data["description"];
        $carbs = $data["carbs"];
        $protein = $data["protein"];
        $fat = $data["fat"];
        $calories = $data["calories"];
        $forHowManyPeople = $data["forHowManyPeople"];
        $imageUrl = $data["imgUrl"];

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
