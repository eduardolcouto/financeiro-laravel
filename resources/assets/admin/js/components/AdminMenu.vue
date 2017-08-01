<template>
    <ul :id="o.id" class="dropdown-content" v-for="o in config.menusDropdown">
        <li v-for="item in o.items" :class="menuItemClass(item)">
            <a :href="item.url">{{item.nome}}</a>
        </li>
    </ul>
    <ul id="dropdown-logout" class="dropdown-content">
        <li>
            <a :href="config.urlLogout" @click.prevent="goToLogout"> Sair </a>
            <form id="logout-form" :action="config.urlLogout" method="POST" style="display: none;">
                <input type="hidden" name="_token" :value="config.csrfToken">
            </form>
        </li>
    </ul>
    <nav>
        <div class="navbar-fixed">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="#" class="left brand-logo">Code Fin. Admin</a>
                    <a href="#" class="button-collapse">
                        <i class="material-icons">menu</i>
                    </a>
                    <ul class="right hide-on-med-and-down">
                        <li v-for="o in config.menus" :class="menuItemClass(o)">
                            <a v-if="o.dropdownId" class="dropdown-button" href="#!" :data-activates="o.dropdownId">
                            {{o.nome}}<i class="material-icons" style="float:right">arrow_drop_down</i>
                        </a>
                            <a v-else :href="o.url">{{o.nome}}</a>
                        </li>
                        <li>
                            <a class="dropdown-button" href="#!" data-activates="dropdown-logout">
                            {{ config.name }}<i class="material-icons" style="float:right">arrow_drop_down</i>
                        </a>
                        </li>
                    </ul>
                    <ul class="side-nav" id="nav-mobile">
                        <li v-for="o in config.menus" :class="menuItemClass(o)">
                            <a :href="o.url">{{o.nome}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</template>

<script type="text/javascript">
    export default {
        props: {
            config: {
                type: Object,
                default () {
                    return {
                        name: '',
                        menus: [],
                        menusDropdown: [],
                        urlLogout: '/admin/logout',
                        csrfToken: ''
                    }
                }
            }
        },
        ready() {
            $('.button-collapse').sideNav();
            $(".dropdown-button").dropdown();
        },
        methods: {
            goToLogout() {
                $('#logout-form').submit();
            },

            menuItemClass(menu){
                let menuClass = ['active'];
                if (menu.active){
                    return menuClass;
                }

                if(menu.dropdownId !== undefined){
                    let dropdown = this.config.menusDropdown.find((element)=>{
                        return element.id = menu.dropdownId;
                    });

                    if(dropdown){
                        for(let o of dropdown.items){
                            if(o.active){
                                return menuClass;
                            }
                        }
                    }
                }
            }
        }
    }
</script>