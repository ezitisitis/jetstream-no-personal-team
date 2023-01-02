<?php

namespace EzitisItIs\JetstreamNoPersonalTeam\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jetstream-no-personal-team:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install removal of personal teams from Jetstream';

    /**
     * Execute the console command.
     *
     * @return null
     */
    public function handle()
    {
        // Publish...
        $this->callSilent('vendor:publish', ['--tag' => 'jetstream-no-personal-team-migrations', '--force' => true]);
    }
}