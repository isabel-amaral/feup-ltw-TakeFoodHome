function processSearchInput() {
    if (searchRestaurant) {
        searchRestaurant.addEventListener('input', async function() {
            searchCategory.value = 'all'

            const response = await fetch('../database/data-fetching/api-restaurants.php?search=' + this.value)
            const restaurants = await response.json()
            
            const section = document.querySelector('#restaurants')
            section.innerHTML = ''

            for (const restaurant of restaurants) {
                const article = document.createElement('article')
                const header = document.createElement('header')
                const heading = document.createElement('h3')
                const link = document.createElement('a')
                const paragraph = document.createElement('p')
                const img = document.createElement('img')

                link.href = 'restaurant-page.php?id=' + restaurant.restaurantID
                link.textContent = restaurant.name
                heading.appendChild(link)
                header.appendChild(heading)
                article.appendChild(header)

                paragraph.textContent = restaurant.description
                article.appendChild(paragraph)
                
                img.src = "../../img/" + restaurant.picture
                article.appendChild(img)

                section.append(article)
            }
        })
    }
}

const searchRestaurant = document.querySelector('#search-restaurant')
processSearchInput()
