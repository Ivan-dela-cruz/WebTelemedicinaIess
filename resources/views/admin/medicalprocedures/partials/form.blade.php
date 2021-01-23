<div class="intro-y box p-5">
    <div class="grid grid-cols-12 gap-2">
        <div class="w-full border col-span-6">
            <div>
                <label>Referencia</label>
                <div class="mt-2">
                    {{Form::select(
                        'id_reference',
                        $references,
                        null,
                        ['class' => 'tail-select w-full'])}}
                </div>
            </div>
            @error('id_reference')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-6">
            <div>
                <label>Concepto</label>
                <div class="mt-2">
                    {{Form::select(
                        'id_concept',
                        $concepts,
                        null,
                        ['class' => 'tail-select w-full'])}}
                </div>
            </div>
            @error('id_concept')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-6">
            <div>
                <label>Categoría</label>
                <div class="mt-2">
                    {{Form::select(
                        'category',
                        array('Baja' => 'Baja','Media' => 'Media','Alta' => 'Alta'),
                        null,
                        ['class' => 'tail-select w-full'])}}
                </div>
            </div>
            @error('category')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-6">
        <label>Precio</label>
        {!! Form::number('price', null,['id'=>'price','class'=>'input w-full border mt-2']) !!}
        @error('price')
        <strong class="text-danger">{{ $message }}</strong>
        @enderror
        </div>
        <div class="w-full border col-span-12">
            <label>Nombre</label>
            {!! Form::text('name', null,['id'=>'name','class'=>'input w-full border mt-2']) !!}
            @error('name')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
        <div class="w-full border col-span-12">
            <label>Descripción</label>
            <div class="mt-2">
                {!! Form::textarea('description', null,['id'=>'name','class'=>'editor','data-simple-toolbar'=>true]) !!}
                @error('description')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
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
    </div>
    <div class="text-right mt-5">
        <a type="button" class="button w-24 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1" href="{{route('get-medical-procedures')}}">Cancelar</a>
        <button type="submit" class="button w-24 bg-theme-1 text-white">Guardar</button>
    </div>
</div>