// import style from './style.scss';
// import * as styles from "./bootstrap/scss/bootstrap.scss";

import '../sass/style.scss';
import bootstrap from '~bootstrap/dist/js/bootstrap.bundle.min.js';
import $ from '~jquery/dist/jquery.js';
// import '~node_modules/bootstrap/scss/bootstrap.scss';

// import * as Popper from '@popperjs/core'
// window.Popper = Popper
// import 'bootstrap'

// initializing popovers
const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
const myModal = document.getElementsByClassName('modal');
const myCards = document.getElementsByClassName('card');
const liveToastBtn = document.getElementById('liveToastBtn')
const toast = document.getElementById('Toast')

// document.getElementsByClassName("body-copy")[0].style.offsetHeight = document.body.offsetHeight;
// console.log(document.getElementsByClassName("body-copy")[0].offsetHeight);

// popovers info
const dict_popover = {
    "Bridges" : "Bridges was a government agency of the United Cities of America, established primarily to reconnect the fractured society of the former United States of America following the cataclysm known as the Death Stranding.",
    "Chiral Network" : "The Chiral Network is Bridges' unique communication network that provides coverage of established strands across the continental United Cities of America before being expanded to Mexico and Australia.",
    "chiral network" : "The Chiral Network is Bridges' unique communication network that provides coverage of established strands across the continental United Cities of America before being expanded to Mexico and Australia.",
    "Death Stranding" : "The Death Stranding is the series of supernatural events in the world. Beginning with simultaneous explosions around the world, the Death Stranding resulted in the world of the dead and living becoming connected, with drastic consequences for human society and the ecosystem.",
    "DOOM" : "DOOMS is a rare condition granting individuals a greater connection to the other side which, in turn, grants them supernatural abilities. Those with DOOMS are called 'sufferers' of the condition due to the many negative physiological and psychological symptoms that DOOMS causes.",
    "DOOMS" : "DOOMS is a rare condition granting individuals a greater connection to the other side which, in turn, grants them supernatural abilities. Those with DOOMS are called 'sufferers' of the condition due to the many negative physiological and psychological symptoms that DOOMS causes.",
    "ka" : "Ka refers to a person's soul, an ancient Egyptian concept where it is the vital life force that separates from the body at death.",
    "Beach": "The Beach is a metaphysical manifestation of the World of the Dead, between the living world and what comes next.",
    "Bridge Baby": "A Bridge Baby, abbreviated as BB, is an unborn fetus that has been taken from a stillmother to be used as equipment by Bridges operatives, and some separatist groups, granting them the ability to sense and detect the Beached Things.",
    "Bridge Babies": "A Bridge Baby, abbreviated as BB, is an unborn fetus that has been taken from a stillmother to be used as equipment by Bridges operatives, and some separatist groups, granting them the ability to sense and detect the Beached Things.",
    "BB": "A Bridge Baby, abbreviated as BB, is an unborn fetus that has been taken from a stillmother to be used as equipment by Bridges operatives, and some separatist groups, granting them the ability to sense and detect the Beached Things.",
    "Lisa Bridges" : "Lisa Unger (née Bridges) was the common-law wife of Cliff Unger and biological mother of Sam.",
    "Lisa" : "Lisa Unger (née Bridges) was the common-law wife of Cliff Unger and biological mother of Sam.",
    "UCA": "The United Cities of America (UCA), also referred to simply as America, is a nascent nation-state situated in North America. Its capital is Capital Knot City, and it emerged from the fragmented remains of the United States after the catastrophic events of the Death Stranding.",
    "Higgs Monaghan": "Higgs Monaghan was a porter and a close associate of Fragile Express, until he met and was seduced by Amelie. Higgs acted as the figurehead of the militant separatist group known as the Homo Demens to maintain the independence of Edge Knot City on Amelie's behest until he is defeated by Sam and left stranded on the Beach by Fragile.",
    "Higgs": "Higgs Monaghan was a porter and a close associate of Fragile Express, until he met and was seduced by Amelie. Higgs acted as the figurehead of the militant separatist group known as the Homo Demens to maintain the independence of Edge Knot City on Amelie's behest until he is defeated by Sam and left stranded on the Beach by Fragile.",
    "Fragile Express": "Fragile Express was a delivery company that operates in the central region of the world after the Death Stranding."
}


