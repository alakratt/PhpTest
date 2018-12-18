<?php
	include './includes/mongo_conn.php';
	$collection = $client->Payroll->Users;
	$employees = $collection->find();
	var_dump($employees);
	//$ddlBtnText = 'Select an employee';
	if (isset($_POST) && isset($_POST['hdnSelectedEmp'])) {
		//echo 'form posted';
		//var_dump($_POST);
		$paystubs = $client->Payroll->Paystubs;
		$insertOneResult = $paystubs->insertOne([
    		'user_name' => $_POST['hdnSelectedEmp'],
		    'pay_amount' => 1000,
		    'name' => date('Y-m-d'),
		]);
		$_POST['hdnSelectedEmp'] = null;
		var_dump($insertOneResult);
	}
	$_POST['hdnSelectedEmp'] = null;
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<title></title>
	</head>
	<body>
		<div class="container">
		<form method="post">
			<input type="hidden" id="hdnSelectedEmp" name="hdnSelectedEmp" />
			
				<h1>Add employee paystud</h1>
				<div class="row">
					<div class="col-sm form-group">
						<label for="employess">Employee</label>
						<div class="dropdown">
							<button class="btn btn-secondary dropdown-toggle" style="width: 20%;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span id="spnDefaultDdlText">Select an employee</span><span id="spnSelectedDdlEmp" style="display:none;" name="selectedEmp"></span>
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<?php
									foreach ($employees as $doc) {
										echo '<a class="dropdown-item" href="#">'.$doc['first_name'].'</a>';
									}
								?>
							</div>
						</div>
					</div>
				</div>
			<button class="btn btn-success" type="submit">Submit</button>
		</form>
		
</div>
	</body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(function(){
			$('.dropdown-item').on('click', function(e){
				//console.log(e.target.text);
				$('#spnDefaultDdlText').hide();
				$('#spnSelectedDdlEmp').show();
				$('#spnSelectedDdlEmp').html(e.target.text);
				$('#hdnSelectedEmp').val(e.target.text);
			});
		});
	</script>
</html>