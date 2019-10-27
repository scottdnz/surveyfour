<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdviceBlockRepository")
 */
class AdviceBlock
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Heading;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Body;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Survey")
     */
    private $Survey;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeading(): ?string
    {
        return $this->Heading;
    }

    public function setHeading(?string $Heading): self
    {
        $this->Heading = $Heading;

        return $this;
    }

    public function getBody(): ?string
    {
        return $this->Body;
    }

    public function setBody(?string $Body): self
    {
        $this->Body = $Body;

        return $this;
    }

    public function getSurvey(): ?Survey
    {
        return $this->Survey;
    }

    public function setSurvey(?Survey $Survey): self
    {
        $this->Survey = $Survey;

        return $this;
    }
}
