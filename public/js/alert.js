window.onload = () => {
    let alertWrapper = document.getElementById('alert-wrapper')
    let alertButton = document.getElementById('alert-button')
    let alertCont = document.getElementById('alert-cont')

    alertCont.addEventListener('click', (e) => e.stopPropagation())
    alertWrapper.addEventListener('click', () => console.log('close alert'))
    alertButton.addEventListener('click', (e) => {e.stopPropagation(); console.log('close alert')})
}
