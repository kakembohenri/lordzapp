// Toggle navabar

var adjust = document.querySelector('.navbar-adjust')

var navbar = document.querySelector('.navbar-vertical')

var rotations = document.querySelectorAll('.navbar-adjust span')

var logo = document.querySelector('.company-logo_dashboard')

let socials = document.querySelector('.navbar-contacts')

let status = true

// Close navbar
adjust.addEventListener('click', function(){    
    if(status){
        adjust.style.left = '75%'
        navbar.style.width = '4.5%'
        rotations[0].style.transform = 'rotate(-25deg)'
        rotations[1].style.transform = 'rotate(25deg)'
        rotations[1].style.left = '15%'
        rotations[0].style.left = '15%'
        logo.style.left = '-15%'
        socials.style.display = 'none'

        status = false

    }else{ 
        adjust.style.left = '93%'
        navbar.style.width = '15rem'
        rotations[0].style.transform = 'rotate(25deg)'
        rotations[1].style.transform = 'rotate(155deg)'
        rotations[1].style.left = '25%'
        rotations[0].style.left = '25%'
        logo.style.left = '2%'
        socials.style.display = 'flex'

        status = true
    }
})








var imgHover = document.querySelector('img#hover')

var options = document.querySelector('ul.account-options')

// Mouse over
if(imgHover){
    imgHover.addEventListener('mousemove', function(){
        options.style.display = 'block'
    })
}

// Mouse out
if(options){
    options.addEventListener('mouseleave', function(){
        options.style.display = 'none'
    })
}


// Managing backdrop and pay rent form

var backdrop = document.querySelector('.backdrop')

//var payRentForm = document.querySelectorAll('.form-container_rent')

var payRentBtn = document.querySelectorAll('#pay-rent')

// Backdrop and form appearance
if(payRentBtn.length > 0){
    Array.from(payRentBtn).forEach(btn => {
        btn.addEventListener('click', function(e){
            backdrop.style.height = '100%'
            // console.log(e.target.parentElement.nextElementSibling)
            setTimeout(() => {
                e.target.parentElement.nextElementSibling.style.top = '10%'
            }, 500)

            if(backdrop){
                backdrop.addEventListener('click', function(){
                    backdrop.style.height = '0'
                    e.target.parentElement.nextElementSibling.style.top = '-150%'
                })
            }
            
        })
    })
}

// Backdrop and form disappear


