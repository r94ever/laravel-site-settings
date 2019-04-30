<?php

namespace Webcp\LaravelSiteSettings\Commands;

use Illuminate\Console\Command;
use Webcp\LaravelSiteSettings\LaravelSiteSettings;

class CreateOption extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'option:create-option {name: The name of option} {value: The value of option}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create site option';

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
        $option = LaravelSiteSettings::findOrCreate($this->argument('name'), $this->argument('value'));

        $this->info(sprintf("Option %s created", $option->name));
    }
}
