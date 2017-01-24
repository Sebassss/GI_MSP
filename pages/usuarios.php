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
            {index : "UsuarioID", name: "id", editable: "true",  visible: "false", type: "text",placeholder:"", maxlength: "10", required: "false" },
            {index : "Nombre", name: "Nombre",editable: "true", visible: "true", type: "text", maxlength: "10", required: "false" },
            {index : "Email", name: "Email",editable: "true", visible: "true", type: "text", maxlength: "10", required: "true"},
            {index : "Password", name: "Password",editable: "true", visible: "true", type: "text", maxlength: "10", required: "true"},
            {index : "FechaRegistro", name: "FechaRegistro",editable: "true", visible: "true", type: "text", maxlength: "10", required: "true"}];


        var edit_options ={	url: "edit.php",titulo: "Editar",method : "UPDATE" };
        var add_options ={ url: "edit.php",titulo: "Agregar",method : "POST" };
        var del_options ={ url: "edit.php",titulo: "Eliminar",method : "DELETE"};

        var datasource ={
            url: "pages/crud/list.php",
            method : "GET",
            datatype: "json",
            pagesize: 10,
            paginate: "false",
            fixedrows: "12"
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