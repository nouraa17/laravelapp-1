<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class Expiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:expiration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users=User::where('expired',1)->get();
        foreach($users as $user){
            // User::where('id',$user[$id])->update(['expired'=>0]);
            $user->update(['expired'=>0]);
        }

    }
}
