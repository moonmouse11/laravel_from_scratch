<?php

declare(strict_types=1);

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command(
    signature: 'inspire',
    callback: function () {
        $this->comment(Inspiring::quote());
    }
)->purpose(description: 'Display an inspiring quote');
