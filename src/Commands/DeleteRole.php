<?php

namespace Shortcodes\Roles\Commands;

use Illuminate\Console\Command;
use Shortcodes\Roles\Models\Role;

class DeleteRole extends Command
{
    protected $signature = 'roles:delete {role}';

    protected $description = 'Delete role';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $role = Role::where('name', $this->argument('role'))->first();

        if (!$role) {
            $this->info('Role name you want to delete, not exists.');
            return;
        }

        $role->delete();

        $this->info('Deleted role: ' . $this->argument('role'));
    }
}