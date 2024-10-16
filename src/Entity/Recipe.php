<?php

namespace App\Entity;

use App\Repository\RecipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: RecipeRepository::class)]
class Recipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['recipe_information', 'liked_recipe_information'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['recipe_information', 'liked_recipe_information'])]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    #[Groups(['recipe_information'])]
    private ?string $description = null;

    #[ORM\Column]
    #[Groups(['recipe_information'])]
    private ?float $carbs = null;

    #[ORM\Column]
    #[Groups(['recipe_information'])]
    private ?float $protein = null;

    #[ORM\Column]
    #[Groups(['recipe_information'])]
    private ?float $fat = null;

    #[ORM\Column]
    #[Groups(['recipe_information'])]
    private ?int $calories = null;

    #[ORM\Column]
    #[Groups(['recipe_information'])]
    private ?int $forHowManyPeople = null;

    #[ORM\ManyToOne(inversedBy: 'recipe')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $userID = null;

    /**
     * @var Collection<int, UpVote>
     */
    #[ORM\OneToMany(targetEntity: UpVote::class, mappedBy: 'recipe', orphanRemoval: true)]
    #[Groups(['recipe_information'])]
    private Collection $upVote;

    /**
     * @var Collection<int, Type>
     */
    #[ORM\ManyToMany(targetEntity: Type::class, inversedBy: 'recipes')]
    #[Groups(['recipe_information'])]
    private Collection $type;

    /**
     * @var Collection<int, Categories>
     */
    #[ORM\ManyToMany(targetEntity: Categories::class, inversedBy: 'recipes')]
    #[Groups(['recipe_information'])]
    private Collection $categories;

    /**
     * @var Collection<int, Step>
     */
    #[ORM\OneToMany(targetEntity: Step::class, mappedBy: 'recipe', orphanRemoval: true)]
    #[Groups(['recipe_information'])]
    private Collection $step;

    /**
     * @var Collection<int, Ingredient>
     */
    #[ORM\OneToMany(targetEntity: Ingredient::class, mappedBy: 'recipe', orphanRemoval: true)]
    #[Groups(['recipe_information'])]
    private Collection $ingredient;

    #[ORM\Column(length: 255)]
    #[Groups(['recipe_information', 'liked_recipe_information'])]
    private ?string $imageUrl = null;

    public function __construct()
    {
        $this->upVote = new ArrayCollection();
        $this->type = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->step = new ArrayCollection();
        $this->ingredient = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCarbs(): ?float
    {
        return $this->carbs;
    }

    public function setCarbs(float $carbs): static
    {
        $this->carbs = $carbs;

        return $this;
    }

    public function getProtein(): ?float
    {
        return $this->protein;
    }

    public function setProtein(float $protein): static
    {
        $this->protein = $protein;

        return $this;
    }

    public function getFat(): ?float
    {
        return $this->fat;
    }

    public function setFat(float $fat): static
    {
        $this->fat = $fat;

        return $this;
    }

    public function getCalories(): ?int
    {
        return $this->calories;
    }

    public function setCalories(int $calories): static
    {
        $this->calories = $calories;

        return $this;
    }

    public function getForHowManyPeople(): ?int
    {
        return $this->forHowManyPeople;
    }

    public function setForHowManyPeople(int $forHowManyPeople): static
    {
        $this->forHowManyPeople = $forHowManyPeople;

        return $this;
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

    /**
     * @return Collection<int, UpVote>
     */
    public function getUpVote(): Collection
    {
        return $this->upVote;
    }

    public function addUpVote(UpVote $upVote): static
    {
        if (!$this->upVote->contains($upVote)) {
            $this->upVote->add($upVote);
            $upVote->setRecipe($this);
        }

        return $this;
    }

    public function removeUpVote(UpVote $upVote): static
    {
        if ($this->upVote->removeElement($upVote)) {
            // set the owning side to null (unless already changed)
            if ($upVote->getRecipe() === $this) {
                $upVote->setRecipe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Type>
     */
    public function getType(): Collection
    {
        return $this->type;
    }

    public function addType(Type $type): static
    {
        if (!$this->type->contains($type)) {
            $this->type->add($type);
        }

        return $this;
    }

    public function removeType(Type $type): static
    {
        $this->type->removeElement($type);

        return $this;
    }

    /**
     * @return Collection<int, Categories>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categories $category): static
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
        }

        return $this;
    }

    public function removeCategory(Categories $category): static
    {
        $this->categories->removeElement($category);

        return $this;
    }



    /**
     * @return Collection<int, Step>
     */
    public function getStep(): Collection
    {
        return $this->step;
    }

    public function addStep(Step $step): static
    {
        if (!$this->step->contains($step)) {
            $this->step->add($step);
            $step->setRecipe($this);
        }

        return $this;
    }

    public function removeStep(Step $step): static
    {
        if ($this->step->removeElement($step)) {
            // set the owning side to null (unless already changed)
            if ($step->getRecipe() === $this) {
                $step->setRecipe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Ingredient>
     */
    public function getIngredient(): Collection
    {
        return $this->ingredient;
    }

    public function addIngredient(Ingredient $ingredient): static
    {
        if (!$this->ingredient->contains($ingredient)) {
            $this->ingredient->add($ingredient);
            $ingredient->setRecipe($this);
        }

        return $this;
    }

    public function removeIngredient(Ingredient $ingredient): static
    {
        if ($this->ingredient->removeElement($ingredient)) {
            // set the owning side to null (unless already changed)
            if ($ingredient->getRecipe() === $this) {
                $ingredient->setRecipe(null);
            }
        }

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): static
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }
}
