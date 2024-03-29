var ready = function (callback) {
    if (document.readyState != 'loading') {
        callback()
    } else {
        document.addEventListener('DOMContentLoaded', callback)
    }
}

/**
 * Notification handler
 * As Simple Responsive CSS Framework
 * Created by harrieanto31@yahoo.com
 * 2019/07/15
 * MIT License
 */
class Notify {
    static createMessageTemplate() {
        let $message = document.createElement('span');
        $message.innerHTML = this.getMessage();
        this.$messageTemplate = $message;
    }

    static createContainer($id, $class, $position) {
        this.$idContainer = $id;
        this.$containerPosition = $position;
        let $container = document.createElement('div');

        $container.className = $class+' '+$position;
        $container.id = $id;
        document.body.appendChild($container);
    }
    
    static createBar($content, $class = null) {
        let $span = document.createElement('span'), 
            $spanChild = document.createElement('span');
        
        $spanChild.textContent = $content;
        $span.className = $class || 'notify-info';
        $span.innerHTML = $spanChild.outerHTML;
        
        return $span.outerHTML;
    }
    
    static createCloseButton($class) {
        let $closeButton = document.createElement('a');
        $closeButton.className = $class;
        $closeButton.innerHTML = '&times;';
        
        this.$closeButton = $closeButton;
        
        this.closeNotifyWhenClicked();
    }
    
    static closeNotifyWhenClicked() {
        this.$closeButton.addEventListener('click', function(e) {
            let $parent = e.target.parentElement;
            $parent.style.display = 'none';
        });
    }
    
    static createNotifyTemplate($class, $position) {
        let $container = document.createElement('div');

        $container.className = $class+' '+$position+' '+this.getType();
        $container.appendChild(this.$closeButton);
        $container.appendChild(this.$messageTemplate);
        
        this.$template = $container;
    }
    
    static make($el, $duration) {
        let $container = document.getElementsByClassName(this.$containerPosition), 
            $template = this.$template;

        $container[0].appendChild($template);
        
        setTimeout(function() {
            $template.style.display = 'none';
        }, $duration);
    }
    
    static setMessage($value) {
        this.$message = $value;
    }
    
    static getMessage() {
        return this.$message;
    }

    static setType($value) {
        this.$type = $value;
    }
    
    static getType() {
        return this.$type;
    }
}

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

const Pagination = {};

Pagination.totalItem = 100
Pagination.currentPage = 10
Pagination.itemPerPage = 10
Pagination.useApi = false
Pagination.api = {
    totalPage: 0
}
Pagination.url = '/'
Pagination.element = '[data-number="pagination-number"]'
Pagination.css = {
    pageNumbers: {
        color: '#fff', 
        background: '#34495e'
    }
}
Pagination.marker = {
  previousText: 'Previous', 
  nextText: 'Next', 
  digger: {
    initial: 2, 
    subtractor: 5, 
    accumulator: 6
  }
}

Pagination.generateTotalPage = function () {
  if (this.useApi) return this.api.totalPage;
  
  return Math.ceil(this.totalItem / this.itemPerPage);
}

Pagination.totalPage = Pagination.generateTotalPage()

Pagination.marker.numbers = function () {
  let markers = []
  let totalPage = Number(Pagination.totalPage)
  let currentPage = Number(Pagination.currentPage)
  
  if (currentPage >= 1 && currentPage <= totalPage) {
    let initialRange = currentPage - this.digger.subtractor
    initialRange = Math.max(this.digger.initial, initialRange)
    
    let middleRange = currentPage+this.digger.accumulator
    middleRange = Math.min(middleRange, totalPage)
    
    markers.push(1)
    
    if (initialRange > 2) markers.push('...')
    
    for (let i = initialRange;i < middleRange; i++) {
      markers.push(i)
    }
    
    if (initialRange != totalPage) {
      markers.push('...')
      markers.push(totalPage)
    }
  }
  
  return markers;
}

Pagination.marker.previousNumber = function () {
  let currentPage = Math.floor(Pagination.currentPage)
  
  if (currentPage <= 1) return 1;
  if (currentPage <= Pagination.totalPage) return currentPage - 1;
  
  return null;
}

Pagination.marker.nextNumber = function () {
  let currentPage = Math.floor(Pagination.currentPage)
  
  if (currentPage >= 1 && currentPage < Pagination.totalPage) {
    return currentPage + 1;
  }
  
  return null;
}

