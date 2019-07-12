<?php

namespace App\Console\Commands;

use App\Repository\Work;
use App\User;
use App\UserBuilding;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GameTick extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'work:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Processes work that is ready';

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
       $users = User::where('energy', '<', DB::raw('max_energy'))->get();

       dd($users);

    }
}
