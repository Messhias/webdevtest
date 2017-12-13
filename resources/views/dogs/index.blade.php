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

                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Data de criação</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>Data de criação</th>
                                <th>Ações</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if ($dogs->count() < 1 )
                                <tr>
                                    <td colspan='5'>
                                        <center>
                                            NENHUM CÃO ADICIONADO
                                        </center>
                                    </td>
                                </tr>
                            @endif

                            @foreach($dogs as $key => $dog)
                                <tr>
                                    <td>
                                        {{ $dog->name }}
                                    </td>
                                    <td>
                                        {{ date( 'd/m/Y H:m:s', strtotime(  $dog->created_at ) ) }}
                                    </td>
                                    <td class='align-center'>
                                        <div class='col-md-2 col-lg-2'>
                                            <a
                                                href=' {{ url( 'editar-cao/'. $dog->id) }} '
                                                class="btn btn-info btn-circle waves-effect waves-circle waves-float pull-right"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title=""
                                                data-original-title="Editar {{ $dog->name }}"
                                            >
                                            Editar
                                            </a>
                                        </div>
                                        <div class='col-md-2 col-lg-2'>
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
                                                    class="btn btn-danger btn-circle waves-effect waves-circle waves-float pull-right"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title=""
                                                    data-original-title="Deletar {{ $dog->name }}"
                                                >
                                                    Deletar
                                                </button>
                                            {{
                                                Form::close()
                                            }}
                                        </div>
                                    <td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    
                    {{ $dogs->links() }}
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection