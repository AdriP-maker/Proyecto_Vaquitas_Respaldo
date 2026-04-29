<!-- ═══════════════════════════════════════════
     GRID DE TARJETAS
     ═══════════════════════════════════════════ -->
<section class="cat-grid-section">
  <div class="container">
    <div class="row g-4" id="ganadoGrid">

      <!-- ── Card 1 · Vaca · Albera ── -->
      <div class="col-12 col-sm-6 col-lg-4 cat-col-card"
           data-tipo="vaca"
           data-raza="Albera">
        <div class="ganado-card cat-card">
          <img src="../Componentes_Visuales_Animados/img/ImgInicio/Vaca_Alb.jpg" alt="Vaca Albera">
          <div class="ganado-info">
            <h4>Genética</h4>
            <span class="badge cat-badge-tipo cat-badge-vaca mb-2">Vaca lechera</span>
            <div class="ganado-grid-datos">
              <div><span class="dato-label">Peso</span><span class="dato-valor">500 kg</span></div>
              <div><span class="dato-label">Producción</span><span class="dato-valor">20 L / día</span></div>
              <div><span class="dato-label">Número/MIDA</span><span class="dato-valor">0F3GHA1</span></div>
              <div><span class="dato-label">Número/finca</span><span class="dato-valor">88</span></div>
            </div>
            <div class="ganado-botones">
              <a href="#" class="btn-reservar"
                 onclick="abrirModal(this); return false;"
                 data-nombre="Genética"
                 data-finca="88"
                 data-img="../Componentes_Visuales_Animados/img/ImgInicio/Vaca_Alb.jpg">
                Me Interesa
              </a>
              <a href="#" class="btn-detalles"
                 onclick="abrirDetalles(this); return false;"
                 data-img="../Componentes_Visuales_Animados/img/ImgInicio/Vaca_Alb.jpg"
                 data-numero="#88"
                 data-raza="Albera"
                 data-edad="4 años"
                 data-peso="500 kg"
                 data-produccion="20 L / día"
                 data-vacunas="Al día. Certificado"
                 data-padre-num="#18867"
                 data-padre-raza="Girolando"
                 data-padre-edad="7 años"
                 data-padre-peso="560 kg"
                 data-padre-estado="Activo"
                 data-madre-num="#31007"
                 data-madre-raza="Holstein"
                 data-madre-edad="6 años"
                 data-madre-peso="540 kg"
                 data-madre-estado="Activo"
                 data-cria-num="#10999"
                 data-cria-raza="Albera">
                Ver detalles
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- ── Card 2 · Vaca · Holstein Roja ── -->
      <div class="col-12 col-sm-6 col-lg-4 cat-col-card"
           data-tipo="vaca"
           data-raza="Holstein Roja">
        <div class="ganado-card cat-card">
          <img src="../Componentes_Visuales_Animados/img/ImgInicio/Vaca_HR.jpg" alt="Vaca Holstein Roja">
          <div class="ganado-info">
            <h4>Genética</h4>
            <span class="badge cat-badge-tipo cat-badge-vaca mb-2">Vaca lechera</span>
            <div class="ganado-grid-datos">
              <div><span class="dato-label">Peso</span><span class="dato-valor">480 kg</span></div>
              <div><span class="dato-label">Producción</span><span class="dato-valor">22 L / día</span></div>
              <div><span class="dato-label">Número/MIDA</span><span class="dato-valor">0F3GHA2</span></div>
              <div><span class="dato-label">Número/finca</span><span class="dato-valor">89</span></div>
            </div>
            <div class="ganado-botones">
              <a href="#" class="btn-reservar"
                 onclick="abrirModal(this); return false;"
                 data-nombre="Genética"
                 data-finca="89"
                 data-img="../Componentes_Visuales_Animados/img/ImgInicio/Vaca_HR.jpg">
                Me Interesa
              </a>
              <a href="#" class="btn-detalles"
                 onclick="abrirDetalles(this); return false;"
                 data-img="../Componentes_Visuales_Animados/img/ImgInicio/Vaca_HR.jpg"
                 data-numero="#89"
                 data-raza="Holstein Roja"
                 data-edad="5 años"
                 data-peso="480 kg"
                 data-produccion="22 L / día"
                 data-vacunas="Al día. Certificado"
                 data-padre-num="#18870"
                 data-padre-raza="Holstein"
                 data-padre-edad="8 años"
                 data-padre-peso="580 kg"
                 data-padre-estado="Activo"
                 data-madre-num="#31010"
                 data-madre-raza="Holstein Roja"
                 data-madre-edad="7 años"
                 data-madre-peso="520 kg"
                 data-madre-estado="Activo"
                 data-cria-num="#10017"
                 data-cria-raza="Holstein Roja">
                Ver detalles
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- ── Card 3 · Toro · Girolando ── -->
      <div class="col-12 col-sm-6 col-lg-4 cat-col-card"
           data-tipo="toro"
           data-raza="Girolando">
        <div class="ganado-card cat-card">
          <img src="../Componentes_Visuales_Animados/img/ImgInicio/Toro_Giro.jpg" alt="Toro Girolando">
          <div class="ganado-info">
            <h4>Genética</h4>
            <span class="badge cat-badge-tipo cat-badge-toro mb-2">Toro</span>
            <div class="ganado-grid-datos">
              <div><span class="dato-label">Peso</span><span class="dato-valor">620 kg</span></div>
              <div><span class="dato-label">Número/MIDA</span><span class="dato-valor">0F3GHA3</span></div>
              <div><span class="dato-label">Número/finca</span><span class="dato-valor">12</span></div>
            </div>
            <div class="ganado-botones">
              <a href="#" class="btn-reservar"
                 onclick="abrirModal(this); return false;"
                 data-nombre="Genética"
                 data-finca="12"
                 data-img="../Componentes_Visuales_Animados/img/ImgInicio/Toro_Giro.jpg">
                Me Interesa
              </a>
              <a href="#" class="btn-detalles"
                 onclick="abrirDetalles(this); return false;"
                 data-img="../Componentes_Visuales_Animados/img/ImgInicio/Toro_Giro.jpg"
                 data-numero="#12"
                 data-raza="Girolando"
                 data-edad="6 años"
                 data-peso="620 kg"
                 data-produccion=""
                 data-vacunas="Al día. Certificado"
                 data-padre-num="#20001"
                 data-padre-raza="Gir"
                 data-padre-edad="9 años"
                 data-padre-peso="700 kg"
                 data-padre-estado="Activo"
                 data-madre-num="#30002"
                 data-madre-raza="Holanda"
                 data-madre-edad="8 años"
                 data-madre-peso="510 kg"
                 data-madre-estado="Activo"
                 data-cria-num="#11002"
                 data-cria-raza="Girolando">
                Ver detalles
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- ── Card 4 · Toro · Aberdeen Angus ── -->
      <div class="col-12 col-sm-6 col-lg-4 cat-col-card"
           data-tipo="toro"
           data-raza="Aberdeen Angus">
        <div class="ganado-card cat-card">
          <img src="../Componentes_Visuales_Animados/img/ImgInicio/Toro_Abi.jpg" alt="Toro Aberdeen Angus">
          <div class="ganado-info">
            <h4>Genética</h4>
            <span class="badge cat-badge-tipo cat-badge-toro mb-2">Toro</span>
            <div class="ganado-grid-datos">
              <div><span class="dato-label">Peso</span><span class="dato-valor">650 kg</span></div>
              <div><span class="dato-label">Número/MIDA</span><span class="dato-valor">0F3GHA4</span></div>
              <div><span class="dato-label">Número/finca</span><span class="dato-valor">15</span></div>
            </div>
            <div class="ganado-botones">
              <a href="#" class="btn-reservar"
                 onclick="abrirModal(this); return false;"
                 data-nombre="Genética"
                 data-finca="15"
                 data-img="../Componentes_Visuales_Animados/img/ImgInicio/Toro_Abi.jpg">
                Me Interesa
              </a>
              <a href="#" class="btn-detalles"
                 onclick="abrirDetalles(this); return false;"
                 data-img="../Componentes_Visuales_Animados/img/ImgInicio/Toro_Abi.jpg"
                 data-numero="#15"
                 data-raza="Aberdeen Angus"
                 data-edad="4 años"
                 data-peso="650 kg"
                 data-produccion=""
                 data-vacunas="Al día. Certificado"
                 data-padre-num="#20005"
                 data-padre-raza="Angus"
                 data-padre-edad="7 años"
                 data-padre-peso="720 kg"
                 data-padre-estado="Activo"
                 data-madre-num="#30007"
                 data-madre-raza="Angus"
                 data-madre-edad="6 años"
                 data-madre-peso="500 kg"
                 data-madre-estado="Activo"
                 data-cria-num="#11005"
                 data-cria-raza="Angus">
                Ver detalles
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- ── Card 5 · Ternero · Brahman ── -->
      <div class="col-12 col-sm-6 col-lg-4 cat-col-card"
           data-tipo="ternero"
           data-raza="Brahman">
        <div class="ganado-card cat-card">
          <img src="../Componentes_Visuales_Animados/img/ImgInicio/Ternero_Bra.jpg" alt="Ternero Brahman">
          <div class="ganado-info">
            <h4>Genética</h4>
            <span class="badge cat-badge-tipo cat-badge-ternero mb-2">Ternero</span>
            <div class="ganado-grid-datos">
              <div><span class="dato-label">Peso</span><span class="dato-valor">120 kg</span></div>
              <div><span class="dato-label">Número/MIDA</span><span class="dato-valor">0F3GHA5</span></div>
              <div><span class="dato-label">Número/finca</span><span class="dato-valor">33</span></div>
            </div>
            <div class="ganado-botones">
              <a href="#" class="btn-reservar"
                 onclick="abrirModal(this); return false;"
                 data-nombre="Genética"
                 data-finca="33"
                 data-img="../Componentes_Visuales_Animados/img/ImgInicio/Ternero_Bra.jpg">
                Me Interesa
              </a>
              <a href="#" class="btn-detalles"
                 onclick="abrirDetalles(this); return false;"
                 data-img="../Componentes_Visuales_Animados/img/ImgInicio/Ternero_Bra.jpg"
                 data-numero="#33"
                 data-raza="Brahman"
                 data-edad="6 meses"
                 data-peso="120 kg"
                 data-produccion=""
                 data-vacunas="Esquema inicial"
                 data-padre-num="#18880"
                 data-padre-raza="Brahman"
                 data-padre-edad="5 años"
                 data-padre-peso="600 kg"
                 data-padre-estado="Activo"
                 data-madre-num="#31020"
                 data-madre-raza="Brahman"
                 data-madre-edad="4 años"
                 data-madre-peso="430 kg"
                 data-madre-estado="Activo"
                 data-cria-num="#10033"
                 data-cria-raza="Brahman">
                Ver detalles
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- ── Card 6 · Ternero · Holstein ── -->
      <div class="col-12 col-sm-6 col-lg-4 cat-col-card"
           data-tipo="ternero"
           data-raza="Holstein">
        <div class="ganado-card cat-card">
          <img src="../Componentes_Visuales_Animados/img/ImgInicio/Ternero_Hol.jpg" alt="Ternero Holstein">
          <div class="ganado-info">
            <h4>Genética</h4>
            <span class="badge cat-badge-tipo cat-badge-ternero mb-2">Ternero</span>
            <div class="ganado-grid-datos">
              <div><span class="dato-label">Peso</span><span class="dato-valor">110 kg</span></div>
              <div><span class="dato-label">Número/MIDA</span><span class="dato-valor">0F3GHA6</span></div>
              <div><span class="dato-label">Número/finca</span><span class="dato-valor">34</span></div>
            </div>
            <div class="ganado-botones">
              <a href="#" class="btn-reservar"
                 onclick="abrirModal(this); return false;"
                 data-nombre="Genética"
                 data-finca="34"
                 data-img="../Componentes_Visuales_Animados/img/ImgInicio/Ternero_Hol.jpg">
                Me Interesa
              </a>
              <a href="#" class="btn-detalles"
                 onclick="abrirDetalles(this); return false;"
                 data-img="../Componentes_Visuales_Animados/img/ImgInicio/Ternero_Hol.jpg"
                 data-numero="#34"
                 data-raza="Holstein"
                 data-edad="5 meses"
                 data-peso="110 kg"
                 data-produccion=""
                 data-vacunas="Esquema inicial"
                 data-padre-num="#18881"
                 data-padre-raza="Holstein"
                 data-padre-edad="6 años"
                 data-padre-peso="590 kg"
                 data-padre-estado="Activo"
                 data-madre-num="#31021"
                 data-madre-raza="Holstein"
                 data-madre-edad="5 años"
                 data-madre-peso="520 kg"
                 data-madre-estado="Activo"
                 data-cria-num="#10034"
                 data-cria-raza="Holstein">
                Ver detalles
              </a>
            </div>
          </div>
        </div>
      </div>

    </div><!-- /row -->

    <!-- Mensaje sin resultados — lo muestra el JS si el filtro no encuentra nada -->
    <div class="cat-sin-resultados d-none" id="sinResultados">
      <i class="fa-solid fa-cow"></i>
      <p>No hay animales de ese tipo disponibles en este momento.</p>
    </div>

  </div><!-- /container -->
</section>
