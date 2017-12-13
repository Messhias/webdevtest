@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Cães</div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong> A operação não foi efetuada devido aos 
                        seguintes erros:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="panel-body">

                    {{
                        Form::open([
                            'method'    =>  'POST',
                        ])
                    }}

                        <div class='form-group'>
                            {{
                                Form::label('name',' Nome do cão (obrigatório)')
                            }}
                            {{
                                Form::text('name','',[
                                    'class'=>'form-control',
                                    'placeholder'=>'Nome do cão (obrigatório)'
                                ])
                            }}
                            
                        </div>

                        <div class='form-group'>
                        
                            {{
                                Form::label('cbkc',' Número de registro na CBKC (obrigatório)')
                            }}
                            {{
                                Form::text('cbkc','',[
                                    'class'=>'form-control',
                                    'placeholder'=>' Número de registro na CBKC (obrigatório)'
                                ])
                            }}
                        </div>

                        <div class='form-group'>
                            {{
                                Form::label('birthdate','Data de Nascimento do cão (obrigatório)')
                            }}
                            {{
                                Form::text('birthdate','',[
                                    'class'=>'form-control',
                                    'placeholder'=>'Data de Nascimento do cão (obrigatório)'
                                ])
                            }}
                        </div>

                        <div class='form-group'>
                            {{
                                Form::label('gender','Sexo (obrigatório)')
                            }}
                            {{
                                Form::select('gender',['Macho'=>'Macho','Femêa'=>'Femêa'],'',[
                                    'class'=>'form-control',
                                    'placeholder'=>'Sexo (obrigatório)'
                                ])
                            }}
                        </div>

                        <div class='form-group'>
                            {{
                                Form::label('fathername',' Nome do pai (obrigatório)')
                            }}
                            {{
                                Form::text('fathername','',[
                                    'class'=>'form-control',
                                    'placeholder'=>' Nome do pai (obrigatório)'
                                ])
                            }}
                        </div>

                        
                        <div class='form-group'>
                            {{
                                Form::label('mothername','Nome da mãe (obrigatório)')
                            }}
                            {{
                                Form::text('mothername','',[
                                    'class'=>'form-control',
                                    'placeholder'=>'Nome da mãe (obrigatório)'
                                ])
                            }}
                        </div>

                        
                        <div class='form-group'>
                            {{
                                Form::label('ownername',' Nome do proprietário (obrigatório)')
                            }}
                            {{
                                Form::text('ownername','',[
                                    'class'=>'form-control',
                                    'placeholder'=>' Nome do proprietário (obrigatório)'
                                ])
                            }}
                        </div>

                        
                        <div class='form-group'>
                            {{
                                Form::label('ownerphone',' Telefone do proprietário (obrigatório)')
                            }}
                            {{
                                Form::text('ownerphone','',[
                                    'class'=>'form-control',
                                    'placeholder'=>' Telefone do proprietário (obrigatório)'
                                ])
                            }}
                        </div>

                        
                        <div class='form-group'>
                            {{
                                Form::label('onwer-email','Email do proprietário (obrigatório)')
                            }}
                            {{
                                Form::email('onwer-email','',[
                                    'class'=>'form-control',
                                    'placeholder'=>'Email do proprietário (obrigatório)'
                                ])
                            }}
                        </div>

                        
                        <div class='form-group'>
                            {{
                                Form::submit('Cadastrar cão',[
                                    'class' =>  'btn btn-success',
                                ])
                            }}
                            <a href='{{ url( 'caes' ) }}' class='btn btn-danger'>
                                cancelar
                            </a>
                        </div>

                    {{
                        Form::close()
                    }}
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection