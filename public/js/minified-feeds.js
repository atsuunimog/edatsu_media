const showLoadingIndicator=()=>{let e=`<img src="${imageSrc}" class="img-fluid d-block mx-auto my-5" alt="loading..." />`;document.querySelector("#news-feed").innerHTML=e},fetchData=async(e=1)=>{try{showLoadingIndicator();let t=await fetch(`/feeds?page=${e}`),n=await t.json();return n}catch(o){throw console.error("Error fetching data:",o),o}},handleData=(e,t,n="")=>{let o=e.data,a=document.querySelector("#news-feed");a.innerHTML="",o.forEach(e=>{let t=e.date?`<p class="text-secondary fs-9 p-0 m-0 my-2">Posted on: ${e.date}</p>`:"",n=`
      <div class="px-3 py-3 bg-white border rounded mb-3">
        <h6 class="fw-bold">${e.title}</h6>
        ${t}
        <p class="p-0 m-0 my-2 fs-9 text-secondary d-block">
        ${e.description}
        </p>
        <p class="p-0 m-0 fw-bold link-color">
          <span class="material-symbols-outlined align-middle">full_coverage</span>
          ${e.domain_name}
        </p>
        <div class="d-flex justify-content-end">
          <div>
            <a href="${e.link}" target="_blank" class="text-decoration-none btn p-0 fs-9 px-3 py-1 mb-2">
              Read more
            </a>
          </div>
        </div>
      </div>
    `;a.innerHTML+=n}),e.links;let r=e.current_page,d=e.last_page,l=document.querySelector("#pagination-container");l.innerHTML="",console.log(r);let c="background-color:#252422; color:white;";if(0==t)for(let i=1;i<=d;i++){c=r===i?"background-color:#FB5607; color:white;":"background-color:#252422; color:white;";let s=`<a  
      class="pagination-link btn px-3  me-2  mb-2" style='${c}' id='${i}' 
      onClick="nextFeed(${i});">${i}</a>`;l.innerHTML+=s}else for(let h=1;h<=d;h++){c=r===h?"background-color:#FB5607; color:white;":"background-color:#252422; color:white;";let f=`<a  
      class="pagination-link btn px-3 me-2  mb-2" style='${c}' id='${h}' 
      onClick="nextSingleFeed(${h}, '${n}')">${h}</a>`;l.innerHTML+=f}},fetchAndHandleData=async(e=1)=>{showLoadingIndicator();try{let t=await fetchData(e);handleData(t,0)}catch(n){let o=`
      <div class="px-3 py-3 bg-white border rounded mb-3 text-center">
        <h5 class="fw-bold">Oops! Something went wrong</h5>
        <p class="text-secondary fs-9">Try refreshing your feeds or checking your internet connection</p>
        <button class="btn btn-dark px-4 fw-bold" onClick='window.location.reload()'>Refresh Feed</button>
      </div>
    `;document.querySelector("#news-feed").innerHTML=o}};fetchAndHandleData();const nextFeed=async(e=1)=>{showLoadingIndicator(),event.preventDefault();try{let t=await fetchData(e);handleData(t,0)}catch(n){let o=`
      <div class="px-3 py-3 bg-white border rounded mb-3 text-center">
        <h5 class="fw-bold">Oops! Something went wrong</h5>
        <p class="text-secondary fs-9">Try refreshing your feeds or checking your internet connection</p>
        <button class="btn btn-dark px-4 fw-bold" onClick='window.location.reload()'>Refresh Feed</button>
      </div>
    `;document.querySelector("#news-feed").innerHTML=o}},nextSingleFeed=async(e=1,t)=>{showLoadingIndicator(),event.preventDefault();try{let n=await fetch(`/feeds?page=${e}&feeder=${t}`),o=await n.json();handleData(o,1,t)}catch(a){let r=`
      <div class="px-3 py-3 bg-white border rounded mb-3 text-center">
        <h5 class="fw-bold">Oops! Something went wrong</h5>
        <p class="text-secondary fs-9">Try refreshing your feeds or checking your internet connection</p>
        <button class="btn btn-dark px-4 fw-bold" onClick='window.location.reload()'>Refresh Feed</button>
      </div>
    `;document.querySelector("#news-feed").innerHTML=r}},fetchSingleFeed=async(e=1)=>{showLoadingIndicator(),event.preventDefault();let t=document.querySelector("select[name='feeder']"),n=t.value;try{let o=await fetch(`/feeds?page=${e}&feeder=${n}`),a=await o.json();""==n?handleData(a,0,n):handleData(a,1,n)}catch(r){console.error("Error fetching data:",r);let d=`
      <div class="px-3 py-3 bg-white border rounded mb-3 text-center">
        <h5 class="fw-bold">Oops! Something went wrong</h5>
        <p class="text-secondary fs-9">Try refreshing your feeds or checking your internet connection</p>
        <button class="btn btn-dark px-4 fw-bold" onClick='window.location.reload()'>Refresh Feed</button>
      </div>
    `;document.querySelector("#news-feed").innerHTML=d}};