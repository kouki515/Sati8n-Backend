<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetails;
use Illuminate\Support\Facades\DB;

class UserDetailController extends Controller
{
    public function store(Request $request)
    {
        $userId = $request->input('user_id');
        $height = $request->input('height');
        $weight = $request->input('weight');
        $sex    = $request->input('sex');
        $age    = $request->input('age');
        $bio    = $request->input('bio');

        DB::beginTransaction();

        try {
            $userDetail = new UserDetails();
            $userDetail->fill([
                'user_id' => $userId,
                'height'  => $height,
                'weight'  => $weight,
                'sex'     => $sex,
                'age'     => $age,
                'bio'     => $bio,
            ])->save();
            return 'success';
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }
}
