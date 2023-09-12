$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
    document.onkeydown=function(e){
            if(e.which == 17) {isCtrl=true;}
            if(e.which == 80 && isCtrl == true) {
                GetPrint(2);
        }
    }
    function GetPrint(num){
        let nav = document.getElementById('nav-index');
            document.getElementById('body').style.transition="All 1000ms";
            document.getElementById('body').style.top='-80px';
            document.getElementById('body').style.marginLeft='0px';
            document.getElementById('body').style.backgroundColor="#fff";
            document.getElementById('menu').style.marginLeft='-320px';
            document.getElementById('esquina').style.boxShadow="none";
            document.querySelector('.princi').style.boxShadow="none";
            document.getElementById('btnanp').style.display='none';
            document.getElementById('btnans').style.display='none';
            document.querySelector('.difumfact').style.display='flex';
            
        
            window.onafterprint = () => { //Al cancelar/guardar la impresión
                nav?.classList.remove('d-none');
                document.getElementById('body').style.transition="All 1000ms";
                document.getElementById('body').style.top='0px';
                document.getElementById('body').style.marginLeft='65px';
                document.getElementById('menu').style.marginLeft='-250px';
                document.getElementById("body").removeAttribute('style');
                document.getElementById("menu").removeAttribute('style');
                document.getElementById('btnanp').style.display='flex';
                document.getElementById('btnans').style.display='flex';
                document.querySelector('.difumfact').style.display='none';
                document.getElementById('esquina').style.boxShadow="10px -6px 20px rgb(0 0 0)";
                document.querySelector('.princi').style.boxShadow="10px -10px 30px rgb(0 0 0)";
            }
            if(num==1){
                window.print();
            }else if(num==2){
                
            }
    }
  
        $(document).keyup(function(event) {
            var campo = $('.qtyp').val();
            if(campo === ''){
                alert("Para insertar otro campo por favor llene los campos de producto y cantidad");
                return false;
            }else{
                if (event.which === 13) {
                    BtnAdd();
                }
        }});
    function BtnAdd(){
/*-----------------------Añadir Boton------------------*/
        var v = $("#TRow").clone().appendTo("#TBody") ;
            $(v).find("input").val('');
            $(v).removeClass("d-none");
            $(v).find("th").first().html($('#TBody tr').length );
            
    }

    function BtnDel(v){
/*----------------------Eliminar Boton----------------------*/
        $(v).parent().parent().remove(); 
        GetTotal();
                $("#TBody").find("tr").each(
                    function(index){
                        $(this).find("th").first().html(index+1)
                    }
        );
    }

function Calc(v){
    /*Detail Calculation Each Row*/
    var index = $(v).parent().parent().index();
    
    var qty = document.getElementsByName("qty")[index].value;
    var rate = document.getElementsByName("rate")[index].value;

    var amt = qty * rate;
    document.getElementsByName("amt")[index].value = amt;

    GetTotal();
}

function GetTotal(){
    /*Footer Calculation*/   

    var sum=0;
    var amts =  document.getElementsByName("amt");

    for (let index = 0; index < amts.length; index++)
    {
        var amt = amts[index].value;
        sum = +(sum) +  +(amt) ; 
    }

    document.getElementById("FTotal").value = sum;

    var gst =  document.getElementById("FGST").value;
    var net = +(sum) + +(gst);
    document.getElementById("FNet").value = net;

}
