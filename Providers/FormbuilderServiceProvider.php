<?php

namespace Modules\Formbuilder\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Traits\CanGetSidebarClassForModule;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Formbuilder\Events\Handlers\RegisterFormbuilderSidebar;
use Pingpong\Shortcode\ShortcodeFacade as Shortcode;

class FormbuilderServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration, CanGetSidebarClassForModule;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->registerBindings();
        $this->registerShortcode();

        $this->app['events']->listen(
            BuildingSidebar::class,
            $this->getSidebarClassForModule('employee', RegisterFormbuilderSidebar::class)
        );

        $this->app->extend('asgard.ModulesList', function($app) {
            array_push($app, 'formbuilder');
            return $app;
        });
    }

    public function boot()
    {
        $this->publishConfig('formbuilder', 'permissions');
        $this->publishConfig('formbuilder', 'config');
    }

    private function registerBindings()
    {

    }

    /**
     * Registering the Shortcodes
     */
    private function registerShortcode()
    {
        Shortcode::register('form', 'Modules\Formbuilder\Shortcodes\FormbuilderShortcode::form');
        Shortcode::register('textinput', 'Modules\Formbuilder\Shortcodes\FormbuilderShortcode::textinput');
        Shortcode::register('identityinput', 'Modules\Formbuilder\Shortcodes\FormbuilderShortcode::identityinput');
        Shortcode::register('passwordinput', 'Modules\Formbuilder\Shortcodes\FormbuilderShortcode::passwordinput');
        Shortcode::register('searchinput', 'Modules\Formbuilder\Shortcodes\FormbuilderShortcode::searchinput');
        Shortcode::register('prependedtext', 'Modules\Formbuilder\Shortcodes\FormbuilderShortcode::prependedtext');
        Shortcode::register('appendedtext', 'Modules\Formbuilder\Shortcodes\FormbuilderShortcode::appendedtext');
        Shortcode::register('prependedcheckbox', 'Modules\Formbuilder\Shortcodes\FormbuilderShortcode::prependedcheckbox');
        Shortcode::register('appendedcheckbox', 'Modules\Formbuilder\Shortcodes\FormbuilderShortcode::appendedcheckbox');
        Shortcode::register('buttondropdown', 'Modules\Formbuilder\Shortcodes\FormbuilderShortcode::buttondropdown');
        Shortcode::register('textarea', 'Modules\Formbuilder\Shortcodes\FormbuilderShortcode::textarea');
        Shortcode::register('multiplecheckboxes', 'Modules\Formbuilder\Shortcodes\FormbuilderShortcode::multiplecheckboxes');
        Shortcode::register('multiplecheckboxesinline', 'Modules\Formbuilder\Shortcodes\FormbuilderShortcode::multiplecheckboxesinline');
        Shortcode::register('multipleradios', 'Modules\Formbuilder\Shortcodes\FormbuilderShortcode::multipleradios');
        Shortcode::register('multipleradiosinline', 'Modules\Formbuilder\Shortcodes\FormbuilderShortcode::multipleradiosinline');
        Shortcode::register('selectbasic', 'Modules\Formbuilder\Shortcodes\FormbuilderShortcode::selectbasic');
        Shortcode::register('selectmultiple', 'Modules\Formbuilder\Shortcodes\FormbuilderShortcode::selectmultiple');
        Shortcode::register('filebutton', 'Modules\Formbuilder\Shortcodes\FormbuilderShortcode::filebutton');
        Shortcode::register('button', 'Modules\Formbuilder\Shortcodes\FormbuilderShortcode::button');
        Shortcode::register('buttondouble', 'Modules\Formbuilder\Shortcodes\FormbuilderShortcode::buttondouble');
        Shortcode::register('emailinput', 'Modules\Formbuilder\Shortcodes\FormbuilderShortcode::emailinput');
        Shortcode::register('urlinput', 'Modules\Formbuilder\Shortcodes\FormbuilderShortcode::urlinput');
        Shortcode::register('telinput', 'Modules\Formbuilder\Shortcodes\FormbuilderShortcode::telinput');
        Shortcode::register('dateinput', 'Modules\Formbuilder\Shortcodes\FormbuilderShortcode::dateinput');
        Shortcode::register('numberinput', 'Modules\Formbuilder\Shortcodes\FormbuilderShortcode::numberinput');
        Shortcode::register('captchainput', 'Modules\Formbuilder\Shortcodes\FormbuilderShortcode::captchainput');
    }
}
