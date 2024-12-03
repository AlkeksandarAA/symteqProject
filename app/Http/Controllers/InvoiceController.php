<?php

namespace App\Http\Controllers;


use App\Http\Requests\InvoiceRequest;
use App\Invoice;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Resources\InvoicesResource;
use App\Resources\InvoiceResource;


class InvoiceController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::query()->orderBy("invoice_number", "desc")->paginate(10);

        return response()->json(new InvoicesResource($invoices));
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
    public function store(InvoiceRequest $request)
    {
        $validateData = $request->validated();

        $invoice = Invoice::create($validateData);

        return response()->json(new InvoiceResource($invoice));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = Invoice::findOrFail($id);

        return response()->json(new InvoiceResource($invoice));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InvoiceRequest $request, string $id)
    {
        $validateData = $request->validated();

        $invoice = Invoice::findOrFail($id);

        $invoice->update($validateData);

        $invoice->save();

        return response()->json(new InvoiceResource($invoice));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $invoice = Invoice::findorFail($id);
        $invoice->delete();

        return response()->json();
    }

    public function search(Request $request)
    {

        $searchResult = Invoice::where("invoice_number", "LIKE", "%" . $request->search . "%")->orderBy('invoice_number', 'desc')->paginate(10);

        return response()->json(new InvoiceResource($searchResult));

    }
}
