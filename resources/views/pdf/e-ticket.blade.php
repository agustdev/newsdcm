<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>DOCUMENTO E-CLEREANCE {{ $entrada->nombre }}, {{ $entrada->vcode }}</title>
        <style>
            @page {
                size: 14cm 20cm;
                margin: 30px 0px 0px 0px !important;
                padding: 0px 0px 0px 0px !important;
            }

            body,
            header,
            footer {
                margin: 0px 0px 0px 0px !important;
                padding: 0px 0px 0px 0px !important;
                font-family: 'Californian FB';
            }

            .qr {
                text-align: center;
                margin-top: 25px;
            }

            .informacion {
                text-align: center;
            }
        </style>
    </head>

    <body>
        <div class="informacion">
            <div>
                <img src="{{ asset('images/logo-ard-new.png') }}" alt="" width="250"><br>
                <strong>REPÚBLICA DOMINICANA</strong><br>
                <strong style="font-size: 40PX;">"COMANDO NAVAL DE CAPITANIAS DE PUERTOS Y AUTORIDAD
                    MARITIMA"</strong><br>
                <div style="font-size: 45px;">ARMADA DE REPÚBLICA DOMINICANA</div><br>
                <strong style="font-size: 45px;">SISTEMA CONDUCE Y DESPACHO DE EMBARCACIONES</strong><br>
                <strong>(DESPACHORD)</strong>
            </div>
            @if ($entrada->tipo_movimiento == 'S')
                <strong>SALIDA INTERNACIONAL</strong><br>
            @else
                <strong>ENTRADA INTERNACIONAL</strong><br>
            @endif
            <strong>E-CLEARANCE</strong>
        </div>
        <div class="qr">
            <img src="data:image/svg+xml;base64,{{ base64_encode(QrCode::size(300)->generate(route('verificacion.solicitud.internacional', $entrada))) }}"
                width="300">
            <p>
                <strong>CODIGO: {{ $entrada->vcode }}</strong>
            </p>
        </div>
        <div class="informacion">
            EMBARCACION: {{ $entrada->nombre }}<br>
            MATRICULA: {{ $entrada->matricula }}<br>
            NUMERO CASCO: {{ $entrada->numero_casco }}<br>
            COLOR: {{ $entrada->color }}<br>
            @if ($entrada->tipo_movimiento == 'S')
                PAIS DESTINO: {{ $entrada->capitan_internacional->pais_procedencia }}<br>
            @else
                PAIS PROCEDENCIA: {{ $entrada->capitan_internacional->pais_procedencia }}<br>
            @endif
            CAPITAN: {{ $entrada->capitan_internacional->nombre }}<br>
            @if ($entrada->capitan_internacional->tipo_documento == 'Pasaporte')
                NUMERO DE PASAPORTE: {{ $entrada->capitan_internacional->documento }}<br>
            @else
                NUMERO DE CEDULA: {{ $entrada->capitan_internacional->documento }}<br>
            @endif
            NUMERO DE TELEFONO: {{ $entrada->capitan_internacional->telefono }}<br>
            FECHA DE LLEGADA: {{ $entrada->fecha->format('d-m-Y') }}<br>
            PUERTO LLEGADA: {{ $entrada->capitan_internacional->lugar_destino }}<br>
            @if ($entrada->tipo_movimiento == 'S')
                PAIS DE SALIDA: REPUBLICA DOMINICANA
            @else
                PAIS DESTINO: REPUBLICA DOMINICANA
            @endif

        </div>
    </body>

</html>
