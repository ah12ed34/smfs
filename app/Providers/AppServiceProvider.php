<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Repositories\StudentsRepository;
use App\Contracts\StudentsInterface;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(StudentsInterface::class, StudentsRepository::class);
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
            // // $return = str_word_count(trim($value), 0, ' ') >= $parameters[0];
            // // dd(str_word_count(trim($value),0,' '),$parameters[0],$return);
            // $validator->addReplacer('min_words', function ($message, $attribute, $rule, $parameters) {
            //     return str_replace(':min', $parameters[0], $message);
            // });
            // return str_word_count(trim($value), 0, ' ') >= $parameters[0];

            $words = preg_split('/\s+/', trim($value));

            $validator->addReplacer('min_words', function ($message, $attribute, $rule, $parameters) {
                return str_replace(':min', $parameters[0], $message);
            });

            return count($words) >= $parameters[0];
        });
        Collection::macro('paginate', function($perPage, $pageName = 'page', $total = null, $page = null) {
            if (!($this instanceof Collection)) {
                return new LengthAwarePaginator([], 0, $perPage, $page, ['pageName' => $pageName]);
            }

            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

            return new LengthAwarePaginator(
                $this->forPage($page, $perPage)->values(),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });



    }
}
