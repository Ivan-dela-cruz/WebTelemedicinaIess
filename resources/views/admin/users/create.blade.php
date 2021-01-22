@extends('../layout/' . $layout)

@section('subhead')
    <title>Usuario</title>
@endsection
@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Agregar usuario</h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
        {!! Form::open(['url' => 'store-user']) !!}
            @include('admin.users.partials.form')
        {!! Form::close() !!}
    </div>
</div>
@endsection