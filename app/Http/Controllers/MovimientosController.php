<?php

namespace App\Http\Controllers;

use App\Models\Movimientos;
use Illuminate\Http\Request;

class MovimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function generate_pdf(Request $request, Movimientos $movimiento)
    {
        // $curl = curl_init();
        // $data = $movimiento->with(['conductor', 'vehiculo'])->where('id', $movimiento->id)->first();
        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => 'https://armada.mide.gob.do/api/ControlMaritimoCertification/despachoV2/verify',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'POST',
        //     CURLOPT_POSTFIELDS => $data,
        //     CURLOPT_HTTPHEADER => array(
        //         'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1laWQiOiI1OTIiLCJ1bmlxdWVfbmFtZSI6InRlc3QiLCJyb2xlIjoiW3tcIk1vZHVsZUlkXCI6OCxcIlJvbGVOYW1lXCI6XCJtZW1iZXJfY29uc3VsdFwifV0iLCJlbWFpbCI6InByb2dyYW1hZG9yMi5kdGljQGFjYWRlbWlhbmF2YWwuZWR1LmRvIiwiaXNfYWRtaW5tYXN0ZXIiOiJmYWxzZSIsImlzX21pbGl0YXIiOiJ0cnVlIiwibmJmIjoxNjgyMTIzMzQ2LCJleHAiOjE2ODIxMjY5NDYsImlhdCI6MTY4MjEyMzM0NiwiaXNzIjoiYXJkLXdlYi1hcGktbG9jYWxob3N0IiwiYXVkIjoiYXJkLXdlYi1sb2NhbGhvc3QifQ.VjCmigN-LF6fJ3o1nrjJWkCRWqZkfUNH2HcCUJ5Avb8',
        //         'Content-Type: application/pdf'
        //     ),
        // ));
        // header('Content-type: application/pdf');
        // $response = curl_exec($curl);
        // curl_close($curl);
        // echo $response;
        $data = $movimiento->with(['conductor', 'vehiculo'])->where('id', $movimiento->id)->first();
        "'" . str_replace("[", "", $data) . "'";
        echo "'" . json_encode($data) . "'";
    }

    public function preview(Request $request, Movimientos $movimiento)
    {
        $data = $movimiento->with(['conductor', 'vehiculo'])->where('id', $movimiento->id)->first();
        // "'" . str_replace("[", "", $data) . "'";
        echo "'" . json_encode($data) . "'";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Movimientos $movimientos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movimientos $movimientos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movimientos $movimientos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movimientos $movimientos)
    {
        //
    }
}
