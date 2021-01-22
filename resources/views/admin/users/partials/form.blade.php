<div class="intro-y box p-5">
    <div class="grid grid-cols-12 gap-2">
        <div class="w-full border col-span-6">
            <label>Nombres</label>
            {{ Form::text('name', null, ['class' => 'input w-full border mt-2', 'id' => 'name']) }}
            @error('name')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-6">
            <label>Apellidos</label>
            {{ Form::text('last_name', null, ['class' => 'input w-full border mt-2', 'id' => 'last_name']) }}
            @error('last_name')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-6">
            <div>
                <label>Tipo de documento</label>
                <div class="mt-2">
                    {{Form::select(
                        'type_document',
                        array('cedula' => 'CÉDULA','ruc' => 'RUC','dni' => 'DNI','pasaporte' => 'PASAPORTE','otro' => 'OTRO'),
                        null,
                        ['class' => 'tail-select w-full'])}}
                </div>
            </div>
            @error('type_document')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-6">
            <label>Doc. Identificación</label>
            {{ Form::text('ci', null, ['class' => 'input w-full border mt-2', 'id' => 'ci']) }}
            @error('ci')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-6">
            <label>Teléfono</label>
            {{ Form::text('phone', null, ['class' => 'input w-full border mt-2', 'id' => 'phone']) }}
            @error('phone')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-6">
            <label>Correo electrónico</label>
            {{ Form::email('email', null, ['class' => 'input w-full border mt-2', 'id' => 'email']) }}
            @error('email')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-6">
            <label>Dirección</label>
            {{ Form::text('address', null, ['class' => 'input w-full border mt-2', 'id' => 'address']) }}
            @error('address')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-6">
            <div>
                <label>Roles</label>
                <div class="mt-2">
                    {{---AQUI CARGAS EL ROLES QUE VIENE DEL CONTROLADOR---}}
                    {{Form::select(
                        'rol',
                        $roles,
                        null,
                        ['class' => 'tail-select w-full'])}}
                </div>
            </div>
            @error('rol')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-6">
            <label>Estado</label>
            <div class="mt-2">
                <input checked name="status" type="checkbox" class="input input--switch border">
                @error('status')
                <br>
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        <div class="w-full border col-span-6">
            <label>Imagen</label>
            {{ Form::file('url_image') }}
            @error('address')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
    </div>
    <div class="text-right mt-5">
        <a type="button" class="button w-24 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1" href="{{route('get-users')}}">Cancelar</a>
        <button type="submit" class="button w-24 bg-theme-1 text-white">Guardar</button>
    </div>
</div>