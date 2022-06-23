function Agregar(){
  var asistencia01 = document.querySelector('input[name=condicion1]:checked').value;
  var asistencia02 = document.querySelector('input[name=condicion2]:checked').value;
  var asistencia03 = document.querySelector('input[name=condicion3]:checked').value;
  var asistencia04 = document.querySelector('input[name=condicion4]:checked').value;
  var asistencia05 = document.querySelector('input[name=condicion5]:checked').value;
  var asistencia06 = document.querySelector('input[name=condicion6]:checked').value;
  var asistencia07 = document.querySelector('input[name=condicion7]:checked').value;
  var asistencia08 = document.querySelector('input[name=condicion8]:checked').value;
  var asistencia09 = document.querySelector('input[name=condicion9]:checked').value;
  var asistencia10 = document.querySelector('input[name=condicion10]:checked').value;
  var asistencia11 = document.querySelector('input[name=condicion11]:checked').value;
  var asistencia12 = document.querySelector('input[name=condicion12]:checked').value;
  var asistencia13 = document.querySelector('input[name=condicion13]:checked').value;
  var asistencia14 = document.querySelector('input[name=condicion14]:checked').value;
  var asistencia15 = document.querySelector('input[name=condicion15]:checked').value;
  var asistencia16 = document.querySelector('input[name=condicion16]:checked').value;
  var asistencia17 = document.querySelector('input[name=condicion17]:checked').value;
  var asistencia18 = document.querySelector('input[name=condicion18]:checked').value;
  var asistencia19 = document.querySelector('input[name=condicion19]:checked').value;
  var asistencia20 = document.querySelector('input[name=condicion20]:checked').value;
  var asistencia21 = document.querySelector('input[name=condicion21]:checked').value;
  var asistencia22 = document.querySelector('input[name=condicion22]:checked').value;
  var asistencia23 = document.querySelector('input[name=condicion23]:checked').value;
  var asistencia24 = document.querySelector('input[name=condicion24]:checked').value;
  var asistencia25 = document.querySelector('input[name=condicion25]:checked').value;
  var asistencia26 = document.querySelector('input[name=condicion26]:checked').value;
  var asistencia27 = document.querySelector('input[name=condicion27]:checked').value;
  var asistencia28 = document.querySelector('input[name=condicion28]:checked').value;
  var asistencia29 = document.querySelector('input[name=condicion29]:checked').value;
  var asistencia30 = document.querySelector('input[name=condicion30]:checked').value;
  var asistencia31 = document.querySelector('input[name=condicion31]:checked').value;
  var asistencia32 = document.querySelector('input[name=condicion32]:checked').value;
  var asistencia33 = document.querySelector('input[name=condicion33]:checked').value;
  var asistencia34 = document.querySelector('input[name=condicion34]:checked').value;
  var asistencia35 = document.querySelector('input[name=condicion35]:checked').value;
  var asistencia36 = document.querySelector('input[name=condicion36]:checked').value;
  var asistencia37 = document.querySelector('input[name=condicion37]:checked').value;
  var asistencia38 = document.querySelector('input[name=condicion38]:checked').value;
  var asistencia39 = document.querySelector('input[name=condicion39]:checked').value;
  var asistencia40 = document.querySelector('input[name=condicion40]:checked').value;

  var dia = document.getElementById("dia").innerHTML;
  var contenido = document.getElementById("contenido");

  if (window.XMLHttpRequest){
    ajax = new XMLHttpRequest();
  }
  else{
    ajax = new ActiveXObject("Microsoft.XMLHTTP")
  }
  
  ajax.onreadystatechange = function(){
    if (ajax.readyState == 4 && ajax.status == 200){
      contenido.innerHTML = ajax.responseText;
    }
  }

  //alert(dia);
  //alert("La asistencia fue tomada con exito");
  ajax.open("POST","logic/insertar.php");
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send("&dia="+dia+
  "&asist1=" + asistencia01 + 
  "&asist2=" + asistencia02 +
  "&asist3=" + asistencia03 +
  "&asist4=" + asistencia04 +
  "&asist5=" + asistencia05 +
  "&asist6=" + asistencia06 +
  "&asist7=" + asistencia07 +
  "&asist8=" + asistencia08 +
  "&asist9=" + asistencia09 +
  "&asist10=" + asistencia10 +
  "&asist11=" + asistencia11 +
  "&asist12=" + asistencia12 +
  "&asist13=" + asistencia13 +
  "&asist14=" + asistencia14 +
  "&asist15=" + asistencia15 +
  "&asist16=" + asistencia16 +
  "&asist17=" + asistencia17 +
  "&asist18=" + asistencia18 +
  "&asist19=" + asistencia19 +
  "&asist20=" + asistencia20 +
  "&asist21=" + asistencia21 +
  "&asist22=" + asistencia22 +
  "&asist23=" + asistencia23 +
  "&asist24=" + asistencia24 +
  "&asist25=" + asistencia25 +
  "&asist26=" + asistencia26 +
  "&asist27=" + asistencia27 +
  "&asist28=" + asistencia28 +
  "&asist29=" + asistencia29 +
  "&asist30=" + asistencia30 +
  "&asist31=" + asistencia31 +
  "&asist32=" + asistencia32 +
  "&asist33=" + asistencia33 +
  "&asist34=" + asistencia34 +
  "&asist35=" + asistencia35 +
  "&asist36=" + asistencia36 +
  "&asist37=" + asistencia37 +
  "&asist38=" + asistencia38 +
  "&asist39=" + asistencia39 +
  "&asist40=" + asistencia40);
  alert("La asistencia fue tomada con exito");
};

function Asignar(){
    btnAgregar = document.getElementById("boton2");
    btnAgregar.addEventListener("click",Agregar);
};

window.addEventListener("load", Asignar);