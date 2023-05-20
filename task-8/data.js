function myfun(){
    var data =document.getElementsByName("subject[]");
    var datas=0;
    for(let count=0;count<data.length;count++){
        if(data[count].checked ==true){
            datas = datas + 1;
        }
    }
    
    if(datas>=3){
        document.getElementById('notvalid').innerHTML="you can only select any two"
        return false;
    }
    if(datas<0){
        document.getElementById('notvalid').innerHTML=""
    }
  }
function checkdelete(){
    return confirm("are you sure ?");
}
