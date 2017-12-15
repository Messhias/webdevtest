@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Editar {{ $dog->name }}</div>
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
                            'method'    =>  'PUT',
                            'enctype'   =>  "multipart/form-data",
                        ])
                    }}

                        {{
                            Form::hidden('owner-id',$dog->owner[ 0 ]->id)
                        }}

                        <div class='form-group'>
                            {{
                                Form::label('name',' Nome do cão (obrigatório)')
                            }}
                            {{
                                Form::text('name',$dog->name,[
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
                                Form::text('cbkc',$dog->CBKC,[
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
                                Form::text('birthdate',date( 'd/m/Y', strtotime( $dog->birthdate ) ),[
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
                                Form::select('gender',['Macho'=>'Macho','Femêa'=>'Femêa'],$dog->gender,[
                                    'class'=>'form-control',
                                    'placeholder'=>'Sexo (obrigatório)',
                                    'selected'  =>  $dog->gender
                                ])
                            }}
                        </div>

                        <div class='form-group'>
                            {{
                                Form::label('fathername',' Nome do pai (obrigatório)')
                            }}
                            {{
                                Form::text('fathername',$dog->fathername,[
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
                                Form::text('mothername',$dog->mothername,[
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
                                Form::text('ownername',$dog->owner[0]->name,[
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
                                Form::text('ownerphone',$dog->owner[0]->main_phone,[
                                    'class'=>'form-control',
                                    'placeholder'=>' Telefone do proprietário (obrigatório)'
                                ])
                            }}
                        </div>

                        
                        <div class='form-group'>
                            {{
                                Form::label('owner-email','Email do proprietário (obrigatório)')
                            }}
                            {{
                                Form::email('owner-email',$dog->owner[ 0 ]->email,[
                                    'class'=>'form-control',
                                    'placeholder'=>'Email do proprietário (obrigatório)'
                                ])
                            }}
                        </div>
                        
                        <div class='form-group'>
                            {{
                                Form::label('certificate','Certificado (se o certificado não se alterou não há necessidade da alteração desse campo)')
                            }}
                            {{
                                Form::file('certificate','',[
                                    'class'=>'form-control',
                                    'placeholder'=>'Email do proprietário (obrigatório)'
                                ])
                            }}
                        </div>

                        
                        <div class='form-group'>
                            {{
                                Form::submit('Editar informações',[
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