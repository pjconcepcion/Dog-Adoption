
<!DOCTYPE html>
<html>
<head>
    <title>Stray Report</title>
    <style>

        #this{
            margin-left: 100px;
            font-family: 'century gothic'; 
            text-align: justify;
        }  
        

    </style>
</head>
<body>
    <div class='row'>
        <div id='this'> 
            <center><h1 style="font-family: century gothic"><i class="fa fa-paw"></i> Adoption WebSite <i class="fa fa-paw"></i></h1></center>
            <br><br><br>
            <p>We have receive your message and have been notified about a stray dog you've seen {{ session('sendLocation')}}.</p>
            <p>On behalf of our organization, we would like to thank you,  {{session('sendName')}} for helping us. <p>
        </div>
    </div>
</body>
</html>"