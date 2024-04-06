<?php

namespace App\Controller;

use App\DTO\CreateUserRequestDTO;
use App\DTO\DeleteUserRequestDTO;
use App\DTO\GetUserDataRequestDTO;
use App\DTO\UpdateUserDataRequestDTO;
use App\Exception\DuplicateException;
use App\Exception\UserNotFoundException;
use App\Service\UsersService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api', name: 'api_')]
class UsersController extends AbstractController
{
    public function __construct(
        private readonly UsersService $usersService
    ) {
    }

    /**
     * @throws DuplicateException
     */
    #[Route('/register', name: 'register', methods: 'POST')]
    public function createUser(CreateUserRequestDTO $requestDTO): JsonResponse
    {
        $this->usersService->create(
            $requestDTO->getEmail(),
            $requestDTO->getName(),
            $requestDTO->getAge(),
            $requestDTO->getSex(),
            $requestDTO->getBirthday(),
            $requestDTO->getPhone()
        );

        return new JsonResponse('Success');
    }

    /**
     * @throws UserNotFoundException
     */
    #[Route('/find_user_data', name: 'find_user_data', methods: 'GET')]
    public function getUserData(GetUserDataRequestDTO $requestDTO): JsonResponse
    {
        return new JsonResponse($this->usersService->read($requestDTO->getEmail()));
    }

    /**
     * @throws UserNotFoundException
     */
    #[Route('/update_user_data', name: 'update_user_data', methods: 'PUT')]
    public function updateUserData(UpdateUserDataRequestDTO $requestDTO): JsonResponse
    {
        $this->usersService->update($requestDTO->getEmail(), $requestDTO->getNewEmail(), $requestDTO->getNewPhone());

        return new JsonResponse('Success');
    }

    /**
     * @throws UserNotFoundException
     */
    #[Route('/delete_user', name: 'delete_user', methods: 'DELETE')]
    public function deleteUser(DeleteUserRequestDTO $requestDTO): JsonResponse
    {
        $this->usersService->delete($requestDTO->getEmail());

        return new JsonResponse('Success');
    }
}
