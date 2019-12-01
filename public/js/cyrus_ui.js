ready(function () {
    HeaderHandler.init()
    simpleCarousel.init()
    
    setTimeout(function () {
      let loader = document.querySelector('.page-loader')
      loader.style.display = 'none'
    }, 10)
  
    let cyrusTypeWriter = Object.create(TypeWriter)
    cyrusTypeWriter.element = 'h2'
    cyrusTypeWriter.caret.color = '#fff'
    cyrusTypeWriter.loop = false

    cyrusTypeWriter.targetSelector = '[data-target="cyrus-type-writer"]'
    cyrusTypeWriter.dataTexts = ['Cyrus Collagen Facial Soap. Terbuat dari racikan Alami dan Air liur burung wallet. Cocok untuk semua jenis kulit.']
    cyrusTypeWriter.createTypingElement('h3', function (el) {
        el.classList.add('font-heavy')
        el.style.textTransform = 'uppercase'
        
        return el;
    })
    cyrusTypeWriter.startTypingText(0)
})