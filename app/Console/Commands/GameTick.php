<?php

namespace App\Console\Commands;

use App\Repository\Work;
use App\UserBuilding;
use Carbon\Carbon;
use Illuminate\Console\Command;

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
        $buildings = UserBuilding::where('next_work', '<=', Carbon::now()->toDateTimeString())->orWhere('next_work', null)->get();

        $work = new Work();

        foreach ($buildings as $building) {
            $work->doWork($building, $building->user);
        }

    }
}
