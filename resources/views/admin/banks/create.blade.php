@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="row">
            <h4>Cadastro de novo Banco</h4>
        </div>
        <div class="container">
            <div class="row">

                {!! Form::open(['route' => 'admin.banks.store']) !!}
                @include('admin.banks._form')
                <div class="row">
                    {!! Form::submit('Criar Banco',['class' => 'btn blue waves-effect waves-light']) !!}
                    <a href="{{route('admin.banks.index')}}" class="btn waves-effect waves-light">Cancelar Operação</a>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>


@endsection