@extends('layouts.master')

@section('title', 'ANNEXES (Arsenal juridique règlementant la pêche maritimes)')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>ANNEXES (Arsenal juridique règlementant la pêche maritimes)</h1>
                <div class="text-zero top-right-button-container">
                    <button type="button" class="btn btn-lg btn-primary dropdown-toggle dropdown-toggle-split top-right-button top-right-button-single" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ACTIONS
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Action</a>
                    </div>
                </div>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Tableau de board</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Annexes</li>
                    </ol>
                </nav>
                <div class="separator mb-4"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-right">
                <div class="row mb-3">
                    <div class="card w-100">
                        <form action="{{ route('rules.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <h5>Partie juridique</h5>
                                <div class="separator mb-4"></div>
                                <table class="table table-striped table-bordered ">
                                    <tr>
                                        <th width="20%" style="color: orange">Cas en question</th>
                                        @foreach ($studyCaseElements as $element)
                                            <th>{{ $element->name }}</th>
                                        @endforeach
                                    </tr>
                                    @foreach ($studyCases as $case)
                                        <tr>
                                            <td>
                                                <b>{{ $case->name }}</b>
                                            </td>
                                            @foreach ($studyCaseElements as $element)
                                                <td>
                                                    <textarea name="content[{{ $case->id }}][{{ $element->id }}]" class="form-control" cols="30" rows="3">{{ optional($element->getContentBySudyCaseId($case->id))->content}}</textarea>
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </table>
                                
                                <div class="mt-4"></div>
                                <button type="submit" class="float-right btn btn-primary mb-4">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection