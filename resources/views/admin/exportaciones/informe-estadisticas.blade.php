@php
use App\Exports\EstadisticasExpoert;
@endphp
<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>
<table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th colspan="8"
                style="padding: 10px; text-transform: uppercase; background-color: #2F74B7; color: #FFFFFF; text-align: center;">
                <strong>DISTRIBUCIÓN DE SOLICITUDES PARA CADA
                    CAPITANÍA DE PUERTO</strong>
            </th>
        </tr>
        <tr>
            <th colspan="1" rowspan="1" style="padding: 10px; text-transform: uppercase;word-wrap:break-word">
                <strong>ULTIMA ACTUALIZACIÓN: </strong><br>
                {{ date('Y-m-d H:i:s') }}
            </th>
            <th valign="middle" colspan="7"
                style="background-color: #9BC1E6; text-align: center; vertical-align: middle;">
                <strong>TIPO DE MOVIMIENTO</strong>
            </th>
        </tr>
        <tr>
            <td style="font-weight: bold; background-color: #9BC1E6; padding: 10px; text-align: center; vertical-align: middle;"
                align="center" valign="middle">
                CAPITANIA DE PUERTO
            </td>
            <th style="padding: 15px; background-color: #DCEBF6; text-align: center;"><strong>DESPACHO</strong>
            </th>
            <th style="padding: 15px; background-color: #DCEBF6; text-align: center;"><strong>CONDUCE</strong>
            </th>
            <th style="padding: 15px; background-color: #DCEBF6; text-align: center;"><strong>ENTRADA</strong>
            </th>
            <th style="padding: 10px; background-color: #DCEBF6; text-align: center;"><strong>ENTRADA
                    TURISTICA</strong>
            </th>
            <th style="padding: 15px; background-color: #DCEBF6; text-align: center;"><strong>APROBADAS</strong>
            </th>
            <th style="padding: 15px; background-color: #DCEBF6; text-align: center;"><strong>RECHAZADAS</strong>
            </th>
            <th style="padding: 10px; background-color: #DCEBF6; text-align: center;"><strong>SIN
                    RESPUESTA</strong>
            </th>
        </tr>
    </thead>
    <tr>
        <td style="padding:
            5px; background-color: #DDEBF6; text-align: center; text-transform: uppercase;">
            Azua</td>
        <td style="text-align: center;">{{ number_format($Azua->Despacho) }}</td>
        <td style="text-align: center;">{{ number_format($Azua->Conduce) }}</td>
        <td style="text-align: center;">{{ number_format($ETAzua->Entrada) }}</td>
        <td style="text-align: center;">{{ number_format($ETAzua->EntradaTuristica) }}</td>
        <td style="text-align: center;">{{ number_format($Azua->Aprobadas + $ETAzua->Aprobadas) }}</td>
        <td style="text-align: center;">{{ number_format($Azua->Rechazadas + $ETAzua->Rechazadas) }}</td>
        <td style="text-align: center;">{{ number_format($Azua->SinRespuesta + $ETAzua->SinRespuesta) }}</td>
    </tr>
    <tr>
        <td style="padding: 5px; background-color: #DDEBF6; text-align: center; text-transform: uppercase;">
            Barahona</td>
        <td style="text-align: center;">{{ number_format($Barahona->Despacho) }}</td>
        <td style="text-align: center;">{{ number_format($Barahona->Conduce) }}</td>
        <td style="text-align: center;">{{ number_format($ETBarahona->Entrada) }}</td>
        <td style="text-align: center;">{{ number_format($ETBarahona->EntradaTuristica) }}</td>
        <td style="text-align: center;">{{ number_format($Barahona->Aprobadas + $ETBarahona->Aprobadas) }}</td>
        <td style="text-align: center;">{{ number_format($Barahona->Rechazadas + $ETBarahona->Rechazadas) }}</td>
        <td style="text-align: center;">{{ number_format($Barahona->SinRespuesta + $ETBarahona->SinRespuesta) }}</td>

    </tr>
    <tr>
        <td style="padding: 5px; background-color: #DDEBF6; text-align: center; text-transform: uppercase;">
            Boca Chica</td>
        <td style="text-align: center;">{{ number_format($Boca_Chica->Despacho) }}</td>
        <td style="text-align: center;">{{ number_format($Boca_Chica->Conduce) }}</td>
        <td style="text-align: center;">{{ number_format($ETBoca_Chica->Entrada) }}</td>
        <td style="text-align: center;">{{ number_format($ETBoca_Chica->EntradaTuristica) }}</td>
        <td style="text-align: center;">{{ number_format($Boca_Chica->Aprobadas + $ETBoca_Chica->Aprobadas) }}</td>
        <td style="text-align: center;">{{ number_format($Boca_Chica->Rechazadas + $ETBoca_Chica->Rechazadas) }}</td>
        <td style="text-align: center;">{{ number_format($Boca_Chica->SinRespuesta + $ETBoca_Chica->SinRespuesta) }}
        </td>

    </tr>
    <tr>
        <td style="padding: 5px; background-color: #DDEBF6; text-align: center; text-transform: uppercase;">
            Cabo Rojo</td>
        <td style="text-align: center;">{{ number_format($Cabo_Rojo->Despacho) }}</td>
        <td style="text-align: center;">{{ number_format($Cabo_Rojo->Conduce) }}</td>
        <td style="text-align: center;">{{ number_format($ETCabo_Rojo->Entrada) }}</td>
        <td style="text-align: center;">{{ number_format($ETCabo_Rojo->EntradaTuristica) }}</td>
        <td style="text-align: center;">{{ number_format($Cabo_Rojo->Aprobadas + $ETCabo_Rojo->Aprobadas) }}</td>
        <td style="text-align: center;">{{ number_format($Cabo_Rojo->Rechazadas + $ETCabo_Rojo->Rechazadas) }}</td>
        <td style="text-align: center;">{{ number_format($Cabo_Rojo->SinRespuesta + $ETCabo_Rojo->SinRespuesta) }}</td>

    </tr>
    <tr>
        <td style="padding: 5px; background-color: #DDEBF6; text-align: center; text-transform: uppercase;">
            Haina</td>
        <td style="text-align: center;">{{ number_format($Haina->Despacho) }}</td>
        <td style="text-align: center;">{{ number_format($Haina->Conduce) }}</td>
        <td style="text-align: center;">{{ number_format($ETHaina->Entrada) }}</td>
        <td style="text-align: center;">{{ number_format($ETHaina->EntradaTuristica) }}</td>
        <td style="text-align: center;">{{ number_format($Haina->Aprobadas + $ETHaina->Aprobadas) }}</td>
        <td style="text-align: center;">{{ number_format($Haina->Rechazadas + $ETHaina->Rechazadas) }}</td>
        <td style="text-align: center;">{{ number_format($Haina->SinRespuesta + $ETHaina->SinRespuesta) }}</td>

    </tr>
    <tr>
        <td style="padding: 5px; background-color: #DDEBF6; text-align: center; text-transform: uppercase;">
            Manzanillo</td>
        <td style="text-align: center;">{{ number_format($Manzanillo->Despacho) }}</td>
        <td style="text-align: center;">{{ number_format($Manzanillo->Conduce) }}</td>
        <td style="text-align: center;">{{ number_format($ETManzanillo->Entrada) }}</td>
        <td style="text-align: center;">{{ number_format($ETManzanillo->EntradaTuristica) }}</td>
        <td style="text-align: center;">{{ number_format($Manzanillo->Aprobadas + $ETManzanillo->Aprobadas) }}</td>
        <td style="text-align: center;">{{ number_format($Manzanillo->Rechazadas + $ETManzanillo->Rechazadas) }}</td>
        <td style="text-align: center;">{{ number_format($Manzanillo->SinRespuesta + $ETManzanillo->SinRespuesta) }}
        </td>

    </tr>
    <tr>
        <td style="padding: 5px; background-color: #DDEBF6; text-align: center; text-transform: uppercase;">
            Puerto Plata</td>
        <td style="text-align: center;">{{ number_format($PuertoPlata->Despacho) }}</td>
        <td style="text-align: center;">{{ number_format($PuertoPlata->Conduce) }}</td>
        <td style="text-align: center;">{{ number_format($ETPuertoPlata->Entrada) }}</td>
        <td style="text-align: center;">{{ number_format($ETPuertoPlata->EntradaTuristica) }}</td>
        <td style="text-align: center;">{{ number_format($PuertoPlata->Aprobadas + $ETPuertoPlata->Aprobadas) }}</td>
        <td style="text-align: center;">{{ number_format($PuertoPlata->Rechazadas + $ETPuertoPlata->Rechazadas) }}</td>
        <td style="text-align: center;">{{ number_format($PuertoPlata->SinRespuesta + $ETPuertoPlata->SinRespuesta) }}
        </td>
    </tr>
    <tr>
        <td style="padding: 5px; background-color: #DDEBF6; text-align: center; text-transform: uppercase;">
            Romana</td>
        <td style="text-align: center;">{{ number_format($Romana->Despacho) }}</td>
        <td style="text-align: center;">{{ number_format($Romana->Conduce) }}</td>
        <td style="text-align: center;">{{ number_format($ETRomana->Entrada) }}</td>
        <td style="text-align: center;">{{ number_format($ETRomana->EntradaTuristica) }}</td>
        <td style="text-align: center;">{{ number_format($Romana->Aprobadas + $ETRomana->Aprobadas) }}</td>
        <td style="text-align: center;">{{ number_format($Romana->Rechazadas + $ETRomana->Rechazadas) }}</td>
        <td style="text-align: center;">{{ number_format($Romana->SinRespuesta + $ETRomana->SinRespuesta) }}
        </td>

    </tr>
    <tr>
        <td style="padding: 5px; background-color: #DDEBF6; text-align: center; text-transform: uppercase;">
            Samaná</td>
        <td style="text-align: center;">{{ number_format($Samana->Despacho) }}</td>
        <td style="text-align: center;">{{ number_format($Samana->Conduce) }}</td>
        <td style="text-align: center;">{{ number_format($ETSamana->Entrada) }}</td>
        <td style="text-align: center;">{{ number_format($ETSamana->EntradaTuristica) }}</td>
        <td style="text-align: center;">{{ number_format($Samana->Aprobadas + $ETSamana->Aprobadas) }}</td>
        <td style="text-align: center;">{{ number_format($Samana->Rechazadas + $ETSamana->Rechazadas) }}</td>
        <td style="text-align: center;">{{ number_format($Samana->SinRespuesta + $ETSamana->SinRespuesta) }}
        </td>
    </tr>
    <tr>
        <td style="padding: 5px; background-color: #DDEBF6; text-align: center; text-transform: uppercase;">
            San Pedro de Macoris</td>
        <td style="text-align: center;">{{ number_format($SPM->Despacho) }}</td>
        <td style="text-align: center;">{{ number_format($SPM->Conduce) }}</td>
        <td style="text-align: center;">{{ number_format($ETSPM->Entrada) }}</td>
        <td style="text-align: center;">{{ number_format($ETSPM->EntradaTuristica) }}</td>
        <td style="text-align: center;">{{ number_format($SPM->Aprobadas + $ETSPM->Aprobadas) }}</td>
        <td style="text-align: center;">{{ number_format($SPM->Rechazadas + $ETSPM->Rechazadas) }}</td>
        <td style="text-align: center;">{{ number_format($SPM->SinRespuesta + $ETSPM->SinRespuesta) }}
        </td>
    </tr>
    <tr>
        <td style="padding: 5px; background-color: #DDEBF6; text-align: center; text-transform: uppercase;">
            Santo Domingo</td>
        <td style="text-align: center;">{{ number_format($STODGO->Despacho) }}</td>
        <td style="text-align: center;">{{ number_format($STODGO->Conduce) }}</td>
        <td style="text-align: center;">{{ number_format($ETSTODGO->Entrada) }}</td>
        <td style="text-align: center;">{{ number_format($ETSTODGO->EntradaTuristica) }}</td>
        <td style="text-align: center;">{{ number_format($STODGO->Aprobadas + $ETSTODGO->Aprobadas) }}</td>
        <td style="text-align: center;">{{ number_format($STODGO->Rechazadas + $ETSTODGO->Rechazadas) }}</td>
        <td style="text-align: center;">{{ number_format($STODGO->SinRespuesta + $ETSTODGO->SinRespuesta) }}
        </td>
    </tr>
    <tr>
        <td style="padding: 5px; background-color: #DDEBF6; text-align: center; text-transform: uppercase;">
            Multimodal Caucedo</td>
        <td style="text-align: center;">{{ number_format($MC->Despacho) }}</td>
        <td style="text-align: center;">{{ number_format($MC->Conduce) }}</td>
        <td style="text-align: center;">{{ number_format($ETMC->Entrada) }}</td>
        <td style="text-align: center;">{{ number_format($ETMC->EntradaTuristica) }}</td>
        <td style="text-align: center;">{{ number_format($MC->Aprobadas + $ETMC->Aprobadas) }}</td>
        <td style="text-align: center;">{{ number_format($MC->Rechazadas + $ETMC->Rechazadas) }}</td>
        <td style="text-align: center;">{{ number_format($MC->SinRespuesta + $ETMC->SinRespuesta) }}
        </td>
    </tr>
    <tr>
        <td colspan="1" style="background-color: #C55813; text-align: center; color: #FFFFFF;">
            <strong>TOTALES GENERALES:</strong>
        </td>
        <td style="background-color: #C55813; text-align: center; color: #FFFFFF;">
            {{ number_format($totalDespachos) }}</td>
        <td style="background-color: #C55813; text-align: center; color: #FFFFFF;">{{ number_format($totalConduces) }}
        </td>
        <td style="background-color: #C55813; text-align: center; color: #FFFFFF;">{{ number_format($totalEntradas) }}
        </td>
        <td style="background-color: #C55813; text-align: center; color: #FFFFFF;">
            {{ number_format($totalEntradasTuristicas) }}</td>
        <td style="background-color: #C55813; text-align: center; color: #FFFFFF;">
            {{ number_format($totalAprobadas) }}</td>
        <td style="background-color: #C55813; text-align: center; color: #FFFFFF;">
            {{ number_format($totalRechazadas) }}</td>
        <td style="background-color: #C55813; text-align: center; color: #FFFFFF;">
            {{ number_format($totalSinRespuesta) }}</td>
    </tr>
    <tr>
        <td colspan="8" style="background-color: #1441A4; padding:5px; color: #FFFFFF; text-align:  center;">
            <strong>RESUMEN</strong>
        </td>
    </tr>
    <tr>
        <td colspan="1" style="background-color: #3A3839; padding:5px; color: #FFFFFF; text-align:  center;">
            <strong>TOTAL DE SOLICIUDES
                POR OPERADORES:
            </strong>
        </td>
        <td colspan="7" style="background-color: #3A3839; color: #FFFFFF; text-align:  center;">
            {{ number_format($totalOperadores) }}
        </td>
    </tr>
    <tr>
        <td colspan="1" style="background-color: #C00001; padding:5px; color: #FFFFFF; text-align:  center;">
            <strong>TOTAL DE SOLICIUDES
                POR REMOTAS:
            </strong>
        </td>
        <td colspan="7" style="background-color: #C00001; color: #FFFFFF; text-align:  center;">
            {{ number_format($totalRemotas) }}</td>
    </tr>
    <tr>
        <td colspan="1" style="background-color: #2F74B7; padding:5px; color: #FFFFFF; text-align:  center;">
            <strong>TOTAL DE SOLICIUDES:
            </strong>
        </td>
        <td colspan="7" style="background-color: #2F74B7; color: #FFFFFF; text-align:  center;">
            {{ $totalSolicitudes }}</td>
    </tr>
</table>
<br>
<table border="0" cellspacing="0" cellpadding="0">

</table>
