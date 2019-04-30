<?php

namespace Webcp\LaravelSiteSettings\Console\Commands;

use Illuminate\Console\Command;
use Webcp\LaravelSiteSettings\Setting;

class CreateOption extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'option:add
                            {name : The name of option}
                            {value : The value of option}
                            {--M|manualload}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new option for application';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Setting::firstOrCreate([
            'name' => $this->argument('name')
        ], [
            'value' => $this->argument('value'),
            'autoload' => $this->option('manualload') ? "0" : "1"
        ]);

        $this->info(sprintf("Option `%s` created", $this->argument('name')));
    }
}
