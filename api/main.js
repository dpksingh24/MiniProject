(function () { 
    const BASE_URL = 'https://movie-list.alphacamp.io'
    const INDEX_URL = BASE_URL + '/api/v1/movies/'
    const POSTER_URL = BASE_URL + '/posters/'
    const data = []
    const data_pannel = document.querySelector('#data-panel')


    function displayDataList(data) {
    let htmlContent = ''
      data.forEach(function (item, index) { //movie object
        htmlContent += `
        <div class="col-sm-3" >
        <div class="card mb-2"> 
        <img class="card-img-top" src="${POSTER_URL}${item.image}" alt="card image cap">

        <div class="card-body movie-item-body">
        <h6>${item.title}</h6>
        </div>
        <button class="btn btn-primary btn-show-movie" data-toggle="modal" data-target="#show-movie-modal" data-id="${item.id}" >More</button>

        <div>
        </div>
        </div>
        </div>
        `
    })
    data_pannel.innerHTML = htmlContent

    }
    axios.get(INDEX_URL)
    .then( 
        (response) => {
        data.push(...response.data.results)
        // listen to data panel           
        data_pannel.addEventListener('click', (event) => {
            if (event.target.matches('.btn-show-movie')) {
            console.log(event.target) 
            console.log(event.target.dataset.id)  
            showMovie(event.target.dataset.id) //api show()
            }
        }
        )
        displayDataList(data)

        }

    ).catch()


    function showMovie(id) {
     // get elements 
    const modalTitle = document.getElementById('show-movie-title')
    const modalImage = document.getElementById('show-movie-image')
    const modalDate = document.getElementById('show-movie-date')
    const modalDescription = document.getElementById('show-movie-description')

   // set request url
    const url = INDEX_URL + id
    console.log(url)

      //  send request to show api
    axios.get(url).then(response => {
        const data = response.data.results
        console.log(data)

        // insert data into modal ui   Ｑ-innerHTML
        modalTitle.innerHTML = data.title
        modalImage.innerHTML = `<img src="${POSTER_URL}${data.image}" class="img-fluid" alt="Responsive image">`
        modalDate.innerHTML = `release at : ${data.release_date}`
        modalDescription.innerHTML = `${data.description}`
    })
    }

})()