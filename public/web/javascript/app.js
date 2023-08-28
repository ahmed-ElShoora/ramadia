let menu = document.querySelector(".icon")
let mobile = document.querySelector(".mobile")
let social = document.querySelector(".social")




//////////////////////////////////////////////
//220 line
//h3 class line
//////////////////////////////////////////////





var url = `https://ramadia.sa/api`
//var url ='http://127.0.0.1:8000/api'
var APIpassword = "&gig^$ll#!5fY3nXj"
var lang = localStorage.getItem("lang")?localStorage.getItem("lang"): "ar"
let time_swiper = 4000

var dataCont = {
  header:{
    ar:[
      {name: "الرئيسية",href:"/#home"},
      {name: "من نحن",href:"/#about"},
      {name: "فعالياتنا",href:"/#events"},
      {name: "سياسة الخصوصية",href:"/privacy"},
      {name: "اتصل بنا",href:"/contact"},
    ],
    en:[
      {name: "Home",href:"/#home"},
      {name: "About",href:"/#about"},
      {name: "Our activities",href:"/#events"},
      {name: "Privacy Police",href:"/privacy"},
      {name: "Contact Us",href:"/contact"},
    ]
  },
  about:{
    ar:"من نحن",
    en:"who are we"
  }
}

let divs = document.querySelectorAll(".landing > div[id]")
window.addEventListener("scroll", _=> {
  const scrollY = window.pageYOffset
  divs.forEach(current => {
    const divHeight = current.offsetHeight
    const divTop = current.offsetTop - 200
    const divId = current.getAttribute("id")
    if(scrollY > divTop && scrollY < divTop + divHeight){
      document.querySelector(".header .container .links > ul li a[href*="+ divId +"]").classList.add("active")
      document.querySelector(".header .container .links ul li a[href*="+ divId +"]").classList.add("active-mob")
    }else{
      document.querySelector(".header .container .links > ul li a[href*="+ divId +"]").classList.remove("active")
      document.querySelector(".header .container .links ul li a[href*="+ divId +"]").classList.remove("active-mob")
    }
  })

})

menu.addEventListener("click", _=>{
    mobile.classList.add("show-menu")
})

if(lang == "ar"){
  document.dir = "rtl"
  document.documentElement.setAttribute("lang", "ar")
}else{
  document.dir = "ltr"
  document.documentElement.setAttribute("lang", "en")
}

setData()
function setData(){
  let links = document.querySelector(".links-header")
  let linksMob = document.querySelector(".links-header-mob")
  let head = dataCont.header[lang]
  links.innerHTML = `
    <li><a href="${head[0].href}" class="active">${head[0].name}</a></li>
    <li><a href="${head[1].href}">${head[1].name}</a></li>
    <li><a href="${head[2].href}">${head[2].name}</a></li>
    <li><a href="${head[3].href}">${head[3].name}</a></li>
    <li><a href="${head[4].href}">${head[4].name}</a></li>
    <li>
        <span>EN</span>
        <input type="checkbox">
        <span>AR</span>
    </li>
  `
  linksMob.innerHTML = `
    <li><a href="${head[0].href}" class="active-mob">${head[0].name}</a></li>
    <li style="display:none;"><a href="${head[1].href}">${head[1].name}</a></li>
    <li style="display:none;"><a href="${head[2].href}">${head[2].name}</a></li>
    <li><a href="${head[3].href}">${head[3].name}</a></li>
    <li><a href="${head[4].href}">${head[4].name}</a></li>
    <li>
        <span>EN</span>
        <input type="checkbox">
        <span>AR</span>
    </li>
  `
  let changeLang = document.querySelectorAll(".header input[type='checkbox']")
  changeLang.forEach(langs => {
    langs.addEventListener("change", e => {
      if(lang == "ar"){
        localStorage.setItem("lang", "en")
        setTimeout(_=> window.location.reload(), 200)
      }else{
        localStorage.setItem("lang", "ar")
        setTimeout(_=> window.location.reload(), 200)

      }
    })
  })
}
// About
function getDateAbout(urlink, pass, lang){
  fetch(urlink, {
      method: 'GET',
      headers:{api_password: pass, lang}
  })
      .then(response => response.json())
      .then(datas => {
        let about = document.querySelector(".about .container")
          if(datas.status){
            let {image, text} = datas.data
            about.innerHTML = `
            <div class="images" id="about">
              <img src="${image}" alt='logo'>
              <div class="about-info">
                  <h1>${dataCont.about[lang]}</h1>
                  <p>${text}</p>
              </div>
            </div>
            <div class="logo-x"></div>
            `
          }      
      })
      .catch(error => console.log('Error', error));
       fetch(`${url}/setting`, {
      method: 'GET',
      headers:{api_password: pass}
  })
      .then(response => response.json())
      .then(data => {
         let logo = data.data.logo
         if(document.querySelector(".about")){
             let img = document.createElement("img")
            img.src = `${logo? logo:"https://ramadia.sa/uploads/1667208699LOGO-01 (2).png"}`
            document.querySelector(".logo-x").append(img)
         }
      })
}

