<template>
    <ul v-bind:id="menuDropDown.id" class="dropdown-content" v-for="menuDropDown in menusDropDown">
        <li v-for="item in menuDropDown.items">
            <a v-link="{name: item.routeName}"> {{item.name}} </a>
        </li>
    </ul>

    <nav>
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo">Controle Financeiro</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li v-for="menu in menus">
                    <a v-if="menu.dropdownId" class="dropdown-button" href="#!" v-bind:data-activates="menu.dropdownId">
                        {{menu.name}} <i class="material-icons right">arrow_drop_down</i>
                    </a>
                    <a v-else :href="menu.url">{{menu.name}}</a>
                </li>
                <li>
                    <a class="dropdown-button" href="#!" data-activates="minha-conta">
                        {{name}} <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>

            </ul>
        </div>
    </nav>


</template>
<script type="text/javascript">
    import Auth from '../services/auth';
    export default  {
        ready() {
            $('.button-collapse').sideNav();
            $('.dropdown-button').dropdown();
        },

        data() {
            return {
                colorBase: '',

                user: Auth.user,

                menus: [
                    {
                        name: 'Contas a Pagar',
                        dropdownId: 'bill-pay'
                    },
                    {
                        name: 'Contas a Receber',
                        dropdownId: 'bill-receive'
                    }
                ],
                menusDropDown: [
                    {
                        id: 'bill-pay',
                        items: [{
                                id: 0,
                                name: 'Listar Contas',
                                routeName: 'dashboard'
                            },
                                {
                                    id: 1,
                                    name: 'Criar Conta',
                                    routeName: 'dashboard'
                                },
                            ]
                    },
                    {
                        id: 'bill-receive',
                        items: [{
                            id: 0,
                            name: 'Listar Contas',
                            routeName: 'dashboard'
                        },
                            {
                                id: 1,
                                name: 'Criar Conta',
                                routeName: 'dashboard'
                            },
                        ]
                    },
                    {
                        id: 'minha-conta',
                        items: [{
                            id: 0,
                            name: 'Configurações',
                            routeName: 'dashboard'
                        },
                            {
                                id: 1,
                                name: 'Logout',
                                routeName: 'auth.logout'
                            },
                        ]
                    },
                ]
            };
        },
        computed: {
            name(){
                return this.user.data ? this.user.data.name : null;
            }
        }
    };
</script>
