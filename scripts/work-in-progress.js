const links = document.querySelectorAll('.work-in-progress');

for(link of links) {
	link.addEventListener('click', workInProgressMenu);
}

function workInProgressMenu() {
	alert('Niestety ta podstrona nie jest jeszcze gotowa. Proszę o cierpliwość. Na pewno kiedyś ją zakoduję 👨‍💻');
}
