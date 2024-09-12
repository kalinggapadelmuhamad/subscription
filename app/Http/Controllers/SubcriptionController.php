<?php

namespace App\Http\Controllers;

use App\Models\Subcription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class SubcriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $type_menu = 'Subcription';
        $subcriptions = Subcription::when($request->search, function ($query) use ($request) {
            $query->whereHas('user', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            });
        })->latest()->paginate(10);
        return view('pages.subcription.index', compact('type_menu', 'subcriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_menu = 'Subcription';
        return view('pages.subcription.create', compact('type_menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users',
            'duration' => 'required|integer',
        ]);

        $user = User::where('username', $request->username)->first();

        $subcription = $user->Subcription()->first();

        if ($subcription) {
            $subcription->update([
                'token' => strtoupper(Str::random(64)),
                'duration' => $subcription->duration + (int) $request->duration,
                'end_date' => now()->addDays($subcription->duration + (int) $request->duration),
            ]);
        } else {
            Subcription::create([
                'uuid' => Str::uuid(),
                'user_id' => $user->id,
                'token' => strtoupper(Str::random(64)),
                'duration' => (int) $request->duration,
                'end_date' => now()->addDays((int) $request->duration),
            ]);
        }

        Alert::success('Success', 'Subscription has been created');
        return Redirect::route('subscription.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcription $subscription)
    {
        $subscription->delete();
        Alert::success('Success', 'Subscription has been deleted');
        return Redirect::route('subscription.index');
    }
}
