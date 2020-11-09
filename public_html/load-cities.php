<!doctype html>
<html lang="en">
  <head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/new-jq-file.js"></script>
    <script src="js/bootstrap.js"></script>
      <script>
        $(document).ready(function(){
           $("#btnFetch").click(function(){
               $.getJSON("load-cities-process.php",function(jsonAry){
                   //alert(jsonAry[0].city);
                   
                   $("#comboCity").html("");
                   
                           var opt=document.createElement("option");
                           opt.text="Select";
                           comboCity.append(opt);
                   
                   for(var i=0;i<jsonAry.length;i++)
                       {
                           var opt=document.createElement("option");
                           opt.text=jsonAry[i].city;
                           comboCity.append(opt);
                       }
               });
           });
        });
      </script>
  
  </head>
  <body>
   
    <div class="container">
        <button class="btn btn-primary mt-5" id="btnFetch">Load cities</button><br><br>
        <select name="comboCity" id="comboCity">
            <option value="">Select</option>
        </select>
    </div>
  </body>
</html>