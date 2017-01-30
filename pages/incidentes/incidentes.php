<div class="row">
    <div class="col-md-12">
        <h4 class="page-head-line">Incidentes</h4>
        <div id="table"></div>
    </div>

</div>



<script type="text/javascript">



    function sendTelegram(data)
    {
        var regex = /(<([^>]+)>)/ig,
            body = data.Detalles,
            result = body.replace(regex, "");

        var Estado = data.Estado;
        var Prioridad = data.Prioridad;


        var mensaje = "Se ha creado un incidente :" + data.Titulo + " " +  result + " Estado:" + Estado + " Prioridad:" + Prioridad
        //console.log(mensaje);

        $.ajax(
            {
                //205050098 mio
                //-1001099774757 GrupoID
                url: 'https://api.telegram.org/bot251753439:AAHcySu-8c062FLT7cq2ovx7JdUrpb4418E/sendMessage',
                data : {chat_id:"205050098", text: mensaje},
                type: 'post',
                dataType: "json",
                contentType:"application/x-www-form-urlencoded; charset=UTF-8",

                success: function(data)
                {
                    alert("El area de informática ha recibido su mensaje, en breve sera contactada.");
                },

                error: function(data)
                {
                    console.log("Error");
                }
            }
        );

    }
    jQuery(document).ready(function($)
    {

        var Options = [
            {refresh: "false"},
            {add: "true"},
            {edit: "true"},
            {'delete': "true"}];

        var colheaders = [
            {index : "IncidenteID", name: "Incidente", editable: "false",  visible: "false", type:[ "text"],placeholder:"", maxlength: "10", required: "false" },
            {index : "UsuarioID", name: "Usuario",editable: "true", visible: "true", type: ["text"], maxlength: "25", required: "false" },
            {index : "CategoriaID", name: "Categoria",editable: "true", visible: "false", type: ["dropdown",'pages/incidentes/crud/Categorias.php'], maxlength: "10", required: "true"},
            {index : "Titulo", name: "Titulo",editable: "true", visible: "true", type: ["text"], maxlength: "50", required: "true"},
            {index : "Detalles", name: "Detalles",editable: "true", visible: "false", type: ["textarea","300"], maxlength: "10", required: "true"},
            {index : "IncidentePrioridadID", name: "Prioridad",editable: "true", visible: "false", type: ["dropdown",'pages/incidentes/crud/Prioridad.php'], maxlength: "10", required: "true"},
            {index : "IncidenteEstadoID", name: "Estado",editable: "true", visible: "true", type: ["dropdown", 'pages/incidentes/crud/Estados.php'], maxlength: "10", required: "true"}];


        var edit_options ={	url: "pages/incidentes/crud/edit.php",titulo: "Editar",method : "POST", callback: sendTelegram };
        var add_options ={ url: "pages/incidentes/crud/add.php",titulo: "Agregar",method : "POST", callback: sendTelegram  };
        var del_options ={ url: "pages/incidentes/crud/del.php",titulo: "Eliminar",method : "POST", callback: sendTelegram };

        var datasource ={
            url: "pages/incidentes/crud/list.php",
            method : "GET",
            datatype: "json",
            pagesize: 8,
            paginate: "true",
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
            Visible : "true",
            ModalWidth : "80%"
        });


    });

</script>