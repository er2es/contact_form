<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Table('contact')]
#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    public function __construct() {
        $this->setCreatedAt(new \DateTime());
    }

    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 150)]
    private ?string $email = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $message = null;

    #[Gedmo\Timestampable(on: 'create')]
    #[ORM\Column(name: 'created_at', type: Types::DATETIME_MUTABLE)]
    private $created_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
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

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function setCreatedAt(\DateTime $created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

}
