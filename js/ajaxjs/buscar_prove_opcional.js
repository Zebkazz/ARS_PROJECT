document.getElementById("nom_empclie").addEventListener("keyup", getProver);

function getProver(){
    let inputCp = document.getElementById('nom_empclie').value;
    let inputemp = document.getElementById('emp_ses').value;
    let lista= document.getElementById('lista');

    if(inputCp.length>0){

    let url="./controllers/ajax/getProve.php";
    let formData = new FormData();
    formData.append("nom_empclie", inputCp);
    formData.append("emp_ses", inputemp);

    fetch(url, {
        method: "POST",
        body: formData,
        mode: "cors"
    }).then(response =>response.json())
        .then(data=> {
            lista.style.display = "block"
            lista.innerHTML = data
    })
    }else{
        lista.style.display = "none"
    }
}
function mostrar(prov_emp, prov_id, prov_nom){
    lista.style.display = "none"
    $("#nom_empclie").val(prov_emp);
    $("#prov_nombre").val(prov_nom);
    $("#prov_ids").val(prov_id);
}