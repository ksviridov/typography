<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class AssignRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assign:roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $userKirill = User::find(1);
        $userKirill->assignRole('manager');

        $userPavel = User::find(2);
        $userPavel->assignRole('verstalshik');

        $userStepan = User::find(3);
        $userStepan->assignRole('perepletchik');

        return 0;
    }
}
