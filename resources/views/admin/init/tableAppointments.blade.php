@if (count($appointments_month)>0)

        <div class="card user-profile-list">
            <div class="card-header">
                <h5>Solicitudes de citas</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <i class="feather icon-more-horizontal"></i>
                        </button>
                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item full-card"><a href="#!"><span><i
                                            class="feather icon-maximize"></i> Maximizar</span><span
                                        style="display:none"><i
                                            class="feather icon-minimize"></i> Restaurar</span></a>
                            </li>
                            <li class="dropdown-item minimize-card"><a href="#!"><span><i
                                            class="feather icon-minus"></i> Colapsar</span><span
                                        style="display:none"><i
                                            class="feather icon-plus"></i> Expandir</span></a>
                            </li>
                            <li class="dropdown-item reload-card"><a href="#!"><i
                                        class="feather icon-refresh-cw"></i> Refreschar</a></li>
                            <li class="dropdown-item close-card"><a href="#!"><i
                                        class="feather icon-trash"></i> Eliminar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <div id="section_table_app">
                        <table class="table  nowrap mb-2 dataTable">
                            <thead>
                            <tr>
                                <th> Paciente</th>
                                <th> Doctor</th>
                                <th>Motivo</th>
                                <th>Fecha solicitada</th>
                                <th>...</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($appointments_month as $appointment)
                                <tr>
                                    <td>
                                        <div class="d-inline-block align-middle">
                                            @if($appointment->url_image ==="#")
                                                <img src="{{asset('img/user.jpg')}}" alt="user image"
                                                     class="img-radius wid-40 align-top m-r-15">
                                            @else
                                                <img src="{{asset($appointment->url_image)}}" alt="user image"
                                                     class="img-radius wid-40 align-top m-r-15">
                                            @endif
                                            <div class="d-inline-block">
                                                <h6>{{$appointment->name_p}} {{$appointment->last_name_p}}</h6>
                                                <p>{{$appointment->ci}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-inline-block">
                                            <h6>{{$appointment->name_d}} {{$appointment->last_name_d}}</h6>
                                            <p>{{$appointment->specialty}}</p>
                                        </div>
                                    </td>
                                    <td> {{$appointment->reason}}</td>
                                    <td>{{\Carbon\Carbon::parse($appointment->date)->toFormattedDateString()}} a
                                        las
                                        {{\Carbon\Carbon::parse($appointment->start)->format('h:i A')}}

                                    </td>
                                    <td>
                                        <button id="btn_app_edit" data-id="{{$appointment->id}}" type="button"
                                                class="btn btn-icon btn-sm btn-success"
                                                data-toggle="modal" data-target="#modal-report">
                                            <i class="feather icon-edit-2"></i></button>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>

@endif