Pagination.paginate = function () {
    let pageNumber = document.querySelector(this.element)
    pageNumber.innerHTML = ''
    
    let li = document.createElement('li')
    let a = document.createElement('a')

    if (this.marker.previousNumber() !== null) {
        a.href = this.url + this.marker.previousNumber()
        a.innerText = this.marker.previousText
        li.appendChild(a)
    }

    if (this.marker.nextNumber() !== null) {
        a.href = this.url + this.marker.nextNumber()
        a.innerText = this.marker.nextText
        li.appendChild(a)
    }
    
    for (let i in this.marker.numbers()) {
        let number = this.marker.numbers()[i]
        let linkNumber = this.url + number
        
        if (number !== '...') {
            a.href = linkNumber
            a.innerHTML = '<span>'+number+'<span>'
        } else {
            a.href = '#!'
            a.style.pointerEvents = 'none'
            a.innerHTML = '<span>'+number+'<span>'
            a.style.pointerEvents = 'auto'
        }
        
        li.appendChild(a)
        
        for (n in this.css.pageNumbers) {
           li.style[n] = this.css.pageNumbers[n]
        }
        
        if (pageNumber !== null) {
            pageNumber.innerHTML += li.outerHTML
        }
    }
}

const GithubApiParser = {}

GithubApiParser.pageParser = function (linkStr) {
  return linkStr.split(',').map(function(link) {
    return link.split(';').map(function(current, index) {
      if (index === 0) return /[^_]page=(\d+)/.exec(current)[1]
      if (index === 1) return /rel="(.+)"/.exec(current)[1]
    })
  }).reduce(function (object, parsedIndicators) {
    let property = parsedIndicators[1]
    let propertyValue = parsedIndicators[0]
    
    object[property] = propertyValue
    
    return object;
  }, {})
}

GithubApiParser.fetchGitRepository =  function(user, page = 1, perPage = 100, eCallback = {}) {
    let url = 'https://api.github.com/users/'+user+'/repos?page='+page+'&per_page='+perPage

    let headerCallback = function (response) {
        let linkStr = response.headers.get('Link')
        let linkParsed = GithubApiParser.pageParser(linkStr)
        
        let total = localStorage.getItem('total_page')
        
        if (linkParsed.last != total || total === null) {
            localStorage.setItem('total_page', linkParsed.last)
        }
        
        let next = localStorage.getItem('next_page')
        
        if (linkParsed.next != next || next === null) {
            localStorage.setItem('next_page', linkParsed.next)
        }
        
        return response.json();
    }
    
    let jsonCallback = function (response) {
        return response;
    }
    
    let request = fetch(url)
    
    request.catch((e) => {
      if (e.name == 'TypeError') {
        eCallback(e)
      }
    })

    return request.then(Utils.fetchResolverHandler()).
        then(headerCallback).
        then(jsonCallback)
}

const Utils = {}

Utils.fetchResolverHandler = function () {
    return (response) => {
        if (response.status >= 200 && response.status < 300) {
            return Promise.resolve(response);
        }
        
        return Promise.reject(new Error(response.statusText));
    }
}

Utils.windowTopDownScrollHandler = function (topCallback, downCallback) {
    var previousScrollPosition = 0
    
    window.addEventListener('scroll', () => {     
      //scroll up
      if ((document.body.getBoundingClientRect()).top > previousScrollPosition) {
          topCallback()
      }
      //scroll down
      if ((document.body.getBoundingClientRect()).top < previousScrollPosition) {
          downCallback()
      }
      
      previousScrollPosition = (document.body.getBoundingClientRect()).top
    })
}

Utils.redirectTo = function (linkLocation, $duration = 3000) {
    setTimeout(function() {
        window.location = linkLocation;
    }, $duration);
}

Utils.notify = function notify($el, $prop = {}) {
    //Define an initial notification identifiers
    let $idContainer = $prop.$idContainer || 'notify-container', 
        $containerClass = $prop.$containerClass || 'container-notify', 
        $containerPosition = $prop.$containerPosition || 'top', 
        $buttonClass = $prop.$buttonClass || 'notify-close-button', 
        $notifyClass = $prop.$notifyClass || 'notify';
        $notifyPosition = $prop.$notifyPosition || 'notify-center', 
        $duration = $prop.$duration || 20000, 
        $message = $prop.$message || 'Psudo message', 
        $type = $prop.$type || 'info';

    Notify.createContainer(
        $idContainer, 
        $containerClass, 
        $containerPosition
    );

    Notify.setMessage($message);
    Notify.setType($type);
    Notify.createMessageTemplate();
    Notify.createCloseButton($buttonClass);
    Notify.createNotifyTemplate($notifyClass, $notifyPosition);
    Notify.make($el, $duration);
}

