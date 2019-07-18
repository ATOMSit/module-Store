@extends('application.layouts.app')

@section('title')
    Modification d'un utilisateur
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.setting.website.edit') }}
@endsection

@push('styles')

@endpush

@push('scripts')

@endpush

@section('content')
    {!! form_start($form_store) !!}
    <div class="row">
        <div class="col-md-6">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Ajouter un lieu
                            <small>declarer les informations concernant votre boutique</small>
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-6">
                            {!! form_row($form_store->name,$options=['label'=>'Intitulé :','description'=>"Le nom de votre lieux"]) !!}
                        </div>
                        <div class="col-6">
                            {!! form_row($form_store->domain,$options=['label'=>"Secteur d'activitée :",'description'=>"Présisez votre secteur d'activitée"]) !!}
                        </div>
                    </div>
                    {!! form_row($form_store->description,$options=['label'=>"Description de votre boutique :"]) !!}
                    {!! form_row($form_store->web_site,$options=['label'=>"Indiquer un site internet :",'description'=>"Présisez un site internet afin d'améliorer votre référencement"]) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Ajouter une adresse
                            <small>donner les informations concernant l'adresse de votre boutique</small>
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    {!! form_row($form_store->address) !!}
                </div>
            </div>
        </div>
    </div>
    {!! form_end($form_store,true) !!}
@endsection