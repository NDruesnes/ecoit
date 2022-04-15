<?php

namespace App\Entity;

use App\Repository\SpecialityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpecialityRepository::class)
 */
class Speciality
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $speciality;

    /**
     * @ORM\ManyToMany(targetEntity=Instructor::class, mappedBy="speciality")
     */
    private $instructors;

    public function __construct()
    {
        $this->instructors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpeciality(): ?string
    {
        return $this->speciality;
    }

    public function setSpeciality(string $speciality): self
    {
        $this->speciality = $speciality;

        return $this;
    }

    /**
     * @return Collection<int, Instructor>
     */
    public function getInstructors(): Collection
    {
        return $this->instructors;
    }

    public function addInstructor(Instructor $instructor): self
    {
        if (!$this->instructors->contains($instructor)) {
            $this->instructors[] = $instructor;
            $instructor->addSpeciality($this);
        }

        return $this;
    }

    public function removeInstructor(Instructor $instructor): self
    {
        if ($this->instructors->removeElement($instructor)) {
            $instructor->removeSpeciality($this);
        }

        return $this;
    }
}
