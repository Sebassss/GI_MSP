<div class="row">
    <div class="col-md-12">
        <h4 class="page-head-line">Usuarios</h4>
        <div id="table"></div>
    </div>

</div>



<script type="text/javascript">

    jQuery(document).ready(function($)
    {

        var Options = [
            {refresh: "true"},
            {add: "true"},
            {edit: "true"},
            {'delete': "true"}];

        var colheaders = [
            {index : "RecursoID", name: "RecursoID", editable: "false",  visible: "false", type: ["text"],placeholder:"", maxlength: "10", required: "false" },
            {index : "UsuarioID", name: "Usuario",editable: "true", visible: "false", type: ["dropdown","pages/permisos/crud/usr.php"], maxlength: "25", required: "false" },
            {index : "Nombre", name: "Nombre",editable: "true", visible: "true", type: ["text"], maxlength: "50", required: "true"},
            {index : "Consultar", name: "Consultar",editable: "true", visible: "true", type: ["text"], maxlength: "10", required: "true"},
            {index : "Agregar", name: "Agregar",editable: "true", visible: "true", type: ["text"], maxlength: "10", required: "true"},
            {index : "Editar", name: "Editar",editable: "true", visible: "true", type: ["text"], maxlength: "10", required: "true"},
            {index : "Eliminar", name: "Eliminar",editable: "true", visible: "true", type: ["text"], maxlength: "10", required: "true"},
            {index : "Acceso", name: "Acceso",editable: "false", visible: "true", type: ["text"], maxlength: "10", required: "true"}];


        var edit_options ={	url: "pages/usuarios/crud/edit.php",titulo: "Editar",method : "POST" };
        var add_options ={ url: "pages/usuarios/crud/add.php",titulo: "Agregar",method : "POST" };
        var del_options ={ url: "pages/usuarios/crud/del.php",titulo: "Eliminar",method : "POST"};

        var datasource ={
            url: "pages/permisos/crud/list.php",
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
            export2XLS: "true"
        });


    });

</script>