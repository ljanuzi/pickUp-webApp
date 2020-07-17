 const navSlide = () => {
    const burger = document.querySelector('.burger');
    
    document.body.addEventListener('touchmove', function(e){ e.preventDefault(); });
    
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');
    
    //toggle nav
    burger.addEventListener('click',() => {
        nav.classList.toggle('nav-active');
        
        //animation Links
        navLinks.forEach((link, index) => {
            
            if(link.style.animation){
                link.style.animation = '';
            }
            else{
                
            
        link.style.animation =`navLinkFade 1s ease forwards ${index/ 5 +0.1}s`;
            }
        
    });
        
        //burger animation
        burger.classList.toggle('toggle');
    });
    
    
    
    
}

                           
navSlide();

