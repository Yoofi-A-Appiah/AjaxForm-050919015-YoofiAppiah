<html>
    <head>
        <title>User Details Entry</title>
        <link rel="stylesheet" href="index.css">
    <script src="https://kit.fontawesome.com/4e3f80dd5d.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>
    <div class="title"><b>User Details Entry</b></div>
   <div class="error"></div>
        <form enctype=”multipart/form-data”>
            <div class="input-space">
        <i class="fa-solid fa-user"></i> <label class="lab"> First Name</label>
          <input type="text" name="FName" placeholder="First Name" class="name" id="fname"/><br></div>
          <div class="input-space"><i class="fa-solid fa-user"></i>
          <label class="lab">Last Name</label><input type="text" name="LName" placeholder="Last Name"  class="name" id="lname"/><br></div>
          <div class="input-space"><i class="fa-solid fa-user"></i>
          <label class="lab">Select Gender</label><select class="name" name="gender" id="gender">
          <option value="none">SELECT</option>    
          <option value= 'Male'>Male</option>
              <option value="Female" >Female</option>
              <option value="Other">Other</option>
              <option value="Not Specify">Not Specify</option>
          </select></div>
          <div class="input-space"><i class="fa-solid fa-id-card"></i>
          <label class="lab">National Id</label><input type="text" name="national_id" placeholder="National Id"  class="name" id="national_id"/><br></div>
          <div class="input-space"><i class="fa-solid fa-cake-candles"></i>
          <label class="lab">Date of Birth</label><input type="date" name="DoB"  class="name" id="DoB"/><br></div>
          <div class="input-space"><i class="fa-solid fa-user"></i>
          <label class="lab">Relationship</label><select class="name" name="relationship" id="relationship">
          <option value= "none">SELECT</option>
              <option value= "Single">Single</option>
              <option value="Divorced" >Divorced</option>
              <option value="Married">Married</option>
              <option value="Widowed">Widowed</option>
          </select></div>
          <div class="input-space"><i class="fa-solid fa-phone"></i>
          <label class="lab">Phone Number</label><input type="number" name="phone" placeholder="Phone Number"  class="name" id="Phone"/><br></div>
          <div class="input-space"><i class="fa-solid fa-image"></i>
          <label class="lab">Image Upload</label><input type="file" name="image" accept="image/*" class="name" id="image" onchange="loadfile(event)" /></div>
          <div class="space">
              <button type="button" onclick="submitForm();" name= "save" value="SUBMIT" id="sub" >SUBMIT</button>
          </div>
    </div>
           </form>
           <div class="fill">
    <h3>SUBMITTED</h3>
        <div id="message"><img src="" id="upload"> </div>

    </div>
           
           
           <script type="text/javascript">
               
               var loadfile = function(event) {
	var image = document.getElementById('upload');
	image.src = URL.createObjectURL(event.target.files[0]);
};
        function submitForm(){
            
            $('.errorvisible').toggleClass('error');
            $('.error').html("");
            var fname = $('input[name=FName').val();
            var lname = $('input[name=LName').val();
            var gender = $("#gender option:selected").text();
            var national_id = $('input[name=national_id').val();
            var date = new Date($('#DoB').val());
            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear();
            var DoB = String(month +"-"+ day+"-"+year);
          var re = $("#relationship option:selected").text(); 
            var phone = $('input[name=phone').val();

           
        var image = $('input[name=image').val();
            if(fname != '' && lname!='' && gender!='SELECT' && national_id!='' && DoB!='NaN-NaN-NaN' && re!='SELECT' && phone !=''){
              
                $('html,body').animate({
                scrollTop: $(".fill").offset().top
            });
                var formData = {fname: fname, lname: lname ,gender: gender, national_id: national_id, DoB: DoB, relationship: re, phone: phone,image: image};
                $.ajax({url: "http://localhost/AJAX/dbconnect.php", type:'POST',data: formData,success: function(response){
                
                var res =JSON.parse(response); 

                //console.log(res);
                
                var re = $('<div class="output">'+res[0]+'</div><div class="output">'+res[1]+'</div><div class="output">'+res[2]+'</div><div class="output">'+res[3]+'</div><div class="output">'+res[4]+'</div><div class="output">'+res[5]+'</div><div class="output">'+res[6]+'</div>');
                var re = $('<table><tr class="output"> <td class="s">First Name </td><td>'+res[0]+'</td></tr><tr class="output"> <td class="s">Last Name </td><td>'+res[1]+'</td></tr><tr class="output"> <td class="s">Gender </td> <td>'+res[2]+'</td> </tr> <tr class="output"> <td class="s">Date of Birth </td> <td>'+res[3]+'</td> </tr> <tr class="output"> <td class="s">National ID </td> <td>'+res[4]+'</td> </tr> <tr class="output"> <td class="s">Relationship </td> <td>'+res[5]+'</td> </tr> <tr class="output"> <td class="s">Phone Number </td> <td>'+res[6]+'</td> </tr> </table>');

                $('#message').append(re);
                
                
                   

            }
            });
            }
            else{
                $('.error').toggleClass('errvisible');
                $('.error').html( '<div>Required fields have been left empty </div>');
                $('html,body').animate({
                scrollTop: $(".error").offset().top
            });
            }
           
            
        }
    </script>
    </body>
</html>    
