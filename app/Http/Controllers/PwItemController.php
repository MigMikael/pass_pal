<?php

namespace App\Http\Controllers;

use App\Models\PwItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

class PwItemController extends Controller
{
    protected $paginateItem = 20;
    protected $validateRule = [
        'site' => 'string|max:255',
        'username' => 'required|string|max:255',
        'password' => 'required|string|min:8',
        'note' => 'string|max:1024'
    ];

    public function index()
    {
        $allPwItems = PwItem::orderBy('updated_at', 'desc')
            ->paginate($this->paginateItem)
            ->withQueryString();

        return view('pwitem.index', [
            'pwItems' => $allPwItems
        ]);
    }

    public function search(Request $request)
    {
        $q = $request->input('query');

        $pwItems = PwItem::query()
            ->select(['slug', 'site', 'username', 'password', 'note'])
            ->where(function (Builder $subQuery) use ($q) {
                $subQuery->where('site', 'like', '%' . $q . '%')
                    ->orWhere('note', 'like', '%' . $q . '%');
            })->orderBy('updated_at', 'desc')
            ->paginate($this->paginateItem)
            ->withQueryString();

        return view('pwitem.index', ['pwItems' => $pwItems]);
    }

    public function create(Request $request)
    {
        $genPass = $request['genPass'];
        return view('pwitem.create', ['genPass' => $genPass]);
    }

    public function show(PwItem $pwItem)
    {
        return view('pwitem.show', ['pwItem' => $pwItem]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->validateRule);

        $newPwItem = [
            'slug' => Str::orderedUuid(),
            'site' => $validated['site'],
            'username' => $validated['username'],
            'password' => $validated['password'],
            'note' => $validated['note']
        ];

        PwItem::create($newPwItem);

        return redirect()
            ->action([PwItemController::class, 'index'])
            ->with('success', 'Create Success');
        // return "create success";
    }


    public function edit(PwItem $pwItem)
    {
        // $pwItem = PwItem::all()->get(1);
        // return $pwitem;

        return view('pwitem.edit', ['pwItem' => $pwItem]);
    }

    public function update(Request $request, PwItem $pwItem)
    {
        $validated = $request->validate($this->validateRule);

        $updatePwItem = [
            'site' => $validated['site'],
            'username' => $validated['username'],
            'password' => $validated['password'],
            'note' => $validated['note']
        ];

        $pwItem->update($updatePwItem);

        return redirect()
            ->action([PwItemController::class, 'index'])
            ->with('success', 'Edit Success');
    }

    public function destroy(PwItem $pwItem)
    {
        $pwItem->delete();

        return redirect()
            ->action([PwItemController::class, 'index'])
            ->with('success', 'Delete Success');
    }
}
