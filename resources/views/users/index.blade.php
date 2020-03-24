<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ciclo - Platzi</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 mx-auto">
				<div class="card border-0 shadow">
					<div class="card-body">
						<form action="{{ route('users.store') }}" method="POST">
							<div class="form-row">
								<div class="col-sm-3">
									<input type="text" class="form-control" name="name" placeholder="Nombre">
								</div>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="email" placeholder="Email">
								</div>
								<div class="col-sm-3">
									<input type="password" class="form-control" name="password" placeholder="Clave">
								</div>
								<div class="col-auto">
									@csrf								
									<button  type="submit" class="btn btn-sm btn-primary btn-block">
										Enviar
									</button>
								</div>
							</div>
						</form>
					</div>
						
				</div>
				<table class="table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nombre</th>
							<th>Email</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($users as $user)
							<tr>
								<td>{{ $user->id }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>
									<form action="{{ route('users.destroy',$user) }}"" method="POST">
										@method('DELETE')
										@csrf
										<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Desea eliminar?')">
											Eliminar
										</button>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>