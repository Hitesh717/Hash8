<?php
    session_start();
?> 
<html>
<style>
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
.Submit{
            position:relative;
            font-size:14;
            top:130px;
            left:230px;
            font-size:26px;
            font-weight:bold;
        
        
        } 
.header{
                    background-color: #000;
                    color: white;
                    border-color: #080808;
                    min-height: 55px;
                    border: 1px solid transparent;
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
</style>
<script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js></script>
            <script>
                $(document).ready(function(){
                    var myselection=<?php $x=explode(',',$_SESSION['myselected']); echo json_encode($x) ;?>;
                    var diseases=<?php $x=explode('@#$',$_SESSION['disease']); echo json_encode($x) ;?>;
                    j=0;
                    var count=[];
                    var fcount=[];
                    var indice=[];
                    while(j!=diseases.length){
                        var testsymptoms=diseases[j].split(",");
                        var k=0,c=0;
                        while(k!=myselection.length){
                            if($.inArray( myselection[k],testsymptoms);){
                                c++;
                            }
                            k++;
                        }
                        count.push(c);
                        fcount.push(c);
                        j++;
                    }
                    fcount.sort();
                    k=0;
                    while(k!=fcount.length){
                        j=0;
                        if(k!=0){
                            if(fcount[k]==fcount[k-1])
                            {
                                k++;
                            }
                        }
                        while(j!=count.length){
                            if(fcount[k]==count[j]){
                                indice.push(j);
                            }
                            j++;
                        }
                        k++;
                    }
                    
                    j=0;
                    var str=''
                    while (j!=myselection.length){ 
                        str=str+"<input type='radio' name='m_symptom'>"+myselection[j]+"<br>";
                        j++;
                    }
                    $("#mostaffeting").html(str);
                    $("#continue").click(function(){
                    
                    });
                        
                    
                });
            </script>
<body class="bg" background="https://teresas.ac.in/wp-content/uploads/2018/06/msc-food-science-and-nutrition.jpg">
<div class="header">
                <a href="/" class="logo">Medical Diagnosis</a>
                <a href="/" class="header-link">Treatment</a>
                <a id='ULogout' class='header-link'>Details</a>
                <a href="/" class="header-link">Conditions</a>
                <a href="/login.php" id="ULogin" class="header-link" >Questions</a>
                <a href="/signup.php" id="USignup" class="header-link" >Symptoms</a>
                <a href=" " class="header-link">Info</a>
</div>
<div style="margin-left:20%;margin-right:25%;margin-top:4%;border:2px; border-width:2%; border-color:white; border-style:solid; width:45%; height:60%; background-color:rgba(0,0,0,0.4);">
    <div style="padding:10px">
        <label>Which symptom is bothering you the most?</label>
    </div>
    <div id="mostaffeting">
        
    </div>
    <div class=Submit>
                    <button type="button" class="btn btn-primary">< previous</button>
            <button type="button" id="continue" class="btn btn-primary">continue ></button>
        </div>
</div>
</body>
</html>

