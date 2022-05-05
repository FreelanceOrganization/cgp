<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Purpose;

class UpdateInterest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:UpdateInterest';

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
        \DB::beginTransaction();
        try {
            \DB::table('purposes')->where('type',config('const.purpose.savings'))->orderBy('created_at')->each(function($item, $key){
                $date = \Carbon\Carbon::parse($item->created_at);
                $current = \Carbon\Carbon::now();
                $length = $date->diffInDays($current);
                if($length > 8){
                    $balance = $item->available_balance;
                    $interest = $balance * 0.2;
                    Purpose::where('id',$item->id)->update([
                        'available_balance' => $balance + $interest,
                        'interest' => $interest
                    ]);
                }
            });
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error(get_class(). ' ->handle(): ' .$e->getMessage());
        }
    }
}
