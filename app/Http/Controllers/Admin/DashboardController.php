<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Managers\PurposeManager;
use App\Http\Managers\UserManager;

class DashboardController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PurposeManager $purpose, UserManager $user)
    {
        $monthlySavings = $purpose->monthly(config('const.purpose.savings'));
        $monthlyCredits = $purpose->monthly(config('const.purpose.credits'));
        $annualSavings = $purpose->annually(config('const.purpose.savings'));
        $annualCredits = $purpose->annually(config('const.purpose.credits'));
        $totalCustomers = $user->countCustomers();
        $trafficChartData = array_merge($user->customerPurposes(config('const.purpose.savings')), $user->customerPurposes(config('const.purpose.credits')));
        $trafficChartData = json_encode($trafficChartData);
        return view('admin.pages.dashboard', compact(
            'monthlySavings',
            'monthlyCredits',
            'annualSavings',
            'annualCredits',
            'totalCustomers',
            'trafficChartData'
        ));
    }

}
