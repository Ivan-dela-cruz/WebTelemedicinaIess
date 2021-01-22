<div class="intro-y box p-5">
    <div class="grid grid-cols-12 gap-2">
        <div class="w-full border col-span-6">
            <label>Nombres <span class="text-theme-6">*</span></label>
            {{ Form::text('name', null, ['class' => 'input w-full border mt-2', 'id' => 'name']) }}
            @error('name')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-6">
            <label>Apellidos <span class="text-theme-6">*</span></label>
            {{ Form::text('last_name', null, ['class' => 'input w-full border mt-2', 'id' => 'last_name']) }}
            @error('last_name')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-3">
            <div>
                <label>Tipo de documento <span class="text-theme-6">*</span></label>
                <div class="mt-2">
                    {{Form::select(
                        'type_document',
                        array('cedula' => 'CÉDULA','ruc' => 'RUC','dni' => 'DNI','pasaporte' => 'PASAPORTE','otro' => 'OTRO'),
                        null,
                        ['class' => 'tail-select w-full'])}}
                </div>
            </div>
            @error('type_document')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-3">
            <label>Doc. Identificación <span class="text-theme-6">*</span></label>
            {{ Form::text('ci', null, ['class' => 'input w-full border mt-2', 'id' => 'ci']) }}
            @error('ci')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-3">
            <label>Fecha de nacimiento <span class="text-theme-6">*</span></label>
            {{ Form::date('birth_date', null, ['class' => 'input w-full border mt-2', 'id' => 'birth_date']) }}
            @error('birth_date')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-3">
            <label>Género <span class="text-theme-6">*</span></label>
            <div class="flex flex-col sm:flex-row mt-2">
                <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2">
                    <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">{{ Form::radio('gender', 'masculino') }}  Masculino</label>
                </div>
                <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2 mt-2 sm:mt-0">
                    <label class="cursor-pointer select-none" for="horizontal-radio-liam-neeson">{{ Form::radio('gender', 'femenino') }} Femenino</label>
                </div>
            </div>
            @error('gender')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-6">
            <div>
                <label>Estado civil <span class="text-theme-6">*</span></label>
                <div class="mt-2">
                    {{Form::select(
                        'marital_status',
                        array('Casado(a)' => 'Casado(a)','Divorciado(a)' => 'Divorciado(a)','Soltero(a)' => 'Soltero(a)','Unión libre' => 'Unión libre','Viudo(a)' => 'Viudo(a)'),
                        null,
                        ['class' => 'tail-select w-full'])}}
                </div>
            </div>
            @error('marital_status')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-3">
            <div>
                <label>Instrucción</label>
                <div class="mt-2">
                    {{Form::select(
                        'instruction',
                        array('primaria' => 'Primaria','secundaria' => 'Secundaria','tercer_nivel' => 'Tercer nivel','cuarto_nivel' => 'Cuarto nivel','ninguna' => 'Ninguna'),
                        null,
                        ['class' => 'tail-select w-full'])}}
                </div>
            </div>
            @error('instruction')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-3">
            <label>Ocupación <span class="text-theme-6">*</span></label>
            {{ Form::text('job', null, ['class' => 'input w-full border mt-2', 'id' => 'job']) }}
            @error('job')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-3">
            <label>Teléfono <span class="text-theme-6">*</span></label>
            {{ Form::text('phone', null, ['class' => 'input w-full border mt-2', 'id' => 'phone']) }}
            @error('phone')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-3">
            <label>Télefono alternativo <span class="text-theme-6">*</span></label>
            {{ Form::text('phone_2', null, ['class' => 'input w-full border mt-2', 'id' => 'phone_2']) }}
            @error('phone_2')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-6">
            <label>Correo electrónico <span class="text-theme-6">*</span></label>
            {{ Form::email('email', null, ['class' => 'input w-full border mt-2', 'id' => 'email']) }}
            @error('email')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-3">
            <div>
                <label>Provincia <span class="text-theme-6">*</span></label>
                <div class="mt-2">
                    {{Form::select(
                        'province',
                        array('Azuay' => 'Azuay','Bolívar' => 'Bolívar','Cañar' => 'Cañar','Carchi' => 'Carchi','Cotopaxi' => 'Cotopaxi','El Oro' => 'El Oro','Esmeraldas' => 'Esmeraldas','Galápagos' => 'Galápagos','Guayas' => 'Guayas','Imbabura' => 'Imbabura','Loja' => 'Loja','Los Ríos' => 'Los Ríos','Manabí' => 'Manabí','Morona Santiago' => 'Morona Santiago','Napo' => 'Napo','Orellana' => 'Orellana','Pastaza' => 'Pastaza','Pichincha' => 'Pichincha','Santa Elena' => 'Santa Elena','Santo Domingo de los Tsáchilas' => 'Santo Domingo de los Tsáchilas','Sucumbíos' => 'Sucumbíos','Tungurahua' => 'Tungurahua','Zamora Chinchipe' => 'Zamora Chinchipe'),
                        null,
                        ['class' => 'tail-select w-full', 'data-search'=>'true'])}}
                </div>
            </div>
            @error('province')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-3">
            <div>
                <label>Ciudad <span class="text-theme-6">*</span></label>
                <div class="mt-2">
                    {{Form::select(
                        'city',
                        array('Sevilla de Oro' => 'Sevilla de Oro','Paute' => 'Paute','Guachapala' => 'Guachapala','El Pan' => 'El Pan','Gualaceo' => 'Gualaceo','Chordeleg' => 'Chordeleg','Sígsig' => 'Sígsig','Cuenca' => 'Cuenca','Santa Isabel' => 'Santa Isabel','Pucará' => 'Pucará','Camilo Ponce Enríquez' => 'Camilo Ponce Enríquez','San Fernando' => 'San Fernando','Girón' => 'Girón','Nabón' => 'Nabón','Oña' => 'Oña','Guaranda' => 'Guaranda','Las Naves' => 'Las Naves','Echeandía' => 'Echeandía','Caluma' => 'Caluma','Chimbo' => 'Chimbo','San Miguel' => 'San Miguel','Chillanes' => 'Chillanes','La Troncal' => 'La Troncal','Cañar' => 'Cañar','Suscal' => 'Suscal','El Tambo' => 'El Tambo','Azogues' => 'Azogues','Biblián' => 'Biblián','Déleg' => 'Déleg','Tulcán' => 'Tulcán','Mira' => 'Mira','Espejo' => 'Espejo','Montúfar' => 'Montúfar','San Pedro de Huaca' => 'San Pedro de Huaca','Bolívar (Carchi)' => 'Bolívar (Carchi)','Guano' => 'Guano','Penipe' => 'Penipe','Riobamba' => 'Riobamba','Colta' => 'Colta','Chambo' => 'Chambo','Pallatanga' => 'Pallatanga','Guamote' => 'Guamote','Alausí' => 'Alausí','Cumandá' => 'Cumandá','Chunchi' => 'Chunchi','Sigchos' => 'Sigchos','La Maná' => 'La Maná','Latacunga' => 'Latacunga','Saquisilí' => 'Saquisilí','Pujilí' => 'Pujilí',
                        'Pangua' => 'Pangua','Salcedo' => 'Salcedo','El Guabo' => 'El Guabo','Machala' => 'Machala','Pasaje' => 'Pasaje','Chilla' => 'Chilla','Zaruma' => 'Zaruma','Santa Rosa' => 'Santa Rosa','Atahualpa' => 'Atahualpa','Arenillas' => 'Arenillas','Huaquillas' => 'Huaquillas','Las Lajas' => 'Las Lajas','Marcabelí' => 'Marcabelí','Balsas' => 'Balsas','Piñas' => 'Piñas','Portovelo' => 'Portovelo','San Lorenzo' => 'San Lorenzo','Eloy Alfaro' => 'Eloy Alfaro','Rioverde' => 'Rioverde','Esmeraldas' => 'Esmeraldas','Muisne' => 'Muisne','Atacames' => 'Atacames','Quinindé' => 'Quinindé','Isabela' => 'Isabela','San Cristóbal' => 'San Cristóbal','Santa Cruz' => 'Santa Cruz','El Empalme' => 'El Empalme','Balzar' => 'Balzar','Colimes' => 'Colimes','Palestina' => 'Palestina','Santa Lucía' => 'Santa Lucía','Pedro Carbo' => 'Pedro Carbo','Isidro Ayora' => 'Isidro Ayora','Lomas de Sargentillo' => 'Lomas de Sargentillo','Nobol' => 'Nobol','Daule' => 'Daule','Salitre' => 'Salitre','Samborondón' => 'Samborondón','Yaguachi' => 'Yaguachi','Alfredo Baquerizo Moreno' => 'Alfredo Baquerizo Moreno','Milagro' => 'Milagro','Simón Bolívar' => 'Simón Bolívar','Naranjito' => 'Naranjito','Coronel Marcelino Maridueña' => 'Coronel Marcelino Maridueña','El Triunfo' => 'El Triunfo','Durán' => 'Durán','Guayaquil' => 'Guayaquil','Playas' => 'Playas','Naranjal' => 'Naranjal','Balao' => 'Balao',
                        'Ibarra' => 'Ibarra','San Miguel de Urcuquí' => 'San Miguel de Urcuquí','Cotacachi' => 'Cotacachi','Antonio Ante' => 'Antonio Ante','Otavalo' => 'Otavalo','Pimampiro' => 'Pimampiro','Saraguro' => 'Saraguro','Loja' => 'Loja','Chaguarpamba' => 'Chaguarpamba','Olmedo (Loja)' => 'Olmedo (Loja)','Catamayo' => 'Catamayo','Paltas' => 'Paltas','Puyango' => 'Puyango','Pindal' => 'Pindal','Celica' => 'Celica','Zapotillo' => 'Zapotillo','Macará' => 'Macará','Sozoranga' => 'Sozoranga','Calvas' => 'Calvas','Gonzanamá' => 'Gonzanamá','Quilanga' => 'Quilanga','Espíndola' => 'Espíndola','Buena Fe' => 'Buena Fe','Valencia' => 'Valencia','Quevedo' => 'Quevedo','Quinsaloma' => 'Quinsaloma','Palenque' => 'Palenque','Mocache' => 'Mocache','Ventanas' => 'Ventanas','Vinces' => 'Vinces','Baba' => 'Baba','Puebloviejo' => 'Puebloviejo','Urdaneta' => 'Urdaneta','Babahoyo' => 'Babahoyo','Montalvo' => 'Montalvo','Pedernales' => 'Pedernales','Chone' => 'Chone','Flavio Alfaro' => 'Flavio Alfaro','El Carmen' => 'El Carmen','Jama' => 'Jama','San Vicente' => 'San Vicente','Sucre' => 'Sucre','Tosagua' => 'Tosagua','Rocafuerte' => 'Rocafuerte','Junín' => 'Junín','Bolívar (Manabí)' => 'Bolívar (Manabí)','Pichincha (Manabí)' => 'Pichincha (Manabí)','Portoviejo' => 'Portoviejo','Jaramijó' => 'Jaramijó','Manta' => 'Manta',
                        'Montecristi' => 'Montecristi','Santa Ana' => 'Santa Ana','Jipijapa' => 'Jipijapa','Veinticuatro de Mayo' => 'Veinticuatro de Mayo','Olmedo (Manabí)' => 'Olmedo (Manabí)','Puerto López' => 'Puerto López','Paján' => 'Paján','Palora' => 'Palora','Pablo Sexto' => 'Pablo Sexto','Huamboya' => 'Huamboya','Morona' => 'Morona','Taisha' => 'Taisha','Sucúa' => 'Sucúa','Santiago' => 'Santiago','Logroño' => 'Logroño','Tiwintza' => 'Tiwintza','Limón Indanza' => 'Limón Indanza','San Juan Bosco' => 'San Juan Bosco','Gualaquiza' => 'Gualaquiza','El Chaco' => 'El Chaco','Quijos' => 'Quijos','Archidona' => 'Archidona','Tena' => 'Tena','Carlos Julio Arosemena Tola' => 'Carlos Julio Arosemena Tola','Loreto' => 'Loreto','Francisco de Orellana' => 'Francisco de Orellana','La Joya de los Sachas' => 'La Joya de los Sachas','Aguarico' => 'Aguarico','Mera' => 'Mera','Santa Clara' => 'Santa Clara','Arajuno' => 'Arajuno','Pastaza' => 'Pastaza','Puerto Quito' => 'Puerto Quito','Pedro Vicente Maldonado' => 'Pedro Vicente Maldonado','San Miguel de Los Bancos' => 'San Miguel de Los Bancos','Distrito Metropolitano de Quito' => 'Distrito Metropolitano de Quito','Pedro Moncayo' => 'Pedro Moncayo','Cayambe' => 'Cayambe','Rumiñahui' => 'Rumiñahui','Mejía' => 'Mejía','Santa Elena' => 'Santa Elena','La Libertad' => 'La Libertad','Salinas' => 'Salinas','La Concordia' => 'La Concordia','Santo Domingo' => 'Santo Domingo','Sucumbíos' => 'Sucumbíos','Gonzalo Pizarro' => 'Gonzalo Pizarro','Cascales' => 'Cascales','Lago Agrio' => 'Lago Agrio','Putumayo' => 'Putumayo',
                        'Cuyabeno' => 'Cuyabeno','Shushufindi' => 'Shushufindi','Ambato' => 'Ambato','Píllaro' => 'Píllaro','Patate' => 'Patate','Baños' => 'Baños','Pelileo' => 'Pelileo','Cevallos' => 'Cevallos','Tisaleo' => 'Tisaleo','Mocha' => 'Mocha','Quero' => 'Quero','Yacuambi' => 'Yacuambi','Yantzaza' => 'Yantzaza','El Pangui' => 'El Pangui','Zamora' => 'Zamora','Centinela del Cóndor' => 'Centinela del Cóndor','Paquisha' => 'Paquisha','Nangaritza' => 'Nangaritza','Palanda' => 'Palanda','Chinchipe' => 'Chinchipe'),
                        null,
                        ['class' => 'tail-select w-full', 'data-search'=>'true'])}}
                </div>
            </div>
            @error('city')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-6">
            <label>Dirección  <span class="text-theme-6">*</span></label>
            {{ Form::text('address', null, ['class' => 'input w-full border mt-2', 'id' => 'address']) }}
            @error('address')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-6">
            <label>Estado <span class="text-theme-6">*</span></label>
            <div class="mt-2">
                <input checked name="status" type="checkbox" class="input input--switch border">
                @error('status')
                <br>
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        <div class="w-full border col-span-6">
            <label>Imagen</label>
            {{ Form::file('url_image') }}
            @error('url_image')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-12">
            <h1 class="font-medium text-base mr-auto">Información médica</h1>
        </div>
        <div class="w-full border col-span-6">
            <label>Tipo de sangre</label>
            {{ Form::text('blood_type', null, ['class' => 'input w-full border mt-2', 'id' => 'blood_type']) }}
            @error('blood_type')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-6">
            <label>Alergia principal</label>
            {{ Form::text('allergy', null, ['class' => 'input w-full border mt-2', 'id' => 'allergy']) }}
            @error('allergy')
                <strong>Error!</strong> {{ $message }}
            @enderror
        </div>
        <div class="w-full border col-span-6">
            <label>Observaciones</label>
            <div class="mt-2">
                {!! Form::textarea('observation', null,['id'=>'name','class'=>'editor','data-simple-toolbar'=>true]) !!}
                @error('observation')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        <div class="w-full border col-span-6">
            <label>Antecedentes importantes</label>
            <div class="mt-2">
                {!! Form::textarea('history_medical', null,['id'=>'name','class'=>'editor','data-simple-toolbar'=>true]) !!}
                @error('history_medical')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
    </div>
    <div class="text-right mt-5">
        <a type="button" class="button w-24 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1" href="{{route('get-patients')}}">Cancelar</a>
        <button type="submit" class="button w-24 bg-theme-1 text-white">Guardar</button>
    </div>
</div>