<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="boolean")
     */
    private $IssuedActive;

    /**
     * @ORM\Column(type="integer")
     */
    private $MinutesAllowed;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $DateOpen;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $DateClose;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SurveyCreator", inversedBy="surveys")
     * @ORM\JoinColumn(nullable=false)
     */
    private $SurveyCreator;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Participant", mappedBy="Survey")
     */
    private $participants;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Section", mappedBy="Survey")
     */
    private $sections;

    public function __construct()
    {
        $this->participants = new ArrayCollection();
        $this->sections = new ArrayCollection();
    }

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

    public function setIssuedActive(bool $IssuedActive): self
    {
        $this->IssuedActive = $IssuedActive;

        return $this;
    }

    public function getMinutesAllowed(): ?int
    {
        return $this->TimeAllowed;
    }

    public function setMinutesAllowed(int $MinutesAllowed): self
    {
        $this->MinutesAllowed = $MinutesAllowed;

        return $this;
    }

    public function getDateOpen(): ?\DateTimeInterface
    {
        return $this->DateOpen;
    }

    public function setDateOpen(?\DateTimeInterface $DateOpen): self
    {
        $this->DateOpen = $DateOpen;

        return $this;
    }

    public function getDateClose(): ?\DateTimeInterface
    {
        return $this->DateClose;
    }

    public function setDateClose(?\DateTimeInterface $DateClose): self
    {
        $this->DateClose = $DateClose;

        return $this;
    }

    public function getSurveyCreator(): ?SurveyCreator
    {
        return $this->SurveyCreator;
    }

    public function setSurveyCreator(?SurveyCreator $SurveyCreator): self
    {
        $this->SurveyCreator = $SurveyCreator;

        return $this;
    }

    /**
     * @return Collection|Participant[]
     */
    public function getParticipants(): Collection
    {
        return $this->participants;
    }

    public function addParticipant(Participant $participant): self
    {
        if (!$this->participants->contains($participant)) {
            $this->participants[] = $participant;
            $participant->setSurvey($this);
        }

        return $this;
    }

    public function removeParticipant(Participant $participant): self
    {
        if ($this->participants->contains($participant)) {
            $this->participants->removeElement($participant);
            // set the owning side to null (unless already changed)
            if ($participant->getSurvey() === $this) {
                $participant->setSurvey(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Section[]
     */
    public function getSections(): Collection
    {
        return $this->sections;
    }

    public function addSection(Section $section): self
    {
        if (!$this->sections->contains($section)) {
            $this->sections[] = $section;
            $section->setSurvey($this);
        }

        return $this;
    }

    public function removeSection(Section $section): self
    {
        if ($this->sections->contains($section)) {
            $this->sections->removeElement($section);
            // set the owning side to null (unless already changed)
            if ($section->getSurvey() === $this) {
                $section->setSurvey(null);
            }
        }

        return $this;
    }
}
