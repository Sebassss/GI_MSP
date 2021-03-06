<div class="row">
    <div class="col-md-12">
        <h4 class="page-head-line">Permisos</h4>
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
            {index : "PerfilID", name: "PerfilID", editable: "true",  visible: "false", type: ["dropdown","pages/permisos/crud/prf.php"],placeholder:"", maxlength: "10", required: "false" },
            {index : "UsuarioID", name: "UsuarioID",editable: "true", visible: "false", type: ["dropdown","pages/permisos/crud/usr.php"], maxlength: "25", required: "false" },
            {index : "usuario", name: "Usuario",editable: "false", visible: "true", type: ["text"], maxlength: "50", required: "false"},
            {index : "perfil", name: "Perfil",editable: "false", visible: "true", type: ["text"], maxlength: "10", required: "false"}];


        var edit_options ={	url: "pages/permisos/crud/edit.php",titulo: "Editar",method : "POST" };
        var add_options ={ url: "pages/permisos/crud/add.php",titulo: "Agregar",method : "POST" };
        var del_options ={ url: "pages/permisos/crud/del.php",titulo: "Eliminar",method : "POST"};

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