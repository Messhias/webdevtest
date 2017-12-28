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
                            'enctype'   =>  "multipart/form-data",
                        ])
                    }}

                        <div class='form-group'>
                            <label for='name'>Nome do cão</label>
                            <input
                                type='text'
                                name='name'
                                id='name'
                                placeholder='Nome do cão (obrigatório)'
                                class='form-control'
                                required
                            />                            
                        </div>

                        <div class='form-group'>

                            {{
                                Form::label('cbkc',' Número de registro na CBKC (obrigatório)')
                            }}
                            {{
                                Form::text('cbkc','',[
                                    'class'=>'form-control',
                                    'placeholder'=>' Número de registro na CBKC (obrigatório)',
                                    'required',
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
                                    'placeholder'=>'Data de Nascimento do cão (obrigatório)',
                                    'required',
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
                                    'placeholder'=>'Sexo (obrigatório)',
                                    'required',
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
                                    'placeholder'=>' Nome do pai (obrigatório)',
                                    'required',
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
                                    'placeholder'=>'Nome da mãe (obrigatório)',
                                    'required',
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
                                    'placeholder'=>' Nome do proprietário (obrigatório)',
                                    'required',
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
                                    'placeholder'=>' Telefone do proprietário (obrigatório)',
                                    'required',
                                ])
                            }}
                        </div>


                        <div class='form-group'>
                            {{
                                Form::label('owner-email','Email do proprietário (obrigatório)')
                            }}
                            {{
                                Form::email('owner-email','',[
                                    'class'=>'form-control',
                                    'placeholder'=>'Email do proprietário (obrigatório)',
                                    'required',
                                ])
                            }}
                        </div>


                        <div class='form-group'>
                            {{
                                Form::label('certificate','Certificado (obrigatório)')
                            }}
                            {{
                                Form::file('certificate',[
                                    'class'=>'form-control',
                                    'placeholder'=>'Email do proprietário (obrigatório)',
                                    'required',
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
