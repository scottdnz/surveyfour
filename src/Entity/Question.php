<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionRepository")
 */
class Question
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $IndexPosition;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $IndexLabel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Text;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $Type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Section", inversedBy="questions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Section;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\AdviceBlock", cascade={"persist", "remove"})
     */
    private $AdviceBlock;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Answer", mappedBy="Question")
     */
    private $answers;

    public function __construct()
    {
        $this->answers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIndexLabel(): ?string
    {
        return $this->IndexLabel;
    }

    public function setIndexLabel(?string $IndexLabel): self
    {
        $this->IndexLabel = $IndexLabel;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->Text;
    }

    public function setText(string $Text): self
    {
        $this->Text = $Text;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getSection(): ?Section
    {
        return $this->Section;
    }

    public function setSection(?Section $Section): self
    {
        $this->Section = $Section;

        return $this;
    }

    public function getAdviceBlock(): ?AdviceBlock
    {
        return $this->AdviceBlock;
    }

    public function setAdviceBlock(?AdviceBlock $AdviceBlock): self
    {
        $this->AdviceBlock = $AdviceBlock;

        return $this;
    }

    /**
     * @return Collection|Answer[]
     */
    public function getAnswers(): Collection
    {
        return $this->answers;
    }

    public function addAnswer(Answer $answer): self
    {
        if (!$this->answers->contains($answer)) {
            $this->answers[] = $answer;
            $answer->setQuestion($this);
        }

        return $this;
    }

    public function removeAnswer(Answer $answer): self
    {
        if ($this->answers->contains($answer)) {
            $this->answers->removeElement($answer);
            // set the owning side to null (unless already changed)
            if ($answer->getQuestion() === $this) {
                $answer->setQuestion(null);
            }
        }

        return $this;
    }
}
