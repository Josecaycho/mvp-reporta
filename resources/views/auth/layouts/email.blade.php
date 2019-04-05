<!DOCTYPE html>
<html style="background-color: #EEE;">
<head>
	<meta charset="utf-8">
	<title>Karl Alarcon</title>
</head>
<body style="width: 600px; padding: 24px; margin: 0 auto; background-color: #FFF;">
	<table style="border-collapse: collapse; table-layout: fixed; width: 600px; margin: 0 auto; color: #545454; font-family: sans-serif; font-size: 14px;">
		<tbody>
			<tr>
				<td>
					<table style="border-collapse: collapse; table-layout: fixed; width: 100%;">
						<tbody>
							<tr>
								<td>
									<img style="vertical-align: top;" src="{{ asset('img/logo.png') }}" alt="Administrador">
								</td>
							</tr>
							<tr><td style="height: 24px;"></td></tr>
							<tr>
								<td style="font-size: 16px;">
									Hola <strong>{{ $row->name }}</strong>.<br>
									Este es el link para resetear tu contraseña:
									<a href="{{ url('admin/password/showreset/' . $row->id) }}">{{ url('admin/password/showreset/' . $row->id) }}</a>
								</td>
							</tr>
							</tr>
							<tr><td style="height: 6px;"></td></tr>
						</tbody>
					</table>
					<table style="border-collapse: collapse; table-layout: fixed; width: 100%;">
						<tbody>
							<tr>
								<td>
									Gracias por tu tiempo.
								</td>
							</tr>
							<tr><td style="height: 24px;"></td></tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>