const HeaderHandler = {}

HeaderHandler.menuVisible = false

HeaderHandler.el = {
    header: 'header', 
    navigation: 'nav', 
    container: 'div.main-content', 
    menuCloseBtn: '.menu-close-button', 
    menuActive: 'menu-active'
}

HeaderHandler.proportion = {
    navWidth: '30%', 
    containerWidth: '70%'
}

HeaderHandler.keyCodeEsc = 27

HeaderHandler.handleMenuCloseBtn = function () {
    let menuCloseBtns = document.querySelectorAll(this.el.menuCloseBtn)
    
    for (let i = 0; i < menuCloseBtns.length; i++) {
        menuCloseBtns[i].addEventListener('click', (e) => {
            e.preventDefault()
            
            !this.menuVisible ? this.revealMenu() : this.hideMenu()
        })
    }
}

HeaderHandler.mq = function (maxWidth = '45em') {
    return window.matchMedia('only screen and (max-width: '+maxWidth+')')
}

//Hide side navigation by clicking `ESC` key
HeaderHandler.handleEscKey = function () {
    document.addEventListener('keyup', (e) => {
        if (e.keyCode == this.keyCodeEsc) {
            if (this.menuVisible) this.hideMenu()
            document.body.classList.remove('no-scroll')
        }
    })
}

HeaderHandler.toggleMenuStates = function () {
    let body = document.querySelector('body')
    
    if (this.mq().matches) {
        body.classList.toggle('no-scroll')
    } else {
        body.classList.toggle('scroll')
    }
    
    let menuCloseBtns = document.querySelectorAll(this.el.menuCloseBtn)
    
    for (let i = 0; i < menuCloseBtns.length; i++) {
        menuCloseBtns[i].classList.toggle(this.el.menuActive);
    }
}

HeaderHandler.hideMenu = function () {
  	this.menuVisible = false;
  	this.toggleMenuStates();
  	
  	let navigation = document.querySelector(this.el.navigation), 
  	    container = document.querySelector(this.el.container)
  	    header = document.querySelector(this.el.header)
  	
  	navigation.style.display = 'none'
  	navigation.style.position = 'relative'
  	navigation.style.width = '100%'
  	container.style.width = '100%'
  	header.style.width = '100%'
  	header.style.position = 'absolute'
}

HeaderHandler.revealMenu = function () {
	this.menuVisible = true;
	this.toggleMenuStates();
	
  	let navigation = document.querySelector(this.el.navigation), 
  	    menuActive = document.querySelector('.menu-active'), 
  	    container = document.querySelector(this.el.container), 
  	    header = document.querySelector(this.el.header)
  	
  	navigation.style.display = 'flex'
  	navigation.style.width = this.proportion.navWidth
  	container.style.width = this.proportion.containerWidth
  	header.style.width = this.proportion.containerWidth
  	
  	if (this.mq().matches) {
  	    container.style.width = '100%'
  	    header.style.position = 'static'
  	    header.style.width = '100%'
  	    navigation.style.position = 'fixed'
  	    navigation.style.width = '100%'
  	    navigation.style.height = '100%'
  	}
}

HeaderHandler.init = function () {
    this.handleEscKey()
    this.handleMenuCloseBtn()
    this.scrollTopHandler()
}

