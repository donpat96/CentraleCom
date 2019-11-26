<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClasseRepository")
 */
class Classe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="classe")
     */
    private $idUser;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Cour", mappedBy="classe")
     */
    private $idCour;

    public function __construct()
    {
        $this->idUser = new ArrayCollection();
        $this->idCour = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getIdUser(): Collection
    {
        return $this->idUser;
    }

    public function addIdUser(User $idUser): self
    {
        if (!$this->idUser->contains($idUser)) {
            $this->idUser[] = $idUser;
            $idUser->setClasse($this);
        }

        return $this;
    }

    public function removeIdUser(User $idUser): self
    {
        if ($this->idUser->contains($idUser)) {
            $this->idUser->removeElement($idUser);
            // set the owning side to null (unless already changed)
            if ($idUser->getClasse() === $this) {
                $idUser->setClasse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Cour[]
     */
    public function getIdCour(): Collection
    {
        return $this->idCour;
    }

    public function addIdCour(Cour $idCour): self
    {
        if (!$this->idCour->contains($idCour)) {
            $this->idCour[] = $idCour;
            $idCour->setClasse($this);
        }

        return $this;
    }

    public function removeIdCour(Cour $idCour): self
    {
        if ($this->idCour->contains($idCour)) {
            $this->idCour->removeElement($idCour);
            // set the owning side to null (unless already changed)
            if ($idCour->getClasse() === $this) {
                $idCour->setClasse(null);
            }
        }

        return $this;
    }
}
