<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function run()
{
    $isAllCorrect = true;
    $i = 0;
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    while ($i < 3) {
        $question = getQuestion();
        line("Question: " .$question);
        $answer = prompt('Your answer: ');
        $result = checkAnswer($answer, $question, $name);
        line($result);
        $i++;

        if ($result != "Correct!") {
            $isAllCorrect = false;
        }
    }
    if ($isAllCorrect) {
        line("Congratulations, {$name}");
    }
}

function getQuestion()
{
    return rand(1, 100);
}
function checkAnswer($answer, $question, $name)
{
    $result = '';
    if ($question % 2 == 0) {
        $result = 'yes';
    } else {
        $result = 'no';
    }

    if ($answer == $result)
    {
        return 'Correct!';
    } else {
        return "'{$answer}' is wrong answer ;(. Correct answer was '{$result}'. Let's try again, {$name}!";
    }
}