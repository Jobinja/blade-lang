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

        $compilerInstance->directive('iflang', function ($expression) {
            return "<?php if({$expression} === \App::getLocale()): ?>";
        });

        $compilerInstance->directive('elselang', function ($expression) {
            return "<?php elseif({$expression} === \App::getLocale()): ?>";
        });

        $compilerInstance->directive('fallbacklang', function () {
            return "<?php else: ?>";
        });

        $compilerInstance->directive('closelang', function () {
            return '<?php endif; ?>';
        });

        $compilerInstance->directive('formatnumber', function($expression) {
            return "<?php echo e(multilang_format_number{$expression}); ?>";
        });

        $compilerInstance->directive('convertnumber', function ($expression) {
            return "<?php echo e(multilang_convert_number{$expression}); ?>";
        });
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Do nothing...
    }
}