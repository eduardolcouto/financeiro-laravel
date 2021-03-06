<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
    <header>
        @if (Auth::check())
            <?php 
                $menuConfig = [
                    'name' => Auth::user()->name,
                    'menus' => [
                        [
                            'nome' => 'Banco',
                            'url' => route('admin.banks.index'),
                            'active' => isRouteActive('admin.banks.index')
                        ],
                        /*[
                            'nome' => 'Outro',
                            'dropdownId' => 'teste'
                        ],*/

                    ],
                    'menusDropdown'=>[
                        [   
                            'id' => 'teste',
                            'items' => [
                                ['nome'=>'Listar contas','url' => route('admin.banks.index'),'active' => isRouteActive('admin.banks.edit')],
                                ['nome'=>'Criar conta','url' => '/criar'],
                            ]                            
                        ],
                        [
                            'id' => 'relatorios',
                            'items' => [
                                ['nome' => 'Fluxo de Caixa', 'url' => '/fluxo-de-caixa'],
                                ['nome' => 'Somatória por Despesa', 'url' => '/somatoria-por-despesa'],
                                ['nome' => 'Gráfico por Despesa', 'url' => '/grafico-por-despesa'],

                            ]

                        ]
                    ],
                    'urlLogout' => env('URL_ADMIN_LOGOUT'),
                    'csrfToken' => csrf_token()
                ];
            ?>
            <admin-menu :config="{{ json_encode($menuConfig) }}"></admin-menu>
        @endif
    </header>
    <main>
        @yield('content')
    </main>
    
    <footer class="page-footer">
        <div class="footer-copyright">
            <div class="container">
                © {{date('Y')}},All rights reserved.</a>
            </div>
        </div>
    </footer>
        

        
    </div>

    <!-- Scripts -->
    <script src="{{asset('build/admin.bundle.js')}}"></script>
</body>
</html>
