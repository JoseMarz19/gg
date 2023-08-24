<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Models\Lesson;
use App\Models\Section;
use App\Observers\SectionObserver;
use App\Observers\LessonObserver;

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

        Lesson::observe(LessonObserver::class);
        Section::observe(SectionObserver::class);

        Blade::directive('routeIs', function($expresion){
            return "<?php if(Request::url() == route($expresion)): ?>";
        });
    }
}
