<?php

namespace App\Console\Commands;

use App\Models\Company;
use Illuminate\Console\Command;

class AddCompanyCommand extends Command
{

    protected $signature = 'contact:company';

    protected $description = 'Adds new company';

    public function handle()
    {
        $name = $this->ask('What is the company name?');
        $phone = $this->ask('What is the company Phone number?');
        if($this->confirm('Your company name is ' . $name . ' And phone number is ' . $phone . ', is that right?')){
            Company::create(['name'=>$name,'phone'=>$phone]);
        return $this->info('Company added successfully');
        }
        $this->error('Data not confirmed');
    }
}
