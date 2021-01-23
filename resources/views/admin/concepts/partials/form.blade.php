<div class="intro-y box p-5">
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
    <div class="text-right mt-5">
        <a type="button" class="button w-24 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1" href="{{route('get-concepts')}}">Cancelar</a>
        <button type="submit" class="button w-24 bg-theme-1 text-white">Guardar</button>
    </div>
</div>