<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RdvRepository")
 */
class Rdv
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Lieu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Etape;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contact")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Contact_nom;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Candidature", inversedBy="Rdv")
     */
    private $candidature;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->Lieu;
    }

    public function setLieu(string $Lieu): self
    {
        $this->Lieu = $Lieu;

        return $this;
    }

    public function getEtape(): ?string
    {
        return $this->Etape;
    }

    public function setEtape(?string $Etape): self
    {
        $this->Etape = $Etape;

        return $this;
    }

    public function getContactNom(): ?Contact
    {
        return $this->Contact_nom;
    }

    public function setContactNom(?Contact $Contact_nom): self
    {
        $this->Contact_nom = $Contact_nom;

        return $this;
    }

    public function getCandidature(): ?Candidature
    {
        return $this->candidature;
    }

    public function setCandidature(?Candidature $candidature): self
    {
        $this->candidature = $candidature;

        return $this;
    }
}
