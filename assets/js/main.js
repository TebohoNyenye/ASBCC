const EXCEL_TYPE = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=UTF-8';
const EXCEL_EXTENSION = '.xlsx';



!function(e) {
    var t = {};
    function r(n) {
        if (t[n])
            return t[n].exports;
        var o = t[n] = {
            i: n,
            l: !1,
            exports: {}
        };
        return e[n].call(o.exports, o, o.exports, r),
        o.l = !0,
        o.exports
    }
    r.m = e,
    r.c = t,
    r.d = function(e, t, n) {
        r.o(e, t) || Object.defineProperty(e, t, {
            enumerable: !0,
            get: n
        })
    }
    ,
    r.r = function(e) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
            value: "Module"
        }),
        Object.defineProperty(e, "__esModule", {
            value: !0
        })
    }
    ,
    r.t = function(e, t) {
        if (1 & t && (e = r(e)),
        8 & t)
            return e;
        if (4 & t && "object" == typeof e && e && e.__esModule)
            return e;
        var n = Object.create(null);
        if (r.r(n),
        Object.defineProperty(n, "default", {
            enumerable: !0,
            value: e
        }),
        2 & t && "string" != typeof e)
            for (var o in e)
                r.d(n, o, function(t) {
                    return e[t]
                }
                .bind(null, o));
        return n
    }
    ,
    r.n = function(e) {
        var t = e && e.__esModule ? function() {
            return e.default
        }
        : function() {
            return e
        }
        ;
        return r.d(t, "a", t),
        t
    }
    ,
    r.o = function(e, t) {
        return Object.prototype.hasOwnProperty.call(e, t)
    }
    ,
    r.p = "/",
    r(r.s = 2)
}([, , function(e, t, r) {
    e.exports = r(3)
}
, function(e, t) {
    for (var r = document.querySelectorAll(".sidebar-item.has-sub"), n = function() {
        var e = r[o];
        r[o].querySelector(".sidebar-link").addEventListener("click", (function(t) {
            t.preventDefault();
            var r = e.querySelector(".submenu");
            r.classList.contains("active") ? r.classList.remove("active") : r.classList.add("active")
        }
        ))
    }, o = 0; o < r.length; o++)
        n();
    var i = document.querySelectorAll(".sidebar-toggler");
    for (o = 0; o < i.length; o++) {
        i[o].addEventListener("click", (function() {
            var e = document.getElementById("sidebar");
            e.classList.contains("active") ? e.classList.remove("active") : e.classList.add("active")
        }
        ))
    }
    if ("function" == typeof PerfectScrollbar) {
        var c = document.querySelector(".sidebar-wrapper");
        new PerfectScrollbar(c)
    }
    window.onload = function() {
        var e = window.innerWidth;
        e < 768 && (console.log("widthnya ", e),
        document.getElementById("sidebar").classList.remove("active"))
      
        reports();
        schoolReports();
        obesityReports();
        Infantreports();
        MicroReports();
        Cash_BasedReports() ;
        
        getsub();
        getschool();
        getmicro();
        getinfant();
        getcash();
        getobesity();
       
        
   
    
    }
    ,
    feather.replace()
}


]);

function getsub() {
    var array;
    var url = "assets/js/getstunting.php";
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url);

    xhr.onreadystatechange = function () {
       if (xhr.readyState === 4) {
          console.log(xhr.status);
		 try {
            var data= JSON.parse(xhr.responseText);
            var arr = Object.values(data);
            console.log(arr);
            stdata = arr;
           var numb = arr.length;
           myarray = numb;
           var dn = document.getElementById('sabu').innerHTML=myarray+"(s)";
           console.log(myarray); 
         } catch (error) {
            var table = document.getElementById('sub');
            for(var i=0;i<arr.length;i++){
            var row = '<tr>       <td>' +arr[i].District + '</td>  <td>'+arr[i]._submission_time +'<td>' +arr[i]._submitted_by+' </td> <td>'+arr[i].start+ '</td><td>'+arr[i].end+'</td></tr>'
            table.innerHTML += row;
            }
         }   
       }};
    xhr.send();
   
}


function getschool(){
    var array;
    var url = "assets/js/getschool.php";
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url);
    xhr.onreadystatechange = function () {
       if (xhr.readyState === 4) {
          console.log(xhr.status);
          
		 try {
            var data= JSON.parse(xhr.responseText);
            var arr = Object.values(data);
            console.log(arr);
           
           var numb = arr.length;
           myarray = numb;
           var dn = document.getElementById('se').innerHTML=myarray+"(s)";
           console.log(myarray); 
         } catch (error) {

            var table = document.getElementById('sub2');

            for(var i=0;i<arr.length;i++){
 
            var row = '<tr>       <td>' +arr[i].District + '</td>  <td>'+arr[i]._submission_time +'<td>' +arr[i]._submitted_by+' </td> <td>'+arr[i].start+ '</td><td>'+arr[i].end+'</td></tr>'
            
            table.innerHTML += row;
            }
             
         }  
          
         
          
       }};
    xhr.send();
    
}

