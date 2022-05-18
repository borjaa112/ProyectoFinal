let sinPension = document.body.querySelector("#SP");
sinPension.checked = true;


let precio = document.body.querySelector("#precio");
let precioOriginal = precio.textContent;
let precio_form = document.body.querySelector("#precio_form").value = precio.textContent;
let pension_form = document.body.querySelector("#pension_form");
let precioExtras = document.querySelector("#extras");
let pensiones = document.body.querySelector(".pensiones");
let idHabitacion = document.body.querySelector("#id_habitacion").value;
pensiones.onchange = changePrice;

async function changePrice(event){
    let precioExtra = await requestPrice(event.target.value);
    precio.textContent = parseInt(precioOriginal) + parseInt(precioExtra);
    precio_form.value = parseInt(precioOriginal) + parseInt(precioExtra);
    precioExtras.textContent = precioExtra;

    pension_form.value = event.target.value;
}


async function requestPrice(event){
    let response = await fetch ("/api/pensionprice/"+ idHabitacion,{
        method: "get"
    });
    let result = await response.json();
    switch (event){
        case "MP":
            return  result[0];
        case "PC":
            return result[1];
        case "HD":
            return result[2];
        default:
            return 0;
    }
}
