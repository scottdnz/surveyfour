<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SurveyRepository")
 */
class Survey
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Created;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $IssuedActive;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $TimeAllowed;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $AuthorId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->Created;
    }

    public function setCreated(\DateTimeInterface $Created): self
    {
        $this->Created = $Created;

        return $this;
    }

    public function getIssuedActive(): ?bool
    {
        return $this->IssuedActive;
    }

    public function setIssuedActive(?bool $IssuedActive): self
    {
        $this->IssuedActive = $IssuedActive;

        return $this;
    }

    public function getTimeAllowed(): ?\DateTimeInterface
    {
        return $this->TimeAllowed;
    }

    public function setTimeAllowed(?\DateTimeInterface $TimeAllowed): self
    {
        $this->TimeAllowed = $TimeAllowed;

        return $this;
    }

    public function getAuthorId(): ?int
    {
        return $this->AuthorId;
    }

    public function setAuthorId(?int $AuthorId): self
    {
        $this->AuthorId = $UserId;

        return $this;
    }
}
