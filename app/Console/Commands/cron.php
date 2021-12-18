<?php

namespace App\Console\Commands;

use App\DaftarIpVps;
use Illuminate\Console\Command;

class cron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expired:ip';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daftar IP VPS Expired';

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
        $data = DaftarIpVps::all();
        foreach ($data as $datas) {
            if (date("Y-m-d") >= $datas->expired) {
                DaftarIpVps::where(['id' => $datas->id])->update(['status' => 'expired']);
            }else{
                echo $datas->expired;
            }
        }
    }
}
