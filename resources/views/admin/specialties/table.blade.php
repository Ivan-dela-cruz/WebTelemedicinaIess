<table class="table table-report -mt-2">
    <thead>
        <tr>
            <th class="whitespace-no-wrap">COLOR</th>
            <th class="whitespace-no-wrap">ESPECIALIDAD</th>
            <th class="whitespace-no-wrap">DESCRIPCIÓN</th>
            <th class="text-center whitespace-no-wrap">REGISTRADO</th>
            <th class="text-center whitespace-no-wrap">ESTADO</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($specialties as $specialty)
            <tr class="intro-x">
                <td>
                    <div style="background: {{ $specialty->color }}; width:40px" class="py-2 rounded"></div>
                </td>
                <td class="w-40">
                    <div class="flex">
                        <div class="w-10 h-10 image-fit zoom-in">
                            @if ($specialty->url_image=='#')
                            <img alt="Midone Tailwind HTML Admin Template" class="tooltip rounded-full" src="{{ asset('dist/images/user.jpg')}}">
                            @else
                            <img alt="Midone Tailwind HTML Admin Template" class="tooltip rounded-full" src="{{ asset('dist/images/user.jpg')}}">
                            @endif
                        </div>
                        <p></p>
                        <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-2">
                            <p class="font-medium">{{$specialty->name}}</p>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="text-gray-600 text-xs whitespace-no-wrap">{!! $specialty->description !!}</div>
                </td> 
                <td class="text-center">{{$specialty->created_at}}</td>
                <td class="w-40">
                    <div class="flex items-center justify-center {{ $specialty->status =="activo" ? 'text-theme-9' : 'text-theme-6' }}">
                        <i data-feather="check-square" class="w-4 h-4 mr-2"></i> {{ $specialty->status =="activo" ? 'Active' : 'Inactive' }}
                    </div>
                </td>
                <td class="table-report__action w-56">
                    <div class="flex justify-center items-center">
                        <a class="flex items-center mr-3" href="{{route('edit-specialties',$specialty->id)}}">
                            <i data-feather="edit" class="w-4 h-4 mr-1"></i> Edit
                        </a>
                        <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal">
                            <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>