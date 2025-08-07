<x-app-layout>
    @section('titulo', __('Entradas Internacionales'))
    @push('css')
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
        <!-- Datatables css -->
        <link href="{{ asset('assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
        <style>
            textarea {
                border-right: 1px solid #6b7280 !important;
                border-top: 1px solid #6b7280 !important;
                border-bottom: 1px solid #6b7280 !important;
            }
        </style>
    @endpush
    <x-slot name="header">
        <h2 class="h2 mb-2 mt-4 text-black uppercase">
            {{ __('Entradas Internacionales') }}
        </h2>
    </x-slot>
    <div class="row g-2">
        <div class="alert alert-info text-black font-black">
            <i class="uil-info-circle"></i>
            {{ __('Este formulario solo es para embarcaciones que provienen de otros paises') }}
        </div>
    </div>
    {{-- formulario de solicitud de despacho --}}
    <div class="row g-2">
        <form action="{{ route('movimientos.entradas.store') }}" method="POST" class="form-inline" autocomplete="off">
            @csrf
            <div class="card shadow-xl">
                <div class="card-header bg-blue-900">
                    <div class="text-white" role="alert">
                        <div class="inline-block float-start">
                            <strong>{{ __('INFORMACIÓN DE LA EMBARCACIÓN') }}</strong>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control matricula rounded-md" id="floatinMatricula"
                                    placeholder="MATRICULA" name="matricula" required />
                                <label style="font-size: 10px;" for="floatinMatricula">{{ __('MATRÍCULA') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control nombre_emb rounded-md"
                                    id="floatingNombreEmbarcacion" placeholder="NOMBRE DE LA EMBARCACIÓN" name="nombre"
                                    required />
                                <label style="font-size: 10px;"
                                    for="floatingNombreEmbarcacion">{{ __('NOMBRE DE LA EMBARCACIÓN') }}</label>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control numero_casco rounded-md"
                                    id="floatingNumeroCasco" placeholder="NUMERO DE CASCO" name="numero_casco"
                                    required />
                                <label style="font-size: 10px;"
                                    for="floatingNumeroCasco">{{ __('NUMERO DE CASCO') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control color rounded-md" id="floatingColor"
                                    placeholder="COLOR DE LA EMBARCACIÓN" name="color" required />
                                <label style="font-size: 10px;" for="floatingColor">{{ __('COLOR') }}</label>
                            </div>
                        </div>
                    </div>
                    {{-- Medidas de la embarcacion --}}

                    <div class="row g-2">
                        <div class=" text-black text-sm font-semibold py-1.5 -mb-1 mt-3 rounded" role="alert">
                            <div class="inline-block float-start">
                                <strong>{{ __('MEDIDAS DE LA EMBARCACIÓN') }}</strong>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" name="material_casco" class="form-control rounded-md"
                                    id="floatingMaterial" placeholder="MATERIAL DEL CASCO" required>
                                <label style="font-size: 10px;"
                                    for="floatinEslora">{{ __('MATERIAL DEL CASCO') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control eslora rounded-md" id="floatinEslora"
                                    placeholder="ESLORA" name="eslora" required />
                                <label style="font-size: 10px;" for="floatinEslora">{{ __('ESLORA') }}
                                    ({{ __('PIES') }})</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control nombre_emb rounded-md" id="floatingManga"
                                    placeholder="MANGA" name="manga" required />
                                <label style="font-size: 10px;" for="floatingManga">{{ __('MANGA') }}
                                    ({{ __('PIES') }})</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control puntal rounded-md" id="floatingPuntal"
                                    placeholder="PUNTAL" name="puntal" required />
                                <label style="font-size: 10px;" for="floatingNumeroCasco">{{ __('PUNTAL') }}
                                    ({{ __('PIES') }})</label>
                            </div>
                        </div>
                    </div>
                    {{-- Tipo de embarcacion y uso --}}
                    <div class="row g-2">
                        <div class=" text-black text-sm font-semibold py-1.5 -mb-1 mt-3 rounded " role="alert">
                            <div class="inline-block float-start">
                                <strong>{{ __('TIPO') }}</strong>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <select name="tipo_embarcacion" id="" class="form-select rounded-md"
                                    required>
                                    <option value="">- {{ __('Seleccione') }} -</option>
                                    <option value="CATAMARAN">{{ __('CATAMARAN') }}</option>
                                    <option value="VELERO">{{ __('VELERO') }}</option>
                                    <option value="YATE">{{ __('YATE') }}</option>
                                </select>
                                <label style="font-size: 10px;"
                                    for="floatinEslora">{{ __('TIPO DE EMBARCACIÓN') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <select name="tipo_uso" id="" class="form-select rounded-md" required>
                                    <option value="">- {{ __('Seleccione') }} -</option>
                                    <option value="ARTEFACTO NAVAL">ARTEFACTO NAVAL</option>
                                    <option value="CARGA SECA">CARGA SECA</option>
                                    <option value="DRAGA">DRAGA</option>
                                    <option value="DEPORTIVA">DEPORTIVA</option>
                                    <option value="ESPECIAL">ESPECIAL</option>
                                    <option value="LANCHA PRACTICO">LANCHA PRÁCTICO</option>
                                    <option value="PESCA">PESCA</option>
                                    <option value="PLATAFORMA">PLATAFORMA</option>
                                    <option value="RECREATIVA">RECREATIVA</option>
                                    <option value="RECREO">{{ __('RECREO') }}</option>
                                    <option value="REMOLCADOR">REMOLCADOR</option>
                                    <option value="TANQUERO">TANQUERO</option>
                                    <option value="TURISTICO">{{ __('TURÍSTICO') }}</option>
                                    <option value="TURISTICO COMERCIAL">{{ __('TURÍSTICO COMERCIAL') }}</option>
                                    <option value="TURISTICO PRIVADO">{{ __('TURÍSTICO PRIVADO') }}</option>
                                    <option value="OTRO DESTINO">OTRO DESTINO</option>
                                </select>
                                <label style="font-size: 10px;"
                                    for="floatingEmbarcacion">{{ __('TIPO DE USO') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class=" text-black text-sm font-semibold py-1.5 -mb-1 mt-1 rounded " role="alert">
                            <div class="inline-block float-start">
                                <strong>{{ __('DATOS DEL MOTOR') }}</strong>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" name="tipo_motor" class="form-control rounded-md"
                                    placeholder="TIPO MOTOR" required>
                                <label style="font-size: 10px;" for="floatinTipoMotor">{{ __('TIPO MOTOR') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" name="marca_modelo_motor" class="form-control rounded-md"
                                    placeholder="MARCA MOTOR" required>
                                <label style="font-size: 10px;"
                                    for="floatinMarcaMotor">{{ __('MARCA MOTOR') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" name="caballos_fuerza_motor" class="form-control rounded-md"
                                    placeholder="CABALLOS DE FUERZA" required>
                                <label style="font-size: 10px;"
                                    for="floatinCaballosFuerza">{{ __('CABALLOS DE FUERZA') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" name="no_motor" class="form-control rounded-md"
                                    placeholder="CANTIDAD MOTOR" required>
                                <label style="font-size: 10px;"
                                    for="floatinCaballosFuerza">{{ __('CANTIDAD MOTOR') }}</label>
                            </div>
                        </div>
                    </div>


                </div>


                <input type="hidden" name="mov" value="{{ empty($ultimo_mov) ? 1 : $ultimo_mov->id + 1 }}">
                <input type="hidden" name="user" value="{{ auth()->user()->id }}">

            </div>


            <div class="card shadow-xl">
                <div class="card-header bg-blue-900">
                    <div class="text-white" role="alert">
                        <strong>{{ __('INFORMACIÓN DEL CAPITÁN') }}</strong>
                    </div>
                </div>


                <div class="card-body">
                    {{-- informacion del capitan --}}
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <select class="form-select rounded-md" name="tipo_documento" id="" required>
                                    <option value="">- {{ __('Seleccione tipo de documento') }} -</option>
                                    <option value="cedula">{{ __('Cédula') }}</option>
                                    <option value="pasapore">{{ __('Pasaporte') }}</option>
                                </select>
                                <label style="font-size: 10px;"
                                    for="floatinMatricula">{{ __('TIPO DE DOCUMENTO') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control documento_cap rounded-md"
                                    id="floatinDocumento" placeholder="Documento" name="documento_cap" required />
                                <label style="font-size: 10px;"
                                    for="floatinMatricula">{{ __('DOCUMENTO DE IDENTIDAD') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control nombre_capitan rounded-md"
                                    id="floatingNombreCapitan" placeholder="NOMBRE Y APELLIDO DEL CAPITAN"
                                    value="" name="nombre_capitan" required />
                                <label style="font-size: 10px;"
                                    for="floatingNombreEmbarcacion">{{ __('NOMBRE Y APELLIDO') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <select name="nacionalidad_cap" class="form-select nacionalidad rounded-md"
                                    id="" required>
                                    <option value="">- {{ __('Seleccione') }} -</option>
                                    @foreach ($nacionalidades as $nac)
                                        <option value="{{ __($nac->gentilicio) }}" class="uppercase">
                                            {{ $nac->gentilicio }}</option>
                                    @endforeach
                                    {{-- <option value="DOMINICANO">{{ __('DOMINICANO') }}</option>
                                    <option value="FRANCES">{{ __('FRANCES') }}</option>
                                    <option value="ALEMAN">{{ __('ALEMAN') }}</option>
                                    <option value="RUSO">{{ __('RUSO') }}</option>
                                    <option value="ITALIANO">{{ __('ITALIANO') }}</option> --}}
                                </select>
                                <label style="font-size: 10px;"
                                    for="floatinMatricula">{{ __('NACIONALIDAD') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control telefono rounded-md"
                                    id="floatingNombreEmbarcacion" placeholder="NOMBRE DE LA EMBARCACIÓN"
                                    name="telefono" required />
                                <label style="font-size: 10px;"
                                    for="floatingNombreEmbarcacion">{{ __('TELÉFONO') }}</label>
                            </div>
                        </div>
                    </div>
                    {{-- armas --}}
                    <div class="row">
                        <div class="col-md">
                            <div class="">
                                <h3 class="mb-2 mt-2 bold text-black">¿{{ __('POSEE ARMAS DE FUEGO') }}?</h3>
                                <input type="radio" name='armas' id="armas_si" value="Si"
                                    class="w-4 h-4 text-blue-900 bg-gray-100 border-gray-300 focus:ring-blue-600  focus:ring-2 ">
                                <label for="armas_si">{{ __('Si') }}</label>
                                <input type="radio" name='armas' id="armas_no" value="No" checked
                                    class="w-4 h-4 text-blue-900 bg-gray-100 border-gray-300 focus:ring-blue-600 focus:ring-2 ">
                                <label for="armas_no">{{ __('No') }}</label>
                            </div>
                        </div>
                        <div class="col-md carmas" style="display: none;">
                            <div class="form-floating mb-2">
                                <input type="number" class="form-control cant-armas rounded-md"
                                    id="floatingCantidadArmas" placeholder="CANTIDAD DE ARMAS" name="cantidad_armas"
                                    value="0" />
                                <label style="font-size: 10px;"
                                    for="floatingCantidadArmas">{{ __('CANTIDAD DE ARMAS') }}</label>
                            </div>
                        </div>
                        <div class="col-md tarmas" style="display: none;">
                            <div class="form-floating mb-2">
                                <textarea name="tipo_armas" id="" cols="30" rows="10" placeholder="{{ __('TIPO DE ARMAS') }}"
                                    class="form-control rounded-md" id="floatingTipoArmas"></textarea>
                                <label style="font-size: 10px;"
                                    for="floatingTipoArmas">{{ __('TIPO DE ARMAS') }}</label>
                            </div>
                        </div>
                    </div>
                    {{-- componente tripulantes --}}
                </div>
            </div>
    </div>
    <div class="card shodw-xl">
        <div class="card-header bg-blue-900">
            <div class="text-white" role="alert">
                <strong>{{ __('INFORMACIÓN DEL VIAJE') }}</strong>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md">
                    <div class="form-floating mb-2">
                        <select name="motivo_viaje" class="form-select rounded-md" id="" required>
                            <option value="">- {{ __('Seleccione motivo del viaje') }} -</option>
                            <option value="ARTEFACTO NAVAL">ARTEFACTO NAVAL</option>
                            <option value="CARGA SECA">CARGA SECA</option>
                            <option value="DRAGA">DRAGA</option>
                            <option value="DEPORTIVA">DEPORTIVA</option>
                            <option value="ESPECIAL">ESPECIAL</option>
                            <option value="LANCHA PRACTICO">LANCHA PRÁCTICO</option>
                            <option value="PESCA">PESCA</option>
                            <option value="PLATAFORMA">PLATAFORMA</option>
                            <option value="RECREATIVA">RECREATIVA</option>
                            <option value="RECREO">{{ __('RECREO') }}</option>
                            <option value="REMOLCADOR">REMOLCADOR</option>
                            <option value="TANQUERO">TANQUERO</option>
                            <option value="TURISTICO">{{ __('TURÍSTICO') }}</option>
                            <option value="TURISTICO COMERCIAL">{{ __('TURÍSTICO COMERCIAL') }}</option>
                            <option value="TURISTICO PRIVADO">{{ __('TURÍSTICO PRIVADO') }}</option>
                            <option value="OTRO DESTINO">OTRO DESTINO</option>
                        </select>
                        <label style="font-size: 10px;" for="floatinMatricula">{{ __('MOTIVO DEL VIAJE') }}</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating mb-2">
                        <input type="date" class="form-control rounded-md" id="floatingFecha" placeholder="FECHA"
                            name="fecha_llegada" min="{{ date('Y-m-d') }}" required />
                        <label style="font-size: 10px;" for="floatingFecha">{{ __('FECHA LLEGADA') }}</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-floating mb-2">
                        <select name="pais_procedencia" id="" class="form-select rounded-md" required>
                            <option value="">- {{ __('Seleccione pais de procedencia') }} -</option>
                            <option value="AFGANISTÁN" id="AF">AFGANISTÁN</option>
                            <option value="ALBANIA" id="AL">ALBANIA</option>
                            <option value="ALEMANIA" id="DE">ALEMANIA</option>
                            <option value="ANDORRA" id="AD">ANDORRA</option>
                            <option value="ANGOLA" id="AO">ANGOLA</option>
                            <option value="ANGUILA" id="AI">ANGUILA</option>
                            <option value="ANTÁRTIDA" id="AQ">ANTÁRTIDA</option>
                            <option value="ANTIGUA Y BARBUDA" id="AG">ANTIGUA Y BARBUDA</option>
                            <option value="ANTILLAS HOLANDESAS" id="AN">ANTILLAS HOLANDESAS</option>
                            <option value="ARABIA SAUDÍ" id="SA">ARABIA SAUDÍ</option>
                            <option value="ARGELIA" id="DZ">ARGELIA</option>
                            <option value="ARGENTINA" id="AR">ARGENTINA</option>
                            <option value="ARMENIA" id="AM">ARMENIA</option>
                            <option value="ARUBA" id="AW">ARUBA</option>
                            <option value="AUSTRALIA" id="AU">AUSTRALIA</option>
                            <option value="AUSTRIA" id="AT">AUSTRIA</option>
                            <option value="AZERBAIYÁN" id="AZ">AZERBAIYÁN</option>
                            <option value="BAHAMAS" id="BS">BAHAMAS</option>
                            <option value="BAHREIN" id="BH">BAHREIN</option>
                            <option value="BANGLADESH" id="BD">BANGLADESH</option>
                            <option value="BARBADOS" id="BB">BARBADOS</option>
                            <option value="BÉLGICA" id="BE">BÉLGICA</option>
                            <option value="BELICE" id="BZ">BELICE</option>
                            <option value="BENÍN" id="BJ">BENÍN</option>
                            <option value="BERMUDAS" id="BM">BERMUDAS</option>
                            <option value="BHUTÁN" id="BT">BHUTÁN</option>
                            <option value="BIELORRUSIA" id="BY">BIELORRUSIA</option>
                            <option value="BIRMANIA" id="MM">BIRMANIA</option>
                            <option value="BOLIVIA" id="BO">BOLIVIA</option>
                            <option value="BOSNIA Y HERZEGOVINA" id="BA">BOSNIA Y HERZEGOVINA</option>
                            <option value="BOTSUANA" id="BW">BOTSUANA</option>
                            <option value="BRASIL" id="BR">BRASIL</option>
                            <option value="BRUNEI" id="BN">BRUNEI</option>
                            <option value="BULGARIA" id="BG">BULGARIA</option>
                            <option value="BURKINA FASO" id="BF">BURKINA FASO</option>
                            <option value="BURUNDI" id="BI">BURUNDI</option>
                            <option value="CABO VERDE" id="CV">CABO VERDE</option>
                            <option value="CAMBOYA" id="KH">CAMBOYA</option>
                            <option value="CAMERÚN" id="CM">CAMERÚN</option>
                            <option value="CANADÁ" id="CA">CANADÁ</option>
                            <option value="CHAD" id="TD">CHAD</option>
                            <option value="CHILE" id="CL">CHILE</option>
                            <option value="CHINA" id="CN">CHINA</option>
                            <option value="CHIPRE" id="CY">CHIPRE</option>
                            <option value="CIUDAD ESTADO DEL VATICANO" id="VA">CIUDAD ESTADO DEL
                                VATICANO</option>
                            <option value="COLOMBIA" id="CO">COLOMBIA</option>
                            <option value="COMORES" id="KM">COMORES</option>
                            <option value="CONGO" id="CG">CONGO</option>
                            <option value="COREA" id="KR">COREA</option>
                            <option value="COREA DEL NORTE" id="KP">COREA DEL NORTE</option>
                            <option value="COSTA DEL MARFÍL" id="CI">COSTA DEL MARFÍL</option>
                            <option value="COSTA RICA" id="CR">COSTA RICA</option>
                            <option value="CROACIA" id="HR">CROACIA</option>
                            <option value="CUBA" id="CU">CUBA</option>
                            <option value="DINAMARCA" id="DK">DINAMARCA</option>
                            <option value="DJIBOURI" id="DJ">DJIBOURI</option>
                            <option value="DOMINICA" id="DM">DOMINICA</option>
                            <option value="ECUADOR" id="EC">ECUADOR</option>
                            <option value="EGIPTO" id="EG">EGIPTO</option>
                            <option value="EL SALVADOR" id="SV">EL SALVADOR</option>
                            <option value="EMIRATOS ARABES UNIDOS" id="AE">EMIRATOS ARABES UNIDOS
                            </option>
                            <option value="ERITREA" id="ER">ERITREA</option>
                            <option value="ESLOVAQUIA" id="SK">ESLOVAQUIA</option>
                            <option value="ESLOVENIA" id="SI">ESLOVENIA</option>
                            <option value="ESPAÑA" id="ES">ESPAÑA</option>
                            <option value="ESTADOS UNIDOS" id="US">ESTADOS UNIDOS</option>
                            <option value="ESTONIA" id="EE">ESTONIA</option>
                            <option value="ETIOPÍA" id="ET">ETIOPÍA</option>
                            <option value="EX-REPÚBLICA YUGOSLAVA DE MACEDONIA" id="MK">EX-REPÚBLICA
                                YUGOSLAVA DE MACEDONIA</option>
                            <option value="FILIPINAS" id="PH">FILIPINAS</option>
                            <option value="FINLANDIA" id="FI">FINLANDIA</option>
                            <option value="FRANCIA" id="FR">FRANCIA</option>
                            <option value="GABÓN" id="GA">GABÓN</option>
                            <option value="GAMBIA" id="GM">GAMBIA</option>
                            <option value="GEORGIA" id="GE">GEORGIA</option>
                            <option value="GEORGIA DEL SUR Y LAS ISLAS SANDWICH DEL SUR" id="GS">
                                GEORGIA DEL SUR Y LAS ISLAS SANDWICH DEL SUR</option>
                            <option value="GHANA" id="GH">GHANA</option>
                            <option value="GIBRALTAR" id="GI">GIBRALTAR</option>
                            <option value="GRANADA" id="GD">GRANADA</option>
                            <option value="GRECIA" id="GR">GRECIA</option>
                            <option value="GROENLANDIA" id="GL">GROENLANDIA</option>
                            <option value="GUADALUPE" id="GP">GUADALUPE</option>
                            <option value="GUAM" id="GU">GUAM</option>
                            <option value="GUATEMALA" id="GT">GUATEMALA</option>
                            <option value="GUAYANA" id="GY">GUAYANA</option>
                            <option value="GUAYANA FRANCESA" id="GF">GUAYANA FRANCESA</option>
                            <option value="GUINEA" id="GN">GUINEA</option>
                            <option value="GUINEA ECUATORIAL" id="GQ">GUINEA ECUATORIAL</option>
                            <option value="GUINEA-BISSAU" id="GW">GUINEA-BISSAU</option>
                            <option value="HAITÍ" id="HT">HAITÍ</option>
                            <option value="HOLANDA" id="NL">HOLANDA</option>
                            <option value="HONDURAS" id="HN">HONDURAS</option>
                            <option value="HONG KONG R. A. E" id="HK">HONG KONG R. A. E</option>
                            <option value="HUNGRÍA" id="HU">HUNGRÍA</option>
                            <option value="INDIA" id="IN">INDIA</option>
                            <option value="INDONESIA" id="ID">INDONESIA</option>
                            <option value="IRAK" id="IQ">IRAK</option>
                            <option value="IRÁN" id="IR">IRÁN</option>
                            <option value="IRLANDA" id="IE">IRLANDA</option>
                            <option value="ISLA BOUVET" id="BV">ISLA BOUVET</option>
                            <option value="ISLA CHRISTMAS" id="CX">ISLA CHRISTMAS</option>
                            <option value="ISLA HEARD E ISLAS MCDONALD" id="HM">ISLA HEARD E ISLAS
                                MCDONALD</option>
                            <option value="ISLANDIA" id="IS">ISLANDIA</option>
                            <option value="ISLA BEATA">ISLA BEATA</option>
                            <option value="ISLAS CAIMÁN" id="KY">ISLAS CAIMÁN</option>
                            <option value="ISLAS COOK" id="CK">ISLAS COOK</option>
                            <option value="ISLAS DE COCOS O KEELING" id="CC">ISLAS DE COCOS O KEELING
                            </option>
                            <option value="ISLAS FAROE" id="FO">ISLAS FAROE</option>
                            <option value="ISLAS FIYI" id="FJ">ISLAS FIYI</option>
                            <option value="ISLAS MALVINAS ISLAS FALKLAND" id="FK">ISLAS MALVINAS ISLAS
                                FALKLAND</option>
                            <option value="ISLAS MARIANAS DEL NORTE" id="MP">ISLAS MARIANAS DEL NORTE
                            </option>
                            <option value="ISLAS MARSHALL" id="MH">ISLAS MARSHALL</option>
                            <option value="ISLAS MENORES DE ESTADOS UNIDOS" id="UM">ISLAS MENORES DE
                                ESTADOS UNIDOS</option>
                            <option value="ISLAS PALAU" id="PW">ISLAS PALAU</option>
                            <option value="ISLAS SALOMÓN" id="SB">ISLAS SALOMÓN</option>
                            <option value="ISLA SAN MARTIN" id="MF">ISLA SAN MARTIN</option>
                            <option value="ISLAS TOKELAU" id="TK">ISLAS TOKELAU</option>
                            <option value="ISLAS TURKS Y CAICOS" id="TC">ISLAS TURKS Y CAICOS</option>
                            <option value="ISLAS VÍRGENES EE.UU." id="VI">ISLAS VÍRGENES EE.UU.
                            </option>
                            <option value="ISLAS VÍRGENES REINO UNIDO" id="VG">ISLAS VÍRGENES REINO
                                UNIDO</option>
                            <option value="ISRAEL" id="IL">ISRAEL</option>
                            <option value="ITALIA" id="IT">ITALIA</option>
                            <option value="JAMAICA" id="JM">JAMAICA</option>
                            <option value="JAPÓN" id="JP">JAPÓN</option>
                            <option value="JORDANIA" id="JO">JORDANIA</option>
                            <option value="KAZAJISTÁN" id="KZ">KAZAJISTÁN</option>
                            <option value="KENIA" id="KE">KENIA</option>
                            <option value="KIRGUIZISTÁN" id="KG">KIRGUIZISTÁN</option>
                            <option value="KIRIBATI" id="KI">KIRIBATI</option>
                            <option value="KUWAIT" id="KW">KUWAIT</option>
                            <option value="LAOS" id="LA">LAOS</option>
                            <option value="LESOTO" id="LS">LESOTO</option>
                            <option value="LETONIA" id="LV">LETONIA</option>
                            <option value="LÍBANO" id="LB">LÍBANO</option>
                            <option value="LIBERIA" id="LR">LIBERIA</option>
                            <option value="LIBIA" id="LY">LIBIA</option>
                            <option value="LIECHTENSTEIN" id="LI">LIECHTENSTEIN</option>
                            <option value="LITUANIA" id="LT">LITUANIA</option>
                            <option value="LUXEMBURGO" id="LU">LUXEMBURGO</option>
                            <option value="MACAO R. A. E" id="MO">MACAO R. A. E</option>
                            <option value="MADAGASCAR" id="MG">MADAGASCAR</option>
                            <option value="MALASIA" id="MY">MALASIA</option>
                            <option value="MALAWI" id="MW">MALAWI</option>
                            <option value="MALDIVAS" id="MV">MALDIVAS</option>
                            <option value="MALÍ" id="ML">MALÍ</option>
                            <option value="MALTA" id="MT">MALTA</option>
                            <option value="MARRUECOS" id="MA">MARRUECOS</option>
                            <option value="MARTINICA" id="MQ">MARTINICA</option>
                            <option value="MAURICIO" id="MU">MAURICIO</option>
                            <option value="MAURITANIA" id="MR">MAURITANIA</option>
                            <option value="MAYOTTE" id="YT">MAYOTTE</option>
                            <option value="MÉXICO" id="MX">MÉXICO</option>
                            <option value="MICRONESIA" id="FM">MICRONESIA</option>
                            <option value="MOLDAVIA" id="MD">MOLDAVIA</option>
                            <option value="MÓNACO" id="MC">MÓNACO</option>
                            <option value="MONGOLIA" id="MN">MONGOLIA</option>
                            <option value="MONTSERRAT" id="MS">MONTSERRAT</option>
                            <option value="MOZAMBIQUE" id="MZ">MOZAMBIQUE</option>
                            <option value="NAMIBIA" id="NA">NAMIBIA</option>
                            <option value="NAURU" id="NR">NAURU</option>
                            <option value="NEPAL" id="NP">NEPAL</option>
                            <option value="NICARAGUA" id="NI">NICARAGUA</option>
                            <option value="NÍGER" id="NE">NÍGER</option>
                            <option value="NIGERIA" id="NG">NIGERIA</option>
                            <option value="NIUE" id="NU">NIUE</option>
                            <option value="NORFOLK" id="NF">NORFOLK</option>
                            <option value="NORUEGA" id="NO">NORUEGA</option>
                            <option value="NUEVA CALEDONIA" id="NC">NUEVA CALEDONIA</option>
                            <option value="NUEVA ZELANDA" id="NZ">NUEVA ZELANDA</option>
                            <option value="OMÁN" id="OM">OMÁN</option>
                            <option value="PANAMÁ" id="PA">PANAMÁ</option>
                            <option value="PAPUA NUEVA GUINEA" id="PG">PAPUA NUEVA GUINEA</option>
                            <option value="PAQUISTÁN" id="PK">PAQUISTÁN</option>
                            <option value="PARAGUAY" id="PY">PARAGUAY</option>
                            <option value="PERÚ" id="PE">PERÚ</option>
                            <option value="PITCAIRN" id="PN">PITCAIRN</option>
                            <option value="POLINESIA FRANCESA" id="PF">POLINESIA FRANCESA</option>
                            <option value="POLONIA" id="PL">POLONIA</option>
                            <option value="PORTUGAL" id="PT">PORTUGAL</option>
                            <option value="PUERTO RICO" id="PR">PUERTO RICO</option>
                            <option value="QATAR" id="QA">QATAR</option>
                            <option value="REINO UNIDO" id="UK">REINO UNIDO</option>
                            <option value="REPÚBLICA CENTROAFRICANA" id="CF">REPÚBLICA CENTROAFRICANA
                            </option>
                            <option value="REPÚBLICA CHECA" id="CZ">REPÚBLICA CHECA</option>
                            <option value="REPÚBLICA DE SUDÁFRICA" id="ZA">REPÚBLICA DE SUDÁFRICA
                            </option>
                            <option value="REPÚBLICA DEMOCRÁTICA DEL CONGO ZAIRE" id="CD">REPÚBLICA
                                DEMOCRÁTICA DEL CONGO ZAIRE</option>
                            <option value="REUNIÓN" id="RE">REUNIÓN</option>
                            <option value="RUANDA" id="RW">RUANDA</option>
                            <option value="RUMANIA" id="RO">RUMANIA</option>
                            <option value="RUSIA" id="RU">RUSIA</option>
                            <option value="SAMOA" id="WS">SAMOA</option>
                            <option value="SAMOA OCCIDENTAL" id="AS">SAMOA OCCIDENTAL</option>
                            <option value="SAN KITTS Y NEVIS" id="KN">SAN KITTS Y NEVIS</option>
                            <option value="SAN MARINO" id="SM">SAN MARINO</option>
                            <option value="SAN PIERRE Y MIQUELON" id="PM">SAN PIERRE Y MIQUELON
                            </option>
                            <option value="SAN VICENTE E ISLAS GRANADINAS" id="VC">SAN VICENTE E ISLAS
                                GRANADINAS</option>
                            <option value="SANTA HELENA" id="SH">SANTA HELENA</option>
                            <option value="SANTA LUCÍA" id="LC">SANTA LUCÍA</option>
                            <option value="SANTO TOMÉ Y PRÍNCIPE" id="ST">SANTO TOMÉ Y PRÍNCIPE
                            </option>
                            <option value="SENEGAL" id="SN">SENEGAL</option>
                            <option value="SERBIA Y MONTENEGRO" id="YU">SERBIA Y MONTENEGRO</option>
                            <option value="SEYCHELLES" id="SC">SEYCHELLES</option>
                            <option value="SIERRA LEONA" id="SL">SIERRA LEONA</option>
                            <option value="SINGAPUR" id="SG">SINGAPUR</option>
                            <option value="SIRIA" id="SY">SIRIA</option>
                            <option value="SOMALIA" id="SO">SOMALIA</option>
                            <option value="SRI LANKA" id="LK">SRI LANKA</option>
                            <option value="SUAZILANDIA" id="SZ">SUAZILANDIA</option>
                            <option value="SUDÁN" id="SD">SUDÁN</option>
                            <option value="SUECIA" id="SE">SUECIA</option>
                            <option value="SUIZA" id="CH">SUIZA</option>
                            <option value="SURINAM" id="SR">SURINAM</option>
                            <option value="SVALBARD" id="SJ">SVALBARD</option>
                            <option value="TAILANDIA" id="TH">TAILANDIA</option>
                            <option value="TAIWÁN" id="TW">TAIWÁN</option>
                            <option value="TANZANIA" id="TZ">TANZANIA</option>
                            <option value="TAYIKISTÁN" id="TJ">TAYIKISTÁN</option>
                            <option value="TERRITORIOS BRITÁNICOS DEL OCÉANO ÍNDICO" id="IO">
                                TERRITORIOS BRITÁNICOS DEL OCÉANO ÍNDICO</option>
                            <option value="TERRITORIOS FRANCESES DEL SUR" id="TF">TERRITORIOS FRANCESES
                                DEL SUR</option>
                            <option value="TIMOR ORIENTAL" id="TP">TIMOR ORIENTAL</option>
                            <option value="TOGO" id="TG">TOGO</option>
                            <option value="TONGA" id="TO">TONGA</option>
                            <option value="TRINIDAD Y TOBAGO" id="TT">TRINIDAD Y TOBAGO</option>
                            <option value="TÚNEZ" id="TN">TÚNEZ</option>
                            <option value="TURKMENISTÁN" id="TM">TURKMENISTÁN</option>
                            <option value="TURQUÍA" id="TR">TURQUÍA</option>
                            <option value="TUVALU" id="TV">TUVALU</option>
                            <option value="UCRANIA" id="UA">UCRANIA</option>
                            <option value="UGANDA" id="UG">UGANDA</option>
                            <option value="URUGUAY" id="UY">URUGUAY</option>
                            <option value="UZBEKISTÁN" id="UZ">UZBEKISTÁN</option>
                            <option value="VANUATU" id="VU">VANUATU</option>
                            <option value="VENEZUELA" id="VE">VENEZUELA</option>
                            <option value="VIETNAM" id="VN">VIETNAM</option>
                            <option value="WALLIS Y FUTUNA" id="WF">WALLIS Y FUTUNA</option>
                            <option value="YEMÉN" id="YE">YEMÉN</option>
                            <option value="ZAMBIA" id="ZM">ZAMBIA</option>
                            <option value="ZIMBABUE" id="ZW">ZIMBABUE</option>
                        </select>
                        <label style="font-size: 10px;" for="floatingPais">{{ __('PAIS PROCEDENCIA') }}</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control rounded-md" id="floatingPuertoLlegada"
                            placeholder="PUERTO DE SALIDA" name="puerto_salida" required />
                        <label style="font-size: 10px;"
                            for="floatingPuertoLlegada">{{ __('PUERTO DE SALIDA') }}</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating mb-2">
                        <select name="puerto_llegada" id="" class="form-select rounded-md" required>
                            <option value="">- {{ __('Seleccione puerto de llegada') }} -</option>
                            @foreach ($destinos as $destino)
                                <option value="{{ strtoupper($destino->descripcion) }}">
                                    {{ strtoupper($destino->descripcion) }}
                                </option>
                            @endforeach
                        </select>
                        <label style="font-size: 10px;"
                            for="floatingPuertoLlegada">{{ __('PUERTO DE LLEGADA') }}</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-floating mb-2">
                        <input type="number" class="form-control cant-tripulante rounded-md"
                            id="floatingNombreEmbarcacion" placeholder="NOMBRE DE LA EMBARCACIÓN"
                            name="cantidad_tripulantes" required />
                        <label style="font-size: 10px;"
                            for="floatingNombreEmbarcacion">{{ __('CANTIDAD TRIPULANTES') }}</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating mb-2">
                        <input type="number" class="form-control cant-pasajero rounded-md" id="floatinMatricula"
                            placeholder="CANTIDAD PASAJEROS" name="cantidad_pasajeros" name="cantidad_pasajeros"
                            required />
                        <label style="font-size: 10px;" for="floatinMatricula">{{ __('CANTIDAD PASAJEROS') }}</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating mb-2">
                        <select name="tiempo_estadia" id="" class="form-select rounded-md" required>
                            <option value="">- {{ __('Seleccione') }} -</option>
                            <option value="PERMANENCIA">{{ __('PERMANENCIA') }}</option>
                            <option value="TEMPORAL">{{ __('TEMPORAL') }}</option>
                        </select>
                        <label style="font-size: 10px;" for="floatinMatricula">{{ __('TIEMPO DE ESTADIA') }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-xl">
        <div class="card-header bg-blue-900">
            <div class="text-white" role="alert">
                <strong>{{ __('DATOS DE LOS TRIPULANTES') }} (MAX: <span class="cant-trip">0</span>)</strong>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                @livewire('tripulantes-post')
            </div>
        </div>
    </div>

    <div class="card shadow-xl">
        <div class="card-header bg-blue-900">
            <div class="text-white" role="alert">
                <strong>{{ __('DATOS DE LOS PASAJEROS') }} (MAX: <span class="cant-pas">0</span>)</strong>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                @livewire('pasajeros-post')
            </div>
        </div>
        <div class="card-footer">
            <div class="float-end">
                <a href="{{ route('movimientos.despachos.index') }}"
                    class="inline-flex items-center px-3 py-2 bg-slate-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-slate-400 focus:bg-slate-500 active:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-700 focus:ring-offset-2 transition ease-in-out duration-150 ml-1">{{ __('Atras') }}</a>
                <button type="submit"
                    class="inline-flex items-center justify-center px-4 py-2 bg-azulito border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25 send">
                    {{ __('Enviar') }}<i class="mdi mdi-send ml-2"></i></button>
            </div>
        </div>
    </div>


    </form>
    @push('js')
        <script>
            $('.cant-tripulante').on('keyup', function() {
                if ($(this).val() != '0') {
                    // $('.tripulantes').show();
                    $('.cant-trip').text($(this).val());
                }
                if ($(this).val() == '') {
                    $('.cant-trip').text('0');
                }
                // if ($(this).val() == 0) {
                //     $('.tripulantes').hide();
                // }
            });

            $('.cant-pasajero').on('keyup', function() {
                if ($(this).val() != '0') {
                    // $('.tripulantes').show();
                    $('.cant-pas').text($(this).val());
                }
                if ($(this).val() == '') {
                    $('.cant-pas').text('0');
                }
            });

            $('[required]').css({
                'border-left': '2px solid red'
            });

            $('#armas_si').click(function() {
                if ($(this).is(':checked')) {
                    $('.carmas').show();
                    $('.carmas input').attr('required', true);
                    $('.tarmas').show();
                    $('.tarmas textarea').attr('required', true);

                }
            });
            $('#armas_no').click(function() {
                if ($(this).is(':checked')) {
                    $('.carmas').hide();
                    $('.carmas input').attr('required', false);
                    $('.tarmas').hide();
                    $('.tarmas textarea').attr('required', false);
                }
            });
        </script>
    @endpush
</x-app-layout>
