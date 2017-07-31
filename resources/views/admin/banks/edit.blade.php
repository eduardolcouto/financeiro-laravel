@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="row">
        <h4>Você está Editando a conta "{{$bank->name}}".</h4>
    </div>

    <div class="container">
        <div class="row">


            {!! Form::model($bank,
                    [
                    'route' =>
                        ['admin.banks.update','bank' => $bank->id],
                    'method' => 'PUT'
                    ])
            !!}

            @include('admin.banks._form')
            <div class="row">
                {!! Form::submit('Atualizar Banco',['class' => 'btn waves-effect waves-light green']) !!}
                <a href="{{route('admin.banks.index')}}" class="btn waves-effect waves-light">Cancelar Operação</a>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
</div>


@endsection