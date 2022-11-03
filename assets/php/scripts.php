<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES


    //ROUTING
    if(isset($_POST['save']))        saveTask();
    if(isset($_POST['update']))      updateTask();
    if(isset($_POST['delete']))      deleteTask();



  $requeteToDo="select tasks.id , tasks.title , tasks.task_datetime , tasks.description , priorities.name AS prioritie , 
  tasks.priority_id, statuses.name AS status , tasks.status_id, types.name AS type
   from tasks
    inner join priorities ON tasks.priority_id = priorities.id
    inner join statuses ON tasks.status_id = statuses.id 
    inner join types ON tasks.type_id = types.id
    WHERE tasks.status_id = 1";
    $a=mysqli_num_rows(mysqli_query($link,$requeteToDo));


  $requeteInprogress="select tasks.id , tasks.title , tasks.task_datetime , tasks.description , priorities.name AS prioritie , 
  tasks.priority_id, statuses.name AS status , tasks.status_id, types.name AS type
   from tasks
    inner join priorities ON tasks.priority_id = priorities.id
    inner join statuses ON tasks.status_id = statuses.id 
    inner join types ON tasks.type_id = types.id
    WHERE tasks.status_id = 2";
    $b=mysqli_num_rows(mysqli_query($link,$requeteInprogress));


  $requeteDone="select tasks.id , tasks.title , tasks.task_datetime , tasks.description , priorities.name AS prioritie , 
  tasks.priority_id, statuses.name AS status , tasks.status_id, types.name AS type
   from tasks
    inner join priorities ON tasks.priority_id = priorities.id
    inner join statuses ON tasks.status_id = statuses.id 
    inner join types ON tasks.type_id = types.id
    WHERE tasks.status_id = 3";


    $c=mysqli_num_rows(mysqli_query($link,$requeteDone));
    

    function getTasks($status) {
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
        
      return $res ;
}

    function saveTask() {
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
        $query=mysqli_query($link,"INSERT INTO `tasks`
         VALUES (NULL,'$title','$mode','$priority','$statu','$date','$description')");
        if($query) header("location:../../index.php");
        if(!$query) echo "not created";
     }
    }

    function updateTask() {
        
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

    function deleteTask() {
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