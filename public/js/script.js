
// const fetchFeeds = async (page = 1, perPage = 10) => {
//     const feedUrls = [
//       'https://feeds.feedburner.com/TheHackersNews',
//     ];
  
//     const requestData = {
//       feed_urls: feedUrls,
//       page: page,
//       per_page: perPage
//     };
  
//     try {
//       const response = await fetch('/feeds', {
//         method: 'POST',
//         headers: {
//           'Content-Type': 'application/json',
//           'X-CSRF-Token': '{{ csrf_token() }}',
//           'Accept': 'application/json',
//         },
//         body: JSON.stringify(requestData)
//       });
//       console.log(response);
//       if (!response.ok) {
//           console.log(response);
//         throw new Error('Failed to fetch feeds');
//       }
  
//       const data = await response.json();
  
//       // Process the returned pagination data
//       // console.log(data);
   
//       const feeds = data.data;
//       const totalFeeds = data.total;
//       const totalPages = data.last_page;
      
//       // Display the feeds on the page
//       displayFeeds(feeds);
  
//       // Create pagination buttons
//       createPaginationButtons(totalPages, page, perPage);
//     } catch (error) {
//       // Handle the error
//       console.error(error);
//     }
//   };
  
//   const displayFeeds = (feeds) => {
//     // Display the feeds on the page as per your requirement
//     // For example, you can append them to a div element
//     const feedContainer = document.getElementById('feed-container');
//     feedContainer.innerHTML = '';
  
//     console.log(feeds);
  
//     feeds.forEach(feed => {
//       // Create HTML elements for each feed and append them to the container
//       const feedElement = document.createElement('div');
      
//       feedElement.innerHTML = `
//         <h3>${feed.title}</h3>
//         <p>${feed.content}</p>
//         <a href="${feed.url}">Read More</a>
//       `;
//       feedContainer.appendChild(feedElement);
//     });
//   };
  
//   const createPaginationButtons = (totalPages, currentPage, perPage) => {
//     const paginationContainer = document.getElementById('pagination-container');
//     paginationContainer.innerHTML = '';
  
//     for (let i = 1; i <= totalPages; i++) {
//       const button = document.createElement('button');
//       button.textContent = i;
//       button.disabled = i === currentPage; 
//       button.addEventListener('click', () => {
//         fetchFeeds(i, perPage);
//       });
//       paginationContainer.appendChild(button);
//     }
//   };
  
//   // Initial fetch on page load
//   window.addEventListener("load", function(){
//       fetchFeeds();
//   }); 

const collapseToggle = document.querySelectorAll('.custom-collapse-toggle');
collapseToggle.forEach(toggle => {
    toggle.addEventListener('click', (event) => {
        event.preventDefault();
        event.currentTarget.classList.toggle('active');
        event.currentTarget.querySelector('i').classList.toggle('fa-caret-up');
        event.currentTarget.nextElementSibling.classList.toggle('show');
    });
});



  