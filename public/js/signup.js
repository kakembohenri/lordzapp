var landlord = document.querySelector('form.landlord')

var tenant = document.querySelector('form.tenant')

var button = document.querySelectorAll('.toggle-btn')

var slider = document.querySelector('#slider')

let container = document.querySelector('.form-container-detail')

if(button.length > 0){
// Toggle to tenant
button[1].addEventListener('click', function(){
    slider.style.left = '50%'
    landlord.style.left = '-100%'
    tenant.style.left = '0'
    container.style.height = '36rem'
})
    
    // Toggle to landlord
    
    button[0].addEventListener('click', function(){
        slider.style.left = '0'
        landlord.style.left = '0'
        tenant.style.left = '100%'
        container.style.height = '35rem'
    })
}

