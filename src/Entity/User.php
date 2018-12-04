<?php

namespace App\Entity;

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
     * @ORM\Column(type="string", length=255)
     */
    private $FirstName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $LastName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=24, nullable=true)
     */
    private $Phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $AddressStreet;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $AddressSuburb;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $AddressCity;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $AddressRegion;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $AddressPostcode;

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

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(?string $LastName): self
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->Phone;
    }

    public function setPhone(?string $Phone): self
    {
        $this->Phone = $Phone;

        return $this;
    }

    public function getAddressStreet(): ?string
    {
        return $this->AddressStreet;
    }

    public function setAddressStreet(?string $AddressStreet): self
    {
        $this->AddressStreet = $AddressStreet;

        return $this;
    }

    public function getAddressSuburb(): ?string
    {
        return $this->AddressSuburb;
    }

    public function setAddressSuburb(?string $AddressSuburb): self
    {
        $this->AddressSuburb = $AddressSuburb;

        return $this;
    }

    public function getAddressCity(): ?string
    {
        return $this->AddressCity;
    }

    public function setAddressCity(?string $AddressCity): self
    {
        $this->AddressCity = $AddressCity;

        return $this;
    }

    public function getAddressRegion(): ?string
    {
        return $this->AddressRegion;
    }

    public function setAddressRegion(?string $AddressRegion): self
    {
        $this->AddressRegion = $AddressRegion;

        return $this;
    }

    public function getAddressPostcode(): ?string
    {
        return $this->AddressPostcode;
    }

    public function setAddressPostcode(?string $AddressPostcode): self
    {
        $this->AddressPostcode = $AddressPostcode;

        return $this;
    }
}
