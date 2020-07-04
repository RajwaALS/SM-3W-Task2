<!DOCTYPE html>
<html>
<body>
<form action="buttons.php" method="post">

  <input type="text" id="r" onfocus="name();" name="rbutton" placeholder="Enter How many PXs do you want the robot to move"/>
  <br>
  <br>

  <input type="text" id="f" name="fbutton" placeholder="Enter How many PXs do you want the robot to move"/>
  <br>
  <br>

  <input type="text" id="l" name="lbutton" placeholder="Enter How many PXs do you want the robot to move"/>

  <br>
  <br>
  <button type="submit" name="save">Save</button>
  <button type="submit" name="delete">Delete</button>
  <br>
  <br>
  </form>

  <input type="submit" name="rbutton" onclick="myFunction();" value="right"/>
  <input type="submit" name="fbutton" onclick="myFunction1();" value="forward"/>
  <input type="submit" name="lbutton" onclick="myFunction2();" value="left"/>

  <br>
  <br>
  <canvas id="myCanvas" width="500" height="300" style="border:1px solid #d3d3d3;"> </canvas>
  <input id="clear" type="submit" name="button" onclick="clearcanvas();" value="clear"/>

  <?php
  include "dbConn.php";
  $sql = "SELECT * from map";
  $query_run =     $query_run = mysqli_query($db, $sql) or die ('error getting data');


    echo  "<table id='t'>";
    // first row
      echo  "  <tr>";
      echo  "    <th>Direction &nbsp;  </th>";
      echo  "    <th>Number</th>";
      echo  "  </tr>";

      while($row = mysqli_fetch_array($query_run, MYSQLI_ASSOC)){


  //Right number
    echo  "<tr><td>";
    echo  "Right </td><td>";
    echo  $row['rbutton'];
    echo  "</td></tr>";
  //Left number
    echo  "<tr><td>";
    echo  "Left </td><td>";
    echo  $row['lbutton'];
    echo  "</td></tr>";
  //Forward number
    echo  "<tr><td>";
    echo  "Forward </td><td>";
    echo  $row['fbutton'];
    echo  "</td></tr>";

  }
    echo  "  </table>";

  ?>


      <script>
        var x = 0;
        var num1 = 0;
        var y = 0;
        var num2 = 0;
        var z = 0;
        var num3 = 0;

       function myFunction(){
          x = document.getElementById("r").value;
          num1 = parseInt(x);
          var c = document.getElementById("myCanvas");
          var ctx = c.getContext("2d");
          if (num2 != "") {

          ctx.moveTo(200,num2);
          ctx.lineTo((num1+200),num2);
          ctx.stroke();
         }else if (num3 != "" && num2 != ""){
          ctx.moveTo(num3, num2);
          ctx.lineTo(num1,num2);
          ctx.stroke();
       }
         else {
          ctx.moveTo(150,200);
          ctx.lineTo(num1,200);
          ctx.stroke();
       }
      }


       function myFunction1(){
          y = document.getElementById("f").value;
          num2 = parseInt(y);
          var c = document.getElementById("myCanvas");
          var ctx = c.getContext("2d");

          if (num1 != "") {
          ctx.moveTo(num1, 200);
          ctx.lineTo(num1, num2);
          ctx.stroke();
          }
          else if (num3 != "") {
          ctx.moveTo(num3, 300);
          ctx.lineTo(num3, num2);
          ctx.stroke();
          }
          else {
          ctx.moveTo(200, 300);
          ctx.lineTo(200, num2);
          ctx.stroke();
          }
       }

       function myFunction2(){
          z = document.getElementById("l").value;
          num3 = parseInt(z);
          var c = document.getElementById("myCanvas");
          var ctx = c.getContext("2d");
          if (num2&&num1 != "") {
          ctx.moveTo(num1,num2);
          ctx.lineTo((num3-num1), num2);
          ctx.stroke();
          } else if (num2 != ""){
          ctx.moveTo(200, num2);
          ctx.lineTo(num3, num2);
          ctx.stroke();
          } else if (num1 == "" && num2 =="") {
          ctx.moveTo(200, 300);
          ctx.lineTo(num3, 300);
          ctx.stroke();
          }

       }

       function clearcanvas()
       {
           var canvas = document.getElementById('myCanvas'),
               ctx = canvas.getContext("2d");
           ctx.clearRect(0, 0, canvas.width, canvas.height);
       }

       function name()
       {
           document.getElementById('r').value = " ";
       }



      </script>
</body>
</html>
