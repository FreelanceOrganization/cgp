/**
 * Header toggle effect
 */
window.onload = () => {
    let burgerInnerCont = document.getElementById('burger-inner-cont')
    let sidebarHeaderInfo = document.getElementById('sub-header-info')
    let sidebarWrapper = document.getElementById('sidebar-wrapper')

    burgerInnerCont.addEventListener('click', () => {
        sidebarWrapper.style = 'display: block;'
        sidebarHeaderInfo.style = 'display: block;'
    })

    sidebarHeaderInfo.addEventListener('click', e => {
        e.stopPropagation()
    } )

    sidebarWrapper.addEventListener('click', (e) => {
        slideOut(80, sidebarHeaderInfo, 'margin-left', -280)
    })

    /**
     * fade out logic javascript
     */
    function slideOut(duration, element, direction, farness) {
        let interval = farness / duration
        let incrementingFarness = 0
        let intervalLoop = setInterval(() => {
            // Loop interval breaker
            if (Math.round(incrementingFarness) == farness) {
                element.style = `${direction}: ${farness}px`
                sidebarWrapper.style = 'display: None'
                console.log('end')
                clearInterval(intervalLoop)
            }

            incrementingFarness = incrementingFarness + interval
            element.style = `${direction}: ${Math.round(incrementingFarness)}px`
        }, 0)
    }

}
