

const link = document.createElement('link');
link.href = 'stylesheets/greeting.css';
link.rel = 'stylesheet';
document.head.appendChild(link);

const background = document.createElement('div');
background.className = 'terminal-background';
document.body.appendChild(background);



const label = document.createElement('div');
label.innerText = 'Welcome to sewe-hub.xyz!';
label.className = 'greeting';

const shellSign = document.createElement('h1');
shellSign.innerText = '$ ';
shellSign.className = 'shell-sign';
background.appendChild(shellSign);

background.appendChild(label);

const button = document.createElement('button');
button.className = 'enter-button';
button.innerText = 'Enter website';

background.appendChild(button);

button.addEventListener('click', () => {
    document.head.removeChild(link);
    document.body.removeChild(background);
});



