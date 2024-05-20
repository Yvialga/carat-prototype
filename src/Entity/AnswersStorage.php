<?php

namespace App\Entity;

use App\Repository\AnswersStorageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnswersStorageRepository::class)]
class AnswersStorage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $answer = null;

    #[ORM\ManyToOne(inversedBy: 'manager_objet_answersStorage')]
    #[ORM\JoinColumn(nullable: false)]
    private ?QuestionsStorage $fk_AnswersStorage_to_QuestionsStorage_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnswer(): ?string
    {
        return $this->answer;
    }

    public function setAnswer(string $answer): static
    {
        $this->answer = $answer;

        return $this;
    }

    public function getFkAnswersStorageToQuestionsStorageId(): ?QuestionsStorage
    {
        return $this->fk_AnswersStorage_to_QuestionsStorage_id;
    }

    public function setFkAnswersStorageToQuestionsStorageId(?QuestionsStorage $fk_AnswersStorage_to_QuestionsStorage_id): static
    {
        $this->fk_AnswersStorage_to_QuestionsStorage_id = $fk_AnswersStorage_to_QuestionsStorage_id;

        return $this;
    }
}
