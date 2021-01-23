<div class="intro-y box p-5">
    <div class="grid grid-cols-12 gap-2">
        <div class="w-full border col-span-12">
            <label>Especialidad</label>
            {!! Form::text('name', null,['id'=>'name','class'=>'input w-full border mt-2']) !!}
            @error('name')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
        
        <div class="w-full border col-span-6">
            <label>Descripción</label>
            <div class="mt-2">
                {!! Form::textarea('description', null,['id'=>'name','class'=>'editor','data-simple-toolbar'=>true]) !!}
                @error('description')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        <div class="w-full border col-span-6">
            <label>Color de etiqueta</label>
            <div class="mt-2">
                <div class="flex flex-col sm:flex-row mt-2">
                    <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2">
                        <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">{{ Form::radio('color', '#E75536') }}  <div style="background: #E75536; width:80px" class="py-5 rounded"></div></label>
                        <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">{{ Form::radio('color', '#E79F36') }}  <div style="background: #E79F36; width:80px" class="py-5 rounded"></div></label>
                        <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">{{ Form::radio('color', '#E7C436') }}  <div style="background: #E7C436; width:80px" class="py-5 rounded"></div></label>
                        <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">{{ Form::radio('color', '#EDE726') }}  <div style="background: #EDE726; width:80px" class="py-5 rounded"></div></label>
                        <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">{{ Form::radio('color', '#C1E736') }}  <div style="background: #C1E736; width:80px" class="py-5 rounded"></div></label> 
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row mt-2">
                    <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2">
                        <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">{{ Form::radio('color', '#97E736') }}  <div style="background: #97E736; width:80px" class="py-5 rounded"></div></label>
                        <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">{{ Form::radio('color', '#56E736') }}  <div style="background: #56E736; width:80px" class="py-5 rounded"></div></label>
                        <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">{{ Form::radio('color', '#36E766') }}  <div style="background: #36E766; width:80px" class="py-5 rounded"></div></label>
                        <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">{{ Form::radio('color', '#36E7A4') }}  <div style="background: #36E7A4; width:80px" class="py-5 rounded"></div></label>
                        <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">{{ Form::radio('color', '#36E7CC') }}  <div style="background: #36E7CC; width:80px" class="py-5 rounded"></div></label> 
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row mt-2">
                    <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2">
                        <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">{{ Form::radio('color', '#36B9E7') }}  <div style="background: #36B9E7; width:80px" class="py-5 rounded"></div></label>
                        <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">{{ Form::radio('color', '#367EE7') }}  <div style="background: #367EE7; width:80px" class="py-5 rounded"></div></label>
                        <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">{{ Form::radio('color', '#363BE7') }}  <div style="background: #363BE7; width:80px" class="py-5 rounded"></div></label>
                        <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">{{ Form::radio('color', '#7936E7') }}  <div style="background: #7936E7; width:80px" class="py-5 rounded"></div></label>
                        <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">{{ Form::radio('color', '#BF36E7') }}  <div style="background: #BF36E7; width:80px" class="py-5 rounded"></div></label> 
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row mt-2">
                    <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2">
                        <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">{{ Form::radio('color', '#E736B4') }}  <div style="background: #E736B4; width:80px" class="py-5 rounded"></div></label>
                        <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">{{ Form::radio('color', '#E73671') }}  <div style="background: #E73671; width:80px" class="py-5 rounded"></div></label>
                        <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">{{ Form::radio('color', '#E7364E') }}  <div style="background: #E7364E; width:80px" class="py-5 rounded"></div></label>
                        <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">{{ Form::radio('color', '#E73636') }}  <div style="background: #E73636; width:80px" class="py-5 rounded"></div></label>
                        <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">{{ Form::radio('color', '#BDB1B1') }}  <div style="background: #BDB1B1; width:80px" class="py-5 rounded"></div></label> 
                    </div>
                </div>
                @error('color')
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
        <div class="w-full border col-span-6">
            <label>Imagen</label>
            {{ Form::file('url_image') }}
            @error('url_image')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
    </div>    
    <div class="text-right mt-5">
        <a type="button" class="button w-24 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1" href="{{route('get-specialties')}}">Cancelar</a>
        <button type="submit" class="button w-24 bg-theme-1 text-white">Guardar</button>
    </div>
</div>