<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask();
    if(isset($_POST['update']))      updateTask();
    if(isset($_POST['delete']))      deleteTask();



  $todo="select tasks.id , tasks.title , tasks.task_datetime , tasks.description , priorities.name AS prioritie , 
  tasks.priority_id, statuses.name AS status , tasks.status_id, types.name AS type
   from tasks
    inner join priorities ON tasks.priority_id = priorities.id
    inner join statuses ON tasks.status_id = statuses.id 
    inner join types ON tasks.type_id = types.id
    WHERE tasks.status_id = 1";
    $a=mysqli_num_rows(mysqli_query($link,$todo));


  $inprogress="select tasks.id , tasks.title , tasks.task_datetime , tasks.description , priorities.name AS prioritie , 
  tasks.priority_id, statuses.name AS status , tasks.status_id, types.name AS type
   from tasks
    inner join priorities ON tasks.priority_id = priorities.id
    inner join statuses ON tasks.status_id = statuses.id 
    inner join types ON tasks.type_id = types.id
    WHERE tasks.status_id = 2";
    $b=mysqli_num_rows(mysqli_query($link,$inprogress));


  $done="select tasks.id , tasks.title , tasks.task_datetime , tasks.description , priorities.name AS prioritie , 
  tasks.priority_id, statuses.name AS status , tasks.status_id, types.name AS type
   from tasks
    inner join priorities ON tasks.priority_id = priorities.id
    inner join statuses ON tasks.status_id = statuses.id 
    inner join types ON tasks.type_id = types.id
    WHERE tasks.status_id = 3";


    $c=mysqli_num_rows(mysqli_query($link,$done));
    

    function getTasks($status)
    {
        //CODE HERE
        //SQL SELECT
    $sql = "select tasks.id , tasks.title , tasks.task_datetime , tasks.description , priorities.name AS prioritie , 
    tasks.priority_id, statuses.name AS status , tasks.status_id, types.name AS type
     from tasks
      inner join priorities ON tasks.priority_id = priorities.id
      inner join statuses ON tasks.status_id = statuses.id 
      inner join types ON tasks.type_id = types.id
      WHERE tasks.status_id = $status  ";
        global $link ;

        $res = mysqli_query($link,$sql);
        $a=mysqli_num_rows($res);


        if(mysqli_num_rows($res) > 0){
            //

            
            while($row = mysqli_fetch_assoc($res)){

                if($status == 1){
                    echo'
                        <button id="'.$row["id"].'" class="p-3 border-0   border-bottom border-white mt-2 color-trans col-12" onclick="pup(this.id)">
                                <div class="">
                                    <i class=""></i>
                                </div>                         
                                <div class="text-start">
                                    <div class="text-white "><i class=" < bi bi-question-circle-fill text-success me-2" dataTitle="'.$row["title"].'"  id="'.$row["id"]."t".'"></i>'.$row["title"].'</div>
                                    <div class="">
                                        <div class="text-white ms-4"  datatime="'.$row["task_datetime"].'"  id="'.$row["id"]."date".'">'.$row["id"].' created in '.$row["task_datetime"].'</div>
                                        <div class="text-white ms-4  title="" dataDescription="'.$row["description"].'" id="'.$row["id"]."d".'" >'.$row["description"].'...</div>
                                    </div>
                                    <div class="mt-2 ms-4 text-start">
                                        <span class="hight p-1 me-2 " datatype="'.$row["type"].'" id="'.$row["id"]."type".'">'.$row["type"].'</span>
                                        <span class="feature p-1" dataprioritie="'.$row["priority_id"].'" id="'.$row["id"]."prioritie".'">'.$row["prioritie"].'</span>
                                        <span class="d-none status" datastatus="'.$row["status_id"].'"  id="'.$row["id"]."status".'" > '.$row["status"].' </span>
                                    </div>
                                </div>
                            </button>:
                        ';
                }
                if($status == 2){
                echo'
                    <button id="'.$row["id"].'" class="p-3 border-0   border-bottom border-white mt-2 color-trans col-12" onclick="pup(this.id)">
							<div class="">
								<i class=""></i>
							</div>                         
							<div class="text-start">
								<div class="text-white "><i class=" spinner-border spinner-border-sm  text-success me-2" dataTitle="'.$row["title"].'"  id="'.$row["id"]."t".'"></i>'.$row["title"].'</div>
								<div class="">
									<div class="text-white ms-4"  datatime="'.$row["task_datetime"].'"  id="'.$row["id"]."date".'">'.$row["id"].' created in '.$row["task_datetime"].'</div>
									<div class="text-white ms-4  title="" dataDescription="'.$row["description"].'" id="'.$row["id"]."d".'" >'.$row["description"].'...</div>
								</div>
								<div class="mt-2 ms-4 text-start">
									<span class="hight p-1 me-2 " datatype="'.$row["type"].'" id="'.$row["id"]."type".'">'.$row["type"].'</span>
									<span class="feature p-1" dataprioritie="'.$row["priority_id"].'" id="'.$row["id"]."prioritie".'">'.$row["prioritie"].'</span>
									<span class="d-none status" datastatus="'.$row["status_id"].'"  id="'.$row["id"]."status".'" > '.$row["status"].' </span>
								</div>
							</div>
						</button>:
                    ';
            }

            if($status == 3){
                echo'
                    <button id="'.$row["id"].'" class="p-3 border-0   border-bottom border-white mt-2 color-trans col-12" onclick="pup(this.id)">
							<div class="">
								<i class=""></i>
							</div>                         
							<div class="text-start">
								<div class="text-white "><i class=" bi bi-check-circle-fill text-success me-2" dataTitle="'.$row["title"].'"  id="'.$row["id"]."t".'"></i>'.$row["title"].'</div>
								<div class="">
									<div class="text-white ms-4"  datatime="'.$row["task_datetime"].'"  id="'.$row["id"]."date".'">'.$row["id"].' created in '.$row["task_datetime"].'</div>
									<div class="text-white ms-4  title="" dataDescription="'.$row["description"].'" id="'.$row["id"]."d".'" >'.$row["description"].'...</div>
								</div>
								<div class="mt-2 ms-4 text-start">
									<span class="hight p-1 me-2 " datatype="'.$row["type"].'" id="'.$row["id"]."type".'">'.$row["type"].'</span>
									<span class="feature p-1" dataprioritie="'.$row["priority_id"].'" id="'.$row["id"]."prioritie".'">'.$row["prioritie"].'</span>
									<span class="d-none status" datastatus="'.$row["status_id"].'"  id="'.$row["id"]."status".'" > '.$row["status"].' </span>
								</div>
							</div>
						</button>:
                    ';
            }
        }
    }
}

    function saveTask()
    {
        //CODE HERE
        //SQL INSERT
        global $link;
     if(isset($_POST['save'])){
        $title= $_POST['title'];
        $mode= $_POST['flexRadioDefault'];
        $priority= $_POST['priority_id'];
        $statu= $_POST['statues_id'];
        $date= $_POST['date'];
        $description= $_POST['descpription'];
        $query=mysqli_query($link,"INSERT INTO `tasks`(`id`, `title`, `type_id`, `priority_id`, `status_id`, `task_datetime`, `description`) 
         VALUES ('','$title','$mode','$priority','$statu','$date','$description')");
        if($query) header("location:../../index.php");
        if(!$query) echo "not created";
     }
    }

    function updateTask()
    {
        
        //CODE HERE
        //SQL UPDATE
        global $link;
        if(isset($_POST['update'])){
            $id=$_POST['modelId'];
           $title= $_POST['title'];
           $mode= $_POST['flexRadioDefault'];
           $priority= $_POST['priority_id'];
           $statu= $_POST['statues_id'];
           $date= $_POST['date'];
           $description= $_POST['descpription'];
           $query=mysqli_query($link," UPDATE `tasks` SET `title`='$title',`type_id`='$mode',`priority_id`='$priority'
           ,`status_id`='$statu',`task_datetime`='$date',`description`='$description'
            WHERE id='$id'");
           if($query) header("location:../../index.php");
           if(!$query) echo "not update";
        }
    }

    function deleteTask()
    {
        //CODE HERE
        //SQL DELETE
        global $link ;
        if(isset($_POST['delete'])){
            $id=$_POST['modelId'];
            $query = mysqli_query($link,"DELETE FROM `tasks` WHERE id='$id' ");
            if($query) header("location:../../index.php");
            if(!$query) echo "not delete";
        }
    }

?>