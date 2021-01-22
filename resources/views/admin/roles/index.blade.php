@extends('../layout/' . $layout)

@section('subhead')
    <title>Roles & Permisos</title>
@endsection
@section('subcontent')
<h2 class="intro-y text-lg font-medium mt-10">Roles y permisos</h2>
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
        <div class="intro-y col-span-12 lg:col-span-4">
            <!-- BEGIN: Bordered Table -->
            <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">Roles</h2>
                    <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
                            <a href="{{route('create-role')}}" class="ml-auto text-theme-1 dark:text-theme-10 truncate flex items-center">
                                <i data-feather="plus" class="w-4 h-4 mr-1"></i> Añadir
                            </a>
                    </div>
                </div>
                <div class="p-5" id="basic-table">
                    <div class="preview">
                        <div class="overflow-x-auto">
                            <table class="table mt-5">
                                <tbody>
                                    @include('admin.roles.listRoles')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Bordered Table -->
        </div>
        <div class="intro-y col-span-12 lg:col-span-8">
            <!-- BEGIN: Bordered Table -->
            <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">Permisos asignados</h2>
                </div>
                <div class="p-5" id="striped-rows-table">
                    <div class="preview">
                        <div class="overflow-x-auto">
                            @include('admin.roles.table')
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Bordered Table -->
        </div>
    </div>
</div>
@endsection

@include('admin.roles.scripts')
