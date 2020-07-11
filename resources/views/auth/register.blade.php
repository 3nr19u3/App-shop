@extends('layouts.app')

@section('body-class','signup-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('/img/city.jpg') }}'); background-size: cover; background-position: top center;">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup">
							<form method="POST" action="{{ route('register') }}">
                            @csrf
								<div class="header header-primary text-center">
									<h4>Registro</h4>
									<!-- <div class="social-line">
										<a href="#" class="btn btn-simple btn-just-icon">
											<i class="fa fa-facebook-square"></i>
										</a>
										<a href="#" class="btn btn-simple btn-just-icon">
											<i class="fa fa-twitter"></i>
										</a>
										<a href="#" class="btn btn-simple btn-just-icon">
											<i class="fa fa-google-plus"></i>
										</a>
									</div> -->
								</div>
								<p class="text-divider">Completa tus Datos</p>
								<div class="content">

                                    <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">face</i>
										</span>
										<input type="text" class="form-control" placeholder="Nombres" 
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" 
                                        value="{{ old('email') }}" placeholder="Correo Electronico" required autocomplete="email" autofocus>
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                        name="password" required autocomplete="current-password" placeholder="Contraseña" />
									</div>

                                    <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                        name="password_confirmation" required autocomplete="current-password" placeholder="Confirmar contraseña" />
									</div>
									<!-- If you want to add a checkbox to this form, uncomment this code-->

									<!--<div class="checkbox">
										<label>
											<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
											Recordar Sesion
										</label>
									</div>-->
								</div>
								<div class="footer text-center">
									<button type="submit" class="btn btn-simple btn-primary btn-lg">Registrarme</button>
								</div>
                                    <!--<a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>-->
							</form>
						</div>
					</div>
				</div>
			</div>

			@include('includes.footer')

		</div>
@endsection
