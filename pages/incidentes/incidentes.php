<div class="row">
    <div class="col-md-12">
        <h4 class="page-head-line">Incidentes</h4>
        <div id="table"></div>
    </div>

</div>



<script type="text/javascript">

    jQuery(document).ready(function($)
    {

        var Options = [
            {refresh: "false"},
            {add: "true"},
            {edit: "false"},
            {'delete': "false"}];

        var colheaders = [
            {index : "IncidenteID", name: "Incidente", editable: "false",  visible: "false", type:[ "text"],placeholder:"", maxlength: "10", required: "false" },
            {index : "UsuarioID", name: "Usuario",editable: "true", visible: "true", type: ["text"], maxlength: "25", required: "false" },
            {index : "Titulo", name: "Titulo",editable: "true", visible: "true", type: ["text"], maxlength: "50", required: "true"},
            {index : "Detalles", name: "Detalles",editable: "true", visible: "false", type: ["textarea","300"], maxlength: "10", required: "true"},
            {index : "IncidentePrioridadID", name: "Prioridad",editable: "true", visible: "false", type: ["dropdown",'pages/incidentes/crud/Prioridad.php'], maxlength: "10", required: "true"},
            {index : "IncidenteEstadoID", name: "Estado",editable: "true", visible: "true", type: ["dropdown", 'pages/incidentes/crud/Estados.php'], maxlength: "10", required: "true"}];


        var edit_options ={	url: "pages/usuarios/crud/edit.php",titulo: "Editar",method : "POST" };
        var add_options ={ url: "pages/incidentes/crud/add.php",titulo: "Agregar",method : "POST" };
        var del_options ={ url: "pages/usuarios/crud/del.php",titulo: "Eliminar",method : "POST"};

        var datasource ={
            url: "pages/incidentes/crud/list.php",
            method : "GET",
            datatype: "json",
            pagesize: 10,
            paginate: "false",
            fixedrows: "10"
        };


        var x = $('#table').Grid({  // calls the init method

            Titulo : '',
            ABM: Options,
            Columnas: colheaders,
            edit_options : edit_options,
            add_options : add_options,
            del_options : del_options,
            timeout: 6000, /*Segundos de espera para llamados ajax edit, update, delete*/
            animate: 1,
            datasource: datasource,
            export2XLS: "false",
            Visible : "false"
        });


    });

</script>