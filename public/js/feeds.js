const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});


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

// bookmark feed
async function bookmarkFeed(obj, e) {
  e.preventDefault();
  try {
    // Get the CSRF token value from the meta tag
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    const response = await fetch('/bookmark-feed', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken, 
        // Include the CSRF token in the headers
      },
      body: JSON.stringify({ url: obj.dataset.link, title : obj.dataset.title}),
    });

    // For example, you can log the response:
    const result = await response.json();

    if(result.success == true){
      // use toast to post message
      Toast.fire({
        icon: "success",
        title: result.message
      });
    }else{
      console.log(result); 

      //handle multi error messages
      var output = '';
      if(typeof result.message == 'object' && result.message !== null){

        // console.log('working');
        for (let prop in result.message) {
          if (result.message.hasOwnProperty(prop)) {
            if (Array.isArray(result.message[prop])) {
              result.message[prop].forEach((item) => {
                // Perform operations on each item in the array
                output += item + "<br>";
              });
            } else {
              output += result.message[prop];
            }
          }
        }

        Toast.fire({
          icon: "error",
          title: output
        }); 
    }else{
      //
      Toast.fire({
        icon: "error",
        title: result.message
      });
    }

    }

  } catch (err) {
    console.log(err);
    
  }
}




// Function to handle the fetched data and update the UI
const handleData = (data, elem, singleFeed, feeder_url = '') => {
  const feeds = data.data; // Array of feed items

  // Process and display the feed items
  // const newsFeedElement = document.querySelector("#news-feed");
  //newsFeedElement.innerHTML = '';
  elem.innerHTML = '';

//TOGGLE BOOMKARK UI ICON
//   <div class='position-absolute custom-toggle-menu'>
//   <div class="dropdown">
//     <button class="btn btn-light shadow-sm p-0 border bg-white rounded-circle
//     d-flex align-items-center justify-content-center" 
//       style='width:40px; height:40px;' type="button" 
//       data-bs-toggle="dropdown" aria-expanded="false">
//       <span class="material-symbols-outlined">
//         list
//       </span>
//     </button>
//     <ul class="dropdown-menu fs-9">
//         <li class="">
//           <a class="dropdown-item d-flex align-items-center justify-content-between" data-title="${feed.title}" data-link="${feed.link}" onClick="bookmarkFeed(this, event)">
//             <span>Bookmark</span>
//             <span class='material-symbols-outlined align-middle me-2'>
//             bookmark
//             </span>
//           </a>
//         </li>
//     </ul>
//   </div>
// </div>

  feeds.forEach(feed => {
    // Display each feed item in the UI

    const dateMarkup = feed.date ? `<p class="fs-8 p-0 m-0 my-2">Posted on: ${feed.date}</p>` : '';
    const feedMarkup = `
      <div class="ps-3 py-3 bg-white border rounded mb-4 pe-5  position-relative">

          <a href="${feed.link}" target="_blank" class="text-decoration-none text-dark fw-bold">
          <h5 class="fw-bold inline-block m-0 pe-5" style="font-size:1em;">${feed.title}</h5>
          </a>
          ${dateMarkup}
          <p class="p-0 m-0 fs-8 text-secondary d-block">
          ${feed.description}
          </p>
          <p class="p-0 m-0 mt-3 fw-bold link-color fs-9">
            <span class="material-symbols-outlined align-middle">full_coverage</span>
            ${feed.domain_name}
          </p>
      </div>
    `;
    elem.innerHTML += feedMarkup;
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
        <p class="text-secondary fs-9 my-2">Try refreshing your feeds or checking your internet connection</p>
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
 * fetch single feed toggle button
 */

async function generateNewsFeed(obj, page = 1) {
  event.preventDefault();
  //showLoadingIndicator(); 
  var feeder_container = document.getElementById('feed-panel-' + obj.id);

  // Remove all previously added "Hello world" elements
  var existingPanels = document.getElementsByClassName('feed-data');

 // console.log(existingPanels); return false;
  if(existingPanels.length > 0){
    for(i = 0; i < existingPanels.length; i++){
      existingPanels[i].remove();
    }
  }

  var feed_panel = document.createElement('div');
  feed_panel.setAttribute('class', 'feed-data');
  
  //feed_panel.innerHTML = 

  // Add the new "Hello world" element after the feeder_container
  feeder_container.after(feed_panel);

  try {

    selectedValue = obj.dataset.url;
    const response = await fetch(`/feeds?page=${page}&feeder=${selectedValue}`);
    const data = await response.json();
    // Handle data 
    handleData(data, feed_panel, 1, selectedValue);
    
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
}


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
