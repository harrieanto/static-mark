ready(() => {
    simpleCarousel.init();
    
    let homeTypeWriter = Object.create(TypeWriter)
    homeTypeWriter.element = 'h2'
    homeTypeWriter.caret.color = '#000'
    homeTypeWriter.loop = false
    homeTypeWriter.targetSelector = '[data-target="home-type-writer-1"]'
    homeTypeWriter.dataTexts = ['RAHASIA mastah PHP Programmer TERBONGKAR!!!']
    homeTypeWriter.createTypingElement('h2', function (el) {
        el.classList.add('font-heavy')
        el.style.textTransform = 'uppercase'
        
        return el;
    })
    homeTypeWriter.startTypingText(0)
    
    let carousel = Object.create(TypeWriter)
    carousel.element = 'h2'
    carousel.caret.color = '#fff'
    carousel.targetSelector = '[data-target="type-writer-1"]'
    carousel.dataTexts = ['Hai! I am Harrie.', 'I am back-end PHP developer.', 'I passionate about', 'code.', 'write.', 'design.', '&', 'digital product creation.']
    carousel.createTypingElement('h2', function (el) {
        el.classList.add('text-center', 'font-heavy')
        el.style.textTransform = 'uppercase'
        
        return el;
    })
    
    carousel.typingCallback = function (index) {
        let cssList = [
            'var(--color-midnightblue)', 
            'var(--color-wetasphalt)', 
            'var(--color-midnightblue)', 
            'var(--color-wetasphalt)', 
            'var(--color-midnightblue)', 
            'var(--color-wetasphalt)', 
            'var(--color-midnightblue)', 
            'var(--color-wetasphalt)',
        ]
        
        let animations = [
            'slide-down .5s', 
            'slide-in .4s',
            'slide-out .5s',
            'slide-up .2s', 
            'slide-in .2s', 
            'slide-out .2s', 
            'sharp .2s', 
            'slide-down .5s', 
        ]
        
        let target = document.querySelector(carousel.targetSelector)
        let parentTarget = target.parentElement
        
        parentTarget.style.background = cssList[index]
        parentTarget.style.backgroundSize = '100% 100%'
        parentTarget.style.animation = animations[index]
    }
    
    let curtainTitle = Object.create(TypeWriter)
    curtainTitle.loop = false
    curtainTitle.element = 'h3'
    curtainTitle.caret.color = '#fff'
    curtainTitle.createTypingElement('h3', function (el) {
        el.classList.add('text-center', 'font-heavy')
        el.style.textTransform = 'uppercase'
        
        return el;
    })
    
    curtainTitle.targetSelector = '[data-target="type-writer-2"]'
    curtainTitle.dataTexts = ['Hi! Welcome.', 'Please.', 'Tap Anywhere To See Inside']
    curtainTitle.startTypingText(0)
    
    let curtains = document.querySelectorAll('[data-target="curtains-area"]')
    
    if (curtains.length > 0) {
        let html = document.querySelector('html')
        html.style.overflow = 'hidden'
        html.style.position = 'fixed'
        
        for (let i = 0; i < curtains.length; i++) {
            curtains[i].style.pointerEvents = 'auto'
            
            if (typeof curtains[i].children[0].checked != 'undefined') {
                if (curtains[i].children[0].checked) {
                    html.style.overflow = 'visible'
                    html.style.position = 'relative'
                }
            }
            
            curtains[i].addEventListener('click', (e) => {
                if (typeof e.target.checked != 'undefined') {
                    if (e.target.checked) {
                        html.style.overflow = 'visible'
                        html.style.position = 'relative'
                        carousel.pause = false
                        curtainTitle.pause = true
                        carousel.startTypingText(0)
                        e.target.parentElement.style.zIndex = 2
                    }
                    
                    if (!e.target.checked) {
                        carousel.pause = true
                        curtainTitle.pause = false
                        curtainTitle.startTypingText(0)
                        html.style.overflow = 'hidden'
                        html.style.position = 'fixed'
                        e.target.parentElement.style.zIndex = 5
                    }
                }
            })
        }
    }
    
    let dotScrollSmooth = Object.create(scrollSmooth)
    dotScrollSmooth.css.navigators.background = '#fff'
    dotScrollSmooth.init()

    function fetchGitRepository (user, page, perPage) {
        let targetElements = document.querySelectorAll('#harrieanto_repository')
    
        let eCallback = (e) => {
            let h3 = document.createElement('h3')
            h3.innerText = 'Check your internet connection'
            h3.classList.add('text-center')
            h3.style.animation = 'fadein 1s'
            targetElements[0].innerHTML = h3.outerHTML
        }
        
        reOrderPaginationNumber(page)
        
        let repos = GithubApiParser.fetchGitRepository('symfony', page, perPage, eCallback)
        
        targetElements[0].innerHTML = ''
        
        repos.then((response) => {        
            for (let i = 0; i < response.length; i++) {
                let res = response[i]
                let repoName = response[i].full_name
                let repoLink = response[i].html_url
                let repoDescription = response[i].description
                let repoLanguage = response[i].language
        
                if (repoLanguage === null) repoLanguage = 'Unknown'
                if (repoDescription === null) repoDescription = 'No description'
        
                let repoCreatedAt = new Date(response[i].created_at)
        
                repoCreatedAt = repoCreatedAt.
                    getDate() +'-'+ repoCreatedAt.
                    getMonth() +'-'+ repoCreatedAt.
                    getFullYear()
        
                let repoLicenseName = 'Unknown License'
                let repoLicenseLink = '#!'
        
                if (response[i].license !== null) {
                  repoLicenseName = response[i].license.name
                  repoLicenseLink = response[i].license.url
                }
        
                let repoStargazersLink = response[i].stargazers_url
                let repoStargazersCount = response[i].stargazers_count
                let repoForksLink = response[i].forks_url
                let repoForksCount = response[i].forks_count
                let repoWatchersLink = response[i].watchers_url
                let repoWatchersCount = response[i].watchers_count
        
                let element = `
                    <div class="col-50-percent" style="position: relative;">
                        <span class="button-overlay bg-black text-white">View project</span>
                        <h3><a href="${repoLink}" class="link">${repoName}</a></h3>
                        <span class="margin-right"><a href="${repoLicenseLink}" class="link">${repoLicenseName}</a></span>
                        <span class="margin-right"><i class="ion-ios-calendar margin-right"></i>${repoCreatedAt}</span>
                        <span class="margin-right"><a href="${repoStargazersLink}" class="link"><i class="ion-ios-star margin-right"></i>${repoStargazersCount}</a></span>
                        <span class="margin-right"><a href="${repoWatchersLink}" class="link"><i class="ion-ios-eye margin-right"></i>${repoWatchersCount}</a></span>
                        <span class="margin-right"><a href="${repoForksLink}" class="link"><i class="ion-fork margin-right"></i>${repoForksCount}</a></span>
                        <p>${repoDescription}</p>
                        <p>Language: ${repoLanguage}</p>
                    </div>
                `
                
                for (let n in targetElements) {
                    targetElements[n].innerHTML += element
                }
            }
        })
    }
    
    var githubReposUrl = 'harrieanto'
    
    fetchGitRepository(githubReposUrl, 1, 10)
    
    function reOrderPaginationNumber(page) {
        let totalPage = localStorage.getItem('total_page')
        let currentPage = localStorage.getItem('next_page') - 1
        
        Pagination.useApi = true
        Pagination.currentPage = page
        Pagination.totalPage = totalPage
        Pagination.paginate()
        
        let paginationBtn = document.querySelectorAll(Pagination.element)
    
        paginationBtn = paginationBtn[0].children
    
        for (let i = 0; i < paginationBtn.length; i++) {
            paginationBtn[i].addEventListener('click', (e) => {
                e.preventDefault()
        
                let pageNumber = e.target.innerText
                let targetElements = document.querySelectorAll('#harrieanto_repository')
                
                if (!isNaN(pageNumber)) {
                    fetchGitRepository(githubReposUrl, pageNumber, 10)
                }
            })
        }    
    }
})