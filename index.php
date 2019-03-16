<?php
    session_start();
?> 
<html>
    <head>
            <title>Medical Diagnosis</title> <link href="css/bootstrap.min.css" rel="stylesheet">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <style>
                 .header{
                    background-color: #000;
            		color: white;
                	border-color: #080808;
                	min-height: 55px;
                    border: 1px solid transparent;
        	}
	  .bg {
	  /* The image used */
	  background-image: url("https://healthitanalytics.com/images/site/articles/_normal/ThinkstockPhotos-830770858.jpg");

	  /* Full height */
	  height: 100%; 

	    /* Center and scale the image nicely */
	  background-position: center;
	  background-repeat: no-repeat;
	  background-size: cover;
	}	
       
         a{
            text-decoration: none;
            background-color: transparent;
            color: #ededed;
         }
         .logo{
            float:left;
            height:50px;
            padding:15px;
            font-size:20px;
            font-weight:bold;
        }
        
        .header-link{
            float:right;
            font-size:14;
            height:20px;
            padding:15px;
            font-size:16px;
            font-weight:bold;
        } 
        .agex{

           	position:relative;
           	top:100px;
           	right:100px;
		left:210px;
            font-size:26px;
            font-weight:bold;
	    padding:10px;
            
        } 

        .Genderx{
        	position:relative;
        	top:100px;
           	left:210px;
		right:100px;
            font-size:26px;
            font-weight:bold;
           padding:10px;

        }
        .header-link:hover {
        	 background-color: #00FFFF;

        }
       .Continue{
            position:relative;
            font-size:14;
            top:130px;
            left:260px;
            font-size:26px;
            font-weight:bold;
	    
	    
        } 

        .GE{
            background-color:#27bfcf;
        }

        .G{
            background-color:white;
        }

        .continue button{
        	border-radius: :12px;
        	width: 100px;
        }
        
        

            </style>
            <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js></script>
            <script>
                $(document).ready(function(){
                    var age,gender;
                    $("#continue").click(function(){
                        console.log($("#Age").length!=0 && $(".GE").length!=0);
                        if($("#Age").length!=0 && $(".GE").length!=0){
                            age=$("#Age").val();
                            gender=$(".GE").attr("id");
                            $.ajax({
                                    url:"setsession.php",
                                    type:'post',
                                    data:{"age": age ,"gender":gender},
                                    success: function(response){
                                        console.log(response);
                                        $(location).attr("href","index1.php");
                                    }
                                        
                                });
                            
                        }
                        else{
                            $(".error").remove();
                            $(".Genderx").append("<span class=error style='color:red'><br>Please Fill Blank Details</span>");
                        }
                    });

                    $("#male").click(function(){
                        $(this).attr("class","btn btn-primary GE");
                        $("#female").attr("class","btn btn-primary G");
                    });

                    $("#female").click(function(){
                        $(this).attr("class","btn btn-primary GE");
                        $("#male").attr("class","btn btn-primary G");
                    });
                        

                });
            </script>
             
    </head>
    <body class="bg" background="https://healthitanalytics.com/images/site/articles/_normal/ThinkstockPhotos-830770858.jpg">
            <div class="header">
                <a href="/" class="logo">Medical Diagnosis</a>
                <a href="/" class="header-link">Treatment</a>
                <a id='ULogout' class='header-link'>Details</a>
                <a href="/" class="header-link">Conditions</a>
                <a href="/login.php" id="ULogin" class="header-link" >Questions</a>
                <a href="/signup.php" id="USignup" class="header-link" >Symptoms</a>
                <a href=" " class="header-link">Info</a>
            </div>
            
      	<div style="margin-left:25%;margin-right:25%;margin-top:1%;border:2px; border-width:2%; border-color:white; border-style:solid; width:45%; height:60%; background-color:rgba(0,0,0,0.4);">
            <l>Lets Start Diagnosis,</l>
		<div class='agex'>
            		<label>Age</label><br>
            		<input id=Age type="number" min="1" ,max="100">
            	</div>

            	<div class='Genderx'>
            		<label>Gender</label><br>
            		<button type="button" id="male" class="btn btn-primary G">Male</button>
            		<button type="button" id="female" class="btn btn-primary G">Female</button>
            	</div>
	
            	<div class=Continue>
                    <l id="warning"><l>
            		<button type="button" id="continue" class="btn btn-primary" ">Continue</button>
            	</div>
        </div>  

           


    </body>
</html>

	

 
