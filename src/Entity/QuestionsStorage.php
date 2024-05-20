<?php

namespace App\Entity;

use App\Repository\QuestionsStorageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionsStorageRepository::class)]
class QuestionsStorage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $question = null;

    /**
     * @var Collection<int, AnswersStorage>
     */
    #[ORM\OneToMany(targetEntity: AnswersStorage::class, mappedBy: 'fk_AnswersStorage_to_QuestionsStorage_id')]
    private Collection $manager_objet_answersStorage;

    public function __construct()
    {
        $this->manager_objet_answersStorage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): static
    {
        $this->question = $question;

        return $this;
    }

    /**
     * @return Collection<int, AnswersStorage>
     */
    public function getManagerObjetAnswersStorage(): Collection
    {
        return $this->manager_objet_answersStorage;
    }

    public function addManagerObjetAnswersStorage(AnswersStorage $managerObjetAnswersStorage): static
    {
        if (!$this->manager_objet_answersStorage->contains($managerObjetAnswersStorage)) {
            $this->manager_objet_answersStorage->add($managerObjetAnswersStorage);
            $managerObjetAnswersStorage->setFkAnswersStorageToQuestionsStorageId($this);
        }

        return $this;
    }

    public function removeManagerObjetAnswersStorage(AnswersStorage $managerObjetAnswersStorage): static
    {
        if ($this->manager_objet_answersStorage->removeElement($managerObjetAnswersStorage)) {
            // set the owning side to null (unless already changed)
            if ($managerObjetAnswersStorage->getFkAnswersStorageToQuestionsStorageId() === $this) {
                $managerObjetAnswersStorage->setFkAnswersStorageToQuestionsStorageId(null);
            }
        }

        return $this;
    }
}
