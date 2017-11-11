<?php

namespace JobinjaTeam\BladeLang;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class JobinjaBladeLangServiceProvider extends ServiceProvider
{
    /**
     * Boot method
     *
     * @return void
     */
    public function boot()
    {
        /** @var BladeCompiler $compilerInstance */
        $compilerInstance = $this->app['blade.compiler'];

        $compilerInstance->directive('lang', function ($expression) {
            return "<?php if({$expression} === \App:getLocale()): ?>";
        });

        $compilerInstance->directive('elseLang', function ($expression) {
            return "<?php elseif({$expression} === \App::getLocale()): ?>";
        });

        $compilerInstance->directive('fallbackLang', function () {
            return "<?php else: ?>";
        });

        $compilerInstance->directive('endLang', function () {
            return '<?php endif; ?>';
        });
    }
}