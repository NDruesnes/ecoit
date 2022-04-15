<?php

namespace App\Entity;

use App\Repository\InstructorStatutRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InstructorStatutRepository::class)
 */
class InstructorStatut
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $statut;

    /**
     * @ORM\OneToMany(targetEntity=Instructor::class, mappedBy="instructorStatut")
     */
    private $instructor;

    public function __construct()
    {
        $this->instructor = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * @return Collection<int, Instructor>
     */
    public function getInstructor(): Collection
    {
        return $this->instructor;
    }

    public function addInstructor(Instructor $instructor): self
    {
        if (!$this->instructor->contains($instructor)) {
            $this->instructor[] = $instructor;
            $instructor->setInstructorStatut($this);
        }

        return $this;
    }

    public function removeInstructor(Instructor $instructor): self
    {
        if ($this->instructor->removeElement($instructor)) {
            // set the owning side to null (unless already changed)
            if ($instructor->getInstructorStatut() === $this) {
                $instructor->setInstructorStatut(null);
            }
        }

        return $this;
    }
}
