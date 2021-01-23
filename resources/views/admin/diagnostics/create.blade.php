@extends('../layout/' . $layout)

@section('subhead')
    <title>Nuevo diagnóstico</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Nueva diagnóstico</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            {!! Form::open(['url' => route('store-diagnostic'), 'method' => 'post','files'=>true]) !!}
                @include('admin.diagnostics.partials.form')
            {!! Form::close() !!}
        </div>
    </div>    
@endsection