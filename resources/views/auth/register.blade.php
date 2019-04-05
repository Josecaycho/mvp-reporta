@extends('auth.layouts.layout')

@section('content')

<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 ctn-rco-1" style="background-image: url({{asset('img/registro-consultor/img-1.png')}});">
				<div class="ctn-1-1">
					<img class="img-fluid" src="img/registro-consultor/logo.png" alt="">
				</div>
			</div>
			<div class="col-md-6 ctn-rco-2">
				<ul class="consu-register">
					<li>
						<a href="login.html">Iniciar Sesión</a>
					</li>
				</ul>
				<div class="ctn-2-1">
          <form method="POST" action="{{ route('register') }}">
              @csrf
						<h2>Registrate</h2>
						<div class="container">
							<div class="row">
								<div class="ctn-2-1-1 col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Nombre</label>
										<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa tu nombre">
									</div>
								</div>
								<div class="ctn-2-1-1 col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Apellido</label>
										<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa tus apellidos">
										</div>
								</div>
								<div class="ctn-2-1-1 col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Correo electrónico</label>
										<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa tu correo electrónico">
									</div>
								</div>
								<div class="ctn-2-1-1 col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1" class="n-celular">Número de celular</label>
										<div class="row">
											<div class="col-md-4">
												<select class="form-control" id="exampleFormControlSelect1">
													<option disabled selected>Pais </option>
													<option value="+51">Per&uacute;</option>
                          <option value="+54">Argentina</option>
                          <option value="+297">Aruba</option>
                          <option value="+591">Bolivia</option>
                          <option value="+56">Chile</option>
                          <option value="+57">Colombia</option>
                          <option value="+506">Costa Rica</option>
                          <option value="+53">Cuba</option>
                          <option value="+593">Ecuador</option>
                          <option value="+503">El Salvador</option>
                          <option value="+34">España</option>
                          <option value="+502">Guatemala</option>
                          <option value="+504">Honduras</option>
                          <option value="+52">México</option>
                          <option value="+505">Nicaragua</option>
                          <option value="+507">Panamá</option>
                          <option value="+595">Paraguay</option>
                          <option value="+1">Puerto Rico</option>
                          <option value="+598">Uruguay</option>
                          <option value="+58">Venezuela</option>
												</select>
											</div>
											<div class="col-md-8">
												<input type="number" class="form-control n-celular" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa tu número celular">
	
											</div>
										</div>
									</div>
								</div>
								<div class="ctn-2-1-1 col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Linkedin</label>
										<input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa tu correo electrónico">
									</div>
								</div>
								<div class="ctn-2-1-1 col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Experiencia en</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>Seleccione una opcion de la lista </option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
								</div>
								<div class="ctn-2-1-1 col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Contraseña</label>
										<input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa tu correo electrónico">
									</div>
								</div>
								<div class="ctn-2-1-1 col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Confirmar contraseña</label>
										<input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa tu correo electrónico">
									</div>
								</div>
								<!-- <div class="ctn-2-1-1 col-md-6 offset-md-3">
                                    <center>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">CV</label>
                                            <br>
                                            <label for="file-upload" class="custom-file-upload">
                                                <i class="fas fa-cloud-upload-alt"></i> Adjuntar Archivo
                                                </label>
                                                <input id="file-upload" type="file"/>
                                            </select>
                                        </div>
                                    </center>
								</div> -->
								<!-- Default unchecked -->
								<div class="col-md-12 col-lg-12 col-12 checkes">
									<center>
										<div class="custom-control custom-checkbox checkes">
											<input type="checkbox" class="custom-control-input" id="defaultUnchecked">
											<label class="custom-control-label" for="defaultUnchecked">Aceptar términos y condiciones</label>
										</div>
									</center>
								</div>
								<div class="form-group ingresar col-md-6 offset-md-3 ">
                                    <input type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-md" value="Registrarme">
                                    <div class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="col-md-12 ingresar">
                                                    <br>
                                                    <img class="img-fluid" src="img/registro-consultor/check.png" alt="">
                                                    <br>
                                                    <br>
													<p>Gracias por registrate en REPORTA.Para iniciar crea una plantilla de inspecion y genera valor para empresas del sector compartiendo tu experiencia</p>
													<br>
													<br>
													<p>Ingresa a nuestro <a href="">Canal de Youtube</a> para más información, o contactanos</p>
													<p>si tienes alguna duda</p>
                                                    <br>
                                                    <br>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
                                                    <br>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								</div>
								<div class="link col-12 col-md-12 .col-lg-12">
									<a href="">¿Ya tienes cuenta? Inicia Sesión</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

@endsection