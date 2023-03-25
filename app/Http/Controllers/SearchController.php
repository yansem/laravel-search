<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $q = $request->input('query');

        $query = User::query()
            ->latest()
            ->select(['id', 'first_name', 'last_name', 'email', 'company', 'created_at'])
            ->where(function (Builder $subQuery) use ($q) {
                $subQuery->where('first_name', 'like', '%'.$q.'%')
                    ->orWhere('last_name', 'like', '%'.$q.'%')
                    ->orWhere('company', 'like', '%'.$q.'%');
            });

        return view('users', [
            'users' => $query->paginate(),
        ]);
    }
}
