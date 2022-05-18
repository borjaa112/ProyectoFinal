let roomId = document.body.querySelector("#room_id").value;
let formSelect = document.body.querySelector(".form-select");
console.log(formSelect);

async function getServices() {
    let response = await fetch("/api/services/" + roomId, {
        method: "get"
    });

    return await response.json();
}


async function checkServices() {
    let selectedServices = await getServices();
    console.log(selectedServices);
    for (let option of formSelect.children) {
        if (selectedServices.includes(Number(option.value))) {
            option.selected = true;
        }
    }
}

checkServices();
