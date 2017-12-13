@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Painel</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>
                        Módulos:
                    </p>
                    
                    <ul>
                        <li> <a href='{{ url( 'caes' ) }}'>Cães</a> </li>                        
                    </ul>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
