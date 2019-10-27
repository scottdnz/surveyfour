<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnswerSubmittedRepository")
 */
class AnswerSubmitted
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Participant", inversedBy="answerSubmitteds")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Participant;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Answer")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Answer;

    /**
     * @ORM\Column(type="integer")
     */
    private $IndexPosition;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TextEntry;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParticipant(): ?Participant
    {
        return $this->Participant;
    }

    public function setParticipant(?Participant $Participant): self
    {
        $this->Participant = $Participant;

        return $this;
    }

    public function getAnswer(): ?Answer
    {
        return $this->Answer;
    }

    public function setAnswer(?Answer $Answer): self
    {
        $this->Answer = $Answer;

        return $this;
    }

    public function getIndexPosition(): ?int
    {
        return $this->IndexPosition;
    }

    public function setIndexPosition(int $IndexPosition): self
    {
        $this->IndexPosition = $IndexPosition;

        return $this;
    }

    public function getTextEntry(): ?string
    {
        return $this->TextEntry;
    }

    public function setTextEntry(?string $TextEntry): self
    {
        $this->TextEntry = $TextEntry;

        return $this;
    }
}
