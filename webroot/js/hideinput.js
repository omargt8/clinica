function showContent() {
        element = document.getElementById("content");
        active = document.getElementById("active");
        if (active.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }