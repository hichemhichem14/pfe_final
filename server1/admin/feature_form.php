<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Dynamic  input fields</title>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form action="feature.php" method="post">
            <div class="input_fields_wrap">
           feature name: <input type="text" class="form-control mb-3" name="feature_name">
           <div   class="sql_query">
              The  sql query with arguments key
              <input type="text" class="form-control mb-3" name="sql" style="width: 160 px"> 
            </div>
            <button class="add_field_button">add input of this features</button>
            
            
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    
    <div class="col-md-4"></div>
</div>
<script>
    $(document).ready(function() {
var max_fields      = 10; //maximum input boxes allowed
var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
var add_button      = $(".add_field_button"); //Add button ID
var add_sql_argument = $(".add_argument_sql");
var  sql_query 		= $(".sql_query")
var x = 0; //initlal text box count
$(add_button).click(function(e){ //on add input button click
e.preventDefault();
    if(x < max_fields){ //max input box allowed
        x++; //text box increment
        $(wrapper).append('<div> input name :<input type="text" class="form-control mb-3" name="faeture['+x+'][\'name\']" style="width: 80px">  input key : <input type="text" class="form-control mb-3" name="faeture['+x+'][\'key\']" style="width: 800px"> input type: <br> <select name="faeture['+x+'][\'type\']" >  <option value="number">number</option> <option value="text">text</option> <option value="date">date</option> </select></div> <br>'); //add input box
    }
});
$( add_sql_argument).click(function(e){ //on add input button click
e.preventDefault();
     //max input box allowed
        //text box increment
        $(sql_query ).append('<input type="text" class="form-control mb-3" name="mytext[]" style="width: 80px"> '); //add input box

});

$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
    })
});
</script>
</body>  
  
</html> 