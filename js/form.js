// JavaScript Document

// verifier nombres
function check_num_char(objet) { 
	/*reg = new RegExp('[^a-z]+[0-9]+', 'g'); 
	valeur = objet.value; 
	if(reg.test(valeur)) 
	{ 
		objet.value=objet.value.replace(/[^a-z]+[0-9]/gi, ''); 
	} 
	else 
	{ 
		return true; 
	} */
} 

function check_char(objet) { 
	/*reg = new RegExp('[^a-z]+', 'g'); 
	valeur = objet.value; 
	if(reg.test(valeur)) 
	{ 
		objet.value=objet.value.replace(/[^a-z]/gi, '');  
	} 
	else 
	{ 
		return true; 
	} */
} 

// verifier nombres
function check_num(objet) { 
	reg = new RegExp('[^0-9]+', 'g'); 
	valeur = objet.value; 
	if(reg.test(valeur)) 
	{ 
		objet.value=objet.value.replace(/[^0-9,\.]/gi, ''); 
	} 
	else 
	{ 
		return true; 
	} 
} 


//verification du formulaire
function checkForm( f ) { 
 var strMessage = 'Veuillez corriger les erreurs suivantes : \n\n';
 var objTemp; 
 var strName = ''
 var boolIsValid = true;
 
 for ( var i = 0; i < f.elements.length; i++ ) { 
 	 objTemp = f.elements[i];
	 strName = objTemp.id;
	 if ( strName.substr( 0,6 ) == '_email' ){
		 if(objTemp.value.indexOf('.')== -1 || objTemp.value.indexOf('@')== -1){
			 boolIsValid = false;
			 strMessage ='le champs email non valide \n';
			 }
			 
		 }
	
	if ( strName.substr( strName.length - 9 ) == '_required' ) {
		
		if ( objTemp.value == '' ) {
			boolIsValid = false;
			 
			 var nomChamp = strName.substr(0,strName.length-9);
			 //strMessage += strName + ' (' + nomChamp + ') ' + ' est vide , \n';
			 strMessage += '____  ' + nomChamp + '  ____ est obligatoire , \n\n';
			 //strMessage = "Les champs marqués en (*) sont obligatoires !\n";
			 
		} else if ( objTemp.type == 'radio' ) {
			 boolIsValid = false;
			 for ( var j = 0; j < objTemp.length; j++ ) {
				  if ( objTemp[j].checked ) {
					   boolIsValid = true;
					   break;
				  }
			 }
		}
			
//if (strName.indexOf('first name') != -1 && objTemp.value == 'First' ) {
//	 boolIsValid = false;
//	 strMessage += strName + 
//	 ' is invalid \n';
//	 
//} else if (strName.indexOf('last name') != -1 && objTemp.value == 'Last' ) {
//	 boolIsValid = false;
//	 strMessage += strName + ' is invalid \n';
// 
// } else if (strName.indexOf('email') != -1 && (objTemp.value.indexOf(<A href="mailto:'@'">'@'</A>) == -1 || objTemp.value.indexOf('.')== -1)) {
//	  boolIsValid = false;
//	  strMessage += strName + ' is invalid \n';
//	  
//  } else if (strName == 'verify password' && (objTemp.value != f.data_password_required.value)){
//	   boolIsValid = false;
//	   strMessage += 'Passwords do not match! \n';
//  }
}
}

if ( boolIsValid == true ) {
 	 return true;
	 
} else {
	  alert( strMessage );
	 return false;
 }
}

function integersOnly(e) {
 e = (e) ? e : event;
 var  charCode =  (e.intCode) ? e.intCode : 
 ((e.keyCode) ? e.keyCode : 
 ((e.which) ? e.which : 0));
 if (intCode > 31 && 
 (intCode < 48 || intCode > 57)) {
  alert("Numbers only please!.");
  return false;
 }
 return true;
}

	