<?php

declare(strict_types=1);

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

final class CreateUserRequestDTO implements DTOResolverInterface
{
    #[Assert\NotBlank(message: 'Email cannot be empty.')]
    #[Assert\Regex('/^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/', message: 'Email\'s value does not fit.')]
    private string $email;

    #[Assert\NotBlank(message: 'Name cannot be empty.')]
    #[Assert\Type(type: 'string', message: 'Name\'s value {{ value }} is not a string.')]
    #[Assert\Length(
        min: 2,
        max: 20,
        minMessage: 'Name must be not less than {{ limit }} characters.',
        maxMessage: 'Name must be not more than {{ limit }} characters.'
    )]
    private string $name;

    #[Assert\NotBlank(message: 'Age cannot be empty.')]
    #[Assert\Type(type: 'integer', message: 'Age\'s value {{ value }} is not a integer.')]
    #[Assert\Range(min: 6, max: 154)]
    private int $age;

    #[Assert\NotBlank(message: 'Sex cannot be empty.')]
    #[Assert\Type(type: 'string', message: 'Sex\'s value {{ value }} is not a string.')]
    private string $sex;

    #[Assert\NotBlank(message: 'Birthday cannot be empty.')]
    #[Assert\Type(type: 'string', message: 'Birthday\'s value {{ value }} is not a string.')]
    #[Assert\Regex('/^\d{4}-\d{2}-\d{2}$/', message: 'Birthday\'s value does not fit.')]
    #[Assert\LessThanOrEqual('2018-01-01')]
    #[Assert\GreaterThanOrEqual('1870-01-01')]
    private string $birthday;

    #[Assert\NotBlank(message: 'Phone cannot be empty.')]
    #[Assert\Type(type: 'string', message: 'Phone\'s value {{ value }} is not a string.')]
    #[Assert\Regex('/^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/', message: 'Phone\'s value does not fit.')]
    private string $phone;

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setSex(string $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    public function getSex(): string
    {
        return $this->sex;
    }

    public function setBirthday(string $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getBirthday(): string
    {
        return $this->birthday;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }
}