HeaderHandler.scrollTopHandler = function () {
    let target = document.querySelector(this.el.header)
    
    if (target === null) return;
    
    if (target.getAttribute('data-scroll') == 'scroll-top') {
        let scrolled, 
            lastScrollTop = 0, 
            initialScrolledOffset = 5, 
            scrollHeight = target.offsetHeight
        
        window.addEventListener('scroll', (e) => {
            scrolled = true
        })
        
        setInterval(function() {
            if (scrolled) {
                hasScrolled()
                scrolled = false
            }
        }, 250)
        
        function hasScrolled() {
            var st = window.scrollY;
            
            if (st <= initialScrolledOffset) {
                target.style.width = '100%'
                
                if (!HeaderHandler.mq().matches && HeaderHandler.menuVisible) {
                    target.style.width = HeaderHandler.proportion.containerWidth
                }
                
                target.style.position = 'absolute'
                target.style.background = 'transparent'
                
                return;
            }
            
            if (st > lastScrollTop && st > scrollHeight) {
                // Scroll Down
                target.style.position = 'absolute'
                target.style.width = '100%'
            } else {
                // Scroll Up
                let b = document.body, 
                    d = document.documentElement, 
                    visibleHeight = window.innerHeight, 
                    documentHeight = Math.max(
                        b.scrollHeight, 
                        b.offsetHeight, 
                        d.clientHeight, 
                        d.offsetHeight, 
                        d.scrollHeight
                    )
                
                document.addEventListener('keyup', (e) => {
                    if (e.keyCode == 27) target.style.width = '100%'
                })
                
                if (st > initialScrolledOffset && st + visibleHeight < documentHeight) {
                    target.style.position = 'fixed'
                    target.style.width = '100%'
                    target.style.background = 'var(--color-white)'
                    
                    if (!HeaderHandler.mq().matches) {
                        if (HeaderHandler.menuVisible) {
                            target.style.width = HeaderHandler.proportion.containerWidth
                        } else {
                            target.style.width = '100%'
                        }
                    } else {
                        if (HeaderHandler.menuVisible) {
                            target.style.position = 'static'
                        }
                    }
                } else {
                    // Scroll Down
                    target.style.position = 'static'
                    target.style.width = '100%'
                }
            }	
            
            lastScrollTop = st;
        }
    }
}

const lazyBackground = {}

lazyBackground.init = function () {
    let images = document.querySelectorAll('[data-image]')
    
    for (let i = 0; i < images.length; i++) {
        let elem = images[i]
        let source = elem.getAttribute('data-image')
        
        if (source == null || source.length <= 0 ) { return; }
        
        elem.classList.add('image-loading')
        
        let img = document.createElement('img')
        img.src = source
        
        img.addEventListener('load', (e) => {
            let div = document.createElement('div')
            div.classList.add('lazy-bg')
            div.style.backgroundImage = 'url('+source+')'
            elem.appendChild(div)
            elem.classList.remove('image-loading')
            elem.classList.add('image-ready')
        })
    }
}

lazyBackground.init()

const toucher = {
  initialX: null, 
  initialY: null, 
  dataTarget: 'carousel', 
  touchElements: function () {
	return document.querySelectorAll("[data-target='"+this.dataTarget+"']")
  }, 
  initializeTouchPosition: function () {
	let elements = this.touchElements()
	
	if (elements.length > 0) {
	  elements[0].addEventListener('touchstart', (e) => {
		this.initialX = e.changedTouches[0].screenX;
		this.initialY = e.changedTouches[0].screenY;
	  }, false)
	}
  }, 
  createTouchEvent: function (callback) {
	this.initializeTouchPosition()
	let elements = this.touchElements()
	
	if (elements.length > 0) {
		for (let i = 0; i < elements.length; i++) {
			//This touchmove event will prevent touched container 
			//from scrolling
			elements[i].addEventListener('touchmove', (e) => {
				e.preventDefault()
			})
			
			elements[i].addEventListener('touchend', (e) => {
				let currentX = e.changedTouches[0].screenX
				let currentY = e.changedTouches[0].screenY
				
				if (currentX < this.initialX) {
					return callback('left')
				}

				if (currentX > this.initialX) {
					return callback('right')
				}

				if (currentY < this.initialY) {
					return callback('up')
				}

				if (currentY > this.initialY) {
					return callback('down')
				}

				if (currentY === this.initialY || currentX === this.initialX) {
					return callback('tap')
				}
			})
		}
	}
  }
}

