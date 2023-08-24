<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $user = new User;
            $userId = $request->input('user_id');
            $user->fill(['user_id' => $userId]);
            $user->save();

            $userDetail = new UserDetails();
            $userName = 'gest_' . random_int(10000000, 99999999);
            $userDetail->fill([
                'user_id'   => $userId,
                'user_name' => $userName,
                'height'    => NULL,
                'weight'    => NULL,
                'sex'       => NULL,
                'age'       => NULL,
                'bio'       => NULL,
            ]);
            $userDetail->save();

            DB::commit();

            return response()->json(['message' => 'User and User Detal created successfully'], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
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
    public function destroy(string $id)
    {
        //
    }
}
