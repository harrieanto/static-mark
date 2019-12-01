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
  
  return this.totalItem / this.itemPerPage;
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
            a.innerText = number
        } else {
            a.href = '#!'
            a.style.pointerEvents = 'none'
            a.innerText = number
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