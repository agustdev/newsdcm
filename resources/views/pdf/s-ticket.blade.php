<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>DOCUMENTO E-CLEREANCE {{ $salida->nombre }}, {{ $salida->vcode }}</title>
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
            <strong>SALIDA INTERNACIONAL</strong><br>
            <strong>E-CLEARANCE</strong>
        </div>
        <div class="qr">
            <img src="data:image/svg+xml;base64,{{ base64_encode(QrCode::size(300)->generate(route('verificacion.solicitud.internacional', $salida))) }}"
                width="300">
            <p>
                <strong>CODIGO: {{ $salida->vcode }}</strong>
            </p>
        </div>
        <div class="informacion">
            EMBARCACION: {{ $salida->nombre }}<br>
            MATRICULA: {{ $salida->matricula }}<br>
            NUMERO CASCO: {{ $salida->numero_casco }}<br>
            COLOR: {{ $salida->color }}<br>
            PAIS DE PROCEDENCIA: {{ $salida->capitan_internacional->pais_procedencia }}<br>
            CAPITAN: {{ $salida->capitan_internacional->nombre }}<br>
            @if ($salida->capitan_internacional->tipo_documento == 'Pasaporte')
                NUMERO DE PASAPORTE: {{ $salida->capitan_internacional->documento }}<br>
            @else
                NUMERO DE CEDULA: {{ $salida->capitan_internacional->documento }}<br>
            @endif
            NUMERO DE TELEFONO: {{ $salida->capitan_internacional->telefono }}<br>
            FECHA DE LLEGADA: {{ $salida->fecha->format('d-m-Y') }}<br>
            PUERTO LLEGADA: {{ $salida->capitan_internacional->lugar_destino }}<br>
            PAIS DESTINO: REPUBLICA DOMINICANA
        </div>
    </body>

</html>
