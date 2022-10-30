<?php 
	include('./assets/php/scripts.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>YouCode | Scrum Board</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- ================== BEGIN core-css ================== -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="./assets/css/vendor.min.css" rel="stylesheet" />
	<link href="./assets/css/default/app.min.css" rel="stylesheet" />
	<link href="./assets/css/style.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

	<!-- ================== END core-css ================== -->
</head>

<body>

	<!-- BEGIN #app -->
	<div id="app" class="app-without-sidebar ">
		<!-- BEGIN #content -->
		<div id="content" class="app-content main-style">
			<div class=" row ">
				<div class="col-6 ">
					<ol class="breadcrumb ">
						<li class="breadcrumb-item "><a class="text-white text-decoration-none"
								href="javascript:;">Home</a></li>
						<li class="breadcrumb-item active ">Scrum Board </li>
					</ol>
					<!-- BEGIN page-header -->
					<h1 class="page-header text-white ">
						Scrum Board
					</h1>

					<!-- END page-header -->
				</div>

				<div class=" col-6 text-end">
					<button id="button" class="btn btn-success rounded-pill" onclick="popupAddTask()"  type="button" data-bs-toggle="modal" data-bs-target="#modal-task" ><i class="bi bi-plus text-white"></i> Add Task</button>
				</div>
			</div>

			<div class="row ">
				<div class="col-lg-4 col-md-6 col-sm-12 mb-4 ">
					<div class="card " style="background-color: #0F3460 ;">
						<div class="color p-2 rounded-3">
							<h4 class=" text-white">To do (<span id="to-do-tasks-count"><?= $a;?></span>)</h4>
						</div>

						<div class=" " id="to-do-tasks">
							<!-- TO DO TASKS HERE -->
							<?php 
							getTasks(1);
							?>
						</div>

					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 mb-4">
					<div class="card " style="background-color: #0F3460 ;">
						<div class="color p-2 rounded-3">
							<h4 class="text-white">In Progress (<span id="in-progress-tasks-count"><?= $b;?></span>)</h4>
						</div>
						<div class="" id="in-progress-tasks">
							<!-- IN PROGRESS TASKS HERE -->
							
							<?php 
							getTasks(2);
							?>

							
						
							
						</div>
					</div>
				</div>

				<div class=" col-lg-4 col-md-6 col-sm-12 mb-4">
					<div class="card" style="background-color: #0F3460 ;">
						<div class="color p-2 rounded-3">
							<h4 class="text-white">Done (<span id="done-tasks-count"><?= $c;?></span>)</h4>

						</div>
						<div class=" " id="done-tasks">
							<!-- DONE TASKS HERE -->
							<?php 
							getTasks(3);
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END #content -->


		<!-- BEGIN scroll-top-btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top"
			data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
		<!-- END scroll-top-btn -->
	</div>
	<!-- END #app -->



	<!-- bouton add task -->
	<!-- Modal content goes here -->

	<div class="modal fade" id="modal-task" role="dialog" aria-labelledby="exempleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content " style="background-color:#0F3460 ;">
				<div class="modal-header color border-bottom-0">
					<h5 class="modal-title text-white">Add Task</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				<form action="./assets/php/scripts.php" method="post">
					<input type="hidden" id="modalid" name="modelId">
					<div class="mb-3">
						<label for="recipient" class="col-form-label text-white">Title</label>
						<input type="text" name="title" class="form-control" id="recipient">
					</div>
					<div class="mb-3">
						<label for="" class="col-form-label text-white">Type</label>
						<div class="form-check ms-3">
							<input class="form-check-input" type="radio" name="flexRadioDefault" id="TypeFeature" value="1" checked>
							<label class="form-check-label text-white " for="flexRadioDefault1">
								Feature
							</label>
						</div>
						<div class="form-check ms-3">
							<input class="form-check-input" type="radio" name="flexRadioDefault" id="TypeBug" value="2">
							<label class="form-check-label text-white" for="flexRadioDefault2">
								Bug
							</label>
						</div>
					</div>
					<div class="mb-3">
						<label for="Priority" class="col-form-label text-white">Priority</label>
						<select class="form-select " name="priority_id" aria-label="Default select example" id="Priority">
							<option value="" selected>Please select</option>
							<option value="1">High</option>
							<option value="2">Medium</option>
							<option value="3">Low</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="Status" class="col-form-label text-white">Status</label>
						<select class="form-select" name="statues_id" aria-label="Default select example" id="Status">
							<option value="" selected>Please select</option>
							<option value="1">To Do</option>
							<option value="2">In Progress</option>
							<option value="3">Done</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="Date" class="col-form-label text-white">Date</label>
						<input type="date" name="date" class="form-control" id="Date">
					</div>
					<div class="mb-3 ">
						<label for="message-text" class="col-form-label text-white">Description</label>
						<textarea class="form-control" name="descpription" id="message-text"></textarea>
					</div>
					<div class="modal-footer border-0">
				<button type="button" class="btn btn-white" data-bs-dismiss="modal" >Cancel</button>
					<button type="submit" class="btn btn-white save" name="update" value="update"  id="buttonEdit">update</button>
					<button type="submit" class="btn btn-white save" name="delete" value="delete" data-bs-dismiss="modal"  id="buttonDelete">delete</button>
					<button type="submit"  name="save" value="save" id="buttonSave"  class="btn  text-white save" >Save</button>
				</div>
				</form>
				</div>
				
			</div>
		</div>
	</div>










	<!-- ================== BEGIN core-js ================== -->
	
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./js/app.min.js"></script>
	<script src="./js/vendor.min.js"></script>
	<script src="./js/scripts.js"></script>
	<script src=""></script>
	<!-- ================== END core-js ================== -->
</body>

</html>