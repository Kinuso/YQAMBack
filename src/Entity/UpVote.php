<?php

namespace App\Entity;

use App\Repository\UpVoteRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: UpVoteRepository::class)]
class UpVote
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['recipe_information'])]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'upVote')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['recipe_information'])]
    private ?User $userID = null;

    #[ORM\ManyToOne(inversedBy: 'upVote')]
    #[ORM\JoinColumn(nullable: false)]
    // #[Groups(['recipe_information'])]
    private ?Recipe $recipe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserID(): ?User
    {
        return $this->userID;
    }

    public function setUserID(?User $userID): static
    {
        $this->userID = $userID;

        return $this;
    }

    public function getRecipe(): ?Recipe
    {
        return $this->recipe;
    }

    public function setRecipe(?Recipe $recipe): static
    {
        $this->recipe = $recipe;

        return $this;
    }
}
