<?php

namespace App\Http\Controllers;

use File;
use App\Dog;
use App\Owner;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Storage;

class DogController extends Controller
{

    protected $dogs;
    protected $owner;

    public function __construct(){
        $this->dogs =   new Dog();
        $this->owners =   new Owner();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('dogs.index',[
            'dogs'  => $this->dogs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view( 'dogs.add' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $validator = Validator::make( $request->all(), [
            'cbkc'              =>  'required|unique:dogs',
            'birthdate'         =>  'required',
            'gender'            =>  'required',
            'fathername'        =>  'required',
            'mothername'        =>  'required',
            'ownername'         =>  'required',
            'ownerphone'        =>  'required',
            'owner-email'       =>  'required',
            'certificate'       =>  'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors( $validator )->withInput();


        $this->owners->name         =   $request->input( 'ownername' );
        $this->owners->main_phone   =   $request->input( 'ownerphone' );
        $this->owners->email        =   $request->input( 'owner-email');


        if( $this->owners->save() ){

            $this->dogs->owners_id  =   $this->owners->id;
            $this->dogs->name       =   $request->input( 'name' );
            $this->dogs->fathername =   $request->input( 'fathername' );
            $this->dogs->mothername =   $request->input( 'mothername' );
            $this->dogs->cbkc       =   $request->input( 'cbkc' );
            $this->dogs->birthdate  =   date( 'Y-m-d', strtotime( $request->input( 'birthdate' ) ) );
            $this->dogs->gender     =   $request->input( 'gender' );
            $path = Storage::putFile('public/certificate/' . $request->input( 'cbkc' ), $request->file('certificate'));

            $this->dogs->certificate_file = str_replace('public/','',$path);

            if( $this->dogs->save() ) return redirect()->route( 'caes' )->with( 'AddMessage', 'Adicionado com sucesso!' );
            else return redirect()->route( 'caes' )->with( 'ErrorMessage', 'Ocorreu um erro ao adicionar' );

        }else return redirect()->route( 'caes' )->with( 'ErrorMessage', 'Ocorreu um erro ao adicionar' );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function show(Dog $dog){

        return view( 'dogs.show',[
            'dog'   =>  $dog,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function edit(Dog $dog){

        return view( 'dogs.edit',[
            'dog'  =>  $dog->get()[0],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dog $dog){
        $this->owner                =   Owner::find( $request->input('owner-id') );
        $this->owners->name         =   $request->input( 'ownername' );
        $this->owners->main_phone   =   $request->input( 'ownerphone' );
        $this->owners->email        =   $request->input( 'owner-email');

        if( $this->owners->save() ){

            $dog->owners_id  =   $this->owner->id;
            $dog->name       =   $request->input( 'name' );
            $dog->fathername =   $request->input( 'fathername' );
            $dog->mothername =   $request->input( 'mothername' );
            $dog->cbkc       =   $request->input( 'cbkc' );
            $dog->birthdate  =   date( 'Y-m-d', strtotime( $request->input( 'birthdate' ) ) );
            $dog->gender     =   $request->input( 'gender' );

            if( !empty( $request->file( 'certificate' ) ) or $request->file( 'certificate' ) != null ){

                Storage::delete( $dog->certificate_file );

                $path = Storage::putFile('certificate/' . $request->input( 'cbkc' ), $request->file('certificate'));

                $dog->certificate_file = $path;

            }

            if( $dog->save() ) return redirect()->route( 'caes' )->with( 'AddMessage', 'Editado com sucesso!' );
            else return redirect()->route( 'caes' )->with( 'ErrorMessage', 'Ocorreu um erro ao editar' );

        }else return redirect()->route( 'caes' )->with( 'ErrorMessage', 'Ocorreu um erro ao editar' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dog $dog){

        $this->owner = Owner::find($dog->owners_id);

        if( $this->owner != null ){
            if( $this->owner->delete() ){
                if( $dog->delete() ) return redirect()->route( 'caes' )->with( 'ErrorMessage', 'Deletado com sucesso' );
                else return redirect()->route( 'caes' )->with( 'ErrorMessage', 'Ocorreu um erro ao deletar' );
            }else return redirect()->route( 'caes' )->with( 'ErrorMessage', 'Ocorreu um erro ao deletar' );
        }else{

            if( $dog->delete() ) return redirect()->route( 'caes' )->with( 'ErrorMessage', 'Deletado com sucesso' );
            else return redirect()->route( 'caes' )->with( 'ErrorMessage', 'Ocorreu um erro ao deletar' );
        }

    }
}
