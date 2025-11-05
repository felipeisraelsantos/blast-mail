<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Database\Eloquent\Builder;

class CampaignController extends Controller
{
    public function index()
    {
        $search = request()->search;
        $withTrashed = request()->get('withTrashed', false);

        return view('campaign.index', [
            'campaigns' => Campaign::query()
                ->when(
                    $withTrashed,
                    fn(Builder $query) => $query->withTrashed()
                )
                ->when(
                    $search,
                    fn(Builder $query) => $query
                        ->where('name', 'like', "%$search%")->orWhere('id', '=', $search)
                )
                ->paginate(5),
            'search' => $search,
            'withTrashed' => $withTrashed
        ]);
    }
}
