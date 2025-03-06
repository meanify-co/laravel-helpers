<?php

namespace Meanify\LaravelHelpers\Utils;

use Symfony\Component\Console\Output\ConsoleOutput;

class ConsoleUtil
{
    public $CONSOLE_COLOR_RED = 31;
    public $CONSOLE_COLOR_GREEN = 32;
    public $CONSOLE_COLOR_YELLOW = 33;
    public $CONSOLE_COLOR_BLUE = 34;
    public $CONSOLE_COLOR_MAGENTA = 35;
    public $CONSOLE_COLOR_CIANO = 36;
    public $CONSOLE_COLOR_WHITE = 37;


    /**
     * @param  bool  $die_after_output
     * @return void
     */
    public function consoleOutput($type, $message, $die_after_output = false)
    {
        $types = [
            'warning' => 'comment',
            'success' => 'info',
            'danger'  => 'error',
            'error'   => 'error',
        ];

        if (! is_string($message))
        {
            $message = json_encode($message, 128);
        }

        $console = new ConsoleOutput;

        $console->writeln('<'.$types[$type].'>'.$message.'</'.$types[$type].'>');

        if ($die_after_output)
        {
            exit;
        }
    }

    /**
     * @param string $question_text
     * @param string $confirmed_text
     * @param string $cancelled_text
     * @param string $answer_to_confirm
     * @param string|int $confirmed_fg_color
     * @param string|int $cancelled_fg_color
     * @return void
     */
    public function waitConfirmation(
        string $question_text,
        string $confirmed_text,
        string $cancelled_text,
        string $answer_to_confirm,
        string|int $confirmed_fg_color = 32,
        string|int $cancelled_fg_color = 31
    )
    {
        $handle = fopen("php://stdin", "r");

        echo "\n\n$question_text ";
        $confirmation = trim(fgets($handle));

        if (strtolower($confirmation) !== $answer_to_confirm)
        {
            echo "\n\033[0;{$cancelled_fg_color}m$cancelled_text\033[0m\n\n";
            exit;
        }

        fclose($handle);

        echo "\n\033[0;{$confirmed_fg_color}m$confirmed_text\033[0m\n\n";
    }
}
