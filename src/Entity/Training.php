<?php

namespace App\Entity;

use App\Repository\TrainingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TrainingRepository::class)
 */
class Training
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="date")
     */
    private $create_at;

    /**
     * @ORM\OneToOne(targetEntity=TrainingImg::class, mappedBy="training", cascade={"persist", "remove"})
     */
    private $trainingImg;

    /**
     * @ORM\OneToMany(targetEntity=Section::class, mappedBy="training", orphanRemoval=true)
     */
    private $sections;

    /**
     * @ORM\ManyToMany(targetEntity=Student::class, mappedBy="training")
     */
    private $students;

    /**
     * @ORM\ManyToMany(targetEntity=Instructor::class, inversedBy="trainings")
     */
    private $instructors;

    public function __construct()
    {
        $this->sections = new ArrayCollection();
        $this->students = new ArrayCollection();
        $this->instructors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->create_at;
    }

    public function setCreateAt(\DateTimeInterface $create_at): self
    {
        $this->create_at = $create_at;

        return $this;
    }

    public function getTrainingImg(): ?TrainingImg
    {
        return $this->trainingImg;
    }

    public function setTrainingImg(TrainingImg $trainingImg): self
    {
        // set the owning side of the relation if necessary
        if ($trainingImg->getTraining() !== $this) {
            $trainingImg->setTraining($this);
        }

        $this->trainingImg = $trainingImg;

        return $this;
    }

    /**
     * @return Collection<int, Section>
     */
    public function getSections(): Collection
    {
        return $this->sections;
    }

    public function addSection(Section $section): self
    {
        if (!$this->sections->contains($section)) {
            $this->sections[] = $section;
            $section->setTraining($this);
        }

        return $this;
    }

    public function removeSection(Section $section): self
    {
        if ($this->sections->removeElement($section)) {
            // set the owning side to null (unless already changed)
            if ($section->getTraining() === $this) {
                $section->setTraining(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Student>
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(Student $student): self
    {
        if (!$this->students->contains($student)) {
            $this->students[] = $student;
            $student->addTraining($this);
        }

        return $this;
    }

    public function removeStudent(Student $student): self
    {
        if ($this->students->removeElement($student)) {
            $student->removeTraining($this);
        }

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
        }

        return $this;
    }

    public function removeInstructor(Instructor $instructor): self
    {
        $this->instructors->removeElement($instructor);

        return $this;
    }
}
