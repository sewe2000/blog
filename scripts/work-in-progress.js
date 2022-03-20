const links = document.querySelectorAll('.work-in-progress');

for(link of links) {
	link.addEventListener('click', workInProgressMenu);
}

function workInProgressMenu() {
	alert('Ups! Niestety, ta podstrona jest jeszcze w trakcie wykonywania 😟');
}
