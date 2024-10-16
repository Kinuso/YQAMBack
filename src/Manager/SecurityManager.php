<?php

namespace App\Manager;

use App\Entity\User;
use App\Repository\UserRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class SecurityManager extends AbstractController
{
    public function __construct(
        private UserRepository $userRepository,
        private UserPasswordHasherInterface $passwordHasher,
        private JWTTokenManagerInterface $JWTTokenManager,
        private EntityManagerInterface $entityManagerInterface,
        private UserPasswordHasherInterface $userPasswordHasherInterface
    ) {}


    public function login(array $data): array
    {

        $user = $this->userRepository->findOneBy(['email' => $data['email']]);

        if (!$user) {
            throw new Exception("Error no user found");
        }

        $passwordCheck = $this->passwordHasher->isPasswordValid($user, $data['password']);
        if (!$passwordCheck) {
            throw new Exception("Error no user found");
        }

        $token = $this->JWTTokenManager->create($user);
        $response = [
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'firstname' => $user->getFirstname(),
            'lastname' => $user->getLastname(),
            'token' => $token,
            'roles' => $user->getRoles(),
            'created_at' => $user->getCreatedAt(),
        ];

        return $response;
    }

    public function register(array $data): void
    {
        $user = new User;

        if ($this->userRepository->findOneBy(["email" => $data["email"]])) {
            throw new Exception("Adresse email déjà utilisée");
        }

        $this->userCredentials($data, $user);
    }

    public function update(array $data): void
    {

        $user = $this->userRepository->findOneBy(["email" => $data["email"]]);
        $this->userCredentials($data, $user);
    }

    private function userCredentials(array $data, User $user): void
    {

        foreach ($data as $key) {
            if ($key == null) {
                throw new Exception("Veuillez remplir tout les champs");
            }
        }

        $email = htmlspecialchars(strip_tags(trim($data['email'])));
        $password = $this->userPasswordHasherInterface->hashPassword($user, $data['password']);
        $firstname = htmlspecialchars(strip_tags(trim($data['firstname'])));
        $lastname = htmlspecialchars(strip_tags(trim($data['lastname'])));
        $createdAt = new DateTime(date('Y-m-d H:i:s'));
        $dgpr = new DateTime(date('Y-m-d H:i:s'));


        $user->setEmail($email);
        $user->setPassword($password);
        $user->setFirstname($firstname);
        $user->setLastname($lastname);
        $user->setRoles($user->getRoles());
        $user->setCreatedAt($createdAt);
        $user->setDgprAcceptationDate($dgpr);

        $this->entityManagerInterface->persist($user);
        $this->entityManagerInterface->flush();
    }
}
