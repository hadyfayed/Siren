<?php

namespace HadyFayed\Siren\Commands;

use Illuminate\Console\Command;

class SirenCommand extends Command
{
    public $signature = 'siren';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
