<?php
    session_start();
?>  
<html>
	<head>
			<title>Medical Diagnosis</title>
			<style>
				 .header{
    	            background-color: #000;
		   			color: white;
    		    	border-color: #080808;
    		    	min-height: 55px;
                    border: 1px solid transparent;
				}
	    
			     .header a{
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
		    		height:50px;
		    		padding:15px 15px;
		    		font-size:16px;
		    		font-weight:bold;
				}

				.container{
					position:absolute;
					padding:10px;
				}

				.symptoms{
					width: 500px;
					margin-left: 50px;
					float:left;
					border:1px red solid;
					height:450px;
					padding: 10px;
				}
				.info{
					width: 500px;
					float:left;
					height:450px;
					border:1px red solid;
					margin-left: 50px;
					padding: 10px;
				}
				.my_symptoms{
					margin: 20px;
					padding: 10px;
					position:static;
				}

				.my_age{
					margin-right: 10px;
				}
				.my_gender{
					margin-right: 10px;
				}
				.navigation{
					margin-top:30px;
					padding-top:30px;
				}
				.navigation a{
				    color:black;
					text-decoration: none;
				}
				.notselected,.selected{
					margin:10px;
					border-radius: 3px;
					padding:10px;
				}
				.notselected{
					background-color: rgb(186, 211, 226);
				}
				.selected{
					background-color:rgb(221, 221, 221);
					cursor:not-allowed;
				}
				.myselected{
					display:inline-block;
					border:1px grey solid;
				    border-radius:3px;
				    padding:5px;
				    margin:10px;
				}
				.navbutton {
                  font: bold 11px Arial;
                  text-decoration: none;
                  background-color: #EEEEEE;
                  color: #333333;
                  padding: 10px;
                  border-top: 1px solid #CCCCCC;
                  border-right: 1px solid #333333;
                  border-bottom: 1px solid #333333;
                  border-left: 1px solid #CCCCCC;
                }


			</style>
			<script>

			</script>
			<script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js></script>
			<script>
				$(document).ready(function(){
				    
					var age='<?php echo $_SESSION['age'];?>';
					var gender='<?php echo $_SESSION['gender'];?>';
					$(".age").html(age);
					$(".gender").html(gender);
					var list=["bloating","cough","diarrhea","dizziness","fatigue","fever","headache","musclecramp","nausea","throat","irritation"];
					ind=0;
					str='';
					ticked='<l>My Symptoms:</l><br>'
					selectvar=[];
					while(ind!=list.length){
						str=str+"<button class='notselected'>"+list[ind]+"</button>";
						ind++;
					}
					$(".symp_btns").html(str);

					$(".notselected").click(function(){
						$(this).attr("class","selected");
						$(this).attr("disabled", "disabled");
						selectvar.push($(this).html());
						console.log(selectvar);
						ticked=ticked+"<div class='myselected'><l>"+$(this).html()+"</l><button id='"+$(this).html()+"' style='border:none' type=button class='close'>&times;</button></div>";
						//console.log(ticked);
						$(".my_symptoms").html(ticked);
					});
					$(".info").on("click",".close",function(){
							var temp=$(this).attr("id");
							$('.selected').each(function () {
          						if($(this).html()==temp){
									$(this).prop('disabled', false);
									$(this).attr('class', "notselected");
								}
							});
							selectvar=$.grep(selectvar,function(value){
								console.log(temp,value);
								return value!=temp;
							});
							console.log(selectvar);
          					valuestring=selectvar.join(",");
							$.ajax({
			                    url:"setsession.php",
			                    type:'post',
			                    data:{"callRetrieve": valuestring},
			                    success: function(response){
			                        console.log(response);
			                    }
			                        
			  		        });



							j=0;
							ticked="<l>My Symptoms:</l><br>";
							while(j!=selectvar.length)
							{
								ticked=ticked+"<div class='myselected'><l>"+selectvar[j]+"</l><button id='"+selectvar[j]+"'style='border:none' type='button' class='close'>&times;</button></div>";
								j++;
							} 
							$(".my_symptoms").html(ticked);
					});
					
					
					$("#continue").click(function(){
					    valuestring=selectvar.join(",");
						$.ajax({
		                    url:"setsession.php",
		                    type:'post',
		                    data:{"callRetrieve": valuestring},
		                    success: function(response){
		                        console.log(response);
		                        $(location).attr("href","index2.php");
		                    }
		                        
		  		       });    
					});
					
					/****************************** Functions  ***************************************************************/
					var arrayRemove=function(arr, value) {
	                   $.grep(arr, function( ele,index ) {
	                   		console.log(ele,value);
	                   		console.log(ele!=value);
	                   		return ele!=value;
	               		});
	               	};

                   

				});
			</script>
			 
	</head>
	<body>
			<div class="header">
		        <a href="/" class="logo">Medical Diagnosis</a>
		        <a href="/" class="header-link">Treatment</a>
		        <a id='ULogout' class='header-link'>Details</a>
		        <a href="/" class="header-link">Conditions</a>
		        <a href="/login.php" id="ULogin" class="header-link" >Questions</a> 
		        <a href="/signup.php" id="USignup" class="header-link" >Symptoms</a>
		        <a href=" " class="header-link">Info</a>
		    </div>
			<div class="container">
					
					<div class="symptoms" align="center">
					<l>Choose Common Symptoms<l>
					<div class="symp_btns">
					</div>	
					</div>

					<div class=info align="center">
						<div class="my_age">
						<l>Age:</l>
						<l class="age"></l>
						</div>
						<div class="my_gender">
						<l>Gender:</l>
						<l class="gender"></l>
						</div>
						<div class="my_symptoms ">
							<l>My Symptoms:</l>

							
						</div>
					</div>	
				<div class=navigation >
					<a class="navbutton" style="float:left"  href="index.php"> Previous </a>
					<a class="navbutton" style="float:right" id="continue" >Continue</a>
				</div>
			</div>

		</body>



	</body>
</html>