<?php

namespace App\Exports;

use App\Models\Movimientos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class EstadisticasExport implements FromView, WithTitle, WithEvents, ShouldAutoSize
{
    use RegistersEventListeners;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        // Movimientos Conduce y Despachos de Azua
        // $Azua = Movimientos::selectRaw("SUM(CASE WHEN tipo_movimiento = 'D' THEN 1 ELSE 0 END) Despacho,  
        //  SUM(CASE WHEN tipo_movimiento = 'C' THEN 1 ELSE 0 END) Conduce, SUM(CASE WHEN id_estatus_solicitud = 5 THEN 1 ELSE 0 END) Aprobadas, SUM(CASE WHEN id_estatus_solicitud = 4 THEN 1 ELSE 0 END) Rechazadas,SUM(CASE WHEN id_estatus_solicitud = 1 THEN 1 ELSE 0 END) SinRespuesta")
        //     ->where('puerto_control_salida', 'Azua')
        //     ->whereIn('tipo_movimiento', ['C', 'D'])
        //     ->whereNotIn('usr_creacion',  [6, 7])
        //     ->orWhere('usr_creacion', '')
        //     ->first();

        $comandancias = ['Azua', 'Barahona',  'Boca_Chica',  'Cabo_Rojo',  'Haina',  'Manzanillo', 'PuertoPlata',  'Romana',  'Samana',  'SPM',  'STODGO',  'MC', 'totalDespachos', 'totalConduces',  'totalRechazadas', 'totalAprobadas', 'totalSinRespuesta', 'totalRemotas', 'totalOperadores', 'totalSolicitudes'];
        return view('admin.exportaciones.informe-estadisticas', compact($comandancias));
    }

    public function title(): string
    {
        return 'Informe estadistico por cdp';
    }
}
