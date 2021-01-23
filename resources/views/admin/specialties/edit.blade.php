@extends('../layout/' . $layout)

@section('subhead')
    <title>Editar especialidad</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Editar Especialidad</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            {!! Form::model($speacilty,['url' => route('put-specialty',$speacilty->id), 'method' => 'PUT','files'=>true]) !!}
                @include('admin.specialties.partials.form')
            {!! Form::close() !!}
        </div>
    </div>    
@endsection