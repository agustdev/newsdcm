<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>DOCUMENTO ETICKET {{ $salida->nombre }}, {{ $salida->vcode }}</title>
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
            <strong>COMANDO NAVAL DE CAPITANIAS DE PUERTOS Y AUTORIDAD MARITIMA</strong><br><br>
            <strong>SISTEMA DIGITAL DE CONTROL MARITIMO, ARD</strong><br>
            <strong>(SDCM)</strong>
        </div><br>
        <strong>SALIDA INTERNACIONAL</strong><br>
        <strong>E-TICKET</strong>
    </div>
    <div class="qr">
        <img src="data:image/svg+xml;base64,{{ base64_encode(QrCode::size(300)->generate(route('verificacion.solicitud', $salida))) }}"
            width="500">
        <p>
            <strong>CODIGO: {{ $salida->vcode }}</strong>
        </p>
    </div>
    <div class="informacion">

        EMBARCACION: {{ $salida->nombre }}<br>
        MATRICULA: {{ $salida->matricula }}<br>
        NUMERO CASCO: {{ $salida->numero_casco }}<br>
        COLOR: {{ $salida->color }}<br>
        PAIS: {{ $entrada->capitan->lugar_salida }}<br>
        PUERTO LLEGADA: {{ $entrada->capitan->lugar_destino }}
    </div>
</body>

</html>