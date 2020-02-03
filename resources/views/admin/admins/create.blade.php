@extends('layouts.master')

@section('title', 'Ajouter nouveau administrateur')

@section('content')
	<div class="container-fluid">
		<div class="row">
            <div class="col-12">
                <h1>Nouveau administrateur</h1>
                <div class="top-right-button-container mb-4">
                    <button data-url="{{ route('admins.index') }}" type="button" class="btn btn-primary btn-lg top-right-button link-type">Liste des administrateurs</button>
                </div>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="#">Tableau de board</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admins.index') }}">Admins</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Nouveau administrateur</li>
                    </ol>
                </nav>
                <div class="separator mb-5"></div>
            </div>
        </div>

		<form action="{{ route('admins.store') }}" method="post" enctype="multipart/form-data">
			@csrf
		    <div class="row">
		    	<div class="col-md-3">
		    		<div class="card mb-4">
	                    <div class="card-body text-center">
	                        <h5 class="text-left">Photo</h5>
	                        <div class="separator mb-4"></div>
	                    	<img id="user-picture" class="img-circle" style="width: 150px; height: 150px;" src="{{ asset('assets/img/profile-pic-l.jpg') }}" >
	                    	<input type="file" class="hide" name="picture" id="file-user-picture">
	                    </div>
	                    <div class="card-footer bg-white">
	                    	<button id="select-user-picture" type="button" class="btn btn-primary btn-block">Choisir une image</button>
	                    </div>
	                </div>
		    	</div>

		    	<div class="col-md-9">
		    		<div class="card mb-4">
	                    <div class="card-body">
	                        <h5>Informations personnel</h5>
	                    	<div class="separator mb-4"></div>	                        
	                        <div class="row">
	                        	<div class="col-md-6">
		                            <div class="form-group">
		                                <label for="first_name">Nom</label>
		                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" value="{{ old('first_name') }}" placeholder="Nom">
		                            	@error('first_name')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>
	                        	</div>
	                        	<div class="col-md-6">
		                            <div class="form-group">
		                                <label for="last_name">Prénom</label>
		                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="Prénom">
		                            	@error('last_name')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>
	                        	</div>
	                        </div>

	                        <h5 class="mt-4">Accès au plateforme <span class="text-danger text-small">[Mobile]</span></h5>
	                        <div class="separator mb-4"></div>
							<div class="form-group">
							    <label for="ppr_number">PPR</label>
							    <input type="text" class="form-control @error('ppr_number') is-invalid @enderror" name="ppr_number" id="ppr_number" value="{{ old('ppr_number') }}" placeholder="PPR">
								@error('ppr_number')
							        <span class="invalid-feedback" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
	                        
	                        <h5 class="mt-4">Accès au plateforme <span class="text-danger text-small">[Web]</span></h5>
	                        <div class="separator mb-4"></div>
							<div class="row">
		                        <div class="col-md-6">
									<div class="form-group">
									    <label for="email">E-mail</label>
									    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="E-mail">
										@error('email')
									        <span class="invalid-feedback" role="alert">
									            <strong>{{ $message }}</strong>
									        </span>
									    @enderror
									</div>
		                        </div>
								<div class="col-md-3">
							        <div class="form-group">
							            <label for="password">Mot de passe</label>
							            <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}" placeholder="Mot de passe">
							        </div>
								</div>
								<div class="col-md-3">
							        <div class="form-group mb-0">
							            <label for="password_confirmation">Confirmation</label>
							            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirmation">
							        </div>
								</div>
							</div>

							<div class="mt-4"></div>
                            <button type="submit" class="float-right btn btn-primary mb-0">Enregistrer</button>
	                    </div>
	                </div>
		    	</div>
		    </div>
			
		</form>
	</div>
@endsection

@section('custom-stylesheet')
	<style>
		.img-circle {
			border-radius: 50%;
		}
	</style>
@endsection

@section('custom-javascript')
	<script type="text/javascript">
		$(document).ready(function () {
			$('#select-user-picture').click(function () {
				$('#file-user-picture').click();
			});
			
			$('#file-user-picture').change(function () {
				$('#user-picture').attr(
					'src', window.URL.createObjectURL(this.files[0])
				);
			});
		})
	</script>
@endsection