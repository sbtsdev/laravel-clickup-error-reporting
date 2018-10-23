<?php

namespace sbtsdev\LaravelClickupErrorReports\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelClickupErrorReports extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravelclickuperrorreports';
    }
}
