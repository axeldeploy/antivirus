<?php

namespace Axel\Antivirus\Providers;

use Axel\Antivirus\Services\ClamAvService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AntivirusServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            Validator::extend('antivirus', function ($attribute, $value) {
                $clamAvService = new ClamAvService();
                return $clamAvService->infected($value);
            }, 'The :attribute contains virus');
        }
    }


}