function getschool(){
    var array;
    var url = "assets/js/getschool.php";
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url);
    xhr.onreadystatechange = function () {
       if (xhr.readyState === 4) {
          console.log(xhr.status);
          
		 try {
            var data= JSON.parse(xhr.responseText);
            var arr = Object.values(data);
            console.log(arr);
           
           var numb = arr.length;
           myarray = numb;
           var dn = document.getElementById('se').innerHTML=myarray+"(s)";
           console.log(myarray); 
         } catch (error) {

            var table = document.getElementById('sub2');

            for(var i=0;i<arr.length;i++){
 
            var row = '<tr>       <td>' +arr[i].District + '</td>  <td>'+arr[i]._submission_time +'<td>' +arr[i]._submitted_by+' </td> <td>'+arr[i].start+ '</td><td>'+arr[i].end+'</td></tr>'
            
            table.innerHTML += row;
            }
             
         }  
          
         
          
       }};
    xhr.send();
    
}
function getmicro(){


    var array;
    var url = "assets/js/getmicro.php";
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url);
    

  
   
    xhr.onreadystatechange = function () {
       if (xhr.readyState === 4) {
          console.log(xhr.status);
          
		 try {
            var data= JSON.parse(xhr.responseText);
            var arr = Object.values(data);
            console.log(arr);
           
           var numb = arr.length;
           myarray = numb;
           var dn = document.getElementById('me').innerHTML=myarray+"(s)";
           console.log(myarray); 
         } catch (error) {

            var table = document.getElementById('sub3');

            for(var i=0;i<arr.length;i++){
 
            var row = '<tr>       <td>' +arr[i].District + '</td>  <td>'+arr[i]._submission_time +'<td>' +arr[i]._submitted_by+' </td> <td>'+arr[i].start+ '</td><td>'+arr[i].end+'</td></tr>'
            
            table.innerHTML += row;
            }
             
         }  
          
         
          
       }};
    xhr.send();
    
}
function getcash(){


    var array;
    var url = "assets/js/getcash.php";
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url);
    

  
   
    xhr.onreadystatechange = function () {
       if (xhr.readyState === 4) {
          console.log(xhr.status);
          
		 try {
            var data= JSON.parse(xhr.responseText);
            var arr = Object.values(data);
            console.log(arr);
           
           var numb = arr.length;
           myarray = numb;
           var dn = document.getElementById('metad').innerHTML=myarray+"(s)";
           console.log(myarray); 
         } catch (error) {

            var table = document.getElementById('sub1');

            for(var i=0;i<arr.length;i++){
 
            var row = '<tr>       <td>' +arr[i].District + '</td>  <td>'+arr[i]._submission_time +'<td>' +arr[i]._submitted_by+' </td> <td>'+arr[i].start+ '</td><td>'+arr[i].end+'</td></tr>'
            
            table.innerHTML += row;
            }
             
         }  
          
         
          
       }};
    xhr.send();
    
}

function getobesity(){


    var array;
    var url = "assets/js/getobesity.php";
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url);
    

  
   
    xhr.onreadystatechange = function () {
       if (xhr.readyState === 4) {
          console.log(xhr.status);
          
		 try {
            var data= JSON.parse(xhr.responseText);
            var arr = Object.values(data);
            console.log(arr);
           
           var numb = arr.length;
           myarray = numb;
           var dn = document.getElementById('met').innerHTML=myarray+"(s)";
           console.log(myarray); 
         } catch (error) {

            var table = document.getElementById('sub5');

            for(var i=0;i<arr.length;i++){
 
            var row = '<tr>       <td>' +arr[i].District + '</td>  <td>'+arr[i]._submission_time +'<td>' +arr[i]._submitted_by+' </td> <td>'+arr[i].start+ '</td><td>'+arr[i].end+'</td></tr>'
            
            table.innerHTML += row;
            }
             
         }  
          
         
          
       }};
    xhr.send();
    
}

function getinfant(){


    var array;
    var url = "assets/js/getinfant.php";
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url);
    
   
  
   
    xhr.onreadystatechange = function () {
       if (xhr.readyState === 4) {
          console.log(xhr.status);
          
		 try {
            var data= JSON.parse(xhr.responseText);
            var arr = Object.values(data);
            
           
           var numb = arr.length;
           myarray = numb;
           var dn = document.getElementById('inf').innerHTML=myarray+"(s)";
           console.log(myarray); 
         } catch (error) {

            var table = document.getElementById('sub4');

            for(var i=0;i<arr.length;i++){
 
            var row = '<tr>       <td>' +arr[i].District + '</td>  <td>'+arr[i]._submission_time +'<td>' +arr[i]._submitted_by+' </td> <td>'+arr[i].start+ '</td><td>'+arr[i].end+'</td></tr>'
            
            table.innerHTML += row;
            }
             

         }  
          
         
          
       }};
    xhr.send();
    
}
function stuntreport(){


    var array;
    var url = "assets/js/getstuntreports.php";
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url);
    
   
  
   
    xhr.onreadystatechange = function () {
       if (xhr.readyState === 4) {
          console.log(xhr.status);
          
		 try {
            var data= JSON.parse(xhr.responseText);
            var arr = Object.values(data);
            
           
           var numb = arr.length;
           myarray = numb;
           //var dn = document.getElementById('inf').innerHTML=myarray+"(s)";
           console.log(myarray); 
         } catch (error) {

            var table = document.getElementById('repo');

            for(var i=0;i<arr.length;i++){
 
            var row = '<tr>       <td>' +arr[i].District + '</td>  <td>'+arr[i]._submission_time +'<td>' +arr[i]._submitted_by+' </td> <td>'+arr[i].start+ '</td><td>'+arr[i].end+'</td></tr>'
            
            table.innerHTML += row;
            }
             

         }  
          
         
          
       }};
    xhr.send();
    
}

