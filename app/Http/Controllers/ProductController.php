<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\UnitRumah;

class ProductController extends Controller
{
    public function GetAllUnit(){
        /*
        ** Query Builder
        */
        $allUnit = DB::table('unit')->get();
        return response()->json($allUnit, 200);

    }

    public function CreateUnit(Request $request){
        DB::beginTransaction();

        try{
            $this->validate($request,[
                'kavling' => 'required',
                'blok' => 'required',
                'no_rumah' => 'required',
                'harga_rumah' => 'required',
                'luas_tanah' => 'required',
                'luas_bangunan' => 'required'
            ]);

            /*
            ** this code is for UI
            */
            $kav = $request->input('kavling');
            $blok = $request->input('blok');
            $normh = $request->input('no_rumah');
            $harga = $request->input('harga_rumah');
            $luastnh = $request->input('luas_tanah');
            $luasbgn = $request->input('luas_bangunan');

            /*
            ** Eloquent method to insert value into db
            */
            $unit = new UnitRumah;
            $unit->kavling = $kav;
            $unit->blok = $blok;
            $unit->no_rumah = $normh;
            $unit->harga_rumah = $harga;
            $unit->luas_tanah = $luastnh;
            $unit->luas_bangunan = $luasbgn;
            $unit->save(); //save into db

            DB::commit();
            return response()->json(["message" => "Add new unit SUCCESS!!"], 200);
        }
        catch(\Exception $e){
            DB::rollback();
            return response()->json(["message" => $e->getMessage()], 500); //failed response
        }
    }

    public function DeleteUnit(){
        /*
        ** Raw SQL
        */
        $deleted = DB::delete('delete from unit_rumahs');
    }
}
