<?php

namespace Shortcodes\Roles\Commands;

use Illuminate\Console\Command;
use Shortcodes\Roles\Models\Role;

class IndexRoles extends Command
{
    protected $signature = 'roles:index';

    protected $description = 'Index roles';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info(Role::get()->pluck('name'));
    }
}
