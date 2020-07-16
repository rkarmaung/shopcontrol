burgerCounter = 0;
document.querySelector(".burgerContainer").addEventListener("click", function(){
    if(burgerCounter==0){
        document.querySelector(".burgerContent").style.right =  "0%";
          // add listener to disable scroll
        // window.addEventListener('scroll', noScroll);
        burgerCounter++;
    }else{
        document.querySelector(".burgerContent").style.right = "-100%";
        // Remove listener to re-enable scroll
        // window.removeEventListener('scroll', noScroll);
        burgerCounter--;
    }
});