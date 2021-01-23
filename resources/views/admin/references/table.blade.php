<table class="table table-report -mt-2">
    <thead>
        <tr>
            <th class="whitespace-no-wrap">CONCEPTO</th>
            <th class="whitespace-no-wrap">DESCRIPCIÓN</th>
            <th class="text-center whitespace-no-wrap">REGISTRADO</th>
            <th class="text-center whitespace-no-wrap">ESTADO</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($references as $reference)
            <tr class="intro-x">
                <td class="text-center">{{$reference->name}}</td>
                <td>
                    <div class="text-gray-600 text-xs whitespace-no-wrap">{!! $reference->description !!}</div>
                </td> 
                <td class="text-center">{{$reference->created_at}}</td>
                <td class="w-40">
                    <div class="flex items-center justify-center {{ $reference->status =="activo" ? 'text-theme-9' : 'text-theme-6' }}">
                        <i data-feather="check-square" class="w-4 h-4 mr-2"></i> {{ $reference->status =="activo" ? 'Active' : 'Inactive' }}
                    </div>
                </td>
                <td class="table-report__action w-56">
                    <div class="flex justify-center items-center">
                        <a class="flex items-center mr-3" href="{{route('edit-reference',$reference->id)}}">
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