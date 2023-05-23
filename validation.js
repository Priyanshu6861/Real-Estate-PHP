   function onlyalpha(ctrl,msg) 
   {
	     var data = ctrl.value;  //amit patel
		 var result = data.match(/[a-z|A-Z ]+/); //amit patel
		 if (result != data) 
		 {
			 msg.innerHTML = "Enter Only Alpha";
		 }
		 else 
		 {
			 msg.innerHTML ="";
		 }
	 }
	 
   function checkemail(ctrl,msg) 
   {
		 var data = ctrl.value; 
		 var prtn=/^\w+([\.]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		 if(!prtn.test(data)) 
		 {
			 msg.innerHTML = "Invalid Email Address..";
		 }
		 else 
		 {
			 msg.innerHTML ="";
		 }
	}

	function onlynumber(ctrl,msg) 
	 {
		 var data = args.Value;
		 var result = data.match(/[0-9]+/);
		 if (result != data) 
		 {
		   msg.innerHTML="Enter only number..";               
		 }
		 else
		 {
			msg.innerHTML="";
		 }
    }
	
	 function checklength(ctrl,msg,min,max) 
   {
		 var data = ctrl.value; 
		 var len=data.length;
		 if (len<min || len>max) 
		 {
			 msg.innerHTML = "Length Between " + min+ " To " + max;
		 }
		 else 
		 {
			 msg.innerHTML ="";
		 }
	 } 

       function chkpositive(ctrl,msg) 
        {
            var data = eval(ctrl.Value);
            if (data < 0) 
            {
                msg.innerHTML="Positive Number Only";
            }
            else 
            {
                msg.innerHTML=""; 
            }
        }

   function checkmobileno(ctrl,msg) 
   {
		 var data = ctrl.value; 
		 var prtn=/^\d{10}$/;
		 if(!prtn.test(data)) 
		 {
			 msg.innerHTML = "10 Digits Only..";
		 }
		 else 
		 {
			 msg.innerHTML ="";
		 }
	}
	
	 function checkpincode(ctrl,msg) 
   {
		 var data = ctrl.value; 
		 var prtn=/^\d{6}$/;	//396445
		 // var prtn=/^\d{3}\-\d{3}$/;	//396-445
		 
		 if(!prtn.test(data)) 
		 {
			 msg.innerHTML = "6 Digits Only..";
		 }
		 else 
		 {
			 msg.innerHTML ="";
		 }
	}
	
    function checkrange(ctrl,msg,min,max) 
   {
		 var data = eval(ctrl.value); 
		 if (data<min || data>max) 
		 {
			 msg.innerHTML = "Value between " + min+ " to " + max;
		 }
		 else 
		 {
			 msg.innerHTML ="";
		 }
	 }
	
   function confirmpassword(ctrl1,ctrl2,msg) 
   {
		 var data1 = ctrl1.value; 
		 var data2 = ctrl2.value; 
		 
		 if (data1!=data2) 
		 {
			 msg.innerHTML = "Password not match";
		 }
		 else 
		 {
			 msg.innerHTML ="";
		 }
	 }
	 
   function checkblank(ctrl,msg) 
   {
		 var data = ctrl.value; 
		  
		 if (data=="") 
		 {
			 msg.innerHTML = "Can not left blank";
		 }
		 else 
		 {
			 msg.innerHTML ="";
		 }
	 }
	 
    function checkAndFilterFiles(){
		var userFileImg = document.getElementById('file');
		var destOrignalFile = userFileImg.value;
		var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
		if(!allowedExtensions.exec(destOrignalFile)){
		alert('Please you can upload file having extensions .jpeg/.jpg/.png/.gif only.');
		userFileImg.value = '';
		return false;
	//	}else{
		//Image displaying
	//	if (userFileImg.files && userFileImg.files[0]) {
	//	var reader = new FileReader();
	//	reader.onload = function(e) {
	//	document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
	//	};
	//	reader.readAsDataURL(userFileImg.files[0]);
	//	}
		}
	}

	 function checkrating(ctrl,msg,min,max) 
   {
		 var data = ctrl.value; 
		 var len=data.length;
		 if (len<min || len>max) 
		 {
			 msg.innerHTML = "Rating Between 1 To 5 ";
		 }
		 else 
		 {
			 msg.innerHTML ="";
		 }
	 } 
	 
	 function checkprice(ctrl,msg) 
   {
		 var data = ctrl.value; 
		 var prtn=/^\d{10}$/;
		 if(!prtn.test(data)) 
		 {
			 msg.innerHTML = "Digits Only..";
		 }
		 else 
		 {
			 msg.innerHTML ="";
		 }
	}
	
	$('.numbers').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});