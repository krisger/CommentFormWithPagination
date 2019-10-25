"use strict";
function ValidateForm(){

	if (document.forms["comment"] !== null) {
		var inputs = document.forms["comment"].getElementsByClassName("validate");
		var fieldName, fieldType, fieldValue, validated, inputObj, valid;
		var notValid = 0;
	
		DisplayLoader("submit-loader", true);
		for (var i=0; i<inputs.length; i++){
			
			inputObj = inputs[i];
			fieldName = inputs[i].getAttribute("data-name");
			fieldType = inputs[i].getAttribute("data-type");
			fieldValue = inputs[i].value;
			switch(fieldType) {
			    case "text":
			    	if(ThrowError(ValidateText(fieldValue), fieldName, inputObj) == false){
			    		valid = false;
			    		
			    	}else{
			    		valid = true;
			    	} 
			   
			        break;
			    case "email":	
			    	if(ThrowError(ValidateEmail(fieldValue), fieldName, inputObj) == false){
			    		valid = false;
			    	}else{
			    		valid = true;
			    	}
			   
			        break;
			    case "date":	
			    	if(ThrowError(ValidateDate(fieldValue), fieldName, inputObj) == false){
			    		valid = false;
			    
			    	}else{
			    		valid = true;
			    	}
			        break;
			    default:
			    	break;
			}
				
			if(valid === false){
				DisableEnableFields(inputs[i], false);
				DisplayLoader("submit-loader", false);
				notValid = notValid + 1;			
			}else{
	
				DisableEnableFields(inputs[i], true);
			}
		}
		//Loop through form inputs. And check if they valid. By returning booleal value
		//After it passes that value to function ThrowError which depending on returned value throw's an error
		
	}
	

		DisplayLoader("submit-loader", false);
		if(notValid > 0){
			return false;
		}else{	
			
			return true;	
		}
	
}

function DisplayLoader(elLoaderID, choice){
	if(choice === false){
		document.getElementById(elLoaderID).style.display = "none";
	}else{
		document.getElementById(elLoaderID).style.display = "block";
	}
}

function ValidateEmail(fieldValue, fieldName){
	if(!isBlank){
		var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if (regex.test(fieldValue)){
			return true;
		}else{
			return false;
		}
	}else{return true;}
}


function isBlank(str) {
    return (!str || /^\s*$/.test(str));
}

function ValidateText(fieldValue){
	if(fieldValue.length > 2 && fieldValue.length < 50){
		return true;
	}else{
		return false;
	}
}

function ValidateDate(fieldValue){
	  var regEx = /^\d{4}-\d{2}-\d{2}$/;
	  if(!fieldValue.match(regEx)) return false;  // Invalid format
	  var d = new Date(fieldValue);
	  if(!d.getTime() && d.getTime() !== 0) return false; // Invalid date
	  return d.toISOString().slice(0,10) === fieldValue;
}


function ThrowError(validField, fieldText, appendTo){

	if(validField === false){
		if(appendTo.parentElement.querySelector('p.error') == null){
			var errorMessage = document.createElement('p');
			errorMessage.classList.add("error");
			errorMessage.innerHTML = "Field " + fieldText + " is not valid";
			appendTo.parentElement.appendChild(errorMessage); 
			appendTo.parentElement.className = "err";
		}
		return false;
		
	}else{
		if(appendTo.parentElement.querySelector('p.error') !== null){
			removeElements(appendTo.parentElement.querySelector('p.error'));
		}
		appendTo.parentElement.className = "succ";
		
		return true;
	}
}

function removeElements(element) {
	element.parentNode.removeChild(element);	
}


function DisableEnableFields(input, choice) {
	input.readonly = choice;
}


