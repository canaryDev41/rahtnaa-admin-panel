<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class SyncModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:models';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync all necessaries model with scout';

    /**
     * Create a new command instance.
     *
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

        if (Storage::disk('local')->exists('storage/workers.index')){
            Storage::disk('local')->delete('storage/worker.index');
            $this->callSilent('tntsearch:import', ['model' => 'App\Worker']);
            $this->info('Worker Model Sync Successfully!');
        }else{
            $this->callSilent('tntsearch:import', ['model' => 'App\Worker']);
            $this->info('Worker Model Sync Successfully!');
        }

        if (Storage::disk('local')->exists('storage/orders.index')){
            Storage::disk('local')->delete('storage/orders.index');
            $this->callSilent('tntsearch:import', ['model' => 'App\Order']);
            $this->info('Order Model Sync Successfully!');
        }else{
            $this->callSilent('tntsearch:import', ['model' => 'App\Order']);
            $this->info('Order Model Sync Successfully!');
        }

        if (Storage::disk('local')->exists('storage/users.index')){
            Storage::disk('local')->delete('storage/users.index');
            $this->callSilent('tntsearch:import', ['model' => 'App\User']);
            $this->info('User Model Sync Successfully!');
        }else{
            $this->callSilent('tntsearch:import', ['model' => 'App\User']);
            $this->info('User Model Sync Successfully!');
        }

        return true;
    }
}
