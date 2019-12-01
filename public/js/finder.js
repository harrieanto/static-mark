let finderForms = document.querySelectorAll('#finder-form')

for (let i = 0; i < finderForms.length; i++) {
	finderForms[i].addEventListener('submit', (e) => {
		e.preventDefault()
		
		let unavailable = document.querySelector('#finder-unavailable'), 
			inputValue = document.querySelector('#finder-input'), 
			result = document.querySelector('#finder-result'), 
			loading = document.querySelector('#finder-loading')

		result.innerHTML = ''
		loading.style.display = 'block'
		unavailable.style.display = 'none';
		
		function response (jsonResponse) {
			if (!jsonResponse.error) {
				loading.style.display = 'none'

				let p = document.createElement('p'), 
				blockquote = document.createElement('blockquote');

				p.innerText = 'The keyword you\'re looking for \''+inputValue.value+'\' have '+jsonResponse.success.found+' results in this site'
				blockquote.innerHTML = p.innerHTML
				blockquote.classList.add('text-blacklighter', 'font-light')
				result.appendChild(blockquote)

				let payloads = jsonResponse.success.payload

				payloads.forEach((e) => {
					let html = `
						<a href="${e.slug}" class="margin-top"><h2 class="link text-black">${e.heading}</h2></a>
						<p>${e.highlight}</p>
					`

					result.innerHTML += html
				})
			} else {
				result.innerHTML = ''
				loading.style.display = 'none'

				jsonResponse.error.forEach((e) => {
            		Utils.notify(document, {
            			$message: e, 
            			$type: 'danger'
            		});
				})
			}
		}
		
		let payload = JSON.stringify({
				keyword: inputValue.value
			})
		
		let find = fetch('/v1/blog/finder/page/1', {
			method: 'POST', 
			headers: {
				'Content-type': 'application/json', 
				'X-CSRF-TOKEN': csrfToken
			}, 
			body: payload, 
			credentials: 'include', 
		})
		
		let json = function (response) {
		    return response.json();
		}
		
		find.then(Utils.fetchResolverHandler())
		.then(json)
		.then(response)
		.catch((error) => {
			console.log(error)
		})
	})
}

const infiniteLoad = {
	htmlId: {
		container: '#finder', 
		resultContainer: '#finder-result', 
		inputForm: '#finder-input', 
		submitForm: '#finder-form', 
		unavailable: '#finder-unavailable', 
		loading: '#finder-loading'
	}, 
	slug: {
		prefix: 'blog', 
		currentPage: 1
	}, 
	api: {
		url: '/v1/blog/finder/page', 
		csrfToken: ''
	}, 
	load: function () {
		let element = document.querySelector(this.htmlId.container), 
			result = document.querySelector(this.htmlId.resultContainer), 
			formInput = document.querySelector(this.htmlId.inputForm), 
			formSubmit = document.querySelector(this.htmlId.submitForm), 
			unavailable = document.querySelector(this.htmlId.unavailable), 
			loading = document.querySelector(this.htmlId.loading), 
			slugPrefix = this.slug.prefix, 
			csrfToken = this.api.csrfToken
		
		formSubmit.addEventListener('submit', (e) => {
			this.slug.currentPage = 1
		})

		element.addEventListener('scroll', (e) => {
			let target = e.currentTarget, 
				//In the need to have correct result of scrollTop
				//We should round the number of scrollTop to the below nearest scrolled result number
				scrollTop = Math.ceil(target.scrollTop)+window.innerHeight, 
				scrollMax = target.scrollHeight
			
			if (scrollTop === scrollMax) {
				loading.style.display = 'block'

				function response (response) {
					if (response.error === false) {
						let payloads = response.success.payload
						
						loading.style.display = 'none'
						
						payloads.forEach((e) => {
							let html = `
								<a href="${e.slug}" class="margin-top"><h2 class="link text-black">${e.heading}</h2></a>
								<p>${e.highlight}</p>
							`
							
							if (e.page === true) {
								result.innerHTML += html
							} else {
								unavailable.style.display = 'block';
							}
						})
					} else {
						result.innerHTML = ''

						response.error.forEach((e) => {
            				Utils.notify(document, {
            					$message: e, 
            					$type: 'danger'
            				});
						})
					}
				}
				
				this.slug.currentPage++
				this.slug.currentPage = this.slug.currentPage
				
				let url = this.api.url+'/'+this.slug.currentPage
				let payload = JSON.stringify({ keyword: formInput.value })
				
				let find = fetch(url, {
					method: 'POST', 
					headers: {
						'Content-type': 'application/json', 
						'X-CSRF-TOKEN': csrfToken
					}, 
					body: payload, 
					credentials: 'include', 
				})
				
				let json = function (response) {
				    return response.json();
				}
				
				find.then(Utils.fetchResolverHandler())
				.then(json)
				.then(response)
				.catch((error) => {
					console.log(error)
				})
			}
		})
	}
}

infiniteLoad.api.csrfToken = csrfToken
infiniteLoad.load()