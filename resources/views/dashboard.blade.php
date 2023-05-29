@extends('layouts.app')

@section('content')
<div class="container">
    <div class="accordion" id="accordionPanels">
        @can('create mail')
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Create Mail
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <x-forms.create-mail />
                    </div>
                </div>
            </div>
        @endcan
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    List of Mail
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    <x-tables.list-mail />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
