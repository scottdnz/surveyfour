<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AddressRepository")
 */
class Address
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
    private $Street;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $Suburb;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $City;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $Region;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $Country;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $Postcode;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="Address")
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStreet(): ?string
    {
        return $this->Street;
    }

    public function setStreet(?string $Street): self
    {
        $this->Street = $Street;

        return $this;
    }

    public function getSuburb(): ?string
    {
        return $this->Suburb;
    }

    public function setSuburb(?string $Suburb): self
    {
        $this->Suburb = $Suburb;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity(?string $City): self
    {
        $this->City = $City;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->Region;
    }

    public function setRegion(?string $Regaion): self
    {
        $this->Region = $Region;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->Country;
    }

    public function setCountry(?string $Country): self
    {
        $this->Country = $Country;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->Postcode;
    }

    public function setPostcode(?string $Postcode): self
    {
        $this->Postcode = $Postcode;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setAddress($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getAddress() === $this) {
                $user->setAddress(null);
            }
        }

        return $this;
    }
}
