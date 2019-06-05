<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
		<script src="{{ URL::asset('js/app.js') }}"></script>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
	@include('layouts.header', array('title'=>'Over Ons'))

		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h1>Contact en Info van De brødbakkers</h1>
					<h3>Bestuursleden</h3>
                    <p>
						<ul>
							<li>Mwoathen – voorzitter</li>
							<li>Jeop – achterzitter</li>
						</ul>
					</p>

                    <p>
                    <h3>
                        Wat De brødbakkers doen:
                    </h3>
                    <ol>
                        <li>Het bieden van grafische brød</li>
                        <li>Educatie en meer brød</li>
                        <li>Aanbieden van exposities en projecten met een relatie tot brød</li>
                    </ol>
                    </p>
				</div>

				<div class="col-md-6">
                    <p>
                    <h1>
                        Adresgegevens
                    </h1>
                    Mølenstraat 117<br>
                    5171 DL ‘s-Hertogenbosch<br>
                    T 06 29291996<br>
                    <a href="mailto:info@gadenbosch.nl">malebeek@avans.nl</a><br>
					IBAN: NL11RABO0113284799
                    </p>
					<h3>Openingstijden</h3>
					<p>
						ma t/m vrij van 7:00 - 14:00<br>
						za van 13:00 - 17:00<br>
					</p>
				</div>
			</div>
			<br>
			<br>
		</div>
	@include('layouts.footer')
	</body>
</html>