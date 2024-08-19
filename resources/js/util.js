$(document).on("click", "#showInfo", async function () {
    const id = $(this).data("id");

    try {
        const g = await fetch(
            `https://road-master-server.vercel.app/vehiculo?id=${id}`
        );
        const data = await g.json();
        console.log(data);
    } catch (error) {
        console.log(error);
    }

    $("#modalMin #idField").text(id);
});
