<?php

namespace HadyFayed\Siren\Commands;

use Illuminate\Console\Command;

class SirenInstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siren:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Quick Laravel Generation And Installation';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info("\nSiren Installer");
        $this->info("--------------------\n");

        $this->maybeGenerateAppKey();
        $this->call('livewire:publish');
        $this->call('jetstream:install', ['stack' => 'livewire']);
        $this->call('turbo:install', ['--option' => 'jet']);
    }

    private function maybeGenerateAppKey(): void
    {
        if (! config('app.key')) {
            $this->info('Generating app key');
            $this->call('key:generate');
        } else {
            $this->comment('App key exists -- skipping');
        }
    }
}
