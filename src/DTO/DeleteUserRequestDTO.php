<?php

declare(strict_types=1);

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

final class DeleteUserRequestDTO implements DTOResolverInterface
{
    #[Assert\NotBlank(message: 'Email cannot be empty.')]
    #[Assert\Regex('/^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/')]
    private string $email;

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
