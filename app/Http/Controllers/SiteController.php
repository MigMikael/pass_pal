<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class SiteController extends Controller
{
    protected $paginateItem = 10;

    public function index(Request $request)
    {
        $user = $request->user();
        $sites = Site::where('user_id', $user->id)
            ->orderBy('updated_at', 'desc')
            ->paginate($this->paginateItem)
            ->withQueryString();

        return view('site.index', [
            'sites' => $sites
        ]);
    }

    public function search(Request $request)
    {
        $q = $request->input('query');

        $user = $request->user();

        $sites = Site::query()
            ->select(['slug', 'name', 'url'])
            ->where('user_id', '=', $user->id)
            ->where(function (Builder $subQuery) use ($q) {
                $subQuery->orWhere('name', 'like', '%' . $q . '%')
                    ->orWhere('url', 'like', '%' . $q . '%');
            })->orderBy('updated_at', 'desc')
            ->paginate($this->paginateItem)
            ->withQueryString();

        return view('site.index', [
            'sites' => $sites
        ]);
    }

    public function show(Site $site)
    {
        return view('site.show', [
            'site' => $site,
            'pwItems' => $site->pwItems()->orderBy('updated_at', 'desc')->get()
        ]);
    }
}
