<?php

namespace App\Http\Controllers;

use App\Models\PwItem;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PwItemController extends Controller
{
    protected $paginateItem = 20;
    protected $validateRule = [
        'site' => 'string|max:255',
        'username' => 'required|string|max:255',
        'password' => 'required|string|min:8',
        'note' => 'string|max:1024'
    ];

    public function create(Request $request)
    {
        $siteOptions = Site::select('name', 'updated_at')
            ->orderBy('updated_at', 'desc')
            ->distinct('name')
            ->get();
        $genPass = $request['genPass'];

        return view('pwitem.create', [
            'genPass' => $genPass,
            'siteOptions' => $siteOptions
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->validateRule);

        $authUserId = $request->user()->id;

        $site = Site::firstOrCreate(
            ['name' => $validated['site']],
            ['slug' => Str::orderedUuid(), 'user_id' => $authUserId, 'url' => '']
        );

        $newPwItem = [
            'slug' => Str::orderedUuid(),
            'site_id' => $site->id,
            'username' => $validated['username'],
            'password' => $validated['password'],
            'note' => $validated['note']
        ];

        PwItem::create($newPwItem);

        return redirect()
            ->action([SiteController::class, 'show'], ['site' => $site->slug])
            ->with('success', 'Create Success');
        // return "create success";
    }


    public function edit(PwItem $pwItem)
    {
        $siteOptions = Site::select('name', 'updated_at')
            ->orderBy('updated_at', 'desc')
            ->distinct('name')
            ->get();

        return view('pwitem.edit', [
            'pwItem' => $pwItem,
            'siteOptions' => $siteOptions
        ]);
    }

    public function update(Request $request, PwItem $pwItem)
    {
        $validated = $request->validate($this->validateRule);

        $authUserId = $request->user()->id;

        $site = Site::firstOrCreate(
            ['name' => $validated['site']],
            ['slug' => Str::orderedUuid(), 'user_id' => $authUserId, 'url' => '']
        );

        $updatePwItem = [
            'site_id' => $site->id,
            'username' => $validated['username'],
            'password' => $validated['password'],
            'note' => $validated['note']
        ];

        $pwItem->update($updatePwItem);

        return redirect()
            ->action([SiteController::class, 'show'], ['site' => $site->slug])
            ->with('success', 'Edit Success');
    }

    public function destroy(PwItem $pwItem)
    {
        $site = $pwItem->site()->first();
        $pwItem->delete();

        $site->loadCount('pwItems');
        if ($site->pw_items_count == 0) {
            $site->delete();

            return redirect()
                ->action([SiteController::class, 'index'])
                ->with('success', 'Delete Success');
        }

        return redirect()
            ->action([SiteController::class, 'show'], ['site' => $site->slug])
            ->with('success', 'Delete Success');
    }
}
