document.addEventListener("DOMContentLoaded", function(event) {
    const img = document.querySelector(".companyImage");
    const initHeight = img.height;

    window.addEventListener('scroll', (e) => {
        if (pageYOffset > document.documentElement.clientHeight / 2){
            img.height = 0;
        }
        else{
            img.height = initHeight;
        }

    })
});