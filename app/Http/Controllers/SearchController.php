<?php

namespace App\Http\Controllers;

use App\Models\User;
use ErlandMuchasaj\Sanitize\Sanitize;
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
            ->select(['id', 'first_name', 'last_name', 'email', 'company', 'created_at']);

        $words = explode(' ', $q);
        foreach ($words as $term) {

            $word = Sanitize::sanitize($term); // <== clean user input

            $word = str_replace(['%', '_'], ['\\%', '\\_'], $word);

            $searchTerm = '%'.$word.'%';

            $query->where(function (Builder $subQuery) use ($searchTerm) {
                $subQuery->where('first_name', 'like', $searchTerm)
                    ->orWhere('last_name', 'like', $searchTerm)
                    ->orWhere('company', 'like', $searchTerm);
            });
        }

        return view('users', [
            'users' => $query->paginate(),
        ]);
    }
}
