@if (count($permissions)>0)
<table class="table">
    <thead>
        <tr>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">MÓDULO</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">PERMISO</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">DESCRIPCIÓN</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">MODIFICADO</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $permissions as $permission)
        <tr class="bg-gray-200 dark:bg-dark-1">
            <td class="border-b dark:border-dark-5">{{$permission->modulo}}</td>
            <td class="border-b dark:border-dark-5">{{$permission->name}}</td>
            <td class="border-b dark:border-dark-5">{{$permission->description}}</td>
            <td class="border-b dark:border-dark-5">{{\Carbon\Carbon::parse($permission->updated_at)->diffForhumans()}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
@endif


