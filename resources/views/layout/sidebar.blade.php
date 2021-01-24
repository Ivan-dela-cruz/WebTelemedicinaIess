@extends('../layout/main')

@section('head')
    @yield('subhead')
@endsection

@section('content')
    @include('../layout/components/mobile-menu')
    <div class="flex">
       
        <nav class="side-nav">
            <a href="" class="intro-x flex items-center pl-5 pt-4">
                <img alt="User" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
                <span class="hidden xl:block text-white text-lg ml-3">
                    Mid<span class="font-medium">one</span>
                </span>
            </a>
            <div class="side-nav__devider my-6"></div>
            <nav class="side-nav">
             
                <ul>
                    <li>
                        <a href="{{route('admin')}}" class="side-menu side-menu--active">
                            <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                            <div class="side-menu__title"> Dashboard </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                            <div class="side-menu__title"> Accesos <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="{{route('get-roles')}}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> Roles </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('get-users')}}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> Usuarios </div>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('get-patients')}}" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                            <div class="side-menu__title"> Pacientes </div>
                        </a>
                    </li>
                   
                    <li>
                        <a href="{{route('get-references')}}" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                            <div class="side-menu__title"> Referencias </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('get-specialties')}}" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="credit-card"></i> </div>
                            <div class="side-menu__title"> Especialidades </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('allergiesindex')}}" class="{{ (request()->is('get-allergies')) ? 'side-menu side-menu--active' : 'side-menu' }} ">
                            <div class="side-menu__icon"> <i data-feather="message-square"></i> </div>
                            <div class="side-menu__title"> Alergias </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('get-concepts')}}" class="{{ (request()->is('get-concepts')) ? 'side-menu side-menu--active' : 'side-menu' }} ">
                            <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="side-menu__title"> Conceptos </div>
                        </a>
                    </li>
                    <li class="side-nav__devider my-6"></li>
                    <li>
                        <a href="javascript:;" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="edit"></i> </div>
                            <div class="side-menu__title"> Matenimientos <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="{{route('get-type-documents')}}" class="{{ (request()->is('get-type-documents')) ? 'side-menu side-menu--active' : 'side-menu' }} ">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> Tipo documentos </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('get-diagnostics')}}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> Diagnosticos </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </nav>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            @include('../layout/components/top-bar')
            @yield('subcontent')
        </div>
        <!-- END: Content -->
    </div>
@endsection