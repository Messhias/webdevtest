@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Cães</div>

                <div class="panel-body">
                    @if( Session::has( 'AddMessage' ) )
                        <div class="alert bg-green alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            {{ Session::get('AddMessage') }}
                        </div>
                    @endif

                    @if( Session::has( 'ErrorMessage' ) )
                        <div class="alert bg-pink alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            {{ Session::get('ErrorMessage') }}
                        </div>
                    @endif

                    <div class='col-12'>
                        <a 
                            href='{{ url( 'adicionar-cao' ) }}'
                            class='btn btn-primary'
                        >
                            Adicionar
                        </a>
                    </div>

                    <table class="table table-bordered table-striped table-hover" id ='dogs-table'>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Data de criação</th>
                                <th>Ações</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>Data de criação</th>
                                <th>Ações</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if ($dogs->count() < 1 )
                                <tr>
                                    <td colspan='3'>
                                        <center>
                                            NENHUM CÃO ADICIONADO
                                        </center>
                                    </td>
                                </tr>
                            @endif

                            @foreach($dogs->get() as $key => $dog)
                                <tr>
                                    <td>
                                        {{ $dog->name }}
                                    </td>
                                    <td>
                                        {{ date( 'd/m/Y H:m:s', strtotime(  $dog->created_at ) ) }}
                                    </td>
                                    <td>
                                        <a
                                            href=' {{ url( 'mostrar-cao/'. $dog->id) }} '
                                            class="btn btn-primary"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            data-info="{{$dog->id}},{{ $dog->name }}"
                                            title=""
                                            data-original-title="Editar {{ $dog->name }}"
                                        >
                                            Ver
                                        </a>
                                    </td>
                                    <td>
                                        <a
                                            href=' {{ url( 'editar-cao/'. $dog->id) }} '
                                            class="btn btn-info"
                                        >
                                        Editar
                                        </a>
                                    </td>
                                    <td>
                                        {{
                                            Form::open(
                                                [
                                                    'method'    =>  'DELETE',
                                                    'route'     =>  [ 'deletar-cao', $dog->id ]
                                                ]
                                            )
                                        }}
                                            <button 
                                                type="submit" 
                                                class="btn btn-danger"
                                            >
                                                Deletar
                                            </button>
                                        {{
                                            Form::close()
                                        }}
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    
                    {{--  {{ $dogs->links() }}  --}}
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection