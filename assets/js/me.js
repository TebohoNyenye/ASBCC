var myarray;
var submissions="submissions";
function getme(){
   
    var array;
    var url = "https://kf.kobotoolbox.org/assets/a65dinHepenZuyRYzrtUbZ/submissions/?format=json";
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url);
    
    xhr.setRequestHeader("Authorization", "Bearer 00356ef249a28bba53ce7d0992787fd1e12373ff");
    xhr.withCredentials = false;
    xhr.onreadystatechange = function () {
       if (xhr.readyState === 4) {
          console.log(xhr.status);
          
		   var data= JSON.parse(xhr.responseText);
           var arr = Object.values(data);
           console.log(arr);
           var numb = arr.length;
        myarray = numb;
         
            

           var table = document.getElementById('sub');
          

           for(var i=0;i<arr.length;i++){

           var row = '<tr>       <td>' +arr[i].House_to_house_visits + '</td>  <td>'+arr[i]._submission_time +'<td>' +arr[i]._submitted_by+' </td> </tr>'
           
           table.innerHTML += row;
           }
           $('.toast-body').append('<p>'+myarray+'  : '+submissions+'</p>');
          
           
       }};
    xhr.send();


}

