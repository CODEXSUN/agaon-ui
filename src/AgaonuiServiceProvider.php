<?php

namespace Codexsun\Agaonui;

use Illuminate\Support\Facades\Blade;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\Support\ServiceProvider;

class AgaonuiServiceProvider extends ServiceProvider
{

    public function register()
    {

    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'agaonui');

        $this->configureComponents();

    }

    protected function configureComponents()
    {
        $this->callAfterResolving(BladeCompiler::class, function () {
            $this->registerComponent('alert');
        });
    }

    protected function registerComponent($component)
    {
        Blade::component('agaonui::components.'.$component, 'aga-'.$component);
    }
}
