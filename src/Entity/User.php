<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['recipe_information'])]

    private ?int $id = null;

    #[ORM\Column(length: 180)]
    #[Groups(['recipe_information'])]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dgprAcceptationDate = null;

    /**
     * @var Collection<int, recipe>
     */
    #[ORM\OneToMany(targetEntity: recipe::class, mappedBy: 'userID')]
    private Collection $recipe;

    /**
     * @var Collection<int, upVote>
     */
    #[ORM\OneToMany(targetEntity: upVote::class, mappedBy: 'userID')]
    private Collection $upVote;

    public function __construct()
    {
        $this->recipe = new ArrayCollection();
        $this->upVote = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getDgprAcceptationDate(): ?\DateTimeInterface
    {
        return $this->dgprAcceptationDate;
    }

    public function setDgprAcceptationDate(\DateTimeInterface $dgprAcceptationDate): static
    {
        $this->dgprAcceptationDate = $dgprAcceptationDate;

        return $this;
    }

    /**
     * @return Collection<int, recipe>
     */
    public function getRecipe(): Collection
    {
        return $this->recipe;
    }

    public function addRecipe(recipe $recipe): static
    {
        if (!$this->recipe->contains($recipe)) {
            $this->recipe->add($recipe);
            $recipe->setUserID($this);
        }

        return $this;
    }

    public function removeRecipe(recipe $recipe): static
    {
        if ($this->recipe->removeElement($recipe)) {
            // set the owning side to null (unless already changed)
            if ($recipe->getUserID() === $this) {
                $recipe->setUserID(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, upVote>
     */
    public function getUpVote(): Collection
    {
        return $this->upVote;
    }

    public function addUpVote(upVote $upVote): static
    {
        if (!$this->upVote->contains($upVote)) {
            $this->upVote->add($upVote);
            $upVote->setUserID($this);
        }

        return $this;
    }

    public function removeUpVote(upVote $upVote): static
    {
        if ($this->upVote->removeElement($upVote)) {
            // set the owning side to null (unless already changed)
            if ($upVote->getUserID() === $this) {
                $upVote->setUserID(null);
            }
        }

        return $this;
    }
}
