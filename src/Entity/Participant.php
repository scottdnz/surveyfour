<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParticipantRepository")
 */
class Participant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="participants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Survey", inversedBy="participants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Survey;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AnswerSubmitted", mappedBy="Participant")
     */
    private $answerSubmitteds;

    public function __construct()
    {
        $this->answerSubmitteds = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

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

    /**
     * @return Collection|AnswerSubmitted[]
     */
    public function getAnswerSubmitteds(): Collection
    {
        return $this->answerSubmitteds;
    }

    public function addAnswerSubmitted(AnswerSubmitted $answerSubmitted): self
    {
        if (!$this->answerSubmitteds->contains($answerSubmitted)) {
            $this->answerSubmitteds[] = $answerSubmitted;
            $answerSubmitted->setParticipant($this);
        }

        return $this;
    }

    public function removeAnswerSubmitted(AnswerSubmitted $answerSubmitted): self
    {
        if ($this->answerSubmitteds->contains($answerSubmitted)) {
            $this->answerSubmitteds->removeElement($answerSubmitted);
            // set the owning side to null (unless already changed)
            if ($answerSubmitted->getParticipant() === $this) {
                $answerSubmitted->setParticipant(null);
            }
        }

        return $this;
    }
}
