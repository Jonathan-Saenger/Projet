<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CommentaireRepository;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $note = null;

    #[ORM\Column(length: 255)]
    #[Assert\Regex('/^[A-Za-z\,.!?\'"-]+$/')]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\Regex('/^[A-Za-z\,.!?\'"-]+$/')]
    private ?string $commentaire = null;

    #[ORM\Column(nullable: true)]
    private ?bool $publication = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $jour_publication = null;

    #[ORM\ManyToOne(inversedBy: 'commentaires')]
    private ?User $User = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): static
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function isPublication(): ?bool
    {
        return $this->publication;
    }

    public function setPublication(?bool $publication): static
    {
        $this->publication = $publication;

        return $this;
    }

    public function getJourPublication(): ?\DateTimeInterface
    {
        return $this->jour_publication;
    }

    public function setJourPublication(?\DateTimeInterface $jour_publication): static
    {
        $this->jour_publication = $jour_publication;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): static
    {
        $this->User = $User;

        return $this;
    }
}
