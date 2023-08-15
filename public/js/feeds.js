const showLoadingIndicator = () => {
    const loadingMarkup = `<img src="${imageSrc}" class="img-fluid d-block mx-auto my-5" alt="loading..." />`;
    document.querySelector("#news-feed").innerHTML = loadingMarkup;
  };

  /*reusable call*/
  const fetchData = async (page = 1) => {
    
  try {
    showLoadingIndicator();

    const response = await fetch(`/feeds?page=${page}`);
    const data = await response.json();

    return data;
  } catch (error) {
    console.error('Error fetching data:', error);
    throw error;
  }
};

// Function to handle the fetched data and update the UI
const handleData = (data, singleFeed, feeder_url = '') => {
  const feeds = data.data; // Array of feed items

  // Process and display the feed items
  const newsFeedElement = document.querySelector("#news-feed");
  newsFeedElement.innerHTML = '';

  feeds.forEach(feed => {
    // Display each feed item in the UI

    const dateMarkup = feed.date ? `<p class="text-secondary fs-9 p-0 m-0 my-2">Posted on: ${feed.date}</p>` : '';
    const feedMarkup = `
      <div class="px-3 py-3 bg-white border rounded mb-3">
        <h6 class="fw-bold">${feed.title}</h6>
        ${dateMarkup}
        <p class="p-0 m-0 my-2 fs-9 text-secondary d-block">
        ${feed.description}
        </p>
        <p class="p-0 m-0 fw-bold link-color">
          <span class="material-symbols-outlined align-middle">full_coverage</span>
          ${feed.domain_name}
        </p>
        <div class="d-flex justify-content-end">
          <div>
            <a href="${feed.link}" target="_blank" class="text-decoration-none btn p-0 fs-9 px-3 py-1 mb-2">
              Read more
            </a>
          </div>
        </div>
      </div>
    `;

    newsFeedElement.innerHTML += feedMarkup;
  });

  // Handle pagination links
  const paginationLinks = data.links; // Pagination links
  const currentPage = data.current_page; // Current page
  const lastPage = data.last_page; // Last page

  // Update the UI with pagination links
  const paginationElement = document.querySelector("#pagination-container");
  paginationElement.innerHTML = '';

  console.log(currentPage);

  let bg_color = "background-color:#252422; color:white;";

  if(singleFeed == 0){
    //gagination for all feeds
    for (let i = 1; i <= lastPage; i++) {
      bg_color = (currentPage === i) ? 'background-color:#FB5607; color:white;' : 'background-color:#252422; color:white;';
      const pageLink = `<a  
      class="pagination-link btn px-3  me-2  mb-2" style='${bg_color}' id='${i}' 
      onClick="nextFeed(${i});">${i}</a>`;
      paginationElement.innerHTML += pageLink;
    }
  }else{
    //pagination for single feed
    for (let i = 1; i <= lastPage; i++) {
      bg_color = (currentPage === i) ? 'background-color:#FB5607; color:white;' : 'background-color:#252422; color:white;';
      const pageLink = `<a  
      class="pagination-link btn px-3 me-2  mb-2" style='${bg_color}' id='${i}' 
      onClick="nextSingleFeed(${i}, '${feeder_url}')">${i}</a>`;
      paginationElement.innerHTML += pageLink;
    }
  }


};

//Example usage: Fetch data for the first page
const fetchAndHandleData = async (page = 1) => {
  showLoadingIndicator();
  try {
    const data = await fetchData(page);
    handleData(data, 0);
  } catch (error) {
    const errorMarkup = `
      <div class="px-3 py-3 bg-white border rounded mb-3 text-center">
        <h5 class="fw-bold">Oops! Something went wrong</h5>
        <p class="text-secondary fs-9">Try refreshing your feeds or checking your internet connection</p>
        <button class="btn btn-dark px-4 fw-bold" onClick='window.location.reload()'>Refresh Feed</button>
      </div>
    `;
    document.querySelector("#news-feed").innerHTML = errorMarkup;
  }
};

// Example usage: Fetch data for the first page
fetchAndHandleData();


// paginate to the next feed
const nextFeed = async (page = 1) => {
  showLoadingIndicator();
  event.preventDefault();
  try {
    const data = await fetchData(page);
    handleData(data, 0);
  } catch (error) {
    const errorMarkup = `
      <div class="px-3 py-3 bg-white border rounded mb-3 text-center">
        <h5 class="fw-bold">Oops! Something went wrong</h5>
        <p class="text-secondary fs-9">Try refreshing your feeds or checking your internet connection</p>
        <button class="btn btn-dark px-4 fw-bold" onClick='window.location.reload()'>Refresh Feed</button>
      </div>
    `;
    document.querySelector("#news-feed").innerHTML = errorMarkup;
  }
};

// paginate to the next feed
const nextSingleFeed = async (page = 1, feeder_url) => {
  showLoadingIndicator();
  event.preventDefault();
  try {
    // const data = await fetchData(`/feeds?page=${page}&feeder=${feeder_url}`);
   
    const response = await fetch(`/feeds?page=${page}&feeder=${feeder_url}`);
    const data = await response.json();
    // Handle data 
    handleData(data, 1, feeder_url);
  } catch (error) {
    const errorMarkup = `
      <div class="px-3 py-3 bg-white border rounded mb-3 text-center">
        <h5 class="fw-bold">Oops! Something went wrong</h5>
        <p class="text-secondary fs-9">Try refreshing your feeds or checking your internet connection</p>
        <button class="btn btn-dark px-4 fw-bold" onClick='window.location.reload()'>Refresh Feed</button>
      </div>
    `;
    document.querySelector("#news-feed").innerHTML = errorMarkup;
  }
};

/**
 * get single feed
 * */
const fetchSingleFeed = async (page=1) => {
  showLoadingIndicator();
  event.preventDefault();
  const selectElement = document.querySelector("select[name='feeder']");
  const selectedValue = selectElement.value;
  try {

    const response = await fetch(`/feeds?page=${page}&feeder=${selectedValue}`);
    const data = await response.json();
    // Handle data 
    if(selectedValue == ''){
      handleData(data, 0, selectedValue);
    }else{
      handleData(data, 1, selectedValue);
    }
    // Handle the data as needed
  } catch (error) {
    console.error("Error fetching data:", error);
    const errorMarkup = `
      <div class="px-3 py-3 bg-white border rounded mb-3 text-center">
        <h5 class="fw-bold">Oops! Something went wrong</h5>
        <p class="text-secondary fs-9">Try refreshing your feeds or checking your internet connection</p>
        <button class="btn btn-dark px-4 fw-bold" onClick='window.location.reload()'>Refresh Feed</button>
      </div>
    `;
    document.querySelector("#news-feed").innerHTML = errorMarkup;
  }
};
