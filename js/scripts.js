function popupAddTask(){

    const inputTitle = document.getElementById("recipient"); 
    const selectPriority= document.getElementById("Priority");    
    const selectStatus= document.getElementById("Status");   
    const data= document.getElementById("Date");   
    const descrip= document.getElementById("message-text");  
  
    inputTitle.value= "" 
    selectPriority.value = "" 
    selectStatus.value = "" 
    data.value = "" 
    descrip.value = "" 
  
    buttonSave.style.display = 'block';
    buttonDelete.style.display = 'none';
    buttonEdit.style.display = 'none';
  }



  function pup(id){
    document.getElementById("button").click();

    buttonSave.style.display = 'none';
    buttonEdit.style.display = 'block';
    buttonDelete.style.display = 'block';
    
     const title = document.getElementById(id+'title')
     const description = document.getElementById(id+'description')
     const date = document.getElementById(id+'date')
     const type = document.getElementById(id+'type')
     const status = document.getElementById(id+'prioritie')
     
     
    document.getElementById("modalid").value =id;
    document.getElementById("recipient").value =document.getElementById(id+"title").getAttribute("dataTitle");
    document.getElementById("Type"+ document.getElementById(id+"type").getAttribute("datatype")).checked =true ;  
    document.getElementById("Priority").value = document.getElementById(id+"prioritie").getAttribute("dataprioritie");
    document.getElementById("Status").value = document.getElementById(id+"status").getAttribute("datastatus");
    document.getElementById("message-text").value = document.getElementById(id+"description").getAttribute("dataDescription");
    document.getElementById("Date").value = document.getElementById(id+"date").getAttribute("datatime");

  }