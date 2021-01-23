<table class="table table-report -mt-2">
    <thead>
        <tr>
            <th class="whitespace-no-wrap">DOCUMENTO</th>
            <th class="whitespace-no-wrap">ABREVIATURA</th>
            <th class="whitespace-no-wrap">SERIE</th>
            <th class="whitespace-no-wrap">INICIO</th>
            <th class="whitespace-no-wrap">FIN</th>
            <th class="text-center whitespace-no-wrap">MODIFICADO</th>
            <th class="text-center whitespace-no-wrap">ESTADO</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($documents as $documento)
            <tr class="intro-x">
                <td class="text-center">{{$documento->document}}</td>
                <td class="text-center">{{$documento->abbreviation}}</td>
                <td class="text-center">{{$documento->serie}}</td>
                <td class="text-center">
                    <div class="text-gray-600 text-xs whitespace-no-wrap">{{$documento->start}}</div>
                </td>
                <td class="text-center">
                    <div class="text-gray-600 text-xs whitespace-no-wrap">{{$documento->end}}</div>
                </td>
                <td class="text-center">{{$documento->updated_at}}</td>
                <td class="w-40">
                    <div class="flex items-center justify-center {{ $documento->status =="activo" ? 'text-theme-9' : 'text-theme-6' }}">
                        <i data-feather="check-square" class="w-4 h-4 mr-2"></i> {{ $documento->status =="activo" ? 'Active' : 'Inactive' }}
                    </div>
                </td>
                <td class="table-report__action w-56">
                    <div class="flex justify-center items-center">
                        <a class="flex items-center mr-3" href="{{route('edit-type-document',$documento->id)}}">
                            <i data-feather="edit" class="w-4 h-4 mr-1"></i>
                        </a>
                        <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal">
                            <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>