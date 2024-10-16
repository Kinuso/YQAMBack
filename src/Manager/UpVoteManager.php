<?php

namespace App\Manager;

use App\Entity\UpVote;
use App\Repository\RecipeRepository;
use App\Repository\UpVoteRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class UpVoteManager
{

    public function __construct(
        private RecipeRepository $recipeRepository,
        private UserRepository $userRepository,
        private UpVoteRepository $upVoteRepository,
        private EntityManagerInterface $entityManagerInterface
    ) {}

    public function upVote(array $data): UpVote

    {
        $recipe = $this->recipeRepository->findOneBy(["id" => $data["recipeId"]]);
        $user = $this->userRepository->findOneBy(["id" => $data["userId"]]);

        $upVote = new UpVote;

        $upVote->setRecipe($recipe);
        $upVote->setUserID($user);
        $this->entityManagerInterface->persist($upVote);
        $this->entityManagerInterface->flush();
        return $upVote;
    }

    public function removeUpVote(array $data): void
    {
        $recipe = $this->recipeRepository->findOneBy(["id" => $data["recipeId"]]);
        $upVote = $this->upVoteRepository->findOneBy(["userID" => $data["userId"], "recipe" => $recipe]);

        $this->entityManagerInterface->remove($upVote);
        $this->entityManagerInterface->flush();

        return;
    }

    public function isUpVotedByUser(array $data): bool
    {
        $recipe = $this->recipeRepository->findOneBy(["id" => $data["recipeId"]]);
        $upVote = $this->upVoteRepository->findOneBy(["userID" => $data["userId"], "recipe" => $recipe]);

        if ($upVote) {
            return true;
        } else {
            return false;
        }
    }

    public function liked($data): array
    {
        $recipes = $this->upVoteRepository->findBy(["userID" => $data]);

        return $recipes;
    }
}
