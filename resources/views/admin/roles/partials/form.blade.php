<div class="intro-y box p-5">
    <div>
        <label>Nombre</label>
        {{ Form::text('name', null, ['class' => 'input w-full border mt-2', 'id' => 'name']) }}
        @error('name')
            <strong>Error!</strong> {{ $message }}
        @enderror
    </div>
    <div class="mt-3">
        <label>Estado</label>
        <div class="flex flex-col sm:flex-row mt-2">
            <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2">
                <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">{{ Form::radio('status', 'activo') }}  Activo</label>
            </div>
            <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2 mt-2 sm:mt-0">
                <label class="cursor-pointer select-none" for="horizontal-radio-liam-neeson">{{ Form::radio('status', 'inactivo') }} Inactivo</label>
            </div>
        </div>
        @error('status')
            <strong>Error!</strong> {{ $message }}
        @enderror
    </div>
    <div class="mt-3">
        <label>Permiso especial</label>
        <div class="flex flex-col sm:flex-row mt-2">
            <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2">
                <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">{{ Form::radio('permmission', 'especial',['class'=>'radio-oculto']) }} Acceso total</label>
            </div>
            <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2 mt-2 sm:mt-0">
                <label class="cursor-pointer select-none" for="horizontal-radio-liam-neeson">{{ Form::radio('permmission', 'ninguno',['class'=>'radio-oculto']) }} Ningún permiso</label>
            </div>
            <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2 mt-2 sm:mt-0">
                <label class="cursor-pointer select-none" for="horizontal-radio-liam-neeson">{{ Form::radio('permmission', 'asignar') }} Asignar permiso</label>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <label>Asignar permisos</label>
                    <!-- BEGIN: Directory & Files -->
                    <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5">
                        @foreach($permissions as $permission)
                            <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 xxl:col-span-2">
                                <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                                    <div class="absolute left-0 top-0 mt-3 ml-3">
                                        {{ Form::checkbox('permissions[]', $permission->id) }}
                                    </div>
                                        <a href="" class="w-3/5 file__icon file__icon--image mx-auto">
                                            <div class="file__icon--image__preview image-fit">
                                                <img alt="Midone Tailwind HTML Admin Template" src="{{asset('dist/images/user.png')}}">
                                            </div>
                                        </a>
                                    <a href="" class="block font-medium mt-4 text-center truncate">{{ $permission->modulo}}</a>
                                    <div class="text-gray-600 text-xs text-center">{{ $permission->name}}</div>
                                    <div class="absolute top-0 right-0 mr-2 mt-2 dropdown ml-auto">
                                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;">
                                            <i data-feather="alert-circle" class="w-5 h-5 text-gray-500"></i>
                                        </a>
                                        <div class="dropdown-box w-40">
                                            <div class="dropdown-box__content box dark:bg-dark-1 p-2">
                                                <a class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2  rounded-md">
                                                    {{ $permission->description }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- END: Directory & Files -->
    </div>
    
    <div class="text-right mt-5">
        <a type="button" class="button w-24 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1" href="{{route('get-roles')}}">Cancelar</a>
        <button type="submit" class="button w-24 bg-theme-1 text-white">Guardar</button>
    </div>
</div>
