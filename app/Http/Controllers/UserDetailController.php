<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetails;
use Illuminate\Support\Facades\DB;

class UserDetailController extends Controller
{
    public function store(Request $request)
    {
        $userId   = $request->input('user_id');
        $height   = $request->input('height');
        $weight   = $request->input('weight');
        $sex      = $request->input('sex');
        $age      = $request->input('age');
        $bio      = $request->input('bio');
        $userName = $request->input('user_name');

        DB::beginTransaction();

        try {
            $userDetail = UserDetails::where('user_id', $userId);
            $userDetail->fill([
                'user_id'   => $userId,
                'height'    => $height,
                'weight'    => $weight,
                'sex'       => $sex,
                'age'       => $age,
                'bio'       => $bio,
                'user_name' => $userName,
            ])->update();

            DB::commit();

            return 'success';
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function show(Request $request) {
        $userId = $request->user_id;
        $userDetail = UserDetails::where('user_id', $userId)->first();

        if (!$userDetail) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return $userDetail;
    }
}
