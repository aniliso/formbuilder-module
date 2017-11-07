<?php

namespace Modules\Formbuilder\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Formbuilder\Events\FormbuilderEvent;
use Modules\Formbuilder\Listener\FormbuilderHandler;

class FormbuilderEventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
            FormbuilderEvent::class  => [
                    FormbuilderHandler::class,
            ],
    ];
}
