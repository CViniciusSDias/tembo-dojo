<?php

namespace TemboSocial\Dojo\Domain;

class Question
{
    private string $prompt;
    private array $answers;
    private bool $required;

    public function __construct(string $prompt, bool $required = false)
    {
        $this->prompt = $prompt;
        $this->required = $required;
        $this->answers = [];
    }

    public function addAnswer(string $answerPrompt)
    {
        if (count($this->answers()) >= 5) {
            throw new \DomainException('Maximum of 5 answers exceeded');
        }

        $this->answers[] = new Answer($answerPrompt, $this);
        return $this;
    }

    public function answers(): array
    {
        return $this->answers;
    }

    public function prompt(): string
    {
        return $this->prompt;
    }

    public function isRequired(): bool
    {
        return $this->required;
    }
}