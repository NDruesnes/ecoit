<?php

namespace App\Entity;

use App\Repository\LessonStatutRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LessonStatutRepository::class)
 */
class LessonStatut
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_finish;

    /**
     * @ORM\OneToMany(targetEntity=Student::class, mappedBy="lessonStatut")
     */
    private $student;

    /**
     * @ORM\OneToMany(targetEntity=Lesson::class, mappedBy="lessonStatut")
     */
    private $lesson;

    public function __construct()
    {
        $this->student = new ArrayCollection();
        $this->lesson = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsFinish(): ?bool
    {
        return $this->is_finish;
    }

    public function setIsFinish(bool $is_finish): self
    {
        $this->is_finish = $is_finish;

        return $this;
    }

    /**
     * @return Collection<int, Student>
     */
    public function getStudent(): Collection
    {
        return $this->student;
    }

    public function addStudent(Student $student): self
    {
        if (!$this->student->contains($student)) {
            $this->student[] = $student;
            $student->setLessonStatut($this);
        }

        return $this;
    }

    public function removeStudent(Student $student): self
    {
        if ($this->student->removeElement($student)) {
            // set the owning side to null (unless already changed)
            if ($student->getLessonStatut() === $this) {
                $student->setLessonStatut(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Lesson>
     */
    public function getLesson(): Collection
    {
        return $this->lesson;
    }

    public function addLesson(Lesson $lesson): self
    {
        if (!$this->lesson->contains($lesson)) {
            $this->lesson[] = $lesson;
            $lesson->setLessonStatut($this);
        }

        return $this;
    }

    public function removeLesson(Lesson $lesson): self
    {
        if ($this->lesson->removeElement($lesson)) {
            // set the owning side to null (unless already changed)
            if ($lesson->getLessonStatut() === $this) {
                $lesson->setLessonStatut(null);
            }
        }

        return $this;
    }
}