function download() {
    $.ajax({
        url: "assets/js/getstunting.php",
        contentType: "application/json",
        dataType: 'json',
        success: function(result){
            var str = "Downloading..";
            var str2 = "downloaded"; 
            console.log(result);
            $('.card-header').append('<button class="btn btn-primary" onclick="download()">'+str+'<br></button');
            downloadAsExcel(result);
            $('.card-header').append('<button class="btn btn-primary" onclick="download()">'+str2+'<br></button');
        }
    })
}
function download1() {
    $.ajax({
        url: "assets/js/getinfant.php",
        contentType: "application/json",
        dataType: 'json',
        success: function(result){
            console.log(result);
            downloadAsExcel1(result);
        }
    })
}
function download2() {
    $.ajax({
        url: "assets/js/getmicro.php",
        contentType: "application/json",
        dataType: 'json',
        success: function(result){
            console.log(result);
            downloadAsExcel2(result);
        }
    })
}
function download3() {
    $.ajax({
        url: "assets/js/getschool.php",
        contentType: "application/json",
        dataType: 'json',
        success: function(result){
            console.log(result);
            downloadAsExcel3(result);
        }
    })
}

function download4() {
    $.ajax({
        url: "assets/js/getobesity.php",
        contentType: "application/json",
        dataType: 'json',
        success: function(result){
            console.log(result);
            downloadAsExcel4(result);
        }
    })
}

function download5() {
    $.ajax({
        url: "assets/js/getcash.php",
        contentType: "application/json",
        dataType: 'json',
        success: function(result){
            console.log(result);
            downloadAsExcel5(result);
        }
    })
}



function downloadAsExcel(data) {
 
	const worksheet = XLSX.utils.json_to_sheet(data);
	const workbook ={
		Sheets:{ 
      'data':worksheet

        },
		SheetNames:['data']
		
	};
    const excelBuffer=XLSX.write(workbook,{bookType:'xlsx',type:'array'});
    console.log(excelBuffer);	
    SaveExcel(excelBuffer,'stunting');
}

function downloadAsExcel1(data) {
 
	const worksheet = XLSX.utils.json_to_sheet(data);
	const workbook ={
		Sheets:{ 
      'data':worksheet

        },
		SheetNames:['data']
		
	};
    const excelBuffer=XLSX.write(workbook,{bookType:'xlsx',type:'array'});
    console.log(excelBuffer);	
    SaveExcel(excelBuffer,'infant');
}

function downloadAsExcel2(data) {
 
	const worksheet = XLSX.utils.json_to_sheet(data);
	const workbook ={
		Sheets:{ 
      'data':worksheet

        },
		SheetNames:['data']
		
	};
    const excelBuffer=XLSX.write(workbook,{bookType:'xlsx',type:'array'});
    console.log(excelBuffer);	
    SaveExcel(excelBuffer,'micronutrient');
}

function downloadAsExcel3(data) {
 
	const worksheet = XLSX.utils.json_to_sheet(data);
	const workbook ={
		Sheets:{ 
      'data':worksheet

        },
		SheetNames:['data']
		
	};
    const excelBuffer=XLSX.write(workbook,{bookType:'xlsx',type:'array'});
    console.log(excelBuffer);	
    SaveExcel(excelBuffer,'School-feeding');
}

function downloadAsExcel4(data) {
 
	const worksheet = XLSX.utils.json_to_sheet(data);
	const workbook ={
		Sheets:{ 
      'data':worksheet

        },
		SheetNames:['data']
		
	};
    const excelBuffer=XLSX.write(workbook,{bookType:'xlsx',type:'array'});
    console.log(excelBuffer);	
    SaveExcel(excelBuffer,'Obesity');
}


function downloadAsExcel5(data) {
 
	const worksheet = XLSX.utils.json_to_sheet(data);
	const workbook ={
		Sheets:{ 
      'data':worksheet

        },
		SheetNames:['data']
		
	};
    const excelBuffer=XLSX.write(workbook,{bookType:'xlsx',type:'array'});
    console.log(excelBuffer);	
    SaveExcel(excelBuffer,'cash-based');
}

function SaveExcel(buffer,filename){
    const data = new Blob([buffer],{type:EXCEL_TYPE});
    saveAs(data,filename+'_export_'+new Date().getTime()+EXCEL_EXTENSION);
}