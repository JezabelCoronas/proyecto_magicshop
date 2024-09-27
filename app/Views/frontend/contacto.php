
    <section class="container-fluid">
         <?php $validation = \Config\Services::validation(); ?>
    <form method="post" action="<?php echo base_url('/consulta-form') ?>">
        <?php if (session()->getFlashdata('fail')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
        <?php endif ?>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
        <?php endif ?>
        <img src="assets/img/contacto.png" class="d-block w-100" alt="2">
    </section>

    <hr class="hr" />
    <h1 class="carrois-gothic-regular text-center">Déjanos tu Consulta</h1>
    <h2 class="carrois-gothic-regular text-center">Y un asesor te responderá a la brevedad.</h2>

   

        <div class="container mt-2 mb-5 d-flex justify-content-center">
            <div class="card" style="width: 60%;">
                <div class="card-header text-center">
                    <div class="container-fluid carrois-gothic-regular">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-outline mb-4 texto-cuerpo">
                                    <input type="text" name="consulta_nombre" class="form-control" />
                                    <label class="form-label">Nombre</label>
                                    <?php if ($validation->getError('consulta_nombre')): ?>
                                        <div class="alert alert-danger mt-2">
                                            <?= $validation->getError('consulta_nombre'); ?>
                                        </div>
                                    <?php endif ?>
                                </div>

                                <div class="form-outline mb-4 texto-cuerpo">
                                    <input type="text" name="consulta_apellido" class="form-control" />
                                    <label class="form-label">Apellido</label>
                                    <?php if ($validation->getError('consulta_apellido')): ?>
                                        <div class="alert alert-danger mt-2">
                                            <?= $validation->getError('consulta_apellido'); ?>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-outline mb-4 texto-cuerpo">
                                    <input type="email" name="consulta_email" class="form-control" />
                                    <label class="form-label">Email</label>
                                    <?php if ($validation->getError('consulta_email')): ?>
                                        <div class="alert alert-danger mt-2">
                                            <?= $validation->getError('consulta_email'); ?>
                                        </div>
                                    <?php endif ?>
                                </div>

                                <div class="form-outline mb-4 texto-cuerpo">
                                    <input type="number" name="consulta_telefono" class="form-control" />
                                    <label class="form-label">Teléfono</label>
                                    <?php if ($validation->getError('consulta_telefono')): ?>
                                        <div class="alert alert-danger mt-2">
                                            <?= $validation->getError('consulta_telefono'); ?>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-outline mb-4 texto-cuerpo">
                                    <textarea class="form-control" name="consulta_mensaje" rows="4"></textarea>
                                    <label class="form-label">Mensaje</label>
                                    <?php if ($validation->getError('consulta_mensaje')): ?>
                                        <div class="alert alert-danger mt-2">
                                            <?= $validation->getError('consulta_mensaje'); ?>
                                        </div>
                                    <?php endif ?>
                                </div>

                                <div class="form-check d-flex justify-content-center mb-4 texto-cuerpo">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form4Example4" checked />
                                    <label class="form-check-label" for="form4Example4">
                                        Enviar una copia del mensaje
                                    </label>
                                </div>

                                <input type="submit" value="Enviar" class="btn btn-success">
                                <a href="<?php echo base_url('contacto'); ?>" class="btn btn-danger">Cancelar</a>
                                <input type="reset" value="Borrar" class="btn btn-secondary">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <hr class="hr" />

    <section class="container-fluid">
        <h1 class="carrois-gothic-regular text-center">Dónde Nos Encontramos</h1>
        <img src="assets/img/mapa.jpg" class="d-block w-100" alt="2">
    </section>

    <hr class="hr" />

    <section class="container-fluid">
        <h1 class="carrois-gothic-regular text-center">Más Información de Contacto</h1>
        <p class="carrois-gothic-regular text-center">Teléfonos: +54 6565353 - +54 2323232</p>
        <p class="carrois-gothic-regular text-center">E-mail: magicshopaccesorios@magicshop.com.ar</p>
        <p class="carrois-gothic-regular text-center">Dirección: Plaza de las Mil Viviendas 3404, Ciudad de Corrientes</p>
    </section>

</body>
  <hr class="hr" />

</html>
