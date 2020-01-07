<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StatutCandidatureRepository")
 */
class StatutCandidature
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
    private $Envoyée;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Entretien_a_venir;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Attente_reponse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Refusee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Acceptee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnvoyée(): ?string
    {
        return $this->Envoyée;
    }

    public function setEnvoyée(string $Envoyée): self
    {
        $this->Envoyée = $Envoyée;

        return $this;
    }

    public function getEntretienAVenir(): ?string
    {
        return $this->Entretien_a_venir;
    }

    public function setEntretienAVenir(string $Entretien_a_venir): self
    {
        $this->Entretien_a_venir = $Entretien_a_venir;

        return $this;
    }

    public function getAttenteReponse(): ?string
    {
        return $this->Attente_reponse;
    }

    public function setAttenteReponse(string $Attente_reponse): self
    {
        $this->Attente_reponse = $Attente_reponse;

        return $this;
    }

    public function getRefusee(): ?string
    {
        return $this->Refusee;
    }

    public function setRefusee(string $Refusee): self
    {
        $this->Refusee = $Refusee;

        return $this;
    }

    public function getAcceptee(): ?string
    {
        return $this->Acceptee;
    }

    public function setAcceptee(string $Acceptee): self
    {
        $this->Acceptee = $Acceptee;

        return $this;
    }
}
