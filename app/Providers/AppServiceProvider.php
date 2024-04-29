<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\Facades\Validator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Vite::macro('image', fn (string $asset) => Vite::asset("resources/images/{$asset}"));
        Blade::if('Permission', fn (string $env) => optional(auth()->user())->hasPermission($env));
        Blade::if('Role', fn (string $env) => optional(auth()->user())->hasRole($env));
        Blade::if('Admin', fn () => optional(auth()->user())->hasRole('admin'));
        Blade::if('Student', fn () => optional(auth()->user())->isStudent());
        Blade::if('Teacher', fn () => optional(auth()->user())->isAcademic());
        Validator::extend('min_words', function ($attribute, $value, $parameters, $validator) {
            // $return = str_word_count(trim($value), 0, ' ') >= $parameters[0];
            // dd(str_word_count(trim($value),0,' '),$parameters[0],$return);
            $validator->addReplacer('min_words', function ($message, $attribute, $rule, $parameters) {
                return str_replace(':min', $parameters[0], $message);
            });
            return str_word_count(trim($value), 0, ' ') >= $parameters[0];

        });



    }
}
