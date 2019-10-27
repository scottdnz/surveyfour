<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SurveyCreatorRepository")
 */
class SurveyCreator
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ShowUser;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ShowOrganisation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="surveyCreators")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Organisation")
     */
    private $Organisation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Survey", mappedBy="SurveyCreator")
     */
    private $surveys;

    public function __construct()
    {
        $this->surveys = new ArrayCollection();
    }

    public function getShowUser(): ?bool
    {
        return $this->ShowUser;
    }

    public function setShowUser(bool $ShowUser): self
    {
        $this->ShowUser = $ShowUser;

        return $this;
    }

    public function getShowOrganisation(): ?bool
    {
        return $this->ShowOrganisation;
    }

    public function setShowOrganisation(bool $ShowOrganisation): self
    {
        $this->ShowOrganisation = $ShowOrganisation;

        return $this;
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

    public function getOrganisation(): ?Organisation
    {
        return $this->Organisation;
    }

    public function setOrganisation(?Organisation $Organisation): self
    {
        $this->Organisation = $Organisation;

        return $this;
    }

    /**
     * @return Collection|Survey[]
     */
    public function getSurveys(): Collection
    {
        return $this->surveys;
    }

    public function addSurvey(Survey $survey): self
    {
        if (!$this->surveys->contains($survey)) {
            $this->surveys[] = $survey;
            $survey->setSurveyCreator($this);
        }

        return $this;
    }

    public function removeSurvey(Survey $survey): self
    {
        if ($this->surveys->contains($survey)) {
            $this->surveys->removeElement($survey);
            // set the owning side to null (unless already changed)
            if ($survey->getSurveyCreator() === $this) {
                $survey->setSurveyCreator(null);
            }
        }

        return $this;
    }

}
