<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RefreshDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh the database and run the seeder';

    /**
     * Execute the console command.
     */
    public function handle()
    {
      $this->call('migrate:refresh');
      $this->call('db:seed');
      
      $this->info('Database refreshed and seeded successfully.');
      return 0;
    }
}
