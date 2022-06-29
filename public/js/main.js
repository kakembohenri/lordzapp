var loader = document.querySelector('.loader')

window.addEventListener('load', function(){
    loader.style.display = 'none'
})

let notification = document.querySelector('#notification')

if(notification)
{
    setTimeout(() => {
        notification.style.display = 'none'
    }, 5000)
}
