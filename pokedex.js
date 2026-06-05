    const fetchPokemon = () => {

    alert("Entró a la función");

    const pokeNameInput = document.getElementById("pokeName");

    const pokeNameInput = document.getElementById("pokeName");
    let pokeName = pokeNameInput.value.toLowerCase().trim();

    if (pokeName === "") {
        alert("Escribe el nombre de un Pokémon");
        return;
    }

    const url = `https://pokeapi.co/api/v2/pokemon/${pokeName}`;

    fetch(url)
        .then((res) => {

            if (res.status !== 200) {
                alert("Pokémon no encontrado");
                return;
            }

            return res.json();
        })

        .then((data) => {

            if (!data) return;

            // Imagen
            pokeImage(data.sprites.front_default);

            // Información
            document.getElementById("pokename").innerHTML =
                `Nombre: ${data.forms[0].name}`;

            document.getElementById("pokeHe").innerHTML =
                `Altura: ${data.height}`;

            document.getElementById("pokeWe").innerHTML =
                `Peso: ${data.weight}`;

            document.getElementById("pokeType").innerHTML =
                `Tipo: ${data.types.map(t => t.type.name).join(", ")}`;

            document.getElementById("pokeitem").innerHTML =
                `Habilidad: ${data.abilities[0].ability.name}`;

            document.getElementById("pokeid").innerHTML =
                `ID: #${data.id}`;

            document.getElementById("pokeorder").innerHTML =
                `Orden: #${data.order}`;

            document.getElementById("pokemove1").innerHTML =
                `Movimiento 1: ${data.moves[0]?.move.name || "N/A"}`;

            document.getElementById("pokemove2").innerHTML =
                `Movimiento 2: ${data.moves[1]?.move.name || "N/A"}`;

            document.getElementById("pokemove3").innerHTML =
                `Movimiento 3: ${data.moves[2]?.move.name || "N/A"}`;

            document.getElementById("pokemove4").innerHTML =
                `Movimiento 4: ${data.moves[3]?.move.name || "N/A"}`;

            // ================================
            // GRÁFICA
            // ================================

            const miCanvas =
                document.getElementById("miCanvas").getContext("2d");

            if (window.miCanva) {
                window.miCanva.destroy();
            }

            window.miCanva = new Chart(miCanvas, {

                type: "bar",

                data: {

                    labels: [
                        "HP",
                        "Attack",
                        "Defense",
                        "Special Attack",
                        "Special Defense",
                        "Speed"
                    ],

                    datasets: [{

                        label: data.name,

                        data: [
                            data.stats[0].base_stat,
                            data.stats[1].base_stat,
                            data.stats[2].base_stat,
                            data.stats[3].base_stat,
                            data.stats[4].base_stat,
                            data.stats[5].base_stat
                        ],

                        backgroundColor: [
                            "rgba(255,99,132,0.5)",
                            "rgba(54,162,235,0.5)",
                            "rgba(255,206,86,0.5)",
                            "rgba(75,192,192,0.5)",
                            "rgba(153,102,255,0.5)",
                            "rgba(255,159,64,0.5)"
                        ],

                        borderWidth: 1
                    }]
                },

                options: {

                    responsive: true,

                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

        })

        .catch((error) => {
            console.error(error);
        });
};

// ================================
// CAMBIAR IMAGEN
// ================================

const pokeImage = (url) => {

    const pokePhoto =
        document.getElementById("pokeImg");

    pokePhoto.src = url;
};

// ================================
// ENTER PARA BUSCAR
// ================================

document.addEventListener("DOMContentLoaded", () => {

    const input = document.getElementById("pokeName");

    input.addEventListener("keypress", (event) => {

        if (event.key === "Enter") {
            fetchPokemon();
        }
    });

});

// ================================
// GALERÍA DE 151 POKÉMON
// ================================

async function cargarPokemones() {

    const container =
        document.getElementById("pokemonContainer");

    if (!container) return;

    for (let i = 1; i <= 151; i++) {

        try {

            const respuesta = await fetch(
                `https://pokeapi.co/api/v2/pokemon/${i}`
            );

            const pokemon = await respuesta.json();

            const tarjeta =
                document.createElement("div");

            tarjeta.classList.add("pokemon-card");

            tarjeta.innerHTML = `
                <img src="${pokemon.sprites.front_default}" alt="${pokemon.name}">
                <h3>${pokemon.name}</h3>
                <p>#${pokemon.id}</p>
            `;

            tarjeta.addEventListener("click", () => {

                document.getElementById("pokeName").value =
                    pokemon.name;

                fetchPokemon();

                window.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            });

            container.appendChild(tarjeta);

        } catch (error) {
            console.log(error);
        }
    }
}

// Cargar galería al abrir la página
cargarPokemones();