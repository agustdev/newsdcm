<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>DOCUMENTO E-CLEREANCE {{ $entrada->nombre }}, {{ $entrada->vcode }}</title>
        <style>
            @page {
                size: 10cm 17cm;
                /* margin: 0px 0px 0px 0px !important; */
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
                <strong>ARMADA DE REPÚBLICA DOMINICANA</strong><br><br>
                <strong>COMANDO NAVAL DE CAPITANIAS DE PUERTOS Y AUTORIDAD MARITIMA</strong><br><br>
                <strong>SISTEMA CONDUCE Y DESPACHO DE EMBARCACIONES</strong><br>
                <strong>(DESPACHORD)</strong>
            </div><br>
            <strong>ENTRADA INTERNACIONAL</strong><br>
            <strong>E-CLEREANCE</strong>
        </div>
        <div class="qr">
            <img src="data:image/svg+xml;base64,{{ base64_encode(QrCode::size(300)->generate(route('verificacion.solicitud', $entrada))) }}"
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
            PAIS DE PROCEDENCIA: {{ $entrada->capitan_internacional->pais_procedencia }}<br>
            PUERTO LLEGADA: {{ $entrada->capitan_internacional->lugar_destino }}
            PAIS DESTINO: REPUBLICA DOMINICANA<br>
            PUERTO DE LLEGADA: {{ $entrada->capitan_internacional->lugar_destino }}<br>
        </div>
    </body>

</html>
