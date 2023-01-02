<?php

namespace EzitisItIs\JetstreamNoPersonalTeam;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class JetstreamNoPersonalTeamServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        $this->configurePublishing();
        $this->configureCommands();
    }

    protected function configurePublishing()
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__.'/../database/migrations/2023_01_01_000000_remove_personal_team_column_from_teams_table.php' => database_path('migrations/2023_01_01_000000_remove_personal_team_column_from_teams_table.php'),
        ], 'jetstream-no-personal-team-migrations');
    }

    protected function configureCommands()
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            Console\InstallCommand::class,
        ]);
    }
}