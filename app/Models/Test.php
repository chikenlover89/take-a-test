<?php

namespace App\Models;

use stdClass;

class Test
{
    private string $id;
    private string $name;
    private array $content;

    private string $subject;

    private int $questionCount;
    private int $currentQuestion = 0;
    private int $correctAnswers = 0;

    private string $statusId;
    private string $status = 'unfinished';
    private array $results = [];

    public function __construct(
        string $id,
        string $name,
        array $content,
        int $questionCount
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->content = $content;
        $this->questionCount = $questionCount;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function setContent(array $content): void
    {
        $this->content = $content;
    }

    public function getContent(): stdClass
    {
        return $this->content[$this->getCurrentQuestion()];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCurrentQuestion(): int
    {
        return $this->currentQuestion;
    }


    public function addCurrentQuestion(): void
    {
        $this->currentQuestion++;
    }

    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getQuestionCount(): int
    {
        return $this->questionCount;
    }

    public function setQuestionCount(int $questionCount): void
    {
        $this->questionCount = $questionCount;
    }

    public function getCorrectAnswerCount(): int
    {
        return $this->correctAnswers;
    }

    public function addToCorrectAnswerCount(): void
    {
        $this->correctAnswers++;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setResults(array $results): void
    {
        $this->results = $results;
    }

    public function getResults(): array
    {
        return $this->results;
    }

    public function getStatusId(): string
    {
        return $this->statusId;
    }

    public function setStatusId(string $statusId): void
    {
        $this->statusId = $statusId;
    }

}