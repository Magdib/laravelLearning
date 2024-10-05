<?php

use App\Models\Company;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('contact:company-clean', function () {
    $this->info('Cleaning!');
    Company::whereDoesntHave('customers')->get()->each(function ($company){
$company->delete();
$this->warn('Deleted: ' . $company->name);
    });
})->purpose('Clean Companies without customers')->hourly();