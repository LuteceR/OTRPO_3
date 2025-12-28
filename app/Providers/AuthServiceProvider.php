<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\CharacterCard;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
                // $this->registerPolicies();

        // Gate для удаления карточки
        Gate::define('delete-card', function ($user, CharacterCard $card) {
            // Можно удалять только если админ или владелец карточки
            return $user->is_admin || $user->id === $card->user_id;
        });

        //
    }
}
