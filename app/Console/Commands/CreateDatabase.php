<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:create-database')]
#[Description('Command description')]
class CreateDatabase extends Command
{
    protected $signature = 'db:create';
    protected $description = 'Create the database';

    public function handle()
    {
        $database = config('database.connections.mysql.database');
        $charset = config('database.connections.mysql.charset', 'utf8mb4');
        $collation = config('database.connections.mysql.collation', 'utf8mb4_unicode_ci');

        // Temporarily disconnect from the specific database
        Config::set('database.connections.mysql.database', null);

        // Create the database
        $query = "CREATE DATABASE IF NOT EXISTS {$database} CHARACTER SET {$charset} COLLATE {$collation}";
        DB::statement($query);

        // Reconnect to the new database
        Config::set('database.connections.mysql.database', $database);

        $this->info('Database created successfully.');
    }
}
