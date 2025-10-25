<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class SiteController extends Controller
{
    protected $paginateItem = 10;

    public function index()
    {
        $sites = Site::orderBy('updated_at', 'desc')
            ->paginate($this->paginateItem)
            ->withQueryString();

        return view('site.index', [
            'sites' => $sites
        ]);
    }

    public function search(Request $request)
    {
        $q = $request->input('query');

        $sites = Site::query()
            ->select(['slug', 'name', 'url'])
            ->where(function (Builder $subQuery) use ($q) {
                $subQuery->where('name', 'like', '%' . $q . '%')
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
