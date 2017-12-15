@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Cães</div>

                <div class="panel-body">
                    
                    <div class='col-6'>
                        Nome do cão: {{ $dog->name }}
                    </div>
                    
                    <div class='col-6'>
                        CBKC: {{ $dog->CBKC }}
                    </div>
                    
                    <div class='col-6'>
                        Nascimento do cão: {{ date('d/m/Y' , strtotime( $dog->birthdate ) ) }}
                    </div>
                    
                    <div class='col-6'>
                        Sexo do cão: {{ $dog->gender }}
                    </div>
                    
                    <div class='col-6'>
                        Nome do pai: {{ $dog->fathername }}
                    </div>
                    
                    <div class='col-6'>
                        Nome da mae: {{ $dog->mothername }}
                    </div>
                    
                    <div class='col-6'>
                        Nome proprietário: {{ $dog->owner[0]->name }}
                    </div>
                    
                    <div class='col-6'>
                        Telefone proprietário: {{ $dog->owner[0]->main_phone }}
                    </div>
                    
                    <div class='col-6'>
                        E-mail do proprietário: {{$dog->owner[ 0 ]->email}}
                    </div>
                    
                    <div class='col-6'>
                        Certificado:
                        <img src='{{ asset('storage/'.$dog->certificate_file) }}' class='img-responsive'>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection