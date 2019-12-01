const scrollSmooth = {
    navigator: '[data-nav="scroll"]', 
    duration: 1000, 
    animation: 'easeInCubic', 
    css: {
        navigators: {
            background: '#2c3e50', 
            animation: 'slide-up .7s'
        }
    }
}

scrollSmooth.stylingNavigator = function (el, remove = false) {
    for (let i in this.css.navigators) {
        if (remove === false) {
            el.style[i] = this.css.navigators[i]
        } else {
            el.style[i] = ''
        }
    }
}

scrollSmooth.dotScroll = function (offsets) {
    let scrollTop = Math.min(window.pageYOffset, document.documentElement.scrollTop), 
        scrollHeight = document.documentElement.scrollHeight, 
        navigators = document.querySelectorAll(this.navigator), 
        index;
    
    for (let i = 0; i < offsets.length; i++) {
        this.stylingNavigator(navigators[i], true)
    }
    
    for (let i = 0; i < offsets.length; i++) {
        if (scrollTop <= offsets[i]) {
            index = i
            break;
        }
    }
    
    if (typeof index == 'undefined') {
        if (scrollTop <= scrollHeight) {
            index = navigators.length - 1
        }
    }
        
    this.stylingNavigator(navigators[index])
}

scrollSmooth.init = function () {
    var navigators = document.querySelectorAll(this.navigator)
    let offsetTops = new Array
    let offsetBottoms = new Array
    
    for (let i = 0; i < navigators.length; i++) {
        let id = navigators[i].getAttribute('href')
        let target = document.querySelector(id)
        
        offsetTops.push((target.getBoundingClientRect()).top)
        offsetBottoms.push((target.getBoundingClientRect()).bottom)
    }
    
    let dotScrollTop = () => this.dotScroll(offsetBottoms)
    let dotScrollDown = () => this.dotScroll(offsetTops)
    
    Utils.windowTopDownScrollHandler(dotScrollTop, dotScrollDown)
    
    for (let i = 0; i < navigators.length; i++) {
        navigators[i].addEventListener('click', (e) => {
            e.preventDefault()
            
            let targetId = e.target.getAttribute('href')
            
            for (let i = 0; i < navigators.length; i++) {
                this.stylingNavigator(navigators[i], true)
            }
            
            this.stylingNavigator(e.target)
            
            requestAnimationFrame((timestamp) => {
                const startTime = timestamp || new Date().getTime()
                const currentTime = startTime
                const duration = this.duration
                
                let targetElement = document.querySelector(targetId)
                let lastTopPosition = targetElement.getBoundingClientRect().top
                let scrollOffset = window.pageYOffset
                this.moveTo(startTime, currentTime, duration, lastTopPosition, scrollOffset)
            })
        })
    }
}


scrollSmooth.easeInCubic = function (d) {
    return d * d * d;
}

scrollSmooth.easeInCube = function (d) {
    return d * d;
}

scrollSmooth.moveTo = function (startTime, currentTime, duration, lastTopPosition, scrollOffset) {
    let runtime = currentTime - startTime
    let progress = Math.min(runtime / duration, 1)
    let animation = this[this.animation](progress)
    
    window.scroll(0, scrollOffset + (lastTopPosition * animation))
    
    if (runtime < duration) {
        requestAnimationFrame((timestamp) => {
            const currentTime = timestamp || new Date().getTime()
            this.moveTo(startTime, currentTime, duration, lastTopPosition, scrollOffset)
        })
    }
}