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
    public function index($layout = 'sidebar', $theme = 'dark', $pageName = 'dashboard')
    {
        $activeMenu = $this->activeMenu($layout, $pageName);
        $documents = TypeVoucher::all();
        return view('admin/typesdocuments/index', [
            'top_menu' => $this->topMenu(),
            'side_menu' => $this->sideMenu(),
            'simple_menu' => $this->simpleMenu(),
            'first_page_name' => $activeMenu['first_page_name'],
            'second_page_name' => $activeMenu['second_page_name'],
            'third_page_name' => $activeMenu['third_page_name'],
            'page_name' => $pageName,
            'theme' => $theme,
            'layout' => $layout,
            'documents' => $documents,
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
    public function create($layout = 'sidebar', $theme = 'dark', $pageName = 'dashboard')
    {
        $activeMenu = $this->activeMenu($layout, $pageName);

        $documents = TypeVoucher::where('status', 'activo')->orderBy('document', 'ASC')->get();

        return view('admin.typesdocuments.create',[
            'top_menu' => $this->topMenu(),
            'side_menu' => $this->sideMenu(),
            'simple_menu' => $this->simpleMenu(),
            'first_page_name' => $activeMenu['first_page_name'],
            'second_page_name' => $activeMenu['second_page_name'],
            'third_page_name' => $activeMenu['third_page_name'],
            'page_name' => $pageName,
            'theme' => $theme,
            'layout' => $layout,
            'documents' => $documents
        ]);
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
            $sequence = 0;
            $status = "activo";
            if($request->status != "on"){
                $status = "inactivo";
            }
            $type = new TypeVoucher();
            $type->document = $request->document;
            $type->abbreviation = $request->abbreviation;
            $type->serie = $request->serie;
            $type->sequence = $sequence;
            $type->start = $request->start;
            $type->end = $request->end;
            $type->status = $status;
            $type->save();
            return redirect()->route('get-type-documents');
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
    public function edit($id,$layout = 'sidebar', $theme = 'dark', $pageName = 'dashboard')
    {
        $activeMenu = $this->activeMenu($layout, $pageName);
        $documento = TypeVoucher::find($id);
        return view('admin.typesdocuments.edit',[
            'top_menu' => $this->topMenu(),
            'side_menu' => $this->sideMenu(),
            'simple_menu' => $this->simpleMenu(),
            'first_page_name' => $activeMenu['first_page_name'],
            'second_page_name' => $activeMenu['second_page_name'],
            'third_page_name' => $activeMenu['third_page_name'],
            'page_name' => $pageName,
            'theme' => $theme,
            'layout' => $layout,
            'documento'=>$documento
        ]);
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
            $sequence = 0;
            $status = "activo";
            if($request->status != "on"){
                $status = "inactivo";
            }
            $type = TypeVoucher::find($request->id);
            $type->document = $request->document;
            $type->abbreviation = $request->abbreviation;
            $type->serie = $request->serie;
            $type->sequence = $sequence;
            $type->start = $request->start;
            $type->end = $request->end;
            $type->status = $status;
            $type->save();
            //return response()->json(['type' => $type, 'success' => true], 200);
            return redirect()->route('get-type-documents');
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
