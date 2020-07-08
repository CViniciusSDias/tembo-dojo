<?php

namespace TemboSocial\Dojo\App;

class CreateQuestionCommand
{
    public string $prompt;
    public bool $required;
    /** @var string[] */
    public array $answerPrompts;
}
