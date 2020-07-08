<?php

require_once 'vendor/autoload.php';

use TemboSocial\Dojo\Answer;
use TemboSocial\Dojo\Question;

$pdo = new PDO('sqlite::memory:');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$pdo->exec('
CREATE TABLE question (id INTEGER PRIMARY KEY, prompt TEXT, required INTEGER);
CREATE TABLE answer (id INTEGER PRIMARY KEY, prompt TEXT, question_id INTEGER REFERENCES question(id));
');

$answers = [];

$answers[0] = new Answer($pdo);
$answers[0]->prompt = 'Answer One';

$answers[1] = new Answer($pdo);
$answers[1]->prompt = 'Answer Two';

$answers[2] = new Answer($pdo);
$answers[2]->prompt = 'Answer Three';

$answers[3] = new Answer($pdo);
$answers[3]->prompt = 'Answer Four';

$answers[4] = new Answer($pdo);
$answers[4]->prompt = 'Answer Five';

$answers[5] = new Answer($pdo);
$answers[5]->prompt = 'Answer Six';

$question = new Question($pdo);
$question->prompt = 'Single Question';
$question->required = false;
$question->answers = $answers;

try {
    $question->save();
} finally {
    var_dump($pdo->query('SELECT * FROM question;')->fetchAll());
    var_dump($pdo->query('SELECT * FROM answer;')->fetchAll());
}
