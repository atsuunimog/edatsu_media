<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                @include('subscriber.side_menu')
            </div>
            <div class="col-sm-8">
                <!--banner-->
                <div class="px-3 py-3 rounded border text-center bg-white my-3">
                    <h2 class="fw-bold  custom-title-garamond m-0 p-0 py-3">Bookmark</h2>
                </div>
                <!--banner-->

                <h3 id="page-title" class="m-0 fw-bold mb-3 text-secondary"></h3>
                
                <!--section-->
                <div class="row">
                <div class="col-sm-8 order-2 order-sm-1">
                <!--page content-->
                <div id="content-data">
                </div>

                <!--pagination-->
                <div id="pagination-data" class="mb-5">
                </div>
                <!--pagination-->


                    </div>
                    <div class="col-sm-4 order-1 order-sm-2">
                        <!--sidebar-->
                        <ul class="list-unstyled">
                            {{-- 
                            <li>
                                <button class="btn d-flex align-items-center bg-white border rounded-0 fs-8 w-100 py-2 mb-3">
                                    <div class='pe-3'>
                                        <span class="material-symbols-outlined align-middle">
                                        feed
                                        </span>
                                    </div>
                                    <div>News Feed</div>
                                </button>
                            </li> 
                            --}}
                            <li>
                                <button id="oppo-type" onclick="toggleContentView(this)"
                                data-title="Collections"
                                data-url = "/fetch-bookmark";
                                class="btn bg-white border rounded-0 fs-8 w-100 py-2 mb-3 d-flex align-items-center">
                                    <div class='pe-3'>
                                    <span class="material-symbols-outlined">
                                    collections_bookmark
                                    </span>
                                    </div>
                                    <div>Collections</div>
                                </button>
                            </li>
                            <li>
                                <button onclick="toggleContentView(this)"
                                data-title="Opportunities"
                                data-url = "/fetch-opportunity-bookmark";
                                class="btn bg-white border rounded-0 fs-8 w-100 py-2 mb-3 d-flex align-items-center">
                                    <div class='pe-3'>
                                        <span class="material-symbols-outlined align-middle">
                                        light_mode
                                        </span>
                                    </div>
                                    <div>Opportunites</div>
                                </button>
                            </li>
                            <!-- <li>
                                <button  onclick="toggleContentView(this)"
                                data-title="Events"
                                data-url = "/fetch-event-bookmark";
                                class="btn bg-white border rounded-0 fs-8 w-100 py-2 mb-3 d-flex align-items-center">
                                    <div class='pe-3'>
                                        <span class="material-symbols-outlined  align-middle">
                                        event
                                        </span>
                                    </div>
                                    <div>Events</div>
                                </button>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <!--section-->
            </div>
        </div>
    </div>

<script>
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





function pageLink(title, id, url_type) {
        // Convert title to lowercase and replace spaces with hyphens
        const formattedTitle = title
        .toLowerCase()
        .replace(/\s+/g, '-')
        .replace(/[^a-zA-Z0-9'-]/g, '') // Allow letters, numbers, hyphens, and apostrophes
        .replace(/--+/g, '-')
        .replace(/^-|-$/g, '')
        .trim();
        
        // Implement the logic to generate the post link
        let link = `${url_type}/${id}/${encodeURIComponent(formattedTitle)}`;
        return link;
      }



window.addEventListener("load", function(){
    document.getElementById("oppo-type").click();
})

/**
 * swith title view and content view
 */
function toggleContentView(obj){
    var page_title = obj.dataset.title;
    document.getElementById("page-title").innerHTML = page_title;
    fetchPageData(obj.dataset.url, "content-data", "pagination-data")
}


/**remove bookmark**/
function removeBookmark(obj) {
   obj.parentNode.classList.toggle("d-none");
   let id = obj.id;
   let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
   fetch('/remove-bookmark-feed', {
       method: 'POST',
       headers: {
           'Content-Type': 'application/json',
           'X-CSRF-Token': '{{ csrf_token() }}' // Set the content type to JSON
       },
       // If you need to send data in the request body, use the body property
       body: JSON.stringify({id : id}) // Example: JSON.stringify({id: id})
   })
   .then(response => {
       if (!response.ok) {
           throw new Error('Network response was not ok');
       }
       return response.json(); // Assuming the response is JSON, adjust accordingly if not
   })
   .then(data => {
       //console.log(data); // Handle the response data
       if(data.status == 'success'){
                Toast.fire({
                icon: "info",
                title: data.message
                }); 
            }else if(d.status == 'warning'){
                Toast.fire({
                icon: "warning",
                title: data.message
                }); 
            }else{
                Toast.fire({
                icon: "error",
                title: data.message
                }); 
            }
   })
   .catch(error => {
    console.error('There was a problem with the fetch operation:', error);
   });
}


/**handle pagination**/
function handlePaginate(obj){
    let url = obj.dataset.url;
    //console.log(url);
    fetchPageData(url, "content-data", "pagination-data");
}


/**init page data**/
function fetchPageData(url, content_id, pagination_id){
    // console.log(url);
    // console.log(content_id);

    let content_data =  document.getElementById(content_id);
    let pagination_data = document.getElementById(pagination_id);
    content_data.innerHTML = '';
    pagination_data.innerHTML ='';
    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {

        let page_data =  data.data_feeds.data;

            page_data.map((data)=>{

                let page_title  = (data.opportunity)? data.opportunity.title : data.event.title;
                let type        = (data.opportunity)? 'opportunity' : 'event';
                let url_type    = (data.opportunity)? 'op' : 'ev';
                let page_id     = (data.opportunity)? data.opportunity.id : data.event.id;
                let bookmark_id =  data.id;


                content_data.innerHTML += `
                <div class='d-flex align-items-center mb-3 fs-8 bg-white border py-2 pe-3 py-1'>
                    <div class='w-100 px-3'>
                    <a href='${pageLink(page_title, page_id, url_type)}' class='text-decoration-none text-dark' target='_blank'>
                        ${page_title}
                        <span style="width:100px" class='badge border rounded-0 mt-2 py-1 bg-light text-dark text-uppercase d-block'>${type}</span>
                    </a>
                    </div>
                    <div class="btn border-0 shadow-none" id="${bookmark_id}" onClick="removeBookmark(this)">
                        <span class="material-symbols-outlined align-middle text-danger">
                        cancel
                        </span>
                    </div>
                </div>
                `;
            })


            if(page_data.length > 0){
                let pagination = data.data_feeds.links;
                pagination.map((data)=>{
                    if(data.url !== null){
                        $active_style = (data.active)? 'bg-warning text-dark' : 'bg-dark';
                        pagination_data.innerHTML += `
                        <button class="btn btn-dark rounded-0 border-0 fs-9 mb-2 ${$active_style}" data-url="${data.url}" onClick="handlePaginate(this)">
                            ${data.label}
                        </button>
                        `;
                    }
                })
            }else{
                pagination_data.innerHTML = '<div class="bg-white border py-3 px-3 fs-8">Ops! No content found</div>';
            }
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}


</script>
@include('layouts/login_footer')
</x-app-layout>
