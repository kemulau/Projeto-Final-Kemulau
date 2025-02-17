import './bootstrap';

document.addEventListener("DOMContentLoaded", function() {
    const dropdownBtn = document.getElementById("dropdownBtn");
    const dropdownMenu = document.getElementById("dropdownMenu");

    dropdownBtn.addEventListener("click", function(event) {
        event.stopPropagation();
        dropdownMenu.classList.toggle("active");
    });

    // Fecha o dropdown ao clicar fora dele
    document.addEventListener("click", function(event) {
        if (!dropdownBtn.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.remove("active");
        }
    });
});
