<table class="table table-report -mt-2">
    <thead>
        <tr>
            <th class="whitespace-no-wrap">PACIENTE</th>
            <th class="text-center whitespace-no-wrap">DNI</th>
            <th class="text-center whitespace-no-wrap">EDAD</th>
            <th class="text-center whitespace-no-wrap">TÉLEFONO</th>
            <th class="text-center whitespace-no-wrap">DIRECCIÓN</th>
            <th class="text-center whitespace-no-wrap">ESTADO</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr class="intro-x" key={user.id}>
                <td class="w-40">
                    <div class="flex">
                        <div class="w-10 h-10 image-fit zoom-in">
                            @if ($user->staurl_imagetus=='#')
                            <img alt="Midone Tailwind HTML Admin Template" class="tooltip rounded-full" src="{{ asset('dist/images/user.jpg')}}">
                            @else
                            <img alt="Midone Tailwind HTML Admin Template" class="tooltip rounded-full" src="{{ asset('dist/images/user.jpg')}}">
                            @endif
                        </div>
                        <p></p>
                        <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                            <a href="" class="font-medium">{{$user->name}} {{$user->last_name}}</a>
                            <div class="text-gray-600 text-xs">{{$user->email}}</div>
                        </div>
                    </div>
                </td>
                <td class="text-center">{{$user->ci}}</td>
                <td class="text-center">{{$user->birth_date}}</td>
                <td class="text-center">{{$user->phone}}</td>
                <td class="text-center">
                    <a href="" class="font-medium">{{$user->province}} - {{$user->city}}</a>
                    <div class="text-gray-600 text-xs">{{$user->address}}</div>
                </td>
                <td class="text-center">
                    <div class="flex items-center justify-center {{ $user->status =="activo" ? 'text-theme-9' : 'text-theme-6' }}">
                        <i data-feather="check-square" class="w-4 h-4 mr-2"></i> {{ $user->status =="activo" ? 'Activo' : 'Inactivo' }}
                    </div>
                </td>
                <td class="text-center">
                    <div class="flex justify-center items-center">
                        <a class="flex items-center mr-3" title="Editar usuario" href="{{route('edit-patients',$user->id)}}">
                            <i data-feather="edit" class="w-4 h-4 mr-1"></i>
                        </a>
                        @if ($user->status=='activo')
                        <a onClick="alert('Esta activo')"
                        data-toggle="tooltip"
                        data-id-rol="{{$user->id}}"
                        class="flex items-center text-theme-6"
                        title="Deshabilitar usuario"
                        data-original-title="Deshabilitar rol"
                        href="">
                            <i data-feather="trash" class="w-4 h-4 mr-1"></i>
                        </a>
                        @else
                        <a onClick="alert('Esta inactivo')"
                        data-toggle="tooltip"
                        data-id-rol="{{$user->id}}"
                        title="Habilitar rol"
                        data-original-title="Habilitar usuario"
                        class="flex items-center text-theme-9" href="">
                            <i data-feather="shuffle" class="w-4 h-4 mr-1"></i>
                        </a>
                        @endif
                        
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>