const simpleCarousel = {
	indicator: 1, 
	toucher: {}, 
	dataTarget: {
		carousel: 'carousel', 
		card: 'card', 
		touch: 'carousel-button'
	}, 
	dataAction: {
		slideLeft: 'slideLeft', 
		slideRight: 'slideRight'
	}, 
	card: {
	  css: {
		display: 'flex'
	  }
	}, 
	init: function () {
		if (this.cards().length > 0) {
		  for (let property in this.card.css) {
		   this.cards()[0].style[property] = this.card.css[property]
		  }
		}

		this.previousSlideEvent()
		this.nextSlideEvent()
	}, 
	carousel: function (event) {
		let carousel = event.target.parentElement.parentElement
		carousel = carousel.getAttribute('data-target');
		
		if (this.indicator > this.cards().length) {
			this.indicator = 1;
		}
		
		if (this.indicator < 1) {
			this.indicator = this.cards().length;
		}
		
		if (carousel === this.dataTarget.carousel) {
			let card = document.querySelector("[data-target='"+carousel+"']")
			
			for (let i = 0; i < this.cards().length; i++) {
				card.children[i].style.display = 'none'
			}
			
			card = card.children[this.indicator-1]
			
			for (let property in this.card.css) {
			  card.style[property] = this.card.css[property]
			}
		}
	}, 
	cards: function () {
		let card = this.dataTarget.card
		
		return document.querySelectorAll("[data-target='"+card+"']")
	}, 
	previousSlideEvent: function () {
		let slideLeft = this.dataAction.slideLeft
		
		let actions = document.querySelectorAll("[data-action='"+slideLeft+"']");
		
		if (actions.length > 0) {
			actions[0].addEventListener('click', (e) => {
				this.carousel(e, this.indicator -= 1)
			})
		}

		this.touchEvent((indicator) => {
			if (indicator === 'left') {
				actions[0].click()
			}
		})
	}, 
	nextSlideEvent: function () {
		let slideRight = this.dataAction.slideRight
		
		let actions = document.querySelectorAll("[data-action='"+slideRight+"']");

		
		if (actions.length > 0) {
			actions[0].addEventListener('click', (e) => {
				this.carousel(e, this.indicator += 1)
			})
		}

		this.touchEvent((indicator) => {
			if (indicator === 'right') {
				actions[0].click()
			}
		})
	}, 
	touchEvent: function (callback) {
		this.toucher.dataTarget = this.dataTarget.touch
		
		this.toucher.createTouchEvent((indicator) => {
			callback(indicator)
		})
	}
}

const TypeWriter = {
  typingElement: {}, 
  typingMark: {}, 
  targetSelector: 'div', 
  caret: {
	color: '#000'
  },  
  mark: {
	background:  'transaprent', 
	padding: 0, 
	color: '#fff', 
	lineHeight: 1.5
  }, 
  pause: false, 
  speed: 125, 
  loop: true, 
  dataTexts: [], 
  typingCallback: function (index) {
	//do things
  }, 
  startTypingText: function (index, fnCallback) {
	if (this.pause) {
	  return;
	}
	
	if (typeof this.dataTexts[index] == 'undefined') {
	  if (this.loop) {
		setTimeout(() => {
		  this.startTypingText(0)
		}, 9000)
	  }
	}
	
	this.typeOneText(this.dataTexts[index], 0, () => {
	  this.startTypingText(index + 1)
	})
	
	this.typingCallback(index)
  },  
  caretElement: function () {
	let element = document.createElement('span')
	element.classList.add('blink-cursor')
	element.style.color = this.caret.color
	return element.outerHTML;
  }, 
  createTypingElement: function (el, fnCallback) {
	let element = document.createElement(el)
	this.typingElement = fnCallback(element)
  }, 
  typeOneText: function (text, position, fnCallback) {
	if (position < text.length) {
	  let mark = document.createElement('span')
	  
	  for (property in this.mark) {
		mark.style[property] = this.mark[property]
	  }
	  
	  let part = text.substring(0, position+1)
	  let parts = part.split(' ')
	  let texts = []
	  
	  for (i in parts) {
	  	mark.innerHTML = parts[i]
		texts[i] = mark.outerHTML
	  }
	  
	  part = texts.join(' ')
	  mark.innerHTML =  this.caretElement()
	  mark.style.paddingLeft = 0
	  mark.style.paddingRight = '2.5px'
	  this.typingElement.innerHTML = part + mark.outerHTML
	  
	  let target = document.querySelector(this.targetSelector)
	  
	  if (target !== null) target.innerHTML = this.typingElement.outerHTML
	  
	  setTimeout(() => {
		this.typeOneText(text, position+1, fnCallback)
	  }, this.speed)
	  
	} else if (typeof fnCallback == 'function') {
	  setTimeout(() => {
		fnCallback()
	  }, 700)
	}
  }
}

simpleCarousel.toucher = toucher