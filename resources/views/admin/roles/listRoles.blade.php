@foreach ($roles as $role)
<tr class="bg-gray-700 dark:bg-dark-1 text-white">
    <td class="border-b border-gray-600"><a
        data-id-rol="{{$role->id}}"
        class="text-secondary btn-role-selection"
        href="">
            @if ($role->status=='activo')
            <i data-feather="user-check" class="report-box__icon text-theme-9"></i>
            @else
            <i data-feather="user-x" class="report-box__icon text-theme-11"></i>
            @endif
        </a></td>
    <td class="border-b border-gray-600"><a href="" data-id-rol="{{$role->id}}">{{$role->name}}</a></td>
    <td class="border-b border-gray-600">
        <div class="flex justify-center items-center">
            <a class="flex items-center mr-3" title="Modificar permisos" href="{{ route('edit-role',$role->id) }}">
                <i data-feather="edit" class="w-4 h-4 mr-1"></i>
            </a>
            @if ($role->status=='activo')
            <a onclick="event.preventDefault()"
            data-toggle="tooltip"
            data-id-rol="{{$role->id}}"
            class="flex items-center"
            title="Deshabilitar rol"
            data-original-title="Deshabilitar rol"
            href="">
                <i data-feather="trash" class="w-4 h-4 mr-1"></i>
            </a>
            @else
            <a onclick="event.preventDefault()"
            data-toggle="tooltip"
            data-id-rol="{{$role->id}}"
            title="Habilitar rol"
            data-original-title="Habilitar rol"
            class="flex items-center" href="">
                <i data-feather="shuffle" class="w-4 h-4 mr-1"></i>
            </a>
            @endif
        </div>
    </td>
</tr>
 @endforeach
