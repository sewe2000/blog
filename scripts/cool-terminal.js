
function isItMobileDevice() {

    return navigator.userAgent.match(/Android/i)
 || navigator.userAgent.match(/webOS/i)
 || navigator.userAgent.match(/iPhone/i) 
 || navigator.userAgent.match(/iPad/i) 
 || navigator.userAgent.match(/iPod/i)
 || navigator.userAgent.match(/BlackBerry/i)
	|| navigator.userAgent.match(/Windows Phone/i);
}


if(!isItMobileDevice()) {
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
}




