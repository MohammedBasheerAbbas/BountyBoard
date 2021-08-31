const btn = document.querySelector(".mobile-menu-button");
const sidebar = document.querySelector(".sidebar");

btn.addEventListener("click", () => {
  sidebar.classList.toggle("-translate-x-full");
});


const statusMessage = document.getElementById('status-message');

setTimeout(()=> {
    statusMessage.style.opacity=0;
    statusMessage.style.display='none';
  }, 4000);