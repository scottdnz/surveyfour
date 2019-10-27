<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $FirstName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $MiddleNames;

    /**
     * @ORM\Column(type="string", length=160)
     */
    private $LastName;

     /**
     * @ORM\Column(type="string", length=160, nullable=true)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $PhoneMobile;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $PhoneLandline;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $Title;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Address", inversedBy="users")
     */
    private $Address;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SurveyCreator", mappedBy="User")
     */
    private $surveyCreators;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Participant", mappedBy="User")
     */
    private $participants;

    public function __construct()
    {
        $this->surveyCreators = new ArrayCollection();
        $this->participants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    public function setFirstName(string $FirstName): self
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    public function getMiddleNames(): ?string
    {
        return $this->MiddleNames;
    }

    public function setMiddleNames(?string $MiddleNames): self
    {
        $this->MiddleNames = $MiddleNames;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName): self
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getPhoneMobile(): ?string
    {
        return $this->PhoneMobile;
    }

    public function setPhoneMobile(?string $PhoneMobile): self
    {
        $this->PhoneMobile = $PhoneMobile;

        return $this;
    }

    public function getPhoneLandline(): ?string
    {
        return $this->PhoneLandline;
    }

    public function setPhoneLandline(?string $PhoneLandline): self
    {
        $this->PhoneLandline = $PhoneLandline;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(?string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->Address;
    }

    public function setAddress(?Address $Address): self
    {
        $this->Address = $Address;

        return $this;
    }

    /**
     * @return Collection|SurveyCreator[]
     */
    public function getSurveyCreators(): Collection
    {
        return $this->surveyCreators;
    }

    public function addSurveyCreator(SurveyCreator $surveyCreator): self
    {
        if (!$this->surveyCreators->contains($surveyCreator)) {
            $this->surveyCreators[] = $surveyCreator;
            $surveyCreator->setUser($this);
        }

        return $this;
    }

    public function removeSurveyCreator(SurveyCreator $surveyCreator): self
    {
        if ($this->surveyCreators->contains($surveyCreator)) {
            $this->surveyCreators->removeElement($surveyCreator);
            // set the owning side to null (unless already changed)
            if ($surveyCreator->getUser() === $this) {
                $surveyCreator->setUser(null);
            }
        }

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
            $participant->setUser($this);
        }

        return $this;
    }

    public function removeParticipant(Participant $participant): self
    {
        if ($this->participants->contains($participant)) {
            $this->participants->removeElement($participant);
            // set the owning side to null (unless already changed)
            if ($participant->getUser() === $this) {
                $participant->setUser(null);
            }
        }

        return $this;
    }
}
