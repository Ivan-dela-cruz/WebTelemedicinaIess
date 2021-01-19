<?php

namespace App\Http\Controllers\admin;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecipePost;
use App\Recipes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id)
    {
        $recipes = Recipes::join('patients', 'patients.id', '=', 'recipes.id_patient')
            ->join('doctors', 'doctors.id', '=', 'recipes.id_doctor')
            ->select('patients.name as name_p', 'patients.last_name as last_name_p', 'patients.id as id_patient',
                'doctors.name as name_d', 'doctors.last_name as last_name_d', 'doctors.id as id_doctor','doctors.url_image',
                'recipes.id', 'recipes.status', 'recipes.created_at', 'recipes.reason',
                'recipes.indications','recipes.medicines'
            )
            ->where('recipes.id_patient', $id)
            ->get();

        return response()->json(['scucess' => true, 'recipes' => $recipes], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::where('status', 'activo')->get(['id', 'name', 'last_name']);
        return response()->json([
            'doctors' => $doctors
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecipePost $request)
    {
        $validate = $request->validated();
        try {

            DB::beginTransaction();
            $recipe = new Recipes();
            $recipe->id_patient = $request->id_patient;
            $recipe->id_doctor = $request->id_doctor;
            $recipe->reason = $request->reason;
            $recipe->medicines = $request->medicines;
            $recipe->indications = $request->indications;
            $recipe->status = $request->status;
            $recipe->save();
            DB::commit();
            return response()->json($recipe, 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['errors' => $e], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRecipePost $request)
    {
        $validate = $request->validated();
        try {

            DB::beginTransaction();
            $recipe = Recipes::find($request->id);
            $recipe->id_patient = $request->id_patient;
            $recipe->id_doctor = $request->id_doctor;
            $recipe->reason = $request->reason;
            $recipe->medicines = $request->medicines;
            $recipe->indications = $request->indications;
            $recipe->status = $request->status;
            $recipe->save();
            DB::commit();
            return response()->json($recipe, 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['errors' => $e], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try {
            $recipe = Recipes::find($id);
            $recipe->delete();
            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false], 422);
        }


    }

    public function change(Request $request)
    {
        try {
            $recipe = Recipes::find($request->id);
            if ($recipe->status == "activo") {
                $recipe->status = "inactivo";
            } else {
                $recipe->status = "activo";
            }
            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false], 422);
        }


    }
}
