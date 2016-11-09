<?php

namespace App\Http\Controllers;

use App\Classes\Scrambling;
use App\Scores;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class PlayerScramblingStatsController extends Controller
{
    //
    public function scrambling()
    {
        $user = Auth::user()->id;
        $scrambling_data = Scrambling::scrambling($user, null);

//dd($scrambling_data);

        return View::make('igif.player.stats.scrambling')
            ->with([
//                'putting_dates' => $new_putting_dates,
//                'putting_data' => $putting_data,
//                'zeroputts' => $total_zeroputts,
//                'oneputts' => $total_oneputts,
//                'twoputts' => $total_twoputts,
//                'threeputts' => $total_threeputts,
//                'total_putts_round' => $total_putts_round,
                'scrambling_data' => $scrambling_data
//
            ]);
    }
}
