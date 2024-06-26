<div>
    <form action="{{ route('movimientos.entradas.store') }}" method="POST" class="form-inline" autocomplete="off">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="col-lg-12 mb-2">
                    <h3 class="h4 uppercase">{{ __('Número de solicitud') }}:
                        {{ empty($ultimo_mov) ? 1 : $ultimo_mov->id + 1 }}
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-2">
                    <div class="alert alert-warning" role="alert">
                        <div class="inline-block float-start">
                            <strong>{{ __('INFORMACIÓN DE LA EMBARCACIÓN') }}</strong>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control matricula" id="floatinMatricula"
                                placeholder="MATRICULA" name="matricula" required />
                            <label for="floatinMatricula">MATRÍCULA</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control nombre_emb" id="floatingNombreEmbarcacion"
                                placeholder="NOMBRE DE LA EMBARCACIÓN" name="nombre" required />
                            <label for="floatingNombreEmbarcacion">NOMBRE DE LA EMBARCACIÓN</label>
                        </div>
                    </div>

                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control numero_casco" id="floatingNumeroCasco"
                                placeholder="NUMERO DE CASCO" name="numero_casco" required />
                            <label for="floatingNumeroCasco">NUMERO DE CASCO</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control color" id="floatingColor"
                                placeholder="COLOR DE LA EMBARCACIÓN" name="color" required />
                            <label for="floatingColor">COLOR</label>
                        </div>
                    </div>
                </div>
                {{-- Medidas de la embarcacion --}}
                <div class="row g-2">
                    <div class="bg-blue-500 text-white text-sm font-medium mr-2 px-2.5 py-1.5 mb-1 rounded  dark:text-blue-300"
                        role="alert">
                        <div class="inline-block float-start">
                            <strong>{{ __('MEDIDAS DE LA EMBARCACIÓN') }}</strong>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-2">
                            <input type="text" name="material_casco" class="form-control" id="floatingMaterial"
                                placeholder="MATERIAL DEL CASCO" required>
                            <label for="floatinEslora">MATERIAL DEL CASCO</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-2">
                            <input type="number" class="form-control eslora" id="floatinEslora" placeholder="ESLORA"
                                name="eslora" required />
                            <label for="floatinEslora">ESLORA</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-2">
                            <input type="number" class="form-control nombre_emb" id="floatingManga" placeholder="MANGA"
                                name="manga" required />
                            <label for="floatingManga">MANGA</label>
                        </div>
                    </div>

                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control puntal" id="floatingPuntal" placeholder="PUNTAL"
                                name="puntal" required />
                            <label for="floatingNumeroCasco">PUNTAL</label>
                        </div>
                    </div>
                </div>
                {{-- Tipo de embarcacion y uso --}}
                <div class="row g-2">
                    <div class="bg-gray-700 text-white text-sm font-medium mr-2 px-2.5 py-1.5 mb-1 rounded "
                        role="alert">
                        <div class="inline-block float-start">
                            <strong>{{ __('TIPO') }}</strong>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-2">
                            <select name="tipo_embarcacion" id="" class="form-select" required>
                                <option value="">- Seleccione -</option>
                                <option value="VELERO">VELERO</option>
                                <option value="YATE">YATE</option>
                                <option value="CATAMARAN">CATAMARAN</option>
                            </select>
                            <label for="floatinEslora">TIPO EMBRACACIÓN</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-2">
                            <select name="tipo_uso" id="" class="form-select" required>
                                <option value="">- Seleccione -</option>
                                <option value="TURISMO">TURISMO</option>
                                <option value="RECREO">RECREO</option>
                            </select>
                            <label for="floatingEmbarcacion">TIPO DE USO</label>
                        </div>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="bg-green-800 text-white text-sm font-medium mr-2 px-2.5 py-1.5 mb-1 rounded "
                        role="alert">
                        <div class="inline-block float-start">
                            <strong>{{ __('DATOS DEL MOTOR') }}</strong>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-2">
                            <input type="text" name="tipo_motor" class="form-control" placeholder="TIPO MOTOR"
                                required>
                            <label for="floatinTipoMotor">TIPO MOTOR</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-2">
                            <input type="text" name="marca_modelo_motor" class="form-control"
                                placeholder="MARCA MOTOR" required>
                            <label for="floatinMarcaMotor">MARCA MOTOR</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-2">
                            <input type="text" name="caballos_fuerza_motor" class="form-control"
                                placeholder="CABALLOS DE FUERZA" required>
                            <label for="floatinCaballosFuerza">CABALLOS DE FUERZA</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-2">
                            <input type="text" name="no_motor" class="form-control" placeholder="CANTIDAD MOTOR"
                                required>
                            <label for="floatinCaballosFuerza">CANTIDAD MOTOR</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="alert alert-info mt-2" role="alert">
                        <strong>{{ __('INFORMACIÓN DEL CAPITÁN') }}</strong>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-2">
                            <select class="form-select" name="tipo_documento" id="" required>
                                <option value="">- Seleccione tipo de documento -</option>
                                <option value="cedula">Cédula</option>
                                <option value="pasapore">Pasaporte</option>
                            </select>
                            <label for="floatinMatricula">TIPO DE DOCUMENTO</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control documento_cap" id="floatinDocumento"
                                placeholder="Documento" name="documento_cap" required />
                            <label for="floatinMatricula">DOCUMENTO DE IDENTIDAD DEL CAPITÁN</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control nombre_capitan" id="floatingNombreCapitan"
                                placeholder="NOMBRE Y APELLIDO DEL CAPITAN" value="" name="nombre_capitan"
                                required />
                            <label for="floatingNombreEmbarcacion">NOMBRE Y APELLIDO DEL CAPITÁN</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-2">
                            <select name="nacionalidad_cap" class="form-select nacionalidad" id="" required>
                                <option value="">- Seleccione -</option>
                                <option value="DOMINICANO">DOMINICANO</option>
                                <option value="FRANCES">FRANCES</option>
                                <option value="ALEMAN">ALEMAN</option>
                                <option value="RUSO">RUSO</option>
                                <option value="ITALIANO">ITALIANO</option>
                            </select>
                            <label for="floatinMatricula">NACIONALIDAD DEL CAPITÁN</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control telefono" id="floatingNombreEmbarcacion"
                                placeholder="NOMBRE DE LA EMBARCACIÓN" name="telefono" required />
                            <label for="floatingNombreEmbarcacion">TELÉFONO DEL CAPITÁN</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-2">
                            <select name="motivo_viaje" class="form-select" id="" required>
                                <option value="">- Seleccione motivo del viaje -</option>
                                <option value="TURISMO">TURISMO</option>
                                <option value="RECREO">RECREO</option>
                                <option value="NEGOCIOS">NEGOCIOS</option>
                                <option value="VACACIONES">VACACIONES</option>
                            </select>
                            <label for="floatinMatricula">MOTIVO DEL VIAJE</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-2">
                            <input type="date" class="form-control" id="floatingFecha" placeholder="FECHA"
                                name="fecha_llegada" min="{{ date('Y-m-d') }}" required />
                            <label for="floatingFecha">FECHA LLEGADA</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md">
                        <div class="form-floating mb-2">
                            <select name="pais_procedencia" id="" class="form-select" required>
                                <option value="">- Seleccione pais de procedencia -</option>
                                <option value="Afganistán" id="AF">Afganistán</option>
                                <option value="Albania" id="AL">Albania</option>
                                <option value="Alemania" id="DE">Alemania</option>
                                <option value="Andorra" id="AD">Andorra</option>
                                <option value="Angola" id="AO">Angola</option>
                                <option value="Anguila" id="AI">Anguila</option>
                                <option value="Antártida" id="AQ">Antártida</option>
                                <option value="Antigua y Barbuda" id="AG">Antigua y Barbuda</option>
                                <option value="Antillas holandesas" id="AN">Antillas holandesas</option>
                                <option value="Arabia Saudí" id="SA">Arabia Saudí</option>
                                <option value="Argelia" id="DZ">Argelia</option>
                                <option value="Argentina" id="AR">Argentina</option>
                                <option value="Armenia" id="AM">Armenia</option>
                                <option value="Aruba" id="AW">Aruba</option>
                                <option value="Australia" id="AU">Australia</option>
                                <option value="Austria" id="AT">Austria</option>
                                <option value="Azerbaiyán" id="AZ">Azerbaiyán</option>
                                <option value="Bahamas" id="BS">Bahamas</option>
                                <option value="Bahrein" id="BH">Bahrein</option>
                                <option value="Bangladesh" id="BD">Bangladesh</option>
                                <option value="Barbados" id="BB">Barbados</option>
                                <option value="Bélgica" id="BE">Bélgica</option>
                                <option value="Belice" id="BZ">Belice</option>
                                <option value="Benín" id="BJ">Benín</option>
                                <option value="Bermudas" id="BM">Bermudas</option>
                                <option value="Bhután" id="BT">Bhután</option>
                                <option value="Bielorrusia" id="BY">Bielorrusia</option>
                                <option value="Birmania" id="MM">Birmania</option>
                                <option value="Bolivia" id="BO">Bolivia</option>
                                <option value="Bosnia y Herzegovina" id="BA">Bosnia y Herzegovina</option>
                                <option value="Botsuana" id="BW">Botsuana</option>
                                <option value="Brasil" id="BR">Brasil</option>
                                <option value="Brunei" id="BN">Brunei</option>
                                <option value="Bulgaria" id="BG">Bulgaria</option>
                                <option value="Burkina Faso" id="BF">Burkina Faso</option>
                                <option value="Burundi" id="BI">Burundi</option>
                                <option value="Cabo Verde" id="CV">Cabo Verde</option>
                                <option value="Camboya" id="KH">Camboya</option>
                                <option value="Camerún" id="CM">Camerún</option>
                                <option value="Canadá" id="CA">Canadá</option>
                                <option value="Chad" id="TD">Chad</option>
                                <option value="Chile" id="CL">Chile</option>
                                <option value="China" id="CN">China</option>
                                <option value="Chipre" id="CY">Chipre</option>
                                <option value="Ciudad estado del Vaticano" id="VA">Ciudad estado del
                                    Vaticano</option>
                                <option value="Colombia" id="CO">Colombia</option>
                                <option value="Comores" id="KM">Comores</option>
                                <option value="Congo" id="CG">Congo</option>
                                <option value="Corea" id="KR">Corea</option>
                                <option value="Corea del Norte" id="KP">Corea del Norte</option>
                                <option value="Costa del Marfíl" id="CI">Costa del Marfíl</option>
                                <option value="Costa Rica" id="CR">Costa Rica</option>
                                <option value="Croacia" id="HR">Croacia</option>
                                <option value="Cuba" id="CU">Cuba</option>
                                <option value="Dinamarca" id="DK">Dinamarca</option>
                                <option value="Djibouri" id="DJ">Djibouri</option>
                                <option value="Dominica" id="DM">Dominica</option>
                                <option value="Ecuador" id="EC">Ecuador</option>
                                <option value="Egipto" id="EG">Egipto</option>
                                <option value="El Salvador" id="SV">El Salvador</option>
                                <option value="Emiratos Arabes Unidos" id="AE">Emiratos Arabes Unidos
                                </option>
                                <option value="Eritrea" id="ER">Eritrea</option>
                                <option value="Eslovaquia" id="SK">Eslovaquia</option>
                                <option value="Eslovenia" id="SI">Eslovenia</option>
                                <option value="España" id="ES">España</option>
                                <option value="Estados Unidos" id="US">Estados Unidos</option>
                                <option value="Estonia" id="EE">Estonia</option>
                                <option value="Etiopía" id="ET">Etiopía</option>
                                <option value="Ex-República Yugoslava de Macedonia" id="MK">Ex-República
                                    Yugoslava de Macedonia</option>
                                <option value="Filipinas" id="PH">Filipinas</option>
                                <option value="Finlandia" id="FI">Finlandia</option>
                                <option value="Francia" id="FR">Francia</option>
                                <option value="Gabón" id="GA">Gabón</option>
                                <option value="Gambia" id="GM">Gambia</option>
                                <option value="Georgia" id="GE">Georgia</option>
                                <option value="Georgia del Sur y las islas Sandwich del Sur" id="GS">
                                    Georgia del Sur y las islas Sandwich del Sur</option>
                                <option value="Ghana" id="GH">Ghana</option>
                                <option value="Gibraltar" id="GI">Gibraltar</option>
                                <option value="Granada" id="GD">Granada</option>
                                <option value="Grecia" id="GR">Grecia</option>
                                <option value="Groenlandia" id="GL">Groenlandia</option>
                                <option value="Guadalupe" id="GP">Guadalupe</option>
                                <option value="Guam" id="GU">Guam</option>
                                <option value="Guatemala" id="GT">Guatemala</option>
                                <option value="Guayana" id="GY">Guayana</option>
                                <option value="Guayana francesa" id="GF">Guayana francesa</option>
                                <option value="Guinea" id="GN">Guinea</option>
                                <option value="Guinea Ecuatorial" id="GQ">Guinea Ecuatorial</option>
                                <option value="Guinea-Bissau" id="GW">Guinea-Bissau</option>
                                <option value="Haití" id="HT">Haití</option>
                                <option value="Holanda" id="NL">Holanda</option>
                                <option value="Honduras" id="HN">Honduras</option>
                                <option value="Hong Kong R. A. E" id="HK">Hong Kong R. A. E</option>
                                <option value="Hungría" id="HU">Hungría</option>
                                <option value="India" id="IN">India</option>
                                <option value="Indonesia" id="ID">Indonesia</option>
                                <option value="Irak" id="IQ">Irak</option>
                                <option value="Irán" id="IR">Irán</option>
                                <option value="Irlanda" id="IE">Irlanda</option>
                                <option value="Isla Bouvet" id="BV">Isla Bouvet</option>
                                <option value="Isla Christmas" id="CX">Isla Christmas</option>
                                <option value="Isla Heard e Islas McDonald" id="HM">Isla Heard e Islas
                                    McDonald</option>
                                <option value="Islandia" id="IS">Islandia</option>
                                <option value="Isla Beata">isla Beata</option>
                                <option value="Islas Caimán" id="KY">Islas Caimán</option>
                                <option value="Islas Cook" id="CK">Islas Cook</option>
                                <option value="Islas de Cocos o Keeling" id="CC">Islas de Cocos o Keeling
                                </option>
                                <option value="Islas Faroe" id="FO">Islas Faroe</option>
                                <option value="Islas Fiyi" id="FJ">Islas Fiyi</option>
                                <option value="Islas Malvinas Islas Falkland" id="FK">Islas Malvinas Islas
                                    Falkland</option>
                                <option value="Islas Marianas del norte" id="MP">Islas Marianas del norte
                                </option>
                                <option value="Islas Marshall" id="MH">Islas Marshall</option>
                                <option value="Islas menores de Estados Unidos" id="UM">Islas menores de
                                    Estados Unidos</option>
                                <option value="Islas Palau" id="PW">Islas Palau</option>
                                <option value="Islas Salomón" d="SB">Islas Salomón</option>
                                <option value="Isla San Martin" d="SB">Isla San Martin</option>
                                <option value="Islas Tokelau" id="TK">Islas Tokelau</option>
                                <option value="Islas Turks y Caicos" id="TC">Islas Turks y Caicos</option>
                                <option value="Islas Vírgenes EE.UU." id="VI">Islas Vírgenes EE.UU.
                                </option>
                                <option value="Islas Vírgenes Reino Unido" id="VG">Islas Vírgenes Reino
                                    Unido</option>
                                <option value="Israel" id="IL">Israel</option>
                                <option value="Italia" id="IT">Italia</option>
                                <option value="Jamaica" id="JM">Jamaica</option>
                                <option value="Japón" id="JP">Japón</option>
                                <option value="Jordania" id="JO">Jordania</option>
                                <option value="Kazajistán" id="KZ">Kazajistán</option>
                                <option value="Kenia" id="KE">Kenia</option>
                                <option value="Kirguizistán" id="KG">Kirguizistán</option>
                                <option value="Kiribati" id="KI">Kiribati</option>
                                <option value="Kuwait" id="KW">Kuwait</option>
                                <option value="Laos" id="LA">Laos</option>
                                <option value="Lesoto" id="LS">Lesoto</option>
                                <option value="Letonia" id="LV">Letonia</option>
                                <option value="Líbano" id="LB">Líbano</option>
                                <option value="Liberia" id="LR">Liberia</option>
                                <option value="Libia" id="LY">Libia</option>
                                <option value="Liechtenstein" id="LI">Liechtenstein</option>
                                <option value="Lituania" id="LT">Lituania</option>
                                <option value="Luxemburgo" id="LU">Luxemburgo</option>
                                <option value="Macao R. A. E" id="MO">Macao R. A. E</option>
                                <option value="Madagascar" id="MG">Madagascar</option>
                                <option value="Malasia" id="MY">Malasia</option>
                                <option value="Malawi" id="MW">Malawi</option>
                                <option value="Maldivas" id="MV">Maldivas</option>
                                <option value="Malí" id="ML">Malí</option>
                                <option value="Malta" id="MT">Malta</option>
                                <option value="Marruecos" id="MA">Marruecos</option>
                                <option value="Martinica" id="MQ">Martinica</option>
                                <option value="Mauricio" id="MU">Mauricio</option>
                                <option value="Mauritania" id="MR">Mauritania</option>
                                <option value="Mayotte" id="YT">Mayotte</option>
                                <option value="México" id="MX">México</option>
                                <option value="Micronesia" id="FM">Micronesia</option>
                                <option value="Moldavia" id="MD">Moldavia</option>
                                <option value="Mónaco" id="MC">Mónaco</option>
                                <option value="Mongolia" id="MN">Mongolia</option>
                                <option value="Montserrat" id="MS">Montserrat</option>
                                <option value="Mozambique" id="MZ">Mozambique</option>
                                <option value="Namibia" id="NA">Namibia</option>
                                <option value="Nauru" id="NR">Nauru</option>
                                <option value="Nepal" id="NP">Nepal</option>
                                <option value="Nicaragua" id="NI">Nicaragua</option>
                                <option value="Níger" id="NE">Níger</option>
                                <option value="Nigeria" id="NG">Nigeria</option>
                                <option value="Niue" id="NU">Niue</option>
                                <option value="Norfolk" id="NF">Norfolk</option>
                                <option value="Noruega" id="NO">Noruega</option>
                                <option value="Nueva Caledonia" id="NC">Nueva Caledonia</option>
                                <option value="Nueva Zelanda" id="NZ">Nueva Zelanda</option>
                                <option value="Omán" id="OM">Omán</option>
                                <option value="Panamá" id="PA">Panamá</option>
                                <option value="Papua Nueva Guinea" id="PG">Papua Nueva Guinea</option>
                                <option value="Paquistán" id="PK">Paquistán</option>
                                <option value="Paraguay" id="PY">Paraguay</option>
                                <option value="Perú" id="PE">Perú</option>
                                <option value="Pitcairn" id="PN">Pitcairn</option>
                                <option value="Polinesia francesa" id="PF">Polinesia francesa</option>
                                <option value="Polonia" id="PL">Polonia</option>
                                <option value="Portugal" id="PT">Portugal</option>
                                <option value="Puerto Rico" id="PR">Puerto Rico</option>
                                <option value="Qatar" id="QA">Qatar</option>
                                <option value="Reino Unido" id="UK">Reino Unido</option>
                                <option value="República Centroafricana" id="CF">República Centroafricana
                                </option>
                                <option value="República Checa" id="CZ">República Checa</option>
                                <option value="República de Sudáfrica" id="ZA">República de Sudáfrica
                                </option>
                                <option value="República Democrática del Congo Zaire" id="CD">República
                                    Democrática del Congo Zaire</option>
                                <!-- <option value="República Dominicana" id="DO">República Dominicana</option> -->
                                <option value="Reunión" id="RE">Reunión</option>
                                <option value="Ruanda" id="RW">Ruanda</option>
                                <option value="Rumania" id="RO">Rumania</option>
                                <option value="Rusia" id="RU">Rusia</option>
                                <option value="Samoa" id="WS">Samoa</option>
                                <option value="Samoa occidental" id="AS">Samoa occidental</option>
                                <option value="San Kitts y Nevis" id="KN">San Kitts y Nevis</option>
                                <option value="San Marino" id="SM">San Marino</option>
                                <option value="San Pierre y Miquelon" id="PM">San Pierre y Miquelon
                                </option>
                                <option value="San Vicente e Islas Granadinas" id="VC">San Vicente e Islas
                                    Granadinas</option>
                                <option value="Santa Helena" id="SH">Santa Helena</option>
                                <option value="Santa Lucía" id="LC">Santa Lucía</option>
                                <option value="Santo Tomé y Príncipe" id="ST">Santo Tomé y Príncipe
                                </option>
                                <option value="Senegal" id="SN">Senegal</option>
                                <option value="Serbia y Montenegro" id="YU">Serbia y Montenegro</option>
                                <option value="Sychelles" id="SC">Seychelles</option>
                                <option value="Sierra Leona" id="SL">Sierra Leona</option>
                                <option value="Singapur" id="SG">Singapur</option>
                                <option value="Siria" id="SY">Siria</option>
                                <option value="Somalia" id="SO">Somalia</option>
                                <option value="Sri Lanka" id="LK">Sri Lanka</option>
                                <option value="Suazilandia" id="SZ">Suazilandia</option>
                                <option value="Sudán" id="SD">Sudán</option>
                                <option value="Suecia" id="SE">Suecia</option>
                                <option value="Suiza" id="CH">Suiza</option>
                                <option value="Surinam" id="SR">Surinam</option>
                                <option value="Svalbard" id="SJ">Svalbard</option>
                                <option value="Tailandia" id="TH">Tailandia</option>
                                <option value="Taiwán" id="TW">Taiwán</option>
                                <option value="Tanzania" id="TZ">Tanzania</option>
                                <option value="Tayikistán" id="TJ">Tayikistán</option>
                                <option value="Territorios británicos del océano Indico" id="IO">
                                    Territorios británicos del océano Indico</option>
                                <option value="Territorios franceses del sur" id="TF">Territorios franceses
                                    del sur</option>
                                <option value="Timor Oriental" id="TP">Timor Oriental</option>
                                <option value="Togo" id="TG">Togo</option>
                                <option value="Tonga" id="TO">Tonga</option>
                                <option value="Trinidad y Tobago" id="TT">Trinidad y Tobago</option>
                                <option value="Túnez" id="TN">Túnez</option>
                                <option value="Turkmenistán" id="TM">Turkmenistán</option>
                                <option value="Turquía" id="TR">Turquía</option>
                                <option value="Tuvalu" id="TV">Tuvalu</option>
                                <option value="Ucrania" id="UA">Ucrania</option>
                                <option value="Uganda" id="UG">Uganda</option>
                                <option value="Uruguay" id="UY">Uruguay</option>
                                <option value="Uzbekistán" id="UZ">Uzbekistán</option>
                                <option value="Vanuatu" id="VU">Vanuatu</option>
                                <option value="Venezuela" id="VE">Venezuela</option>
                                <option value="Vietnam" id="VN">Vietnam</option>
                                <option value="Wallis y Futuna" id="WF">Wallis y Futuna</option>
                                <option value="Yemen" id="YE">Yemen</option>
                                <option value="Zambia" id="ZM">Zambia</option>
                                <option value="Zimbabue" id="ZW">Zimbabue</option>
                            </select>
                            <label for="floatingPais">PAIS PROCEDENCIA</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="floatingPuertoLlegada"
                                placeholder="PUERTO DE SALIDA" name="puerto_salida" required />
                            <label for="floatingPuertoLlegada">PUERTO DE SALIDA</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-2">
                            <select name="puerto_llegada" id="" class="form-select" required>
                                <option value="">- Seleccione puerto de llegada-</option>
                                @foreach ($destinos as $destino)
                                    <option value="{{ $destino->descripcion }}">
                                        {{ $destino->descripcion }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="floatingPuertoLlegada">PUERTO DE LLEGADA</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-floating mb-2">
                            <input type="number" class="form-control cant-tripulante" id="floatingNombreEmbarcacion"
                                placeholder="NOMBRE DE LA EMBARCACIÓN" name="cantidad_tripulantes" required />
                            <label for="floatingNombreEmbarcacion">CANTIDAD TRIPULANTES</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-2">
                            <input type="number" class="form-control cant-pasajero" id="floatinMatricula"
                                placeholder="CANTIDAD PASAJEROS" name="cantidad_pasajeros" name="cantidad_pasajeros"
                                required />
                            <label for="floatinMatricula">CANTIDAD PASAJEROS</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-2">
                            <select name="tiempo_estadia" id="" class="form-select" required>
                                <option value="">- Seleccione -</option>
                                <option value="PERMANENCIA">PERMANENCIA</option>
                                <option value="TEMPORAL">TEMPORAL</option>
                            </select>
                            <label for="floatinMatricula">TIEMPO DE ESTADIA</label>
                        </div>
                    </div>
                </div>
                {{-- componente tripulantes --}}
                <div class="row">
                    @livewire('tripulantes-post')
                </div>
                <div class="row">
                    @livewire('pasajeros-post')
                </div>
            </div>
            <div class="card-footer">
                <div class="float-end">
                    <a href="{{ route('movimientos.despachos.index') }}"
                        class="inline-flex items-center px-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1">Atras</a>
                    <button type="submit"
                        class="inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25 send"><i
                            class="mdi mdi-send mr-2"></i> Enviar</button>
                </div>
            </div>
        </div>
        <input type="hidden" name="mov" value="{{ empty($ultimo_mov) ? 1 : $ultimo_mov->id + 1 }}">
        <input type="hidden" name="user" value="{{ auth()->user()->id }}">
    </form>
</div>
