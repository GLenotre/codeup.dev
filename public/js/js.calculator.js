
	"use strict";
	// (function() {


        var inputleft = document.getElementById('inputleft');  
		var inputright = document.getElementById('inputright');  
		var inputcenter = document.getElementById('inputcenter');  
		var activeInput = inputleft;

		var number = document.getElementsByClassName('numeral');  
		var operator = document.getElementsByClassName('operator');  
		var equal = document.getElementById('equal');  
		var clear = document.getElementById('clear');
		var period = document.getElementById('period');

		function displayNumber (event){  
			var number_value = this.getAttribute('data-value');
			console.log(number_value);
			activeInput.value += number_value;	
		}

		function displayPeriod(event){
			var period_value = this.innerText;
			console.log(period_value);
			activeInput.value += period_value;
			// console.log(activeInput.value);		
		}

		function displayOperator (event) {
			var operatorsymbol = this.getAttribute('data-symbol');
			console.log(operatorsymbol);
			inputcenter.value = operatorsymbol;
			
			
			if (inputleft.value == '') {
				inputleft.value = '0';	
			}
			activeInput = inputright;
		}        

		function display (event) {
		var operator = document.getElementById("inputcenter").value;
			if (operator == "+") {
				var display = (parseFloat(inputleft.value) + parseFloat(inputright.value));
			} else if (operator == "-") {
				var display = (parseFloat(inputleft.value) - parseFloat(inputright.value));
			} else if (operator == "*") {
				 var display = (parseFloat(inputleft.value) * parseFloat(inputright.value));
			} else if (operator == "/") {
				var display = (parseFloat(inputleft.value) / parseFloat(inputright.value));
			} else if (operator == "√") {
				var display = Math.sqrt(parseFloat(inputleft.value)); 
			} else if (operator == "^") {
				var display = Math.pow(parseFloat(inputleft.value), parseFloat(inputright.value))	 
			} 

				activeInput = inputleft;
				activeInput.value = display;
				console.log(activeInput.value);
				document.getElementById("inputcenter").value = '';
				document.getElementById("inputright").value = '';
		}

		function clears (event) {
			console.log("clear");
			document.getElementById("inputleft").value = '';
			document.getElementById("inputcenter").value = '';
			document.getElementById("inputright").value = '';
		}

		equal.addEventListener('click', display, false);
		clear.addEventListener('click', clears, false);
		period.addEventListener('click', displayPeriod, false);
		
		for (var i = 0; i < number.length; i += 1) {
			number[i].addEventListener('click', displayNumber, false);
		}
		for (var i = 0; i < operator.length; i += 1) {
			operator[i].addEventListener('click', displayOperator, false);
		}
		


		
		
	// })();
