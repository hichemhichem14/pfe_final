

<html>

  <head>
   

  </head>
  <body>

     
     
      <script>
        var features=[];
  window.onload = function () { 
    async function body(){
        console.log(window.location.href);
        var url = new URL(window.location.href);
        const userid= url.searchParams.get("id");
     
        json=await fetch('/getfeature.php')
        data=await json.json();
        features=data;
select = document.getElementById("feature");
console.log(features.length);
    for (var i = 0; i<features.length; i++){

    var opt = document.createElement('option');
    opt.value = i
    opt.innerHTML = features[i]['name']
    select.appendChild(opt);
      }
    }
    body();
  }
  function myfunction(){
    data=[];
    data['value']=document.getElementById('feature').value;
    data['value']=document.getElementById('feature').value;
    let options = {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json;charset=utf-8'
  },
  body: data
}
  }
        function addInput(){
      console.log(features);
        var newdiv = document.createElement('div');
        var value= document.getElementById('feature').value;
        argument=JSON.parse(features[value].arguments);//);
        console.log(argument["1"]["'name'"]);
        newdiv.innerHTML='<div>';
        for(argumen in argument)
       // console.log();
       {
        newdiv.innerHTML+='<label for='+argument[argumen]["'key'"]+'>'+argument[argumen]["'name'"]+'</label> <input id='+argument[argumen]["'key'"]+' type='+argument[argumen]["'type'"]+'  name=arguments["'+argument[argumen]["'key'"]+'"]>';
       }newdiv.innerHTML+='</div>';

  // newdiv.innerHTML
     document.getElementById('formulario').appendChild(newdiv);}
     
    </script>
    <form method="POST" id="formulario" action="/addfeatureforclient.php"  onsubmit="myfunction()">  
      <div>
      <select name="features" id="feature">
      
</select>
        <input type="button" value="add this feature" onClick="addInput()">
      </div>
      <input type="submit" value="Submit">
    </form>
  </body>
</html>