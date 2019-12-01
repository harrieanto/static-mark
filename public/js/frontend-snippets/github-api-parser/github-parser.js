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