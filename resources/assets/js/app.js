
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

require( './jquery.dataTables' );



const app = new Vue({
    el: '#app'
});


$(document).ready(function() {
    $( '#dogs-table' ).DataTable( {
        "language": {
            "decimal":        "",
            "emptyTable":     "NENHUM DADO ENCONTRADO",
            "info":           "Mostrando _START_ à _END_ de _TOTAL_ linhas",
            "infoEmpty":      "Mostrando 0 à 0 de 0 dados",
            "infoFiltered":   "(Filtrado de _MAX_ total de dados)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Mostrando _MENU_ dados",
            "loadingRecords": "Carregando...",
            "processing":     "Processando...",
            "search":         "Digite o termo de busca:",
            "zeroRecords":    "Nenhum dado enconttrado",
            "paginate": {
                "first":      "Primeira",
                "last":       "Última",
                "next":       "Próxima",
                "previous":   "Anterior"
            },
            "aria": {
                "sortAscending":  ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        }
    } );
} );