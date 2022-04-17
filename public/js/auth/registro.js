//declaracion de campos
let nombreAll = document.querySelectorAll(".nombre");
let apellidosAll = document.querySelectorAll(".apellidos");
let descripcionAll = document.querySelectorAll(".descripcion");

let clienteCheck = document.body.querySelector("#cliente");
let hotelCheck = document.body.querySelector("#hotel");


clienteCheck.addEventListener('click', clienteFields);
hotelCheck.addEventListener('click', hotelFields);

if(clienteCheck.checked){
    clienteCheck.click();
}

function clienteFields(event) {
    console.log(event.target);
    if (event.target.checked === true) {
        for (let descripcion of descripcionAll) {
            descripcion.hidden = true;
            descripcion.required = false;
        }

        for(let apellidos of apellidosAll){
            if(apellidos.hidden){
                apellidos.hidden = false;
                apellidos.required = true;

            }
        }
    }
}

function hotelFields(event) {
    if (event.target.checked === true) {
        for (let descripcion of descripcionAll) {
            if (descripcion.hidden) {
                descripcion.hidden = false;
                descripcion.required = true;
            }
        }

        for (let apellidos of apellidosAll) {
            if (!apellidos.hidden) {
                apellidos.hidden = true;
                apellidos.required = false;

            }
        }

    }
}
