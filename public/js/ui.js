var csrfToken = document.querySelector("meta[name='csrf-token']").getAttribute('content')

/**
 * Dom handler
 * As Simple Responsive CSS Framework
 * Created by harrieanto31@yahoo.com
 * 2019/07/15
 * MIT License
 */
class Dom {
	static make ($item) {
		this.$el = this.getById($item);
		if (this.$el === null) this.$el = this.getByClass($item);
		
		return this;
	}

	static getById($id) {
		this.$items = document.getElementById($id);
		
		return this.$items;
	}
	
	static getByClass($name) {
		this.$items = document.getElementsByClassName($name);
		
		return this.$items;
	}
	
	static getEl($key = null) {
		if (null === $key) return this.$el;

		if (this.$el[$key] !== undefined) return this.$el[$key];

		return this.$el;
	}
	
	static listOptions($el = null) {
		if ($el === null) $el = this.$el;

		let $options = [];
		for (let $i = 0;$i<$el.options.length;$i++) {
			$options[$i] = $el.options[$i].value;
		}
		
		return $options;
	}

	static selectedOptions($el = null, type = 'value') {
		if ($el === null) $el = this.$el;

		let $options = $el.options;
		let $container = new Array;
		
		for (let i = 0; i<$options.length; i++) {
			if ($options[i].selected) {
				$container[i] = $options[i][type]
			}
		}
		
		return $container;
	}
	
	static selectedOption($el = null) {
		if ($el === null) $el = this.$el;

		let $options = $el.options;
		let $container = '';
		
		for (let i = 0; i<$options.length; i++) {
			if ($options[i].selected) {
				$container = $options[i].value;
			}
		}
		
		return $container;
	}
}

/**
 * @author harrieanto31@yahoo.com
 * @web bandd.web.id
 * 
 * Handle the common ui interactions
 **/
ready(function () {
let loaders = document.querySelectorAll('.page-loader')

for (let i = 0; i < loaders.length; i++) {
    loaders[i].style.display = 'none'
}

HeaderHandler.init()

let finders = document.querySelectorAll('.site-search-open')
for (let i = 0; i < finders.length; i++) {
	finders[i].addEventListener('click', (e) => {
		let target = e.currentTarget.nextElementSibling, 
		closeBtn = document.querySelectorAll('.site-search .site-search-close-button'), 
		b = document.querySelectorAll('body')[i]
		
		closeBtn[i].classList.add('site-search-close-icon-active')

		if (!b.classList.contains('no-scroll')) {
			b.classList.add('no-scroll')
		}
		
		target.style.display = 'block'
	})
}

finders = document.querySelectorAll('.site-search-close-button')
for (let i = 0; i < finders.length; i++) {
	finders[i].addEventListener('click', (e) => {
		let target = document.querySelectorAll('.site-search')
		target[i].style.display = 'none'
		document.querySelectorAll('body')[i].classList.remove('no-scroll')
	})
}

document.documentElement.addEventListener('keyup', (e) => {
	if (e.keyCode == 27) {
		let b = document.querySelector('body'), 
			modal = document.querySelector('.modal'), 
			finder = document.querySelector('.site-search')
		
		if (modal !== null) modal.style.display = 'none'
		if (finder !== null) finder.style.display = 'none'

		if (b.classList.contains('no-scroll')) {
			b.classList.remove('no-scroll')
		}
	}
})

let closeModals = document.querySelectorAll('.modal-close-button'), 
	openModals = document.querySelectorAll('.js-modal-button')

for (let i = 0; i < closeModals.length; i++) {
	closeModals[i].addEventListener('click', (e) => {
		e.target.closest('.modal').style.display = 'none'
	})

	openModals[i].addEventListener('click', (e) => {
		e.currentTarget.nextElementSibling.style.display = 'block'
	})
}

/**
 * Handle custom input placeholder
 **/
const formInputPlaceholder = {
	el: {},
	init: function () {
		let el = document.querySelectorAll(this.el.inputClass)
		
		for (let i = 0; i < el.length; i++) {
			if (el[i].value !== '') {
				el[i].nextElementSibling.style.display = 'none'
			}
			
			el[i].addEventListener('focus', (e) => {
				if (e.target.value === '') {
					e.target.nextElementSibling.style.display = 'none'
				}
			});
			
			el[i].addEventListener('blur', (e) => {
				let nextElement = e.target.nextElementSibling
				
				if (e.target.value !== '') {
					nextElement.style.display = 'none'
				} else {
					nextElement.style.display = 'block'
				}
			});
		}
	}
}

formInputPlaceholder.el = {
	inputClass: 'input.form-input'
}

formInputPlaceholder.init()

/**
 * Dropdown handler
 * 
 * When the user clicks on the button,
 * toggle between hiding and showing the dropdown content
 **/
const vanillaDropdown = {
	el: {}, 
	init: function () {
		let d = document.querySelectorAll(this.el.closeBtnClass), 
			toggleBtnClass = this.el.toggleCloseBtnClass.replace('.', '')

		for (let i = 0; i < d.length; i++) {
			d[i].addEventListener('click', (e) => {
				let dCollapse = e.target.parentElement.lastElementChild
				dCollapse.classList.toggle(toggleBtnClass)
			})
		}
	}, 
	closeWhenWindowOutsideDropdown: function () {
		let container = this.el.containerClass, 
			toggleBtnClass = this.el.toggleCloseBtnClass.replace('.', ''), 
			dCollapse = document.querySelectorAll(this.el.collapseClass)

		document.addEventListener('click', (e) => {
			if (e.target.closest(container) === null) {
				for (let i = 0; i < dCollapse.length; i++) {
					dCollapse[i].classList.remove(toggleBtnClass)
				}
			}
		})
	}
}

vanillaDropdown.el = {
	containerClass: '.dropdown', 
	toggleCloseBtnClass: '.show', 
	closeBtnClass: '.dropdown-button', 
	collapseClass: '.dropdown-collapse'
}

vanillaDropdown.init()
vanillaDropdown.closeWhenWindowOutsideDropdown()

let alerts = document.querySelectorAll('.alert-close-button')

for (let i = 0; i<alerts.length; i++) {
	alerts[i].addEventListener('click', (e) => {
		let target = e.target.closest('.alert')
		target.style.display = 'none'
	})
}

let codeBlocks = document.querySelectorAll('pre code')

for (let i = 0; i<codeBlocks.length; i++) {
	hljs.highlightBlock(codeBlocks[i])
}

});

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