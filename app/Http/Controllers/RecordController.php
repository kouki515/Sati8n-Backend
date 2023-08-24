<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\Dish;
use Illuminate\Support\Facades\DB;

class RecordController extends Controller
{
    public function store(Request $request)
    {
        $userId      = $request->input('user_id');
        $storeName   = $request->input('store_name');
        $totalCarory = $request->input('total_carory');
        $dishes      = $request->input('dishes'); // array

        DB::beginTransaction();

        try {
            $record = new Record();
            $record->fill([
                    'user_id'      => $userId,
                    'store_name'   => $storeName,
                    'total_calory' => $totalCarory,
            ]);
            $record->save();

            foreach ($dishes as $dish) {
                $dish = new Dish([
                    'record_id' => $record->id,
                    'amount'    => $dish['amount'],
                    'calory'    => $dish['calory'],
                ]);
                $dish->save();
            }

            DB::commit();

            return response()->json(['message' => 'Record created successfully'], 201);;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }
}
