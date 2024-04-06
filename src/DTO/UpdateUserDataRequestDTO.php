<?php

declare(strict_types=1);

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

final class UpdateUserDataRequestDTO implements DTOResolverInterface
{
    #[Assert\NotBlank(message: 'Email cannot be empty.')]
    #[Assert\Regex('/^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/', message: 'Email\'s value does not fit.')]
    private string $email;

    #[Assert\NotBlank(message: 'New email cannot be empty.')]
    #[Assert\Regex('/^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/', message: 'New email\'s value does not fit.')]
    private string $newEmail;

    #[Assert\NotBlank(message: 'Phone cannot be empty.')]
    #[Assert\Type(type: 'string', message: 'Phone\'s value {{ value }} is not a string.')]
    #[Assert\Regex('/^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/', message: 'Phone\'s value does not fit.')]
    private string $newPhone;

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setNewEmail(string $newEmail): self
    {
        $this->newEmail = $newEmail;

        return $this;
    }

    public function getNewEmail(): string
    {
        return $this->newEmail;
    }

    public function setNewPhone(string $newPhone): self
    {
        $this->newPhone = $newPhone;

        return $this;
    }

    public function getNewPhone(): string
    {
        return $this->newPhone;
    }
}
