
    <!--Carrusel de imágenes-->
          <section class = "container-fluid">
             <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                  <img src="assets\img\slide1.jpg" class="d-block w-100" alt="1">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                  <img src="assets\img\slide2.jpg" class="d-block w-100" alt="2">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                  <img src="assets\img\slide4.png"class="d-block w-100" alt="3">
                </div>
              </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
          </button>
           </div>
          </div>
      </section>
      </section>

        <hr class="hr" />

          <!--Carrusel pequeño con productos destacados. Decorativo-->
            <section class="container-fluid">
              <div class="row mt-5 tittle">
                  <h1>¡LOS MÁS VENDIDOS!</h1>
              </div>
              <div class="row">
                  <div class="col-md-12">

                      <div id="carouselLogos" class="carousel slide  pb-4" data-bs-ride="carousel">

                          <div class="carousel-inner px-5">
                              <div class="carousel-item active">
                                  <div class="row  ">
                                      <div class="  col-6 col-md-4 col-lg-2 align-self-center">
                                          <img class=" max-img-size d-block w-100 px-3 mb-3"
                                              src="assets\img\phonecase.jpg" alt="">
                                      </div>
                                      <div class=" col-6  col-md-4 col-lg-2  align-self-center">
                                          <img class=" max-img-size d-block w-100 px-3  mb-3"
                                              src="assets\img\auris.jpg" alt="">
                                      </div>
                                      <div class=" col-6 col-md-4 col-lg-2  align-self-center">
                                          <img class=" max-img-size d-block w-100 px-3  mb-3"
                                              src="assets\img\charge.jpg" alt="">
                                      </div>
                                      <div class=" col-6 col-md-4 col-lg-2  align-self-center">
                                          <img class=" max-img-size d-block w-100 px-3  mb-3"
                                              src="assets\img\phonecase2.jpg" alt="">
                                      </div>
                                      <div class=" col-6  col-md-4 col-lg-2  align-self-center">
                                          <img class=" max-img-size d-block w-100 px-3  mb-3"
                                              src="assets\img\auris2.jpg" alt="">
                                      </div>
                                      <div class=" col-6  col-md-4 col-lg-2  align-self-center">
                                          <img class="max-img-size d-block w-100 px-3  mb-3"
                                              src="assets\img\funda.jpg" alt="">
                                      </div>
                                  </div>

                              </div>
                              <div class="carousel-item">
                                  <div class="row">
                                      <div class="col-6 col-md-4 col-lg-2 align-self-center">
                                          <img class="max-img-size d-block w-100 px-3  mb-3"
                                              src="assets\img\funda2.jpg" alt="">
                                      </div>
                                      <div class="col-6  col-md-4  col-lg-2  align-self-center">
                                          <img class="max-img-size d-block w-100 px-3  mb-3"
                                              src="assets\img\reloj1.jpg" alt="">
                                      </div>
                                      <div class="col-6 col-md-4  col-lg-2 align-self-center">
                                          <img class="max-img-size d-block w-100 px-3  mb-3"
                                              src="assets\img\powerbank.jpg" alt="">
                                      </div>
                                      <div class="col-6 col-md-4  col-lg-2  align-self-center">
                                          <img class="max-img-size d-block w-100 px-3  mb-3"
                                              src="assets\img\funda3.jpg" alt="">
                                      </div>
                                      <div class="col-6 col-md-4 col-lg-2  align-self-center">
                                          <img class="max-img-size d-block w-100 px-3  mb-3"
                                              src="assets\img\funda4.jpg"alt="">
                                      </div>
                                      <div class="col-6  col-md-4 col-lg-2  align-self-center">
                                          <img class="max-img-size d-block w-100 px-3  mb-3"
                                              src="assets\img\parlante.jpg" alt="">
                                      </div>
                                  </div>

                              </div>

                          </div>
                          </div>
                    </div><!-- /lc-block -->
                    </div><!-- /col -->
                 </div>

                </section>
              </div>

          <!--Botón que lleva al Catálogo Completo-->
          <section class="container-fluid d-flex justify-content-center align-items-center">
                <div>
                    <a href="<?php echo base_url('productos'); ?>" class="btn btn-custom btn-lg mt-3">MIRÁ TODOS NUESTROS PRODUCTOS</a>
                </div>
          </section>

         <hr class="hr" />


        <!--Separador Decorativo-->
         <img src="assets\img\acessor1.png" class="d-block w-100" alt="1">

        <!--Botón que lleva a Quienes Somos-->
          <section class="container-fluid d-flex justify-content-center align-items-center">
              <div>
                  <a href="<?php echo base_url('quienes_somos'); ?>" class="btn btn-custom btn-lg mt-3">ACERCA DE NOSOTROS</a>
              </div>
          </section>
 
         <hr class="hr" />
         
        <!--Card Decorativo con productos. Botón Ver Más lleva al Catálogo-->

          <section class= "container-fluid">
              <h1 class="carrois-gothic-regular text-center">PRODUCTOS DESTACADOS</h1>
          </section>
                
        <section class= "container-fluid">

              <div class="card-group">
                  <div class="card">
                    <img src="assets\img\auris4.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">AURICULARES TWS CERO</h5>
                      <p class="card-text">Auriculares</p>
                      <a href="<?php echo base_url('productos'); ?>" class="btn btn-custom">Ver Más</a>

                    </div>
                    
                  </div>
                  <div class="card">
                    <img src="assets\img\parlante2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">PARLANTE LIGHT RIFF XS150</h5>
                      <p class="card-text">Parlantes</p>
                      <a href="<?php echo base_url('productos'); ?>" class="btn btn-custom">Ver Más</a>
                    </div>
                  </div>
                  <div class="card">
                    <img src="assets\img\funda5.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">PROTECTORES ANTISHOCK ULTRATRANSPARENTE</h5>
                      <p class="card-text">Fundas</p>
                      <a href="<?php echo base_url('productos'); ?>" class="btn btn-custom">Ver Más</a>
                    </div>
                    
                  </div>
                </div>
              <hr class="hr" />

        </section>   
  

   </body>