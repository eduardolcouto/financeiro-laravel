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
                                <a href="{{route('admin.banks.edit',['bank' => $bank->id])}}" class="btn waves-effect waves-light green">
                                    <i class="material-icons">edit</i></a>
                                <delete-action action="{{route('admin.banks.destroy',['bank'=>$bank->id])}}"
                                               action-element="link-delete-{{$bank->id}}" csrf-token="{{csrf_token()}}">
                                    <?php $modalId = "modal-delete-$bank->id"; ?>
                                    <a id="link-modal-{{$bank->id}}" href="#{{$modalId}}" class="btn waves-effect waves-light red">
                                        <i class="material-icons">delete</i></a>
                                    <modal :modal="{{json_encode(['id' =>$modalId])}}" style="display: none">
                                        <div slot="content">
                                            <h5>Mensagem de confirmação</h5>
                                            <p><strong>Deseja Excluir este banco?</strong></p>
                                            <div class="divider"></div>
                                            <p>Nome: <strong>{{$bank->name}}</strong></p>
                                            <div class="divider"></div>
                                        </div>
                                        <div slot="footer">
                                            <button class="btn btn-flat waves-effect green lighten-2 modal-close modal-action"
                                                    id="link-delete-{{$bank->id}}"
                                            >OK</button>
                                            <button class="btn btn-flat waves-effect waves-red modal-close modal-action">Cancelar</button>
                                        </div>

                                    </modal>
                                </delete-action>
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