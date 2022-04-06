<?php

namespace App\Http\Managers;

use App\Models\Purpose;

class PurposeManager {

    public function annually($type)
    {
        $months = [1,2,3,4,5,6,7,8,9,10,11,12];
        $result = [];
        $final = [];
        $annaully = Purpose::whereYear('created_at',\Carbon\Carbon::now()->year)->where('type',$type)->get()->mapToGroups(function($items, $key){
            return [$items->created_at->format('m') => $items->available_balance];
        })->map(function($items, $key){
            return $items->sum();
        });

        foreach ($months as $month) {
            $result[$month] = 0;
            foreach ($annaully as $key => $annaul) {
                if($month == $key ){
                    $result[$month] = $annaul;
                }
            }
            array_push($final, $result[$month]);
        }
        // dd($final);
        return json_encode($final);
    }

    public function monthly($type)
    {
        $monthly = Purpose::whereMonth('created_at',\Carbon\Carbon::now()->month)->where('type',$type)->get()->map(function($items, $key){
            return (float)$items->available_balance;
        })->sum();

        return $monthly;
    }

}


?>
