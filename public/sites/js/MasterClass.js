$ = document.querySelector.bind(document);
$$ = document.querySelectorAll.bind(document);


// clearInput
function clearInput(){
    const input_search = document.querySelector('.search-box')
    input_search.value ="";
}

// list_outline
// const list_outline = $(".list-outline");
// list_outline.onclick = function () {
//   $(".dropdown-content").classList.toggle("active");
// };

// Remove-DropMenu
// function myFunction(x) {
//     if (x.matches) {
//     } else {
//         $(".dropdown-content").classList.remove('active')
//     }
//   }
//   var x = window.matchMedia("(max-width: 768px)")
//   myFunction(x)
//   x.addListener(myFunction) 

  //Search
  function search(){
      const search = $('.search');
      const list_search = $('.list-search')

      search.onclick = function () {
        list_search.classList.add('active');

        window.addEventListener('mouseup', function my_function(e) {
            if (document.querySelector('.list-search').contains(e.target)) {
    
            } else {
                list_search.classList.remove('active');
            }
        });
      }
  }

//   On Click Search
  const results = $$('.result')
  const lists_content = $$('.list-content')

  results.forEach((result,index) =>{
      const list_content = lists_content[index]

      result.onclick = function(){
          list_content.classList.add('active');
      }
  })

  //Remove Content
  function remove_content(){
      const clears_content = $$('.clear-content')
      const lists_content = $$('.list-content')

      clears_content.forEach((clear) =>{
        clear.onclick = function() {
            lists_content.forEach((content) =>{
                content.classList.remove('active')
            })
        }
      })
  }

//   Sticky-Footer
// window.onscroll = function(){
//     scroll();
// };

// function scroll(){
//     if(document.body.scrollTop > 200 || document.documentElement.scrollTop > 200){
//         document.querySelector('.sticky-footer').style.bottom= "0px";
//     }else{
//         document.querySelector('.sticky-footer').style.bottom= "-100px";
//     }
// }

//Select-Type-Master
const types = $$('.type')
const list_masters = $$('.list-masters')

  types.forEach((type,index) =>{
      const list_master = list_masters[index]

      type.onclick = function(){
        document.querySelector('.list-masters.active').classList.remove('active')
        document.querySelector('.type.active').classList.remove('active')

        this.classList.add('active')
        list_master.classList.add('active')
        
      }
  })


