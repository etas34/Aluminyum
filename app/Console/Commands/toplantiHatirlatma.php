<?php

namespace App\Console\Commands;

use App\Gorusme;
use Illuminate\Console\Command;

class toplantiHatirlatma extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cronjob:toplantiHatirlatma';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Toplantı varsa Hatırlatır';

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
        $gorusme=Gorusme::first();
        $gorusme->tel='sadasd';
        $gorusme->save();
    }
}
