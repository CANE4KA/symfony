<?php

namespace App\Service;

use App\Entity\Users;
use App\Exception\DuplicateException;
use App\Exception\UserNotFoundException;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class UsersService
{
    private readonly EntityRepository $userRepository;

    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
        $this->userRepository = $this->entityManager->getRepository(Users::class);
    }

    /**
     * @throws DuplicateException
     * @throws \Exception
     */
    public function create(string $email, string $name, int $age, string $sex, string $birthday, string $phone): void
    {
        if (null !== $this->userRepository->findOneBy(['email' => $email])) {
            throw new DuplicateException();
        }

        $user = (new Users())
            ->setEmail($email)
            ->setName($name)
            ->setAge($age)
            ->setSex($sex)
            ->setBirthday(new \DateTime($birthday))
            ->setPhone($phone);

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    /**
     * @throws UserNotFoundException
     */
    public function read(string $email): string
    {
        /** @var Users|null $user */
        $user = $this->userRepository->findOneBy(['email' => $email]);
        if (null === $user) {
            throw new UserNotFoundException();
        }

        return $user->getName().' '.
               $user->getAge().' '.
               $user->getSex().' '.
               $user->getBirthday()->format('Y-m-d').' '.
               $user->getPhone();
    }

    /**
     * @throws UserNotFoundException
     */
    public function update(string $email, string $newEmail, string $newPhone): void
    {
        /** @var Users|null $user */
        $user = $this->userRepository->findOneBy(['email' => $email]);
        if (null === $user) {
            throw new UserNotFoundException();
        }

        $user
            ->setEmail($newEmail)
            ->setPhone($newPhone);

        $this->entityManager->flush();
    }

    /**
     * @throws UserNotFoundException
     */
    public function delete(string $email): void
    {
        $user = $this->userRepository->findOneBy(['email' => $email]);
        if (null === $user) {
            throw new UserNotFoundException();
        }

        $this->entityManager->remove($user);
        $this->entityManager->flush();
    }
}
