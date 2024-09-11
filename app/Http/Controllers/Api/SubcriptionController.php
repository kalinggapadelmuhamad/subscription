<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subcription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SubcriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscriptions = Subcription::all()->makeHidden(['id', 'user_id']);

        foreach ($subscriptions as $subscription) {
            if ($subscription->end_date > now()) {
                $subscription->status = 'active';
            } else {
                $subscription->status = 'expired';
            }
        }

        return response()->json([
            'data' => $subscriptions->map(function ($subscription) {
                return array_merge($subscription->toArray(), [
                    'status' => $subscription->status
                ]);
            })
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username', // memastikan 'username' ada di tabel users
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
            $subcription = Subcription::create([
                'uuid' => Str::uuid(),
                'user_id' => $user->id,
                'token' => strtoupper(Str::random(64)),
                'duration' => (int) $request->duration,
                'end_date' => now()->addDays((int) $request->duration),
            ]);
        }

        $status = $subcription->end_date > now() ? 'active' : 'expired';

        return response()->json([
            'message' => 'Subscription has been created or updated',
            'subcription' => array_merge($subcription->toArray(), [
                'status' => $status
            ]),
        ], 200);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
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

        return response()->json([
            'message' => 'Subcription has been deleted'
        ], 200);
        //
    }

    public function cekToken(string $token)
    {
        $subcription = Subcription::where('token', $token)->first()->makeHidden(['id', 'user_id']);
        $status = $subcription->end_date > now() ? 'active' : 'expired';
        return response()->json([
            'subcription' => array_merge($subcription->toArray(), [
                'status' => $status
            ]),
        ], 200);
    }
}
