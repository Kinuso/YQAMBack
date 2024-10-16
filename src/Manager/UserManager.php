<?php

namespace App\Manager;

use App\Repository\RecipeRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class UserManager
{
    public function __construct(
        private RecipeRepository $recipeRepository,
        private EntityManagerInterface $entityManagerInterface,
        private UserRepository $userRepository
    ) {}

    public function getUserRecipe($data): array
    {
        $recipes = $this->recipeRepository->findBy(["userID" => $data]);

        return $recipes;
    }

    public function delete(array $data): void
    {

        $user = $this->userRepository->findOneBy(["email" => $data["email"]]);

        $this->entityManagerInterface->remove($user);
        $this->entityManagerInterface->flush();
    }
}
