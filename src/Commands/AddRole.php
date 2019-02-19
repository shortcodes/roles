<?php

namespace Shortcodes\Roles\Commands;

use Illuminate\Console\Command;
use Shortcodes\Roles\Models\Role;

class AddRole extends Command
{
    protected $signature = 'role:add {role}';

    protected $description = 'Add role';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $role = Role::where('name', $this->argument('role'))->first();

        if ($role) {
            $this->info('Role name you want to add, already exists.');
            return;
        }

        Role::create(['name' => $this->argument('role')]);

        $this->info('Added role: ' . $this->argument('role'));
    }
}