document.getElementById("nom_empclies").addEventListener("keyup", getClient);

function getClient(){
    let inputclie = document.getElementById('nom_empclies').value;
    let inputnumemp = document.getElementById('emp_ses').value;
    let lista= document.getElementById('lista');

    if(inputclie.length>0){

    let url="./controllers/ajax/getClie.php";
    let formData = new FormData();
    formData.append("nom_empclies", inputclie);
    formData.append("emp_ses", inputnumemp);

    fetch(url, {
        method: "POST",
        body: formData,
        mode: "cors"
    }).then(response =>response.json())
        .then(data=> {
            lista.style.display = "block"
            lista.innerHTML = data
    })
    .catch(err => console.log(err))
    }else{
        lista.style.display = "none"
    }
}
function mostrar(clie_id, nom_empclie){
    lista.style.display = "none"
    $("#nom_empclies").val(nom_empclie);
    $("#clie_ids").val(clie_id);
}