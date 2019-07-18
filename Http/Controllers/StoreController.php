<?php

namespace Modules\Store\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Kris\LaravelFormBuilder\FormBuilder;
use Modules\Store\Entities\Address;
use Modules\Store\Entities\Store;
use Modules\Store\Forms\AddressForm;
use Modules\Store\Forms\StoreForm;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(FormBuilder $formBuilder)
    {
        $formOptions = [
            'method' => 'POST',
            'url' => route('store.admin.address.store'),
        ];
        $form = $formBuilder->create(StoreForm::class, $formOptions);
        return view('store::index')
            ->with("form_store", $form);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('store::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $address = new Address([
            'country_code' => 'FR',
            'street' => $request->get("address")['street'],
            'state' => 'FRANCE',
            'city' => $request->get("address")['city'],
            'postal_code' => $request->get("address")['postal_code'],
            'latitude' => $request->get("address")['latitude'],
            'longitude' => $request->get("address")['longitude'],
        ]);
        $address->save();
        $store = new Store([
            'name' => $request->get('name'),
            'domain' => $request->get('domain'),
            'description' => $request->get('description'),
            'web_site' => $request->get('web_site'),
        ]);
        $address->store()->save($store);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('store::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(FormBuilder $formBuilder, int $id)
    {
        $store = Store::query()->findOrFail($id);
        $formOptions = [
            'method' => 'PUT',
            'url' => route('store.admin.address.update', ['id' => $store->id]),
            'model' => $store
        ];
        $form = $formBuilder->create(StoreForm::class, $formOptions);
        return view('store::index')
            ->with("form_store", $form);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, int $id)
    {
        $store = Store::query()->findOrFail($id);
        $address = $store->address;
        $store->update([
            'name' => $request->get('name'),
            'domain' => $request->get('domain'),
            'description' => $request->get('description'),
            'web_site' => $request->get('web_site'),
        ]);
        $address->update([
            'country_code' => 'FR',
            'street' => $request->get("address")['street'],
            'state' => 'FRANCE',
            'city' => $request->get("address")['city'],
            'postal_code' => $request->get("address")['postal_code'],
            'latitude' => $request->get("address")['latitude'],
            'longitude' => $request->get("address")['longitude'],
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
