document.getElementById("product_nom").addEventListener("keyup", getClient);

function getClient(){
    let inputclie = document.getElementById('product_nom').value;
    let inputnumemp = document.getElementById('emp_ses').value;
    let listaPro2= document.getElementById('listaPro2');

    if(inputclie.length>0){

    let url="./controllers/ajax/getProd.php";
    let formData = new FormData();
    formData.append("product_nom", inputclie);
    formData.append("emp_ses", inputnumemp);

    fetch(url, {
        method: "POST",
        body: formData,
        mode: "cors"
    }).then(response =>response.json())
        .then(data=> {
            listaPro2.style.display = "block"
            listaPro2.innerHTML = data
    })
    .catch(err => console.log(err))
    }else{
        listaPro2.style.display = "none"
    }
}
function mostrarpro(prod_nom, prod_codigo, prod_id){
    listaPro2.style.display = "none"
    $("#product_nom").val(prod_codigo);
    $("#product_cod").val(prod_nom);
    $("#prod_id").val(prod_id);
}