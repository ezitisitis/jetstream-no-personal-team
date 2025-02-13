# Laravel Jetstream no personal team

# Install

Install using composer:
```bash
composer require ezitisitis/jetstream-no-personal-team
```

After that run install command:
```bash
php artisan jetstream-no-personal-team:install
```

Execute newly created migration:
```bash
php artisan migrate
```

Replace `HasTeams` in `User` Model with:
```php
use HasNoPersonalTeam, HasTeams {
    HasNoPersonalTeam::ownsTeam insteadof HasTeams;
    HasNoPersonalTeam::isCurrentTeam insteadof HasTeams;
}
```

Remove `$this->createTeam($user);` from `App\Actions\Fortify\CreateNewUser`

In blades replace `Laravel\Jetstream\Jetstream::hasTeamFeatures()` with 
`Laravel\Jetstream\Jetstream::hasTeamFeatures() && Auth::user()->isMemberOfATeam()`

## Credits

- [Marks Bogdanovs](https://www.ezitisitis.com)
