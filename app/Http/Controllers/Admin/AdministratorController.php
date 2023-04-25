<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Administrator;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministratorController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function guard()
    {
        Auth::guard('admin');
    }
    public function login()
    {
        return "esto sera la vista para los admins";
    }
    public function index()
    {
        //
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
    public function show(Administrator $administrator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Administrator $administrator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Administrator $administrator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Administrator $administrator)
    {
        //
    }
}
