<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReferencesPost;
use App\Http\Requests\UpdateReferencesPut;
use App\Reference;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $references = Reference::orderBy('name', 'ASC')->get();

        return response()->json([
            'success' => true,
            'references' => $references
        ], 200);
    }
    public function getReferences()
    {
        return view('admin.references.index');
    }

    public function ApiReferences()
    {
        $references = Reference::where('status', 'activo')->orderBy('name', 'ASC')->get();

        return response()->json([
            'success' => true,
            'references' => $references
        ], 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReferencesPost $request)
    {
        try {
            $validate = $request->validated();
            DB::beginTransaction();
            $reference = new Reference();
            $reference->name = $request->name;
            $reference->description = $request->description;
            $reference->status = $request->status;
            $reference->save();
            DB::commit();
            return response()->json($reference, 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['errors' => $e], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReferencesPut $request, $id)
    {
        try {
            $validate = $request->validated();
            DB::beginTransaction();
            $reference = Reference::find($id);
            $reference->name = $request->name;
            $reference->description = $request->description;
            $reference->status = $request->status;
            $reference->save();
            DB::commit();
            return response()->json($reference, 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['errors' => $e], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function changeStatus($id)
    {
        try {

            $reference = Reference::find($id);

            if ($reference->status == 'activo') {
                $reference->status = 'inactivo';
            } else {
                $reference->status = 'activo';
            }
            $reference->save();
            return response()->json($reference, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e], 422);
        }
    }
}
