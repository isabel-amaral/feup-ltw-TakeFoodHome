function processSearchInput() {
    searchCategory.addEventListener('input', async function() {
        const response = await fetch('../database/data-fetching/api-categories.php?category=' + this.value)
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
            
            img.src = "https://picsum.photos/600/300?business"
            article.appendChild(img)

            section.append(article)
        }
    })
}

const searchCategory = document.querySelector('#search-category')
processSearchInput()