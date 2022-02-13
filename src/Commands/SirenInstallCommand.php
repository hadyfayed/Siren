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
        $this->callSilently('livewire:publish');
        $this->comment('Livewire scaffolding installed successfully');

        $this->callSilently('jetstream:install', ['stack' => 'livewire']);
        $this->callSilently('vendor:publish', ['--tag' => 'jetstream-views']);
        $this->comment('Jetstream scaffolding installed successfully');

        $this->callSilently('turbo:install', ['--jet' => true]);
        $this->comment('Turbo Laravel scaffolding installed successfully.');

        $this->callSilently('vendor:publish', ['--tag' => 'filament-config']);
        $this->callSilently('vendor:publish', ['--tag' => 'filament-translations']);

        $this->callSilently('forms:install');
        $this->callSilently('vendor:publish', ['--tag' => 'forms-config']);
        $this->callSilently('vendor:publish', ['--tag' => 'forms-translations']);

        $this->callSilently('tables:install');
        $this->callSilently('vendor:publish', ['--tag' => 'tables-config']);
        $this->callSilently('vendor:publish', ['--tag' => 'tables-translations']);

        $this->callSilently('vendor:publish', ['--tag' => 'filament-spatie-laravel-translatable-plugin-config']);
        $this->callSilently('vendor:publish', ['--tag' => 'filament-spatie-laravel-translatable-plugin-translations']);

        $this->callSilently('filament:upgrade');
        $this->comment('Filament scaffolding installed successfully.');

        $this->comment('Please execute the "npm install && npm run dev" command to build your assets.');
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
