function buscarVuelos() {

    const origen = document.getElementById("origen").value.trim();
    const destino = document.getElementById("destino").value.trim();

    const resultados = document.getElementById("resultados");

    if (!origen || !destino) {

        resultados.innerHTML = `
        <div class="card">
            <div class="card-info">
                <h3>⚠️ Información incompleta</h3>
                <p>Ingresa un origen y un destino para buscar vuelos.</p>
            </div>
        </div>
        `;
        return;
    }

    resultados.innerHTML = `
    
    <div class="card">
        <div class="card-info">
            <h3>✈️ ${origen} → ${destino}</h3>
            <p>Vuelo Económico</p>
            <p>💰 Desde $3,500 MXN</p>
            <p>⭐ 4.5/5</p>
        </div>
    </div>

    <div class="card">
        <div class="card-info">
            <h3>✈️ ${origen} → ${destino}</h3>
            <p>Vuelo Premium</p>
            <p>💰 Desde $5,900 MXN</p>
            <p>⭐ 4.8/5</p>
        </div>
    </div>

    <div class="card">
        <div class="card-info">
            <h3>✈️ ${origen} → ${destino}</h3>
            <p>Clase Ejecutiva</p>
            <p>💰 Desde $8,900 MXN</p>
            <p>⭐ 5.0/5</p>
        </div>
    </div>

    `;
}

// ===============================
// DESTINOS
// ===============================

function mostrarDestino(ciudad) {

    const detalle = document.getElementById("detalleDestino");

    const destinos = {

        cancun: `
            <h2>Cancún 🇲🇽</h2>

            <p>
                Uno de los destinos más populares de México,
                famoso por sus playas y aguas cristalinas.
            </p>

            <h3>📍 Lugares famosos</h3>

            <ul>
                <li>Playa Delfines</li>
                <li>Isla Mujeres</li>
                <li>Xcaret</li>
                <li>Zona Hotelera</li>
            </ul>

            <h3>📸 Galería</h3>

            <div class="galeria">
                <img src="https://images.unsplash.com/photo-1552074284-5e88ef1aef18?auto=format&fit=crop&w=400&q=80">
                <img src="https://images.unsplash.com/photo-1519046904884-53103b34b206?auto=format&fit=crop&w=400&q=80">
                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=400&q=80">
            </div>

            <h3>💬 Reseñas</h3>

            <div class="reseña">
                ⭐⭐⭐⭐⭐ "Las playas son impresionantes."
            </div>

            <div class="reseña">
                ⭐⭐⭐⭐⭐ "Un lugar perfecto para descansar."
            </div>

            <div class="reseña">
                ⭐⭐⭐⭐ "Muchos lugares para visitar."
            </div>
        `,

        paris: `
            <h2>París 🇫🇷</h2>

            <p>
                Una ciudad llena de historia, arte y cultura.
            </p>

            <h3>📍 Lugares famosos</h3>

            <ul>
                <li>Torre Eiffel</li>
                <li>Museo del Louvre</li>
                <li>Arco del Triunfo</li>
                <li>Montmartre</li>
            </ul>

            <h3>📸 Galería</h3>

            <div class="galeria">
                <img src="https://images.unsplash.com/photo-1499856871958-5b9627545d1a?auto=format&fit=crop&w=400&q=80">
                <img src="https://images.unsplash.com/photo-1502602898657-3e91760cbb34?auto=format&fit=crop&w=400&q=80">
                <img src="https://images.unsplash.com/photo-1431274172761-fca41d930114?auto=format&fit=crop&w=400&q=80">
            </div>

            <h3>💬 Reseñas</h3>

            <div class="reseña">
                ⭐⭐⭐⭐⭐ "La Torre Eiffel es espectacular."
            </div>

            <div class="reseña">
                ⭐⭐⭐⭐⭐ "La comida y la cultura son increíbles."
            </div>

            <div class="reseña">
                ⭐⭐⭐⭐ "Una ciudad muy romántica."
            </div>
        `,

        tokio: `
            <h2>Tokio 🇯🇵</h2>

            <p>
                Tecnología moderna combinada con tradición japonesa.
            </p>

            <h3>📍 Lugares famosos</h3>

            <ul>
                <li>Shibuya Crossing</li>
                <li>Tokyo Tower</li>
                <li>Senso-ji</li>
                <li>Akihabara</li>
            </ul>

            <h3>📸 Galería</h3>

            <div class="galeria">
                <img src="https://images.unsplash.com/photo-1540959733332-eab4deabeeaf?auto=format&fit=crop&w=400&q=80">
                <img src="https://images.unsplash.com/photo-1503899036084-c55cdd92da26?auto=format&fit=crop&w=400&q=80">
                <img src="https://images.unsplash.com/photo-1536098561742-ca998e48cbcc?auto=format&fit=crop&w=400&q=80">
            </div>

            <h3>💬 Reseñas</h3>

            <div class="reseña">
                ⭐⭐⭐⭐⭐ "Una ciudad futurista."
            </div>

            <div class="reseña">
                ⭐⭐⭐⭐⭐ "Muy limpia y organizada."
            </div>

            <div class="reseña">
                ⭐⭐⭐⭐ "Excelente gastronomía."
            </div>
        `
    };

    detalle.innerHTML = destinos[ciudad];
    document.getElementById("modal").style.display = "flex";
}

// ===============================
// CERRAR MODAL
// ===============================

function cerrarModal() {
    document.getElementById("modal").style.display = "none";
}

window.addEventListener("click", function(e) {

    const modal = document.getElementById("modal");

    if (e.target === modal) {
        modal.style.display = "none";
    }

});