@extends('layouts.admin')

@section('content')

    <div class="row"> <h4>Listagem de Banco</h4></div>
    <div class="container">
        <div class="row">
            <div class="row">
                <a href="{{route('admin.banks.create')}}" class="btn blue waves-effect">Novo Banco</a>
            </div>
            <div class="row">
                <table class="bordered striped responsive-table z-depth-2">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th></th>
                        <th>Nome</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($banks as $bank)
                        <tr>
                            <td>{{$bank->id}}</td>
                            <td><img src="{{$bank->logo}}" alt=""></td>
                            <td>{{$bank->name}}</td>
                            <td>
                                <a href="{{route('admin.banks.edit',['bank' => $bank->id])}}" class="btn waves-effect waves-light green"><i class="material-icons left">edit</i></a>
                                <a href="{{route('admin.banks.delete',['bank'=>$bank->id])}}" class="btn waves-effect waves-light red"><i class="material-icons left">delete</i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {!! $banks->links() !!}
        </div>
    </div>

@endsection