$(document).ready(function() {
    
    //Toast
    if (liveToastBtn) {
      const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toast)
    //   console.log("TOAST");
    
      liveToastBtn.addEventListener('click', () => {
        toastBootstrap.show()
      })
    }

    // modals
    $(".modal").on("keyup", function(event) {
        const myModal_ = bootstrap.Modal.getInstance(this);
        // console.log(event.key);
        // console.log(`id  ${this.id}`);
    
        if(event.key == "ArrowLeft") {
    
            if (parseInt(this.getAttribute("id")) - 1 < 1) {
                myModal_.hide();
                return;
            }
            
            let prev = document.body.querySelector(`.modal[id="${this.getAttribute("id") - 1}"]`)
            prev = bootstrap.Modal.getOrCreateInstance(prev)
            
            if (prev) {
                prev.show();
            }
            
            myModal_.hide();
    
            //console.log(`.modal[alt="${this.getAttribute("alt") - 1}"]`);
        }
        else if(event.key == "ArrowRight") {
    
            if (parseInt(this.getAttribute("id")) + 1 > 6) {
                myModal_.hide();
                return;
            }
    
            let next = document.body.querySelector(`.modal[id="${parseInt(this.getAttribute("id")) + 1}"]`)
            next = bootstrap.Modal.getOrCreateInstance(next)
    
            // console.log(`.modal[alt="${parseInt(this.getAttribute("alt")) + 1}"]`);
    
            if (next) {
                next.show();
            }
            
            myModal_.hide();
    
            //console.log(`.modal[alt="${this.getAttribute("alt") + 1}"]`);
        }
        // console.log(event.key);
    });
    
    $(document).bind("click", function(event) { 

        if (event.target.id != "contextmenu" && event.target.parentElement.id != "contextmenu") {
            $('#contextmenu').remove();
            // console.log(event.target.id, event.target.parentElement.id);
            // document.getElementById("contextmenu").style.opacity = 0;
        }
        
        // if ($(event.target).parents(".table").length < 1 && event.target.id != 'button-cancel' || ) {
        //     document.getElementsByClassName('table')[0].style.zIndex = -999;
        //     document.getElementsByClassName('table')[0].style.opacity = 0;
        //     // console.log(event.target.classList, event.target.parentElement.classList, event.target.parentElement.parentElement.classList);
        // }

        // console.log($(event.target).parents(".table").length);
    
        // console.log(event.target.classList.contains("table"));
        // console.log(event.target.parentElement.id);
    });

    $(".button-cancel").on("click", function() {
        window.location.replace("/character-cards");
        // console.log(document.getElementsByClassName('table')[0]);
        // document.getElementsByClassName('table')[0].style.zIndex = -999;
        // document.getElementsByClassName('table')[0].style.opacity = 0;
    });

    $(".button-registr").on("click", function() {
        window.location.replace("/registr");
    });

    $(".button-back-login").on("click", function(event) {
        window.location.replace("/");
    });

    

    for (var i = 0; i < myCards.length; i++) 
        myCards[i].addEventListener('contextmenu', function(event) {
            event.preventDefault();

            var obj = event.target.closest(".card");
            console.log(obj)

            let menus = document.querySelectorAll("#contextmenu");
            // console.log(menus);
            if (menus) {
                $(menus[0]).remove();
            }
            
            // console.log("contextmenu appeared!");
            
            var contextmenu = document.createElement('div');
            contextmenu.id = "contextmenu";
            contextmenu.classList.add("contextmenu");
            
            var btnAdd = document.createElement("div");
            btnAdd.textContent = "Добавить карточку";
            btnAdd.id = "button-add";

            // добавление карточки
            btnAdd.addEventListener("click", function() {
                window.location.replace('/character-cards/create');
                contextmenu.remove();
            });

            contextmenu.appendChild(btnAdd);

            var url = `/character-cards/${obj.id}/edit`;
            var btnEdit = document.createElement("div");
            btnEdit.textContent = "Редактировать карточку";
            btnEdit.id = "button-edit";

            btnEdit.addEventListener("click", function(event) {
                // console.log(event.target);
                window.location.replace(url);
                contextmenu.remove();
            });
            
            contextmenu.appendChild(btnEdit);
            
            var btnDel = document.createElement("div");
            btnDel.textContent = "Удалить карточку";
            btnDel.id = "button-del";
            // var del_url = `/character-cards/${obj.id}`;

            btnDel.addEventListener("click", function(event) {
                // window.location.replace(url);
                contextmenu.remove();
                // console.log(obj.id);

                if (confirm(`Вы уверены?`)) {
                    fetch(`character-cards/${obj.id}`, {
                        method: "DELETE",
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    }).then(() => {
                        // obj.remove();
                        window.location.replace('character-cards');
                    })
                }
            });
            
            contextmenu.appendChild(btnDel);

            let e = window.event;
            let windowWidth = window.innerWidth;
        
            //граматное появление contextmenu относительно свободного места экрана
            if (windowWidth - e.pageX < 250) {
              var x = e.pageX - 250;
            }
            else {
              var x = e.pageX;
            }
        
            if (windowWidth - e.pageY < 145) {
              var y = e.pageY - 145;
            }
            else {
              var y = e.pageY;
            }
            
            // var x = e.pageX;
            // var y = e.pageY;

            // console.log(x, y);
            contextmenu.style.opacity = 1;
            contextmenu.style.top = `${y}px`;
            contextmenu.style.left = `${x}px`;
            document.body.appendChild(contextmenu);
    });

    // popover's
    $(".to_popover").on("mouseenter", function(e) {
        let data_ = document.createTextNode(e.target.textContent)
        let title = document.createElement("div")
        title.appendChild(data_)
        let popover

        if (data_ == "Bridges") {
            let img = document.createElement("img")
            img.src = "icons/Bridges_logo.png"
            img.classList.add("modal-img")
            title.appendChild(img)

            popover = bootstrap.Popover.getOrCreateInstance(this, {
            html: true,
            trigger: 'manual',
            title: title,
            template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><img class="modal-img" src="icons/Bridges_logo.png"><div class="popover-body"></div></div>',
            content: dict_popover[`${e.target.textContent}`]
        });

        }
        else if (data_ == "Fragile Express") {
            let img = document.createElement("img")
            img.src = "icons/Fragile_express.png"
            img.classList.add("modal-img")
            title.appendChild(img)

            popover = bootstrap.Popover.getOrCreateInstance(this, {
            html: true,
            trigger: 'manual',
            title: title,
            template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><img class="modal-img" src="icons/Fragile_express.png" /><div class="popover-body"></div></div>',
            content: dict_popover[`${e.target.textContent}`]
        });

        }

        else {
            popover = bootstrap.Popover.getOrCreateInstance(this, {
            html: true,
            trigger: 'manual',
            title: title,
            template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
            content: dict_popover[`${e.target.textContent}`]
        });
        }
        // popover = bootstrap.Popover.getOrCreateInstance(this, {
        //     html: true,
        //     trigger: 'manual',
        //     title: title,
        //     template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
        //     content: dict_popover[`${e.target.textContent}`]
        // });
        
        popover.show();
    });

    $(".to_popover").on("mouseleave", function(e) {
        let popover = bootstrap.Popover.getOrCreateInstance(this);
        
        if (popover) {
            popover.hide();
        }
    })

    // привязываю вывод соответствующего modal при ножатии на карту card
    // $(".card").on("click", function() {
    //     // console.log(this.children[1].children[0].textContent);
    //     let myModal_ = Array.from(myModal)
    //     let model_ = myModal_.filter((myModal_) => myModal_.children[0].children[0].children[0].children[0].textContent == this.children[1].children[0].textContent);
    //     // console.log(model_[0]);

    //     let _model = bootstrap.Modal.getOrCreateInstance(model_[0]);
    //     _model.show();

    //     // model_[0].modal('show');
    //     // model_[0].classList.add("show");

    //     // $(`#${model_[0].id}`).toggle();
    // });

    var showUrl = `{{ route('character-cards.show', $characterCard) }}`;

    $("#cardModal").ready(function() {
        $('#cardModal').show();
    });

    $(".card").on("click", function(event) {
        window.location.replace(`/character-cards/${this.id}`);
    })
});


