<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\helpers\AuditTrail;

class HelpersServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('AuditTrail', function () {
            return new AuditTrail;
        });
    }
}