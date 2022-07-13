import insertAfter from './insert-after.js';

export function checkIfEmpty(form) {
  const inputs = document.querySelectorAll('input:not(input:disabled)');
  let isEmpty = false;
  inputs.forEach(i => {
      if(i.value === '') {
	  changeToInvalidStyle(i, "To pole nie może być puste!");
	  isEmpty = true;
      }
      else {
	  clearError(i,form);
      }
  });
  return isEmpty;
}

export function clearError(inputNode, form) {
    inputNode.style = '';
    if(inputNode.nextSibling && inputNode.nextSibling.tagName === 'P')
	form.removeChild(inputNode.nextSibling);
}

export function changeToInvalidStyle(inputElement, msg) {
    inputElement.style.border = '3px solid red';
    inputElement.style.color = 'red';
    inputElement.style.backgroundColor = 'yellow';

    let messageParagraph;
    if(inputElement.nextSibling.tagName === 'P') {
	messageParagraph = inputElement.nextSibling;
        messageParagraph.innerText = msg;
	return;
    }
    messageParagraph = document.createElement('p');
    messageParagraph.innerText = msg;
    messageParagraph.style.color = 'red';
    messageParagraph.style.fontWeight = 'bold';
    messageParagraph.style.marginBlock = 0;
    insertAfter(messageParagraph, inputElement);
}
export function validateFormWithDataBase(form, validatorFilename, isLoginForm) {
    const data = new FormData(form);
    fetch(`backend/${validatorFilename}.php`, {
	    method: 'POST',
	    body: data
	}).then(response => {
	    let inputField;
	    response.text().then(text => {
		if(text.includes('username')) {
		    inputField = document.querySelector('input[name="username"]');
		    changeToInvalidStyle(inputField, isLoginForm? "Nieprawidłowa nazwa użytkownika" : "Ta nazwa użytkownika jest już zajęta!");
		}
		else if(text.includes('email')) {
		    inputField = document.querySelector('input[name="email"]');
		    changeToInvalidStyle(inputField, "Ten email jest już zarejestrowany!");
		}
		else if(text === 'Invalid password') {
		    inputField = document.querySelector('input[name="pass"]');
		    changeToInvalidStyle(inputField, "Nieprawidłowe hasło");
		}
		else form.submit();
	    });
	    
	})
}
