                <form action="?view=Clientes&action=CrearUsuario" method="post">
						<div class="form-group">
							<label class="co|l-form-label">Nombres</label>
							<input type="text" class="form-control" placeholder=" " name="nombres" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Apellidos</label>
							<input type="text" class="form-control" placeholder=" " name="apellidos" required="">
						</div>
					
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="email" class="form-control" placeholder=" " name="email" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="password" class="form-control" placeholder=" " name="pass" id="password1" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Confirm Password</label>
							<input type="password" class="form-control" placeholder=" " name="Confirm Password" id="password2" required="">
						</div>
						<div class="right-w3l">
                            <button type="submit" class="form-control">Registrar</button>
							<!-- <input type="submit" class="form-control" value="Register"> -->
						</div>
						<div class="sub-w3l">
							<div class="custom-control custom-checkbox mr-sm-2">
								<input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
								<label class="custom-control-label" for="customControlAutosizing2">I Accept to the Terms & Conditions</label>
							</div>
						</div>
					</form>