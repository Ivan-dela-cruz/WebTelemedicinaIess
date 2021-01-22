@section('scripts')
    <script type="text/javascript">

        $(document).ready(function () {

        });

        function getRoles() {
            let url = "{{route('roles')}}";

            axios.get(url).then(function (response) {
                $('.lista-roles').empty();
                $('.lista-roles').html(response.data);
            }).catch(function (error) {
                console.log(error);
            });
        }


        $(document).on("click", ".btn-delete-role", function (e) {
            event.preventDefault();
            let text = $(this).data('original-title');
            let id = $(this).data('id-rol');
            let url = "{{route('deactivate-role')}}";
            Swal.fire({
                title: '¿Está seguro para ' + text + '? ',
                text: "Tu podrás revertir está acción",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                    axios.put(url, {
                        'id': id
                    }).then(function (response) {
                        getRoles();
                        Swal.fire(
                            'Desactivado!',
                            'El tarea se ha cumplido exitosamente.',
                            'success'
                        );
                    }).catch(function (error) {
                        console.log(error);
                    });


                }
            });
        });

        $(document).on("click", ".btn-role-selection", function (e) {
            event.preventDefault();
            let id = $(this).data('id-rol');
            let url = "permissions/" + id;
            axios.get(url).then(function (response) {
                $('.table-roles').empty();
                $('.table-roles').html(response.data);
            })
                .catch(function (error) {
                    console.log(error);
                });


        });


        $(document).on("click", ".radio-total", function (e) {

            $('.permisos').attr("hidden", true);
        });
        $(document).on("click", ".radio-asignar", function (e) {
            $('.permisos').removeAttr("hidden");
        });


    </script>
@endsection
