window.addEventListener("scroll",()=>{

    const navbar=document.querySelector("#navbar");

    if(window.scrollY>80){

        navbar.classList.add(
            "fixed",
            "top-[15px]",
            "bg-white",
            "shadow-lg"
        );

        navbar.classList.remove(
            "absolute"
        );

    }else{

        navbar.classList.remove(
            "fixed",
            "top-[15px]",
            "bg-white",
            "shadow-lg"
        );

        navbar.classList.add(
            "absolute"
        );

    }

});
