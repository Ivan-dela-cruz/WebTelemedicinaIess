@extends('../layout/' . $layout)

@section('subhead')
    <title>Panel de control</title>
@endsection

@section('subcontent')
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
        <!-- BEGIN: General Report -->
        <div class="col-span-12 mt-8">
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">Panel de control</h2>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="mini-report-chart box p-5 zoom-in">
                        <div class="flex items-center">
                            <div class="w-2/4 flex-none">
                                <div class="text-lg font-medium truncate">{{$users_count}}</div>
                                <div class="text-gray-600 mt-1">Usuarios</div>
                            </div>
                            <div class="flex-none ml-auto relative">
                                <img width="60" height="60" src="{{asset('dist/images/user.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="mini-report-chart box p-5 zoom-in">
                        <div class="flex items-center">
                            <div class="w-2/4 flex-none">
                                <div class="text-lg font-medium truncate">{{$patients_count}}</div>
                                <div class="text-gray-600 mt-1">Pacientes</div>
                            </div>
                            <div class="flex-none ml-auto relative">
                                <img  width="60" height="60" src="{{asset('dist/images/paciente.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="mini-report-chart box p-5 zoom-in">
                        <div class="flex items-center">
                            <div class="w-2/4 flex-none">
                                <div class="text-lg font-medium truncate">{{$doctors_count}}</div>
                                <div class="text-gray-600 mt-1">Doctores</div>
                            </div>
                            <div class="flex-none ml-auto relative">
                                <img width="60" height="60" src="{{asset('dist/images/dentist.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="mini-report-chart box p-5 zoom-in">
                        <div class="flex items-center">
                            <div class="w-2/4 flex-none">
                                <div class="text-lg font-medium truncate">{{$appointments_count}}</div>
                                <div class="text-gray-600 mt-1">Citas</div>
                            </div>
                            <div class="flex-none ml-auto relative">
                                <img  width="60" height="60" src="{{asset('dist/images/calendar.svg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="mini-report-chart box p-5 zoom-in">
                        <div class="flex items-center">
                            <div class="w-2/4 flex-none">
                                <div class="text-lg font-medium truncate">{{$specialties_count}}</div>
                                <div class="text-gray-600 mt-1">Especialidades</div>
                            </div>
                            <div class="flex-none ml-auto relative">
                                <img width="60" height="60" src="{{asset('dist/images/ficham.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="mini-report-chart box p-5 zoom-in">
                        <div class="flex items-center">
                            <div class="w-2/4 flex-none">
                                <div class="text-lg font-medium truncate">{{$treatments_count}}</div>
                                <div class="text-gray-600 mt-1">Tratamientos</div>
                            </div>
                            <div class="flex-none ml-auto relative">
                                <img width="60" height="60" src="{{asset('dist/images/ficha.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="mini-report-chart box p-5 zoom-in">
                        <div class="flex items-center">
                            <div class="w-2/4 flex-none">
                                <div class="text-lg font-medium truncate">{{$payments_count_month}}</div>
                                <div class="text-gray-600 mt-1">Pagos</div>
                            </div>
                            <div class="flex-none ml-auto relative">
                                <img width="60" height="60" src="{{asset('dist/images/pagoss.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="mini-report-chart box p-5 zoom-in">
                        <div class="flex items-center">
                            <div class="w-2/4 flex-none">
                                <div class="text-lg font-medium truncate">{{$recipes_count}}</div>
                                <div class="text-gray-600 mt-1">Recetas</div>
                            </div>
                            <div class="flex-none ml-auto relative">
                                <img width="60" height="60" src="{{asset('dist/images/files.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: General Report -->
        <!-- BEGIN: Official Store -->
        <div class="col-span-12 xl:col-span-7 mt-6">
            <div class="intro-y block sm:flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">Actividades para hoy</h2>
            </div>
            <div class="intro-y box p-5 mt-12 sm:mt-5">
                <div class="card-body">
                    <ul class="list-unstyled task-list">
                        @foreach($appointments_count_day as $app_day)
                            <li>
                                <i class="task-icon  fa fa-circle fa-1x"
                                   style="  color: {{$app_day->color}};"></i>
                                <p class="m-b-5">{{\Carbon\Carbon::parse($app_day->date)->toFormattedDateString()}}
                                    ({{$app_day->specialty}})</p>
                                <h6 class="text-muted">
                                    Especialista {{$app_day->name_d}} {{$app_day->last_name_d}} encargado de
                                    atender a {{$app_day->name_p}} {{$app_day->last_name_p}} para
                                    {{$app_day->reason}}.
                                </h6>
                                <span
                                    class="text-c-blue">Esta cita se confirmó {{\Carbon\Carbon::parse($app_day->updated_at)->diffForHumans()}} </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xl-12 col-md-12">
                <div id="section_table_app">
                    @include('admin.init.tableAppointments')
                </div>
            </div>
        </div>
        <!-- END: Official Store -->
        <!-- BEGIN: Weekly Best Sellers -->
        <div class="col-span-12 xl:col-span-5 mt-6">
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">Detalles</h2>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="bar-chart-2" class="report-box__icon text-theme-9"></i>
                                <div class="ml-auto">
                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer">
                                        {{\Carbon\Carbon::now()->monthName}} <i data-feather="bookmark" class="w-4 h-4"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">$ {{$payments_sum_month}}</div>
                            <div class="text-base text-gray-600 mt-1">Ingresos</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="user-check" class="report-box__icon text-theme-11"></i>
                                <div class="ml-auto">
                                    <div class="report-box__indicator bg-theme-11 tooltip cursor-pointer">
                                        Ingresados <i data-feather="bookmark" class="w-4 h-4"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">{{$patients_count_month}} +</div>
                            <div class="text-base text-gray-600 mt-1">Pacientes</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="shield-off" class="report-box__icon text-theme-6"></i>
                                <div class="ml-auto">
                                    <div class="report-box__indicator bg-theme-6 tooltip cursor-pointer">
                                        Anuladas <i data-feather="bookmark" class="w-4 h-4"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">- {{$appointments_count_an}}</div>
                            <div class="text-base text-gray-600 mt-1">Citas</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="paperclip" class="report-box__icon text-theme-10"></i>
                                <div class="ml-auto">
                                    <div class="report-box__indicator bg-theme-10 tooltip cursor-pointer">
                                        Nuevos <i data-feather="bookmark" class="w-4 h-4"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">{{$treatments_count_month}} +</div>
                            <div class="text-base text-gray-600 mt-1">Tratamientos</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Weekly Best Sellers -->
    </div>
</div>
@endsection