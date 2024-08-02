
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
      
      function removeUnderscore(str) {
        if (typeof str !== 'string') {return str;}
        return str.replace(/_/g, ' ');
      }
      
      //fetch api to access data 
      window.addEventListener("load", function(){
          //reset disqus comment 
         // DISQUSWIDGETS.getCount({reset: true});
      
          document.querySelector('#opportunity-feeds').innerHTML = `<img src="${imageSrc}" class="img-fluid d-block mx-auto my-5" alt="loading..." />`;
          
          fetch('/search-opportunities')
          .then((r)=> {
              document.querySelector('#opportunity-feeds').innerHTML = '';
              return r.json();
              // console.log(r);
          })
          .then((d)=>{
              /**display pagination**/
              if(d.total > 10){
                  displayPagination(d, "#pagination");
              }
              /**display profile**/
              displayResult(d,"#opportunity-feeds");   
          })
          .catch((e)=> console.log(e));
      })
      
      function formatDate(inputDate) {
        const date = new Date(inputDate);
        // Format day with suffix (e.g., "1st", "2nd", "3rd", "4th", etc.)
        const day = date.getDate();
        const dayWithSuffix = day + (
          (day === 1 || day === 21 || day === 31) ? "st" :
          (day === 2 || day === 22) ? "nd" :
          (day === 3 || day === 23) ? "rd" :
          "th"
        );
        // Format month using its name
        const monthNames = [
          "Jan", "Feb", "Mar", "Apr", "May", "Jun",
          "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];
        const month = monthNames[date.getMonth()];
        // Format year
        const year = date.getFullYear();
        // Concatenate the formatted parts to get the final formatted date
        const formattedDate = `${dayWithSuffix} ${month} ${year}`;
        return formattedDate;
      }
      
      /**truncate text**/
      function truncateText(text, limit) {
        // Remove HTML tags from the text using a regular expression
        const withoutTags = text.replace(/<\/?[^>]+(>|$)/g, '');
        // Truncate the text to the specified limit
        const truncatedText = withoutTags.substring(0, limit);
        // Add "..." at the end if the original text exceeds the limit
        if (withoutTags.length > limit) {
          return truncatedText + '...';
        }
        return truncatedText;
      }
      
      //return page url 
      function pageLink(title, id) {
        // Convert title to lowercase and replace spaces with hyphens
        const formattedTitle = title
          .toLowerCase()
          .replace(/\s+/g, '-')
          .replace(/[^a-zA-Z0-9'-]/g, '') // Allow letters, numbers, hyphens, and apostrophes
          .replace(/--+/g, '-')
          .replace(/^-|-$/g, '')
          .trim();
        
        // Implement the logic to generate the post link
        let link = `op/${id}/${encodeURIComponent(formattedTitle)}`;
        return link;
      }
      
      
      
      
      function getDaysLeft(deadline) {
        const deadlineTimestamp = new Date(deadline).getTime();
        const nowTimestamp = Date.now();
        const secondsLeft = Math.floor((deadlineTimestamp - nowTimestamp) / 1000);
      
        if (secondsLeft <= 0) {
          return "<span style='color: #c1121f;'>Expired</span>";
        } else {
          const daysLeft = Math.floor(secondsLeft / (60 * 60 * 24));
          if (daysLeft === 0) {
            return "<span style='color: #c1121f;'>Last day</span>";
          } else if (daysLeft === 1) {
            return "<span style='color: #c1121f;'>1 Day Left</span>";
          } else {
            const daysText = daysLeft + (daysLeft > 1 ? ' days' : ' day');
            if (daysLeft > 7) {
              return "<span style='color: #2a9d8f;'>" + daysText + " Left</span>";
            } else {
              return "<span style='color: #c1121f;'>" + daysText + " Left</span>";
            }
          }
        }
      }
      
      function generateListItems(data) {
        // Check if 'data' is a non-empty string
        if (typeof data === 'string' && data.trim() !== '') {
          // Split 'data' by commas to get individual items
          const items = data.split(',');
      
          // Generate list items for each item and join them together
          const listItems = items
            .map((item) => {
              // Convert 'item' to title case
              const titleCasedItem = item
                .trim()
                .replace(/_/g, ' ')
                .replace(/\w\S*/g, (word) => word.charAt(0).toUpperCase() + word.slice(1));
      
              // Create and return the list item as a string
              return `<li class="list-item"><span class="data-labels">${titleCasedItem}</span></li>`;
            })
            .join('');
      
          // Return the concatenated list items
          return listItems;
        } else {
          // Return an empty string if 'data' is not a valid string
          return '';
        }
      }
      
      
      /**
       * clear search filters
       * */
      
      function clearFilters(){
           // Clear the search keyword input
           document.getElementById("keyword").value = "";
      
          // Clear the selected option in each select element
          var selectElements = document.getElementsByTagName("select");
          for (var i = 0; i < selectElements.length; i++) {
              selectElements[i].selectedIndex = 0;
          }
      
          // Clear the output divs for regions, countries, and continents
          document.getElementById("outputRegionsList").innerHTML = "";
          document.getElementById("outputCountriesList").innerHTML = "";
          document.getElementById("outputContinentsList").innerHTML = "";
      
          // Clear the hidden input fields for regions, countries, and continents
          document.getElementById("selectedRegions").value = "";
          document.getElementById("selectedCountries").value = "";
          document.getElementById("selectedContinents").value = "";
      
          document.getElementById('filter-entries').innerHTML = "";
          document.getElementById("search-result").innerHTML = "";
      
          document.querySelector('#opportunity-feeds').innerHTML = `<img src="${imageSrc}" class="img-fluid d-block mx-auto my-5" alt="loading..." />`;
          fetch('/search-opportunities')
          .then((r)=> {
              document.querySelector('#opportunity-feeds').innerHTML = '';
              document.querySelector('#pagination').innerHTML = '';
              return r.json();
          })
          .then((d)=>{
              /**display pagination**/
              if(d.total > 10){
                  displayPagination(d, "#pagination");
              }
              /**display profile**/
              displayResult(d,"#opportunity-feeds");   
          })
          .catch((e)=> console.log(e));
      }
      
      /**
       * Submit search Query
          */
      
      function submitSearchQuery(){
         document.getElementById("pagination").innerHTML = "";
         event.preventDefault();
         let search_form = document.getElementById("search_keyword");
         let form_data = new FormData(search_form);
      
          // Create a URLSearchParams object and append the FormData entries
        const urlParams = new URLSearchParams();
        for (const [key, value] of form_data.entries()) {
          urlParams.append(key, value);
        }
      
      // Check if any of the values in urlParams is not empty
      const nonEmptyValuesSet = new Set();
      
      for (const value of urlParams.values()) {
        if (value !== "") {
          nonEmptyValuesSet.add(value);
        }
      }
      
      const nonEmptyValue = Array.from(nonEmptyValuesSet);
      document.getElementById('filter-entries').innerHTML = "";
      
        //set output if search quries are set
        if(nonEmptyValue.length > 0){
          document.getElementById('filter-entries').innerHTML ="<span class='d-inline-block mb-3 me-1'>Filters: <span>";
          for (let i = 0; i < nonEmptyValue.length; i++) {
              const value = nonEmptyValue[i];
              document.getElementById('filter-entries').innerHTML += `<span class='fs-9 d-inline-block me-3 text-secondary'> ${removeUnderscore(value)}</span>`;
          }
          document.getElementById('filter-entries').innerHTML += `<button class='btn btn-dark fs-8 mb-1' onclick='clearFilters()'>Clear filter</button>`;
        }
      
        // Construct the URL with the parameters
        const url = `search-opportunities?${urlParams.toString()}`
      
         fetch(url).then((r)=> {
              document.querySelector('#opportunity-feeds').innerHTML = '';
              // console.log(r);
              return r.json();
          })
          .then((d)=>{
              console.log(d);
              /**display profile**/
      
              if(nonEmptyValue.length > 0){
                  document.getElementById("search-result").innerHTML =   `<span class='d-block fs-9 mb-3'>${d.total} result found</span>`;
              }else{
                  document.getElementById("search-result").innerHTML = '';
              }
      
              displayResult(d,"#opportunity-feeds");   
              if(d.total > 10){
                  /**display pagination**/
                  displayPagination(d, "#pagination", url);
              }else if(d.total > 0){
                  document.getElementById("pagination").innerHTML = "";
              }else{
                  document.getElementById("pagination").innerHTML = "<h4 class='fw-bold text-center my-5'>Oops... No content found!</h4>";
              }
          })
          .catch((e)=> console.log(e));
      
      }
      
      
      
  
      
      //upvate post
      function upvote(id) {
        const data = { post_id: id };
        let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch('/upvote-post', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-Token': '{{ csrf_token() }}' // Set the content type to JSON
          },
          body: JSON.stringify(data), // Convert the data to JSON
        })
          .then((response) => {
            if (!response.ok) {
              throw new Error('Network response was not ok');
            }
            return response.json(); // Parse the response JSON
          })
          .then((responseData) => {
            console.log(responseData);
            Toast(responseData, 'linear-gradient(to right, #00b09b, #96c93d)');
      
          })
          .catch((error) => {
            console.error(error);
            Toast(responseData, 'red');
      
          });
      }
      
      
      
    /**@argument Bookmark**/    
    function Bookmark(obj){
        let id      = obj.dataset.id;
        let type    = obj.dataset.type;
        let url     = obj.dataset.url;

        let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch('/bookmark-opportunity', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-Token': csrfToken
            },
            body: JSON.stringify(
                    {
                        id: id,
                        type: type,
                        url: url
                    }
                )
        })
        .then((r)=> {
            if (!r.ok) {
                throw new Error('Network response was not ok');
            }
            return r.json();
        })
        .then((d)=>{
            console.log(d);
            if(d.status == 'success'){
                Toast.fire({
                icon: "success",
                title: d.message
                }); 
            }else if(d.status == 'warning'){
                Toast.fire({
                icon: "warning",
                title: d.message
                }); 
            }else{
                Toast.fire({
                icon: "error",
                title: d.message
                }); 
            }
        })
        .catch((e)=> console.log(e));
    }

    //share links 
    function createSharingLinks(postId, postTitle) {
        const sluggedTitle = postTitle.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');
        const postUrl = encodeURIComponent(`https://media.edatsu.com/op/${postId}/${sluggedTitle}`);
    
        const sharingPlatforms = [
            {
                name: 'WhatsApp',
                url: `https://api.whatsapp.com/send?text=${postUrl}`,
                icon: 'img/gif/icons8-whatsapp.gif'
            },
            {
                name: 'Telegram',
                url: `https://t.me/share/url?url=${postUrl}`,
                icon: 'img/gif/icons8-telegram.gif'
            },
            {
                name: 'LinkedIn',
                url: `https://www.linkedin.com/sharing/share-offsite/?url=${postUrl}`,
                icon: 'img/gif/icons8-linkedin.gif'
            },
            {
                name: 'Twitter',
                url: `https://twitter.com/intent/tweet?url=${postUrl}`,
                icon: 'img/gif/icons8-twitter.gif'
            }
        ];
    
        const ul = document.createElement('ul');
    
        sharingPlatforms.forEach(platform => {
            const li = document.createElement('li');
            const a = document.createElement('a');
            a.className = 'text-decoration-none text-dark';
            a.href = platform.url;
            a.target = '_blank';
    
            const img = document.createElement('img');
            img.width = 30;
            img.src = platform.icon;
            img.alt = platform.name.toLowerCase();
    
            a.appendChild(img);
            a.appendChild(document.createTextNode(` ${platform.name}`));
            li.appendChild(a);
            ul.appendChild(li);
        });
    
        return ul;
    }

    function toggleShare(obj){
      const title = obj.dataset.title;
      const id = obj.dataset.id;
      obj.previousElementSibling.classList.toggle('d-none');
      const sharingLinksContainer = obj.previousElementSibling;
      sharingLinksContainer.innerHTML = '';
      const sharingLinks = createSharingLinks(id, title);
      sharingLinksContainer.appendChild(sharingLinks);
    }
      
    function displayResult(d, elem){ 
          d.data.map((o)=>{
          var default_img = o.cover_img ? o.cover_img : 'default.png'
          document.querySelector(elem)
          .innerHTML += `
          <div class='container-fluid border rounded feed-panel text-wrap w-100 position-relative mb-4'>
          <div class='row'>

          <div class='col-sm-3 col-5'>
            <div class='py-3'>
            <img src='storage/uploads/channels/${default_img}' alt="${default_img}" class='img-fluid rounded shadow-sm'/>
            </div>
          </div>

          <div class='col-sm-9 col-7'>
              <div class='py-3'>
              <a  class="text-decoration-none text-dark fw-bold" href='${pageLink(o.title, o.id)}'>
                <h2 class="fw-bold inline-block m-0 p-0" style="font-size:1em;">${o.title}</h2>
              </a>
      
              <ul class="list-unstyled m-0 mt-2 p-0 d-block fs-8 text-sm">
                  <li class="p-0 m-0">
                      Posted on: ${formatDate(o.created_at)}
                  </li>
              </ul>
      
              <div class="overflow-hidden truncate d-none d-sm-block">
              <p class="p-0 m-0 mt-2 fs-8 text-secondary d-block">${truncateText(o.description, 200)}</p>
              </div>
  
              <p class='m-0 mt-2 fs-8 text-uppercase fw-bold'>Deadline: ${
              o.deadline
                  ? `${getDaysLeft(o.deadline)}`
                  : "<span class='fw-bold'>Unspecified</span>"
              }</p>

              <div class="d-flex justify-content-end">

                  <div class="content-btn-holder px-3">
                    <div class='position-relative'>
                        <div id="sharing-links-container" class="position-absolute share-panel border rounded fs-8 d-none">              
                        </div>
                        <button class='btn' data-title='${o.title}' data-id='${o.id}' onClick="toggleShare(this)">
                            <span class="material-symbols-outlined align-middle">
                            share
                            </span>
                        </button>
                    </div>
                  </div>

                  <div class="content-btn-holder px-3">
                    <button class="btn" 
                          data-id="${o.id}" 
                          data-title="${o.title}" 
                          data-type="oppo-type"
                          data-url="${pageLink(o.title, o.id)}" onClick="Bookmark(this)">
                          <div>
                              <span class='material-symbols-outlined align-middle'>
                              bookmark
                              </span>
                          </div>
                    </button>
                  </div>
              </div>
          </div>
          </div>
          </div>
          </div>
          </div>`;

          })

    }
      
    /**display pagination**/
    function displayPagination(d, elem){
      d.links.map((p)=>{
          // let active = "#FCCD29";
          let active_bg =  (p.active)? "#FB5607" : '';
          let active_txt = (p.active)? "#252422" : '';
          console.log(p);
              if(p.url !== null){
              document.querySelector(elem)
              .innerHTML +=  ` <a id='${p.url}' class='btn btn-dark border-0 me-2 mb-2 px-3  text-light' 
              style='background-color:${active_bg}; color:${active_txt}'
              onclick='callPagination(this.id);'>${p.label}</button> `;
              }  
      })
    }
      
    /***call pagination**/
    function callPagination(url){
        document.querySelector('#opportunity-feeds').innerHTML = "<i class='d-block mb-3'>Oops! No content found</i>";
        if(url == 'null'){
            return false;
        }else{
            document.querySelector('#opportunity-feeds').innerHTML =   `<img src="${imageSrc}" class="img-fluid d-block mx-auto my-5" alt="loading..." />`;
            fetch(url)
            .then((r)=> {
                document.querySelector('#opportunity-feeds').innerHTML = '';
                document.querySelector('#pagination').innerHTML = '';
                return  r.json();
            })
            .then((d)=>{
                /**display pagination**/
                console.log(d);
                displayPagination(d, "#pagination");
                /**display profile**/
                displayResult(d,"#opportunity-feeds");   
            })
            .catch((e)=> console.log(e));
        }
    }

    //toggle search filter 
    function toggleContent() {
      console.log('click');
      var element = document.getElementById("filter-toggle");
      var toggle_btn = document.getElementById("filter-panel");
      toggle_btn.classList.toggle('d-none');
      console.log(element.innerHTML);
      if (element.innerHTML.trim() === "toggle_off") {
        // console.log('toggle-on');
        element.innerHTML = "toggle_on";
      } else {
        // console.log('toggle-off')
        element.innerHTML = "toggle_off";
      }
    }
      
      
      /**select multiple options tags**/
      function initializeSelect(selectId, inputId, outputId) {
          const selectElement = document.getElementById(selectId);
          const inputField = document.getElementById(inputId);
          const outputList = document.getElementById(outputId);
      
      
          function updateInputField() {
              console.log('works');
              const selectedOptions = Array.from(selectElement.selectedOptions).map(option => option.value);
              const existingValues = inputField.value.split(',').map(value => value.trim());
              const uniqueValues = [...new Set([...existingValues, ...selectedOptions])];
              inputField.value = uniqueValues.filter(Boolean).join(', ');
              updateOutputList(uniqueValues);
          }
      
          function updateOutputList(values) {
              outputList.innerHTML = '';
      
              values.forEach(value => {
                  const trimmedValue = value.trim();
      
                  if (trimmedValue !== '') {
                      const listItem = document.createElement('div');
                      listItem.classList.add('filter-label');
                      listItem.textContent = trimmedValue.replaceAll('_', ' ');
      
                      const deleteButton = document.createElement('button');
                      deleteButton.classList.add('filter-label-delete');
                      deleteButton.textContent = 'x';
                      deleteButton.addEventListener('click', () => {
                          removeItem(trimmedValue);
                          listItem.remove();
                      });
      
                      listItem.appendChild(deleteButton);
                      outputList.appendChild(listItem);
                  }
              });
          }
      
          function removeItem(value) {
              const existingValues = inputField.value.split(',').map(val => val.trim());
              const updatedValues = existingValues.filter(val => val !== value);
              inputField.value = updatedValues.join(', ');
              updateOutputList(updatedValues);
      
              // Set the selectId to a default option
              selectElement.selectedIndex = 0;
          }
      
          selectElement.addEventListener('change', updateInputField);
      }
      
      // Example usage
      initializeSelect('category', 'selectedCategories', 'outputCategoryList');
      initializeSelect('region', 'selectedRegions', 'outputRegionsList');
      initializeSelect('country', 'selectedCountries', 'outputCountriesList');
      initializeSelect('continent', 'selectedContinents', 'outputContinentsList');