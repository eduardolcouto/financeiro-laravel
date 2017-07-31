@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="row"></div>
            <div class="row">
                <h4>Confirmar a exclusão da conta "{{$bank->name}}"?</h4>
            </div>
            {!!
                Form::open(['route'=>['admin.banks.destroy','bank'=>$bank->id],'method' => 'DELETE'])
            !!}

                <div class="row">
                    {!! Form::submit('Sim, Excluir Banco',['class' => 'btn waves-effect waves-light red']) !!}
                    <a href="{{route('admin.banks.index')}}" class="btn waves-effect waves-light">Não, Cancelar Operação</a>
                </div>
            {!! Form::close() !!}

        </div>
    </div>

@endsection