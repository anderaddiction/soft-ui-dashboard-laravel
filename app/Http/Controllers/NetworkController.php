<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Friend;
use Illuminate\Http\Request;
use App\Http\Requests\FriendRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FriendController;

class NetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $friends = Friend::with('friends')->get();

        return view('network.index', [
            'friends' => $friends,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = Friend::pluck('name', 'id');
        return view('network.create', [
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FriendRequest $request)
    {
        $friendId = $request->friend_id;

        $path = '';
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('images', 'public');
        }

        //dd($path);
        $friend = Friend::create(
            array_merge(
                $request->except('friend_id'),
                [
                    'password' => bcrypt($request->password),
                ],
                [
                    'avatar' => $path
                ]
            )
        );

        $friend->friends()->attach($friendId);

        return redirect()->route('network.index')->with('success', 'Friend added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $friend = Friend::with('friends')->find($id);

        return view('network.show', [
            'friend' => $friend
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $friend = Friend::findOrFail($id);
        $users = User::where('id', '!=', Auth::user()->id)->pluck('name', 'id');

        return view('network.edit', [
            'friend' => $friend,
            'users' => $users,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $friend = Friend::findOrFail($id);

        $path = '';
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('images', 'public');
        }

        $friend->update(
            array_merge(
                $request->except('friend_id'),
                [
                    'password' => bcrypt($request->password),
                ],
                [
                    'avatar' => $path
                ]
            )
        );

        // Update the relationship with users
        $friend->users()->sync($request->friend_id);

        return redirect()->route('network.index')->with('success', 'Friend updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $friend = Friend::findOrFail($id);

        // Detach the users from the friend
        $friend->friends()->detach();

        // Delete the friend record
        $friend->delete();

        return redirect()->route('network.index')->with('success', 'Friend deleted successfully.');
    }
}
