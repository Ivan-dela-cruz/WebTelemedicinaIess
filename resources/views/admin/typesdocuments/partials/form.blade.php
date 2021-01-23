<div class="intro-y box p-5">
    <div class="grid grid-cols-12 gap-2">
        <div class="w-full border col-span-8">
            <label>Nombre</label>
            {!! Form::text('document', null,['id'=>'document','class'=>'input w-full border mt-2']) !!}
            @error('document')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
        <div class="w-full border col-span-4">
            <label>Abreviación</label>
            {!! Form::text('abbreviation', null,['id'=>'abbreviation','class'=>'input w-full border mt-2']) !!}
            @error('abbreviation')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
        <div class="w-full border col-span-12">
            <label>Serie</label>
            {!! Form::text('serie', null,['id'=>'serie','class'=>'input w-full border mt-2']) !!}
            @error('serie')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
        <div class="w-full border col-span-6">
        <label>Inicio</label>
        {!! Form::number('start', null,['id'=>'start','class'=>'input w-full border mt-2']) !!}
        @error('start')
        <strong class="text-danger">{{ $message }}</strong>
        @enderror
        </div>
        <div class="w-full border col-span-6">
            <label>Finalización</label>
            {!! Form::number('end', null,['id'=>'end','class'=>'input w-full border mt-2']) !!}
            @error('end')
            <strong class="text-danger">{{ $message }}</strong>
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
    </div>
    <div class="text-right mt-5">
        <a type="button" class="button w-24 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1" href="{{route('get-type-documents')}}">Cancelar</a>
        <button type="submit" class="button w-24 bg-theme-1 text-white">Guardar</button>
    </div>
</div>