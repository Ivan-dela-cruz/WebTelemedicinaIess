<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypeVoucherPost;
use App\Reference;
use App\TypeVoucher;
use Illuminate\Http\Request;

class TypeVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = TypeVoucher::all();
        return response()->json([
            'documents' => $documents,
            'success' => true
        ]);
    }

    public function getDocuments()
    {
        return view('admin.typesdocuments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documents = TypeVoucher::where('status', 'activo')->orderBy('document', 'ASC')->get();

        return response()->json([
            'success' => true,
            'documents' => $documents
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeVoucherPost $request)
    {
        try {
            $type = new TypeVoucher();
            $type->document = $request->document;
            $type->abbreviation = $request->abbreviation;
            $type->serie = $request->serie;
            $type->start = $request->start;
            $type->end = $request->end;
            $type->save();
            return response()->json(['type' => $type, 'success' => true], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e], 422);
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
    public function update(Request $request)
    {
        try {
            $type = TypeVoucher::find($request->id);
            $type->document = $request->document;
            $type->abbreviation = $request->abbreviation;
            $type->serie = $request->serie;
            $type->start = $request->start;
            $type->end = $request->end;
            $type->status = $request->status;
            $type->save();
            return response()->json(['type' => $type, 'success' => true], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e], 422);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($id)
    {
        try {
            $type = TypeVoucher::find($id);
            if ($type->status == 'activo') {
                $type->status = 'inactivo';
            } else {
                $type->status = 'activo';
            }
            $type->save();
            return response()->json($type, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e], 422);
        }
    }
}
