const toggleButton = document.querySelector(".toggle");
const body = document.body;
const currentTheme = body.getAttribute('data-bs-theme');
const header = document.querySelector(".header");

const luna = document.querySelector(".luna");
const sol = document.querySelector(".sol");

if(currentTheme == 'light'){
  sol.style.display = "none";
}else{
  luna.style.display = "none";
}

header.classList.add(`bg-${currentTheme}`);

toggleButton.addEventListener('click', () => {
  const currentTheme = body.getAttribute('data-bs-theme');
  const newTheme = currentTheme === 'light' ? 'dark' : 'light';
  body.setAttribute('data-bs-theme', newTheme);

  if(newTheme == 'light'){
    luna.style.display = "block";
    sol.style.display = "none";
    
  }else{
    sol.style.display = "block";
    luna.style.display = "none";
  }

  header.classList.add(`bg-${newTheme}`);
  header.classList.remove(`bg-${currentTheme}`);
});




