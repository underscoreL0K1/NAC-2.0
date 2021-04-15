<!DOCTYPE html>
<html>

<head>

     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/images/nac16x16v4.png">
    <link rel="stylesheet" type="text/css" href="stylesheet.css" media="screen"/>
    <title>NAC 2.0</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="chat.js"></script>
    <script type="text/javascript">
	
	
        var admin = false;	
        var name = prompt("Display Name:", "");
        
    	if (!name || name === ' ') {
    	   name = "Anon";	
    	}  else if (name.length >= 16) {
			name = "Retarded Spammer";
		}
        else if(name == "H" || name == "h" || name == "D" || name == "d" || name == "bmlnZ2Vy")
        {
            var password = prompt('password?', "")
            if(password == "GnirLleb")
            {
                admin = true;
                if(name == 'h')
                {
                    name = 'H';
                    }
                }
                else
                {
                    name = "retard";
                    }
            }
    	name = name.replace(/(<([^>]+)>)/ig,"");
    	
    	$("#name-area").html("You are: <name>" + name + "</name>");
    	
		
		
        var chat =  new Chat();
    	$(function() {
    	
    		 chat.getState(); 
    		 
             $("#messagebox").keydown(function(event) {  
             
                 var key = event.which;  
           
                 if (key >= 33) {
                   
                     var maxLength = $(this).attr("maxlength");  
                     var length = this.value.length;  
                     
                     if (length >= maxLength) {  
                         event.preventDefault();  
                     }  
                  }  
    		 			
																																													});
    		 $('#messagebox').keyup(function(e) {	
    		 					 
    			  if (e.keyCode == 13) { 
    			  
                    var text = $(this).val(); 
    				var maxLength = $(this).attr("maxlength");  
                    var length = text.length; 
                     
                    if (length <= maxLength + 1) { 
                     
    			        chat.send(text, name);	
    			        $(this).val("");
    			        
                    } else {
                    
    					$(this).val(text.substring(0, maxLength));
    					
    				}	
    				
					if(text.includes('/cc') && admin == false)
                     {
                         const marco = ' shut up ' + name + ' you dirty non-admin trying to use commands'
                         chat.announce(marco, "Server")
                         } else if (text.includes('/cc') && admin == true) {
							 chat.clear();
						 }
						 
						 
				
					    				
    			  }
             });
            
    	});
		
	const joinAnnouncement = name + ' has connected';
	chat.announce(joinAnnouncement);	
	
    </script>
	
	
</head>
<body onload="setInterval('chat.update()', 2)">
    <div id="page-wrap">
        <h id="title">The NAC 2.0</h>
        <p id="subtext">Room A</p>
        <div id="sidebar">
            <h id="title">Rooms</h>
            <div id="buttonContainer">
                <button class="button rooma" href="/chatone.php">Room A</button>
                <button class="button roomb" href="/chattwo.php">Room B</button>
                <button class="button roomc" href="/chatthree.php">Room C</button>
            </div>  
            <h id="title">Online</h>
            <div id="onlineContainer">
                <!--put the online people list here -->
            </div>
        </div>
        
        <div id="chatbox"></div>
        
        <p id="subtext">Send Message as: $nickname</p>
        <form>
            <center><textarea id="messagebox" maxlength = '224' placeholder="Max Characters: 700"></textarea></center>
        </form>
    </div>
</body>
<script>
	const leaveAnnouncement = name + ' has left';
	window.onbeforeunload = function() {
	chat.announce(leaveAnnouncement, "Server");	
}
</script>
