<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnswerRepository")
 */
class Answer
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
    private $IndexPositiion;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Question", inversedBy="answers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Question;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\AdviceBlock", cascade={"persist", "remove"})
     */
    private $AdviceBlock;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIndexPositiion(): ?int
    {
        return $this->IndexPositiion;
    }

    public function setIndexPositiion(int $IndexPositiion): self
    {
        $this->IndexPositiion = $IndexPositiion;

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

    public function getQuestion(): ?Question
    {
        return $this->Question;
    }

    public function setQuestion(?Question $Question): self
    {
        $this->Question = $Question;

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
}
