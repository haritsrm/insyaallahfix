var i;
function field(){
    for (i = 1; i < 100; i++){
        if (document.getElementById('check' + i).checked){
            document.getElementById('jumlah' + i).style.display = "block";
        }else{
            document.getElementById('jumlah' + i).style.display = "none"; 
            document.getElementById('jumlah' + i).value = null;        
        }
    }
}