// logo
function logo(){
    fetch(`${url}/setting`, {
      method: 'GET',
      headers:{api_password: APIpassword}
  })
      .then(response => response.json())
      .then(data => {
          if(data.status){
            let logo = data.data.logo
            let logoNav = data.data.logo_nav_bar
            let img = document.createElement("img")
            img.src = logoNav
            img.alt = "logo"
            document.querySelector(".mobile .header-mobile").innerHTML = `
            <span class="close-mob"><i class="fa-sharp fa-solid fa-arrow-right-long"></i></span>
            <img src="${logo}" alt="logo">
            `
            document.querySelector(".header .container").prepend(img)
            let closeMob = document.querySelector(".header-mobile > span")
        
            closeMob.onclick = _=> {
              mobile.classList.remove("show-menu")
            }
          }
      })
      .catch(error => console.log('Error', error));
} 
logo()
// About Slider
function aboutSlider(){
  fetch(`${url}/about-sliders`, {
    method: 'GET',
    headers:{
        api_password: APIpassword,
        lang: lang
    }
})
    .then(response => response.json())
    .then(data => {
        if(data.status){
          let images = data.data
          let slider = document.querySelector(".slider .swiper-wrapper")
          images.forEach(img => {
            slider.innerHTML += `
              <div class="swiper-slide"">
                <img src="${img.image}" alt='logo' >
                <div class="swiper-info">
                  <h2>${img.title?img.title:""}</h2>
                  <p>${img.desc?img.desc:""}</p>
                </div>
              </div>
            `
          })
          var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: false,
            autoplay: {
                delay: time_swiper,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
          });
        }
    })
    .catch(error => console.log('Error', error));
}
function events(){
  let container = document.querySelector(".events .container")
  container.innerHTML = `
    <div class="row">
      <div class="col active-event">
          <h3 data-click="5" class="line">${lang == "ar"? "السبت" : "Saturday"}</h3>
      </div>
      <div class="col">
          <h3 data-click="6" class="line">${lang == "ar"? "الأحد" : "Sunday"}</h3>
      </div>
      <div class="col">
          <h3 data-click="0" class="line">${lang == "ar"? "الاثنين" : "Monday"}</h3>
      </div>
      <div class="col">
          <h3 data-click="1" class="line">${lang == "ar"? "الثلاثاء" : "Tuesday"}</h3>
      </div>
      <div class="col">
          <h3 data-click="2" class="line">${lang == "ar"? "الاربعاء" : "Wendnesday"}</h3>
      </div>
      <div class="col">
          <h3 data-click="3" class="line">${lang == "ar"? "الخميس" : "Thursday"}</h3>
      </div>
      <div class="col">
          <h3 data-click="4" class="">${lang == "ar"? "الجمعه" : "friday"}</h3>
      </div>
    </div>
    <h2 class="name">${lang == "ar"? "الفعاليات" : "Events"}</h2>
      <div class="events-content">
    </div>
  `
  let eventsContent = document.querySelector(".events .events-content")
  let btnEvent = document.querySelectorAll(".events .row .col")
  btnEvent.forEach(btn => {
    btn.addEventListener("click", e => {
      btnEvent.forEach(btns => btns.classList.remove("active-event"))
      let target = e.target.parentElement.classList.add("active-event")
    })
  })  
  eventsContent.innerHTML = ""
  let div = document.createElement("div")
  div.classList.add("msg-event")
  eventsContent.append(div)
  div.innerHTML =`
  <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
  `
  let day = document.querySelectorAll(".events .col h3")
  day.forEach(num => {
    num.addEventListener("click", e=>{
      let clk = e.target.dataset.click
      eventsContent.innerHTML = ""
      let div = document.createElement("div")
      div.classList.add("msg-event")
      eventsContent.append(div)
      div.innerHTML =`
      <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
      `
      getData(clk)
    })
  })
  
  function getData(clk = 5){
    function getDataSwiper(url, cb){
      fetch(url, {
            method: 'GET',
            headers:{
                api_password: APIpassword,
                lang: lang
            }
        })
        .then(res => res.json())
        .then(data => cb(data))
    }
    datas(`${url}/events-${clk}?page=1`)
    function datas(link){
      getDataSwiper(link, data =>{
        let info = data.data.data
        let prev_page = data.data.prev_page_url
        let next_page = data.data.next_page_url
        
        if(0 >= info.length){
          eventsContent.innerHTML = ""
          let div = document.createElement("div")
          div.classList.add("msg-event")
          eventsContent.append(div)
          div.innerHTML =`
          <p class='none'>${lang == "ar" ? "لا توجد فعاليات" : "There are no events"}</p>
          `
        } else{
          localStorage.removeItem("id")
          localStorage.removeItem("type")
          eventsContent.innerHTML = `
            <div class="swiper mySwiper-event">
              <div class="swiper-wrapper"></div>
            </div>
            <div class="swiper-next"><i class="fa-solid fa-angle-right"></i></div>
            <div class="swiper-prev"><i class="fa-solid fa-angle-left"></i></div>
          `
          let swiperWrapper = document.querySelector(".events .swiper-wrapper")
          info.forEach(data => {
            swiperWrapper.innerHTML += `
              <div class="swiper-slide" style="background: url('${data.master_image}');background-repeat: no-repeat;background-size: 100% 100%;" data-id="${data.id}" data-type="${data.type}">
                <div class="info">
                  <h2>${data.title}</h2>
                  <p>${data.start_date}</p>
                </div>
              </div>
            `
          })
          let swiperSlide = document.querySelectorAll(".events .swiper-slide")
          swiperPopup(swiperSlide, info)
          let nextS = document.querySelector(".swiper-next")
          let prevS = document.querySelector(".swiper-prev")
          if(!prev_page){
            prevS.classList.add("desable")
          }else{
            prevS.classList.remove("desable")
          }
          if(!next_page){
            nextS.classList.add("desable")
          }else{
            nextS.classList.remove("desable")
          }
          nextS.addEventListener("click", _=> {
            datas(data.data.next_page_url)
          })
          prevS.addEventListener("click", _=> {
            datas(data.data.prev_page_url)
          })
        }
      })
    }

  }
  function swiperPopup(eles, data){
    console.log(data)
    let popup = document.querySelector(".popup .popup-content")
    document.querySelector(".popup").addEventListener("click", e=> {
      let classa = e.target.className.split(" ")
      classa.forEach(cls => {
          if(cls == "popup"){
              document.querySelector(".popup").classList.remove("active")
              popup.innerHTML = ""
          }
      })
    })  
    eles.forEach(ele => {
      ele.addEventListener("click", e => {
        document.querySelector(".popup").classList.add("active")
        let target = e.currentTarget
        let id = e.currentTarget.dataset.id
        let type = e.currentTarget.dataset.type
        let info = data.filter(info => info.id == id)[0]
        popup.style.background = info.color_background
        popup.innerHTML = `
        <span class="close"><i class="fa-solid fa-xmark" style="background:${info.color_button};"></i></span>
        <div class="header-popup">
              <p>${info.title}</p>
              <p>${info.start_date}</p>
            </div>
            <div class="slider-image">
              <div class="swiper mySwiper-popup">
              <div class="swiper-wrapper">
              </div>
              </div>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
            </div>
            <div class="desc">
            <p>${info.desc}</p>
            </div>
            <div class="btn btn-order">
              <button style="background:${info.color_button};">${lang == "ar"? "احجز الان":"Book now"}</button>
            </div>
        `
        info.slider_images.forEach(slideImg => {
        document.querySelector(".mySwiper-popup .swiper-wrapper").innerHTML +=
          `
          <div class="swiper-slide">
            <img src="${slideImg.image}"  alt='logo'>
          </div>
          `
        })
        let btn = document.querySelector(".popup .btn-order")
        order(btn, id, type, info)
        var swiper = new Swiper(".mySwiper-popup", {
          spaceBetween: 30,
          centeredSlides: false,
          autoplay: {
              delay: time_swiper,
              disableOnInteraction: false,
          },
          pagination: {
              el: ".swiper-pagination",
              clickable: false,
          },
          navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
          },
        });
        document.querySelectorAll(".popup-content .close > i").forEach(cls => {
          cls.addEventListener("click", _=> {
            popup.innerHTML = ""
            document.querySelector(".popup").classList.remove("active")
          })
        })
      })
    })
  }
  function order(btn, id, type, data){
    let popup = document.querySelector(".popup .popup-content")
    checkEvent = false
    checkhide = false
    check()
    function check(){
          var inner ;
          if(data.hide){
            if(data.type == 1){
                if(data.chair_vip == 0 && data.chair_normal == 0){
                    checkEvent =true
                }else{
                    if(data.chair_normal !== 0){
                        inner += `<option value='normal'>Standard ${data.price_normal} SAR</option>`
                    }
                    if(data.chair_vip !== 0){
                        inner += `<option value='vip'>VIP ${data.price_vip} SAR</option>`
                    }
                    if(data.chair_normal !== 0){
                      inner += `<option value='group_normal'>Group standard ${data.groub_price_normal} SAR السعر للفرد</option>`
                    }
                    if(data.chair_vip !== 0){
                        inner += `<option value='group_vip'>Group VIP ${data.groub_price_vip} SAR السعر للفرد</option>`
                    }
                }
            }else{
                if(data.chair_a == 0 && data.chair_b == 0 && data.chair_c == 0){
                      checkEvent =true
                }else{
                    if(data.chair_a){
                       inner += `<option value='a'>A ${data.price_a} SAR</option>`
                    }
                    if(data.chair_b){
                       inner += `<option value='b'>B ${data.price_b} SAR</option>` 
                    }
                    if(data.chair_c){
                       inner += `<option value='c'>C ${data.price_} SAR</option>` 
                    }
                    
                    if(data.chair_a){
                      inner += `<option value='group_a'>Group A ${data.groub_price_a} SAR السعر للفرد</option>`
                   }
                   if(data.chair_b){
                      inner += `<option value='group_b'>Group B ${data.groub_price_b} SAR السعر للفرد</option>` 
                   }
                   if(data.chair_c){
                      inner += `<option value='group_c'>Group C ${data.groub_price_c} SAR السعر للفرد</option>` 
                   }
                }
            }
          }else{
            
            checkhide = true
          }
          return inner
      }
    if(checkEvent){
          document.querySelector(".popup .btn-order button").textContent = `${lang == 'ar'? "اكتمل العدد":"The number is complete"}`
           document.querySelector(".popup .btn-order button").style.pointerEvents = "none"
      }else if(checkhide){
        if(data.text == null){
          btn.textContent = ""
          document.querySelector(".btn-order button").classList.add("dis")
        }else{
          btn.innerHTML = `<button style="background:${data.color_button};">${data.text}</button>`
          document.querySelector(".btn-order button").classList.add("dis")
        }
      }else{
        dataBuy()
      }

      function dataBuy(){
          btn.addEventListener("click", _=> {
        let btnEvent = document.querySelector(".popup .btn-order")
      localStorage.setItem("id", id)
      localStorage.setItem("type", type)
      let hide_data_input = document.querySelector("#hide_token input")

          popup.innerHTML = `
        <span class="close"><i class="fa-solid fa-xmark" style="background:${data.color_button};"></i></span>
        <form method="post" action="/check-out/telr">
        <input type="hidden" name="_token" value="${hide_data_input.value}">
        <input hidden name="id" value="${data.id}">
        <input hidden name="price" class="input_price">
        <input hidden name="num_person" id="num_person">
        <input hidden name="num_baby" id="num_baby">
        <div class="form">
          <h4>${lang == "ar"? "التكت":"Ticket"}</h4>
          <select class="option type" required name="type">
            <option hidden value="">${lang == "ar"? "نوع التكت":"Type Of ticket"}</option>
            ${check()}
          </select>
          <p>${lang == "ar"? "الرجاء ادخال البيانات التالية لإكمال عملية الحجز":"Please enter the following information to complete the reservation process"}</p>
          <input type="text" placeholder="${lang == "ar"? "الاسم الاول":"First Name"}" name="name_fir" required>
          <input type="text" placeholder="${lang == "ar"? "الاسم الاخير":"Last Name"}" name="name_sur" required>
          <input type="text" placeholder="${lang == "ar"? "العمر":"Age"}" name="age" required> 
          <input type="email" placeholder="${lang == "ar"? "الايميل":"ُEmail"}" name="email" required>
          <div class="tel">
          <input type="tel" placeholder="${lang == "ar"? "رقم الهاتف : 4444 444 54 ":"Phone number :  54 444 4444"}" name="tel_test" id="tel_test" required>
          <input type="text" name="tel" hidden class="telPhone">
          <span>966</span>
          </div>
          <input type="text" placeholder="${lang == "ar"? "المنطقه":"City"}" name="town" required>
          
          
          <div class="personNum">
            <div>
              <button id="personInc" type="button">+</button>
                <span id="valperson">1</span>
              <button id="personDec" type="button">-</button>
            </div>
            <span>${lang == "ar"? "عدد الافراد":"number of people"}</span>
          </div>
          <select class="option opt-chiled" required style="grid-column: span 1; margin:0;">
            <option hidden value="">${lang == "ar"? "هل لديكم أطفال":"do you have any childern"}</option>
            <option value="yes">${lang == "ar"? "نعم":"Yes"}</option>
            <option value="no">${lang == "ar"? "لا يوجد":"No"}</option>
          </select>  
          <div class="babyNum">
            <div>
              <button id="babyInc" type="button">+</button>
                <span id="valBaby">1</span>
              <button id="babyDec" type="button">-</button>
            </div>
            <span>${lang == "ar"? "عدد الاطفال":"number of children"}</span>
          </div>


          <input type="text" placeholder="${lang == "ar"? "الكوبون":"Copon"}" name="cobon">
          <select class="option opt" required>
            <option hidden value="">${lang == "ar"? "الموهبه":"talent"}</option>
            <option value="yes">${lang == "ar"? "نعم":"Yes"}</option>
            <option value="no">${lang == "ar"? "لا يوجد":"No"}</option>
          </select>  
          <div class="text-more">
            <textarea placeholder="${lang == "ar"? "مثال : غناء ، رسم ، عزف ، كوميديا ، اخرى":"Example: music , art , stand up comedy , others"}" name="note"></textarea>
          </div>
          <div>
            <input id="ckc" type="checkbox" required>
            <label for="ckc"> ${lang == "ar"? "هل توافق علي <a href='/privacy' style='text-decoration: none;'>سياسة الخصوصية</a>": "Do you agree to the <a href='/privacy' style='text-decoration: none;'>pivacy police</a>" }</label>
          </div>
          <div class="vailed"><p></p></div>
          <div class="btn btn-oreder-done">
            <button type="submit" style="background:${data.color_button};">${lang == "ar"? "شراء":"Buy"}</button>
          </div>
          </div>
        </form>
        <div class="bg-logo--popup"></div>
      `
      let telPhone = document.querySelector(".telPhone")
      let telTest = document.querySelector("#tel_test")
      document.querySelector(".btn-oreder-done").addEventListener("click", e=>{
       document.querySelector("#num_baby").value = document.querySelector("#valBaby").textContent
       document.querySelector("#num_person").value = document.querySelector("#valperson").textContent
          

            var num = telTest.value.split("")
            if(num[0] == 0){
                telPhone.value = `966${num.slice(1).join("")}`
                console.log(telPhone.value)
            }else{
                console.log(telPhone.value)
                telPhone.value = `966${telTest.value}`
                
            }
            
        })
      
      let input_price = document.querySelector(".input_price")
      let type_price = document.querySelector(".type")
      let personNum = document.querySelector(".personNum")
      let babyNum = document.querySelector(".babyNum")
      let selChiled = document.querySelector(".opt-chiled")
      let personInc = document.querySelector("#personInc")
      let personDec = document.querySelector("#personDec")
      let valperson = document.querySelector("#valperson")
      let babyInc = document.querySelector("#babyInc")
      let babyDec = document.querySelector("#babyDec")
      let valBaby = document.querySelector("#valBaby")
      let maxChair 
      console.log(data)
      let inatiolValuePer = data.groub_num
      let inatiolValueBaby = 1
      valperson.textContent = inatiolValuePer
      valBaby.textContent = inatiolValueBaby
      console.log(type_price)
      personInc.addEventListener("click", _=>{
        switch (type_price.value) {
          case "group_normal":
            maxChair = data.chair_normal
            break;
          case "group_vip":
            maxChair = data.chair_vip
            break;
            case "group_a":
              maxChair = data.chair_a
            break;
          case "group_b":
            maxChair = data.chair_b
            break;
          case "group_c":
            maxChair = data.chair_c
            break;
        }
        if(valperson.textContent < maxChair){
          
          valperson.textContent = ++inatiolValuePer
          personDec.classList.remove("desable")
          
        }else{
          personInc.classList.add("desable")
        }
        
      })
      personDec.addEventListener("click", _=>{
        
        if(valperson.textContent > data.groub_num){
          personInc.classList.remove("desable")
          valperson.textContent = --inatiolValuePer
        }else{
          personDec.classList.add("desable")
        }
        
      })
      
      babyInc.addEventListener("click", _=>{
        valBaby.textContent = ++inatiolValueBaby
      })
      babyDec.addEventListener("click", _=>{
        if(inatiolValueBaby == 1 ){
          inatiolValueBaby = 1
        }else{
          valBaby.textContent = --inatiolValueBaby
        }
        
      })
      babyNum.style.display = "none"
      personNum.style.display = "none"
      selChiled.style.display = "none"
      selChiled.addEventListener("change",e=>{
        if(e.target.value == "yes"){
          babyNum.style.display = "flex"
        }else{
          babyNum.style.display = "none"
        }
      })
      type_price.addEventListener("change",e=>{
        let typeValue = e.target.value
        if(typeValue == "normal" || typeValue == "vip" || typeValue =="a" || typeValue == "b" || typeValue == "c"){
          babyNum.style.display = "none"
          selChiled.style.display = "none"
          personNum.style.display = "none"
        }else{
          personNum.style.display = "flex"
          selChiled.style.display = "flex"

        }
        switch (typeValue) {
          case 'normal':
            input_price.value = data.price_normal
            break;
          case 'vip':
            input_price.value = data.price_vip
            break;
          case 'a':
            input_price.value = data.price_a
            break;
          case 'b':
            input_price.value = data.price_b
            break;
          case 'c':
            input_price.value = data.price_c
            break;
        }
      })
      let textarea = document.querySelector(".text-more textarea")
      document.querySelector(".opt").addEventListener("change", e =>{
        let value = e.currentTarget.value
        if(value == "yes"){
          textarea.style.visibility = "visible"
        }else{
          textarea.style.visibility = "hidden"
        }
      })
      
      document.querySelectorAll(".popup-content .close > i").forEach(cls => {
        cls.addEventListener("click", _=> {
          popup.innerHTML = ""
          document.querySelector(".popup").classList.remove("active")
        })
      })
      })
      }
  }
  getData(5)
}
// Footer 
function footer(){
  function getDateFooter(url, pass){
    fetch(url, {
        method: 'GET',
        headers:{api_password: pass}
    })
        .then(response => response.json())
        .then(data => {
            if(data.status){
              let {email, phone, twiter,facebook,instagram,snapchat,tiktok} = data.data
              social.innerHTML = `
                <a href="https://wa.me/+${phone}" target='_blank'><i class="fa-brands fa-whatsapp"></i>${phone}</a>
                <a href="${instagram}" target='_blank'><i class="fa-brands fa-instagram"></i>instagram</a>
                <a href="mailto:${email}" target='_blank'><i class="fa-solid fa-envelope"></i>${email}</a>
                <a href="${snapchat}" target='_blank'><i class="fa-brands fa-snapchat"></i>snapchat</a>
                <a href="${twiter}" target='_blank'><i class="fa-brands fa-twitter"></i>twiter</a>
                <a href="${tiktok}" target='_blank'><i class="fa-brands fa-tiktok"></i>tiktok</a>
                <a href="${facebook}" target='_blank'><i class="fa-brands fa-facebook-f"></i>facebook</a>
              `
            }

        })
        .catch(error => console.log('Error', error));
  }
  getDateFooter(`${url}/setting`, APIpassword)
}
// contact
function contact(){
  let container = document.querySelector(".contact .container")
  container.innerHTML = `
    <div class="logo"></div>
    <div class="form">
        <h1>${lang == "ar"? "اتصل بنا":"Contact us"}</h1>
        <form>
            <input type="text" placeholder="${lang == "ar"? "الاسم":"Name"}" class="name" required>
            <input type="tel" placeholder="${lang == "ar"? "رقم الهاتف":"Phone"}" class="phone" required>
            <input type="email" placeholder="${lang == "ar"? "الايميل":"Email"}" class="email" required>
            <textarea placeholder="${lang == "ar"? "الملاحظات":"Notes"}" class="notes" required></textarea>
            <button class="btn-form">${lang == "ar"? "ارسل":"Submit"}</button>
        </form>
    </div>
  `
  let form = document.querySelector(".form form")
  let btn = document.querySelector(".btn-form")
  let msg = document.querySelector(".msg")

  // Start Get Data 
  function getDate(url, pass, lang){
      fetch(url, {
          method: 'GET',
          headers:{
              api_password: pass,
              lang: lang
          }
      })
          .then(response => response.json())
          .then(data => {
              if(data.status){
                  let image = data.data
                  const imageContact = document.querySelector(".images-contact .img")
                  let img = document.createElement("img")
                  img.src = image
                  img.alt = "image"
                  imageContact.append(img)
              }
          })
          .catch(error => console.log('Error', error));
  }
  getDate(`${url}/contact`, APIpassword, lang)
  form.addEventListener("submit", e =>{
      btn.classList.add("disable")
      btn.textContent = `${lang == "ar"? "جاري الارسال .." : "Sending data .."}`
      e.preventDefault()
      let name = document.querySelector(".name").value
      let phone = document.querySelector(".phone").value
      let email = document.querySelector(".email").value
      let note = document.querySelector(".notes").value
      fetch(`${url}/contact?name=${name}&email=${email}&phone=${phone}&note=${note}`, {
          method: "POST",
          headers:{
              api_password: APIpassword,
              "Content-Type": "application/x-www-form-urlencoded"
          },
          body:{name,phone,email,note}
      })
      .then(res => res.json())
      .then(data => {
          if(data.status){
              btn.classList.remove("disable")
              btn.textContent = `${lang == "ar"? "ارسل":"Submit"}`
              msg.textContent = `${lang == "ar"? "تم ارسال البيانات ..":"Data has been sent..."}`
              msg.style.display = "block"
              setTimeout(_=>{
                  msg.style.display = "none" 
                  window.location.href = "/"
              }, 2000)
          }
      })
      .catch(error => console.log('Error', error));
  })
}
function rate(){
  document.querySelector(".rate .container").innerHTML = `
  <div class="forms">
    <form>
        <p>${lang == "ar"?"استمارة قياس رضا العملاء":"customer satisfaction measurement form"}</p>
        <input name="name" type="text" placeholder="${lang=="ar"?"الاسم":"Name"}" required>
        <input name="phone" type="tel" placeholder="${lang=="ar"? "الهاتف":"Phone"}" required>
        <input name="email" type="email" placeholder="${lang=="ar"?"الايميل":"Email"}" required>
        <input name="event_name" type="text" placeholder="${lang=="ar"?"الايفينت الذي قمت باختياره":"The event you chose"}" required>
        <select class="type" required>
            <option hidden value="">${lang=="ar"?"نوع التذكره":"Type of ticket"}</option>
            <option value="normal">Normal</option>
            <option value="vip">VIP</option>
        </select>
        <div class="selection">
            <div>
                <span>${lang=="ar"? "سعر التذكره": "Ticket price"}</span>
                <div class="select" required>
                    <input value="1" type="radio" name="price" id="price">
                    <label for="price">${lang=="ar"?"ضعيف":"Weak"}</label>
                    <input value="2" type="radio" name="price" id="price1">
                    <label for="price1">${lang=="ar"?"جيد":"Good"}</label>
                    <input value="3" type="radio" name="price" id="price2">
                    <label for="price2">${lang=="ar"?"ممتاز":"excellent"}</label>
                </div>
            </div>
            <div>
                <span>${lang=="ar"? "تنظيم الفعالية":"Event Organizing"}</span>
                <div class="select" required>
                    <input value="1" type="radio" name="event" id="event">
                    <label for="event">${lang=="ar"?"ضعيف":"Weak"}</label>
                    <input value="2" type="radio" name="event" id="event1">
                    <label for="event1">${lang=="ar"?"جيد":"Good"}</label>
                    <input value="3" type="radio" name="event" id="event2">
                    <label for="event2">${lang=="ar"?"ممتاز":"excellent"}</label>
                </div>
            </div>
            <div>
                <span>${lang=="ar"?"موقع الفعالية":"Event site"}</span>
                <div class="select" required>
                    <input value="1" type="radio" name="loc" id="loc">
                    <label for="loc">${lang=="ar"?"ضعيف":"Weak"}</label>
                    <input value="2" type="radio" name="loc" id="loc1">
                    <label for="loc1">${lang=="ar"?"جيد":"Good"}</label>
                    <input value="3" type="radio" name="loc" id="loc2">
                    <label for="loc2">${lang=="ar"?"ممتاز":"excellent"}</label>
                </div>
            </div>
            <div>
                <span>${lang=="ar"?"تنوع الفقرات":"Diversity of paragraphs"}</span>
                <div class="select" required>
                    <input value="1" type="radio" name="type" id="type">
                    <label for="type">${lang=="ar"?"ضعيف":"Weak"}</label>
                    <input value="2" type="radio" name="type" id="type1">
                    <label for="type1">${lang=="ar"?"جيد":"Good"}</label>
                    <input value="3" type="radio" name="type" id="type2">
                    <label for="type2">${lang=="ar"?"ممتاز":"excellent"}</label>
                </div>
            </div>
            <div>
                <span>${lang=="ar"?"جودة الطعام":"food quality"}</span>
                <div class="select" required>
                    <input value="1" type="radio" name="food" id="food">
                    <label for="food">${lang=="ar"?"ضعيف":"Weak"}</label>
                    <input value="2" type="radio" name="food" id="food1">
                    <label for="food1">${lang=="ar"?"جيد":"Good"}</label>
                    <input value="3" type="radio" name="food" id="food2">
                    <label for="food2">${lang=="ar"?"ممتاز":"excellent"}</label>
                </div>
            </div>
            <div>
                <span>${lang=="ar"?"تعاون المنظمين":"Organizers cooperation"}</span>
                <div class="select" required>
                    <input value="1" type="radio" name="helper" id="helper">
                    <label for="helper">${lang=="ar"?"ضعيف":"Weak"}</label>
                    <input value="2" type="radio" name="helper" id="helper1">
                    <label for="helper1">${lang=="ar"?"جيد":"Good"}</label>
                    <input value="3" type="radio" name="helper" id="helper2">
                    <label for="helper2">${lang=="ar"?"ممتاز":"excellent"}</label>
                </div>
            </div>
            <div>
                <span>${lang=="ar"?"التقييم العام للحفل":"Overall evaluation of the party"}</span>
                <div class="select" required>
                    <input value="1" type="radio" name="rate" id="rate">
                    <label for="rate">${lang=="ar"?"ضعيف":"Weak"}</label>
                    <input value="2" type="radio" name="rate" id="rate1">
                    <label for="rate1">${lang=="ar"?"جيد":"Good"}</label>
                    <input value="3" type="radio" name="rate" id="rate2">
                    <label for="rate2">${lang=="ar"?"ممتاز":"excellent"}</label>
                </div>
            </div>
        </div>
        <textarea name="note" placeholder="${lang=="ar"?"الملاحظات":"Notes"}" required></textarea>
        <span class="msg-form"></span>
        <button>${lang=="ar"?"ارسل":"Submit"}</button>
    </form>
</div>
  `
}
function rateSub(){
  document.querySelector(".rate-sub .container").innerHTML=`
  <div class="forms">
    <form>
        <p>${lang == "ar"?"استمارة قياس رضا العملاء":"customer satisfaction measurement form"}</p>
        <input name="name" type="text" placeholder="${lang=="ar"?"الاسم":"Name"}" required>
        <input name="phone" type="tel" placeholder="${lang=="ar"? "الهاتف":"Phone"}" required>
        <input name="email" type="email" placeholder="${lang=="ar"?"الايميل":"Email"}" required>
        <input name="event_name" type="text" placeholder="${lang=="ar"?"الايفينت الذي قمت باختياره":"The event you chose"}" required>
        <select class="type" required>
            <option hidden value="">${lang=="ar"?"نوع التذكره":"Type of ticket"}</option>
            <option value="a">A</option>
            <option value="b">B</option>
            <option value="c">C</option>
        </select>
        <div class="selection">
        <div>
        <span>${lang=="ar"? "سعر التذكره": "Ticket price"}</span>
        <div class="select" required>
            <input value="1" type="radio" name="price" id="price">
            <label for="price">${lang=="ar"?"ضعيف":"Weak"}</label>
            <input value="2" type="radio" name="price" id="price1">
            <label for="price1">${lang=="ar"?"جيد":"Good"}</label>
            <input value="3" type="radio" name="price" id="price2">
            <label for="price2">${lang=="ar"?"ممتاز":"excellent"}</label>
        </div>
        </div>
        <div>
            <span>${lang=="ar"? "تنظيم الفعالية":"Event Organizing"}</span>
            <div class="select" required>
                <input value="1" type="radio" name="event" id="event">
                <label for="event">${lang=="ar"?"ضعيف":"Weak"}</label>
                <input value="2" type="radio" name="event" id="event1">
                <label for="event1">${lang=="ar"?"جيد":"Good"}</label>
                <input value="3" type="radio" name="event" id="event2">
                <label for="event2">${lang=="ar"?"ممتاز":"excellent"}</label>
            </div>
        </div>
        <div>
            <span>${lang=="ar"?"موقع الفعالية":"Event site"}</span>
            <div class="select" required>
                <input value="1" type="radio" name="loc" id="loc">
                <label for="loc">${lang=="ar"?"ضعيف":"Weak"}</label>
                <input value="2" type="radio" name="loc" id="loc1">
                <label for="loc1">${lang=="ar"?"جيد":"Good"}</label>
                <input value="3" type="radio" name="loc" id="loc2">
                <label for="loc2">${lang=="ar"?"ممتاز":"excellent"}</label>
            </div>
        </div>
        <div>
            <span>${lang=="ar"?"تنوع الفقرات":"Diversity of paragraphs"}</span>
            <div class="select" required>
                <input value="1" type="radio" name="type" id="type">
                <label for="type">${lang=="ar"?"ضعيف":"Weak"}</label>
                <input value="2" type="radio" name="type" id="type1">
                <label for="type1">${lang=="ar"?"جيد":"Good"}</label>
                <input value="3" type="radio" name="type" id="type2">
                <label for="type2">${lang=="ar"?"ممتاز":"excellent"}</label>
            </div>
        </div>
        <div>
            <span>${lang=="ar"?"جودة الطعام":"food quality"}</span>
            <div class="select" required>
                <input value="1" type="radio" name="food" id="food">
                <label for="food">${lang=="ar"?"ضعيف":"Weak"}</label>
                <input value="2" type="radio" name="food" id="food1">
                <label for="food1">${lang=="ar"?"جيد":"Good"}</label>
                <input value="3" type="radio" name="food" id="food2">
                <label for="food2">${lang=="ar"?"ممتاز":"excellent"}</label>
            </div>
        </div>
        <div>
            <span>${lang=="ar"?"تعاون المنظمين":"Organizers cooperation"}</span>
            <div class="select" required>
                <input value="1" type="radio" name="helper" id="helper">
                <label for="helper">${lang=="ar"?"ضعيف":"Weak"}</label>
                <input value="2" type="radio" name="helper" id="helper1">
                <label for="helper1">${lang=="ar"?"جيد":"Good"}</label>
                <input value="3" type="radio" name="helper" id="helper2">
                <label for="helper2">${lang=="ar"?"ممتاز":"excellent"}</label>
            </div>
        </div>
        <div>
            <span>${lang=="ar"?"التقييم العام للحفل":"Overall evaluation of the party"}</span>
            <div class="select" required>
                <input value="1" type="radio" name="rate" id="rate">
                <label for="rate">${lang=="ar"?"ضعيف":"Weak"}</label>
                <input value="2" type="radio" name="rate" id="rate1">
                <label for="rate1">${lang=="ar"?"جيد":"Good"}</label>
                <input value="3" type="radio" name="rate" id="rate2">
                <label for="rate2">${lang=="ar"?"ممتاز":"excellent"}</label>
            </div>
        </div>
        </div>
        <textarea name="note" placeholder="${lang=="ar"?"الملاحظات":"Notes"}" required></textarea>
        <span class="msg-form"></span>
        <button>${lang=="ar"?"ارسل":"Submit"}</button>
    </form>
</div>
  `
}
function vailed(){
  let select = document.querySelector(".forms form > select")
  let form = document.querySelector(".forms form")
  let inputs = document.querySelectorAll(".forms form > input")
  let textarea = document.querySelector(".forms form textarea")
  let msg = document.querySelector(".forms .msg-form")
  var data = {}
  form.addEventListener("submit", e => {    
    e.preventDefault()

    var value = select.value
    if(value == ""){
      msg.textContent = `${lang =="ar"?"برجاء اختيار نوع التذكره":"Please select a ticket type"}`
      setTimeout(_=> msg.textContent = "",2000)
      return false
    }else{
      data.type_tic = value
    }
    inputs.forEach(inp => {
        data[inp.name] = inp.value
    })
    data[textarea.name] = textarea.value
    document.querySelectorAll(".forms form .selection > div input[type='radio']").forEach(radio => {
      var radios = document.getElementsByName(radio.name);
      var formValid = false;
      var i = 0;
      while (!formValid && i < radios.length) {
        if (radios[i].checked) {
          formValid = true;
          data[radios[i].name] = radios[i].value
        }
        i++;        
      }
      if (!formValid){
        msg.textContent = `${lang =="ar"?"برجاء ملئ جميع الحقول":"Please fill in all fields"}`
        setTimeout(_=> msg.textContent = "",2000)
      } 
    })
    var {email, event, event_name, food, helper, loc, name, phone, price, rate, note, type, type_tic} = data
    if(email && event && event_name && food && helper && loc && name && phone && price && rate && note && type && type_tic){
      sendForm(data)
    }
    function sendForm(data){
      var btn = document.querySelector(".forms form button")
      btn.classList.add("disable")
      btn.textContent = `${lang == "ar"? "جاري الارسال .." : "Sending data .."}`
      var urlencoded = new URLSearchParams();
      urlencoded.append("name", data.name);
      urlencoded.append("email", data.email);
      urlencoded.append("phone",  data.phone);
      urlencoded.append("note", data.note);
      urlencoded.append("type_ticket", data.type_tic);
      urlencoded.append("event_name", data.event_name);
      urlencoded.append("ticket_price", data.price);
      urlencoded.append("organize_event", data.event);
      urlencoded.append("locate_event", data.loc);
      urlencoded.append("Types_para", data.type);
      urlencoded.append("food", data.food);
      urlencoded.append("organizer_helper", data.helper);
      urlencoded.append("rate", data.rate);
      fetch(`${url}/add-rate`,{
        method: 'POST',
        headers:{
          api_password: APIpassword,
          "Content-Type": "application/x-www-form-urlencoded"
        },
        body: urlencoded
      })
        .then(response => response.json())
        .then(data => {
          if(data.status){
            btn.classList.remove("disable")
            btn.textContent = `${lang == "ar"? "ارسل":"Submit"}`
            msg.textContent = `${lang == "ar"? "تم ارسال البيانات ..":"Data has been sent..."}`
            msg.style.color = "#000"
            setTimeout(_=>{
              msg.style.display = "none"
              msg.style.color = "#F00"
                window.location.href = "/"
            }, 2000)
          }
        })
        .catch(err => console.log("Err"))
    
    }
  })
}
if(document.querySelector(".contact")){
  contact()
}
if(document.querySelector("footer")){
  footer()
}
if(document.querySelector(".slider")){
  aboutSlider()
}
if(document.querySelector(".events")){
  events()
}
if(document.querySelector(".about")){
  getDateAbout(`${url}/about`, APIpassword, lang)
}
if(document.querySelector(".rate")){
  rate()
  vailed()
  document.querySelectorAll(".header .container .links > ul li a").forEach(a => a.classList.remove("active"))
  document.querySelectorAll(".header .container .links ul li a").forEach(a => a.classList.remove("active-mob"))
}
if(document.querySelector(".rate-sub")){
  rateSub()
  vailed()
  document.querySelectorAll(".header .container .links > ul li a").forEach(a => a.classList.remove("active"))
  document.querySelectorAll(".header .container .links ul li a").forEach(a => a.classList.remove("active-mob"))
}
if(document.querySelector(".privacy")){
  document.querySelectorAll(".header .container .links > ul li a").forEach(a => a.classList.remove("active"))
  document.querySelectorAll(".header .container .links ul li a").forEach(a => a.classList.remove("active-mob"))
  document.querySelectorAll(".header .container .links > ul li a")[3].classList.add("active")
  document.querySelectorAll(".header .container .links ul li a")[3].classList.add("active-mob")
}
if(document.querySelector(".contact")){
  document.querySelectorAll(".header .container .links > ul li a").forEach(a => a.classList.remove("active"))
  document.querySelectorAll(".header .container .links ul li a").forEach(a => a.classList.remove("active-mob"))
  document.querySelectorAll(".header .container .links > ul li a")[4].classList.add("active")
  document.querySelectorAll(".header .container .links ul li a")[4].classList.add("active-mob")
}
window.onload = _=>{
  localStorage.removeItem("id")
  localStorage.removeItem("type")

}
