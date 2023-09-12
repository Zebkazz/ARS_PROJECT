// ------------------------------- Evita el reeenvio de formulario ----------------------------
if(window.history.replaceState){
  window.history.replaceState(null, null, window.location.href);
}
$(document).ready(function() {
  var table = $('#tabladatos').DataTable( {
  buttons: [ 'copy', 'excel', 'pdf' ],
  language: {
     searchPlaceholder: "  Buscar registros...",
    "decimal":        "",
    "emptyTable":     "No hay datos",
    "info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
    "infoEmpty":      "Mostrando 0 a 0 de 0 registros",
    "infoFiltered":   "(Filtro de _MAX_ total registros)",
    "infoPostFix":    "",
    "thousands":      ",",
    "lengthMenu":     "Mostrar _MENU_ registros",
    "loadingRecords": "Cargando...",
    "processing":     "Procesando...",
    "details for":    "Detalles de registro...",
    "search":         "",
    "zeroRecords":    "No se encontraron coincidencias",
    "paginate": {
        "first":      "Primero",
        "last":       "Ultimo",
        "next":       "Próximo",
        "previous":   "Anterior"
    },
    "aria": {
        "sortAscending":  ": Activar orden de columna ascendente",
        "sortDescending": ": Activar orden de columna desendente"
    },
      },
    dom: 'Bfrtip',
    buttons: [
          {
            extend: 'csvHtml5',
            text:   '<i class="fa-duotone fa-file-csv ta"></i>',
            titleAttr: 'Exportar a CSV',
            className: 'btn csv'
        },
        {
            extend: 'excelHtml5',
            text:   '<i class="fa-duotone fa-file-excel ta"></i>',
            titleAttr: 'Exportar a Excel',
            className: 'btn excel'
        },
        {
            extend: 'pdfHtml5',
            text:   '<i class="fa-duotone fa-file-pdf ta"></i>',
            titleAttr: 'Exportar a PDF',
            className: 'btn pdf'
        }
    ],
  responsive: {
      details: {
          display: $.fn.dataTable.Responsive.display.modal( {
              header: function ( row ) {
                  var data = row.data();
                  return 'Detalles de '+data[1];
              }
          } ),
          renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
              tableClass: 'table'
          } )
      }
  }
} );
  table.buttons().container()
  .appendTo( '#example_wrapper .col-md-6:eq(0)' );
});

const $body = document.getElementById("boton_menu"),
  $body1 = document.getElementById("boton_menu1"),
  $body2 = document.getElementById("boton_menu2"),
  $header = document.getElementById("header_datos"),
  $mover = document.getElementById("body"),
  $menu = document.getElementById("menu");

$body.addEventListener("click", () => {
  $mover.classList.toggle("body_move");
  $menu.classList.toggle("menu_move");
  document.getElementById('esquina').style.borderRadius = "20px 0px 0px 0px";
});
$body1.addEventListener("click", () => {
  $mover.classList.toggle("body_move");
  $menu.classList.toggle("menu_move");
  document.getElementById('esquina').style.borderRadius = "0px";
  document.querySelector('.body').style.borderRadius = "0px";
});
$body2.addEventListener("click", () => {
  $mover.classList.toggle("body_move");
  $menu.classList.toggle("menu_move");
  $header.classList.toggle("header_datos_move");
});
// ---------------------------------Funcion para oculotar los formularios--------------------------------//
function ocultar(ocu,mg,val){
  document.getElementById('conta').style.height = ocu;
  if (window.innerWidth >768){
    document.getElementById('conta').style.marginBottom = "0px";
  }
  if (window.innerWidth <768){
    document.getElementById('conta').style.marginBottom = mg;
  }
  if(val!=1){
      document.getElementById('mos').style.display = "flex";
      document.getElementById('cer').style.display = "none";

  }else{
      document.getElementById('mos').style.display = "none";
      document.getElementById('cer').style.display = "flex";
  }
}
// ---------------------------------Funcion para ocultar los formularios responsive--------------------------------//
function ocultarOne(ocu,mg,val){
  document.getElementById('conta').style.height = ocu;
  if (window.innerWidth >768){
    document.getElementById('conta').style.marginBottom = "0px";
  }
  if (window.innerWidth <768){
    document.getElementById('conta').style.marginBottom = mg;
  }
  if(val!=1){
      document.getElementById('cerOne').style.display = "flex";
      document.getElementById('mosOne').style.display = "none";

  }else{
      document.getElementById('cerOne').style.display = "none";
      document.getElementById('mosOne').style.display = "flex";
  }
}
// -------------------------------Eliminar----------------------------
function elimi(){
  let v = confirm("¿Esta seguro que quiere eliminar este registro.? (Si lo hace no lo podra recuperar).");
  return v;
}


// -------------------------------Ubicacion----------------------------
function recCiudad(value){
  //alert("Si le llega "+value);
  var parametros = {
      "valor" : value
  };
  $.ajax({
      data: parametros,
      url: 'selmun.php',
      type: 'post',
      success: function(response){
          $("#reloadMun").html(response);
      }
  });
}

